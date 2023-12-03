<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Mahasiswa;
use App\Models\PengajuanDataPenjamin;
use App\Models\PengajuanLuarAsrama;
use App\Models\Semester;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class DaftarMahasiswaOutsideController extends Controller
{
    public function index()
    {
        $daftar_mahasiswa_outside = PengajuanLuarAsrama::where('status', 'disetujui')
            ->paginate(20);
                
        return view('biro_kemahasiswaan.daftar_mahasiswa_outside', compact('daftar_mahasiswa_outside'));
    }

    public function show ($id_mahasiswa) {
        $mahasiswa = Mahasiswa::where('id', $id_mahasiswa)->first();
        $id_mahasiswa = $mahasiswa->id;

        // Bagian ini untuk mengurus tabel absensi dan detail absensi

        $data_absen = Absensi::where('id_mahasiswa', $id_mahasiswa)
            ->orderByDesc('created_at')
            ->get();
    
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
        
        $tanggal_awal_absensi = Carbon::parse($awal_absensi)->setTime(21, 0, 0);
        $now = Carbon::now();
        $selectedDate = $now;
        
        if ($now->hour >= 21 && $now->minute >= 00) {
            $selisih_hari = $tanggal_awal_absensi->diffInDays($now) + 1;
            $jumlah_hari_bulan_ini = $now->day;
        } else {
            $kemarin = Carbon::yesterday()->setTime(21, 0, 0);
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

        $absensi_content = view('mahasiswa.monitor.__absensi', compact('data_absen_bulanan'))->render();
        $absensi_bulanan = view('mahasiswa.monitor.__absensi_bulanan', compact('summary_bulanan'))->render();
    
        // Bagian ini untuk mengurus aksi absensi
    
        $pengajuan_luar_asrama = PengajuanLuarAsrama::where('id_mahasiswa', $id_mahasiswa)->where('status', 'disetujui')->first();

        if (!($pengajuan_luar_asrama)) {
            return view('mahasiswa.no_absensi');
        }
        
        return view('mahasiswa.monitor.absensi', compact('data_absen_bulanan', 'mahasiswa', 'bulan_tahun_combinations', 'summary', 'summary_bulanan', 'absensi_content', 'absensi_bulanan', 'selectedDate'));
    }

    public function filter (Request $request) {
        $selectedDate = null;

        $mahasiswa = Auth::guard('mahasiswa')->user();
        $id_mahasiswa = $mahasiswa->id;

        $data_absen = Absensi::where('id_mahasiswa', $id_mahasiswa)->get();

        $selectedMonth = $request->input('month');

        if ($selectedMonth == 'semua') {
            $data_absen_bulanan = DB::table('absensis')
                ->where('id_mahasiswa', $id_mahasiswa)
                ->orderByDesc('created_at')
                ->get();
        } else {
            $selectedDate = Carbon::createFromFormat('F Y', $selectedMonth);
    
            $selectedYear = $selectedDate->year;
            $selectedMonth = $selectedDate->month;

            $data_absen_bulanan = DB::table('absensis')
                ->where('id_mahasiswa', $id_mahasiswa)
                ->whereYear('created_at', $selectedYear)
                ->whereMonth('created_at', $selectedMonth)
                ->orderByDesc('created_at')
                ->get();
        }

        $awal_absensi = Semester::where('aksi', 'mulai absensi')
            ->latest('created_at')
            ->first()
            ->created_at;

        $akhir_absensi = Absensi::where('id_mahasiswa', $mahasiswa->id)
            ->latest('created_at')
            ->first()
            ->created_at;

        $bulan_tahun_combinations = Absensi::select(DB::raw('YEAR(created_at) AS tahun, MONTH(created_at) AS bulan'))
            ->where('id_mahasiswa', $id_mahasiswa)
            ->groupBy('tahun', 'bulan')
            ->get();

        $tanggal_awal_absensi = Carbon::parse($awal_absensi)->setTime(21, 0, 0);
        $now = Carbon::now();

        if ($now->hour >= 21 && $now->minute >= 0) {
            $selisih_hari = $tanggal_awal_absensi->diffInDays($now) + 1;
            $jumlah_hari_bulan_ini = $now->day;
        } else {
            $kemarin = Carbon::yesterday()->setTime(21, 0, 0);
            $selisih_hari = $tanggal_awal_absensi->diffInDays($kemarin) + 1;
            $jumlah_hari_bulan_ini = $now->day - 1;
        }

        if (!is_null($selectedDate)) {
            if ($selectedDate->month != $akhir_absensi->month) {
                if ($selectedDate->month == $awal_absensi->month) {
                    $jumlah_hari_bulan_ini = Carbon::parse($awal_absensi)->daysInMonth - $awal_absensi->day + 1;
                } else {
                    $jumlah_hari_bulan_ini = $selectedDate->daysInMonth;
                }
            }
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

        $absensi_content = view('mahasiswa.monitor.__absensi', compact('data_absen_bulanan'))->render();
        $absensi_bulanan = view('mahasiswa.monitor.__absensi_bulanan', compact('summary_bulanan'))->render();
            
        return view('mahasiswa.monitor._absensi', compact('data_absen_bulanan', 'summary', 'summary_bulanan', 'bulan_tahun_combinations', 'absensi_content', 'absensi_bulanan', 'selectedDate'))->render();
    }
}
