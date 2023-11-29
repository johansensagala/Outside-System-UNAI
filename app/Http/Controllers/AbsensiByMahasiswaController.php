<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\PengajuanDataPenjamin;
use App\Models\PengajuanLuarAsrama;
use App\Models\Semester;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class AbsensiByMahasiswaController extends Controller
{
    public function index () {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $id_mahasiswa = $mahasiswa->id;

        // Bagian ini untuk mengurus tabel absensi dan detail absensi

        $data_absen = Absensi::where('id_mahasiswa', $id_mahasiswa)->get();

        $data_absen_bulanan = $data_absen->filter(function ($absen) {
            return $absen->created_at->isCurrentMonth();
        });

        $bulan_tahun_combinations = Absensi::select(DB::raw('YEAR(created_at) AS tahun, MONTH(created_at) AS bulan'))
            ->where('id_mahasiswa', $id_mahasiswa)
            ->groupBy('tahun', 'bulan')
            ->get();

        $awal_absensi = Semester::where('aksi', 'mulai absensi')
            ->latest('created_at')
            ->first()
            ->created_at;
        
        $tanggal_awal_absensi = Carbon::parse($awal_absensi)->setTime(21, 30, 0);
        $now = Carbon::now();
        $selectedDate = $now;
        
        if ($now->hour >= 21 && $now->minute >= 30) {
            $selisih_hari = $tanggal_awal_absensi->diffInDays($now) + 1;
            $jumlah_hari_bulan_ini = $now->day;
        } else {
            $kemarin = Carbon::yesterday()->setTime(21, 30, 0);
            $selisih_hari = $tanggal_awal_absensi->diffInDays($kemarin) + 1;
            $jumlah_hari_bulan_ini = $now->day - 1;
        }
        
        $jumlah_hadir = $data_absen->where('kehadiran', 'Hadir')->count();
        $jumlah_izin = $data_absen->where('kehadiran', 'Izin')->count();
        $jumlah_absen = $selisih_hari - $jumlah_hadir - $jumlah_izin;
        
        $summary = [
            'hadir' => $jumlah_hadir,
            'izin' => $jumlah_izin,
            'absen' => $jumlah_absen,
        ];
        
        $jumlah_hadir_bulanan = $data_absen_bulanan->where('kehadiran', 'Hadir')->count();
        $jumlah_izin_bulanan = $data_absen_bulanan->where('kehadiran', 'Izin')->count();
        $jumlah_absen_bulanan = $jumlah_hari_bulan_ini - $jumlah_hadir_bulanan - $jumlah_izin_bulanan;
        
        $summary_bulanan = [
            'hadir' => $jumlah_hadir_bulanan,
            'izin' => $jumlah_izin_bulanan,
            'absen' => $jumlah_absen_bulanan,
        ];

        $absensi_content = view('mahasiswa.__absensi', compact('data_absen_bulanan'))->render();
        $absensi_bulanan = view('mahasiswa.__absensi_bulanan', compact('summary_bulanan'))->render();

        // dd($summary_bulanan);
    
        // Bagian ini untuk mengurus aksi absensi
    
        $data_absen_today = Absensi::where('id_mahasiswa', $id_mahasiswa)
            ->whereDate('created_at', Carbon::today())
            ->get();

        $batas_bawah = Carbon::createFromTime(21, 00);
        $batas_atas = Carbon::createFromTime(21, 30);
    
        $absen_time = $now->between($batas_bawah, $batas_atas);
        
        $belum_absen = $data_absen_today->isEmpty();

        $pengajuan_luar_asrama = PengajuanLuarAsrama::where('id_mahasiswa', $id_mahasiswa)->where('status', 'disetujui')->first();

        if (!($pengajuan_luar_asrama)) {
            return view('mahasiswa.no_absensi');
        }

        $status_tinggal = $pengajuan_luar_asrama->status_tinggal;

        if ($status_tinggal == 'Married' || $status_tinggal == 'Profesi Ners' || $status_tinggal == 'Skripsi') {
            $latitude = $pengajuan_luar_asrama->latitude;
            $longitude = $pengajuan_luar_asrama->longitude;
        } else {
            $data_penjamin = PengajuanDataPenjamin::where('id_penjamin', $pengajuan_luar_asrama->id_penjamin)->where('status', 'disetujui')->first();

            $latitude = $data_penjamin->latitude;
            $longitude = $data_penjamin->longitude;
        }
        
        return view('mahasiswa.absensi', compact('data_absen_bulanan', 'mahasiswa', 'belum_absen', 'absen_time', 'latitude', 'longitude', 'bulan_tahun_combinations', 'summary', 'summary_bulanan', 'absensi_content', 'absensi_bulanan', 'selectedDate'));
    }

    public function filter (Request $request) {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $id_mahasiswa = $mahasiswa->id;

        $data_absen = Absensi::where('id_mahasiswa', $id_mahasiswa)->get();

        $selectedMonth = $request->input('month');

        $selectedDate = Carbon::createFromFormat('F Y', $selectedMonth);

        $selectedYear = $selectedDate->year;
        $selectedMonth = $selectedDate->month;

        $awal_absensi = Semester::where('aksi', 'mulai absensi')
            ->latest('created_at')
            ->first()
            ->created_at;

        $data_absen_bulanan = DB::table('absensis')
            ->where('id_mahasiswa', $id_mahasiswa)
            ->whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)
            ->get();

        $bulan_tahun_combinations = Absensi::select(DB::raw('YEAR(created_at) AS tahun, MONTH(created_at) AS bulan'))
            ->where('id_mahasiswa', $id_mahasiswa)
            ->groupBy('tahun', 'bulan')
            ->get();

        $tanggal_awal_absensi = Carbon::parse($awal_absensi)->setTime(21, 30, 0);
        $now = Carbon::now();

        if ($now->hour >= 21 && $now->minute >= 30) {
            $selisih_hari = $tanggal_awal_absensi->diffInDays($now) + 1;
            $jumlah_hari_bulan_ini = $now->day;
        } else {
            $kemarin = Carbon::yesterday()->setTime(21, 30, 0);
            $selisih_hari = $tanggal_awal_absensi->diffInDays($kemarin) + 1;
            $jumlah_hari_bulan_ini = $now->day - 1;
        }

        $jumlah_hadir = $data_absen->where('kehadiran', 'Hadir')->count();
        $jumlah_izin = $data_absen->where('kehadiran', 'Izin')->count();
        $jumlah_absen = $selisih_hari - $jumlah_hadir - $jumlah_izin;
        
        $summary = [
            'hadir' => $jumlah_hadir,
            'izin' => $jumlah_izin,
            'absen' => $jumlah_absen,
        ];
        
        $jumlah_hadir_bulanan = $data_absen_bulanan->where('kehadiran', 'Hadir')->count();
        $jumlah_izin_bulanan = $data_absen_bulanan->where('kehadiran', 'Izin')->count();
        $jumlah_absen_bulanan = $jumlah_hari_bulan_ini - $jumlah_hadir_bulanan - $jumlah_izin_bulanan;
        
        $summary_bulanan = [
            'hadir' => $jumlah_hadir_bulanan,
            'izin' => $jumlah_izin_bulanan,
            'absen' => $jumlah_absen_bulanan,
        ];

        // dd($summary_bulanan);

        $absensi_content = view('mahasiswa.__absensi', compact('data_absen_bulanan'))->render();
        $absensi_bulanan = view('mahasiswa.__absensi_bulanan', compact('summary_bulanan'))->render();
            
        return view('mahasiswa._absensi', compact('data_absen_bulanan', 'summary', 'summary_bulanan', 'bulan_tahun_combinations', 'absensi_content', 'absensi_bulanan', 'selectedDate'))->render();
    }

    public function show () {
        return view('mahasiswa.detail_absensi');
    }

    public function store (Request $request) {
        $request->validate([
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        $absensi = new Absensi();

        $absensi->latitude = $request->input('latitude');
        $absensi->longitude = $request->input('longitude');
        if ($absensi->foto) {
            $absensi->foto = $request->foto->store('bukti_absensi');
        }
        $absensi->alasan = $request->input('alasan');
        $absensi->kehadiran = $request->input('kehadiran');
        $absensi->id_mahasiswa = Auth::guard('mahasiswa')->user()->id;

        $absensi->save();

        return redirect()->back();
    }
}
