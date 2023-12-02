<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\PengajuanLuarAsrama;
use App\Models\PengajuanDataPenjamin;

use Carbon\Carbon;
use DateTime;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

class DaftarAbsensiController extends Controller
{
    public function index () {
        $now = Carbon::now();
        $tutup_absen = Carbon::now()->setTime(21, 0, 0);
        $jumlah_mahasiswa = PengajuanLuarAsrama::where('status', 'disetujui')->count();
        
        if ($now->greaterThan($tutup_absen)) {
            $data_absen = Absensi::whereDate('created_at', $now->toDateString())
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } else {
            $kemarin = $now->copy()->subDay();
            $data_absen = Absensi::whereDate('created_at', $kemarin->toDateString())
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }
        
        if ($kemarin) {
            $jumlah_hadir = Absensi::whereDate('created_at', $kemarin->toDateString())->where('kehadiran', 'Hadir')->count();
            $jumlah_izin = Absensi::whereDate('created_at', $kemarin->toDateString())->where('kehadiran', 'Izin')->count();
        }
        else {
            $jumlah_hadir = Absensi::whereDate('created_at', $now->toDateString())->where('kehadiran', 'Hadir')->count();
            $jumlah_izin = Absensi::whereDate('created_at', $now->toDateString())->where('kehadiran', 'Izin')->count();
        }
        $jumlah_absen = $jumlah_mahasiswa - $jumlah_hadir - $jumlah_izin;

        $summary = [
            'hadir' => $jumlah_hadir,
            'izin' => $jumlah_izin,
            'absen' => $jumlah_absen,
        ];

        return view('mahasiswa.daftar_absensi', compact('data_absen', 'summary'));
    }

    public function filter (Request $request) {
        $tanggal_awal = $request->input('tanggalAwal', now()->format('Y-m-d'));
        $tanggal_akhir = $request->input('tanggalAkhir', now()->format('Y-m-d'));
    
        $selisih = (new DateTime($request->tanggalAwal))->diff(new DateTime($request->tanggalAkhir))->days + 1;

        $data_absen = Absensi::whereBetween('created_at', [$tanggal_awal, $tanggal_akhir . ' 23:59:59'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    
        $jumlah_mahasiswa = PengajuanLuarAsrama::where('status', 'disetujui')->count();
    
        $jumlah_hadir =  Absensi::whereBetween('created_at', [$tanggal_awal, $tanggal_akhir . ' 23:59:59'])->where('kehadiran', 'Hadir')->count();
        $jumlah_izin =  Absensi::whereBetween('created_at', [$tanggal_awal, $tanggal_akhir . ' 23:59:59'])->where('kehadiran', 'Izin')->count();
        $jumlah_absen = $jumlah_mahasiswa * $selisih - $jumlah_hadir - $jumlah_izin;
    
        $summary = [
            'hadir' => $jumlah_hadir,
            'izin' => $jumlah_izin,
            'absen' => $jumlah_absen,
        ];
        
        return view('mahasiswa.daftar_absensi', compact('data_absen', 'tanggal_awal', 'tanggal_akhir', 'summary'));    
    }

    public function liveSearch(Request $request)
    {

    }
                        
    public function show ($id) {
        $data_absen = Absensi::where('id', $id)->first();

        $pengajuan_luar_asrama = PengajuanLuarAsrama::where('id_mahasiswa', $data_absen->mahasiswa->id)->where('status', 'disetujui')->first();
        $status_tinggal = $pengajuan_luar_asrama->status_tinggal;

        if ($status_tinggal == 'Married' || $status_tinggal == 'Profesi Ners' || $status_tinggal == 'Skripsi') {
            $latitude = $pengajuan_luar_asrama->latitude;
            $longitude = $pengajuan_luar_asrama->longitude;
        } else {
            $data_penjamin = PengajuanDataPenjamin::where('id_penjamin', $pengajuan_luar_asrama->id_penjamin)->where('status', 'disetujui')->first();

            $latitude = $data_penjamin->latitude;
            $longitude = $data_penjamin->longitude;
        }

        return view('mahasiswa.detail_absensi', compact('data_absen', 'latitude', 'longitude'));
    }
}
