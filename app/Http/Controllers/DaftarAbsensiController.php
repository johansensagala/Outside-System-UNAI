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
    public function index (Request $request) {
        $now = Carbon::now();
        $buka_absen = Carbon::now()->setTime(19, 30, 0);
        $tutup_absen = Carbon::now()->setTime(21, 0, 0);

        $tanggal_awal = $request->input('tanggalAwal', now()->format('Y-m-d'));
        $tanggal_akhir = $request->input('tanggalAkhir', now()->format('Y-m-d'));

        $tanggal_awal = $tanggal_awal ?? now()->format('Y-m-d');
        $tanggal_akhir = $tanggal_akhir ?? now()->format('Y-m-d');

        $jumlah_mahasiswa = PengajuanLuarAsrama::where('status', 'disetujui')->count();

        if(isset($tanggal_awal)) {
            if (strtotime($tanggal_awal) >= strtotime(now()->format('Y-m-d'))) {
                if ($now->greaterThan($buka_absen)) {
                    $tanggal_awal = now()->format('Y-m-d');
                } else {
                    $tanggal_awal = now()->copy()->subDay()->format('Y-m-d');
                }
            }
        }

        if(isset($tanggal_akhir)) {
            if (strtotime($tanggal_akhir) >= strtotime(now()->format('Y-m-d'))) {
                if ($now->greaterThan($buka_absen)) {
                    $tanggal_akhir = now()->format('Y-m-d');
                } else {
                    $tanggal_akhir = now()->copy()->subDay()->format('Y-m-d');
                }
            }
        }

        $data_absen = Absensi::where(function ($query) use ($tanggal_awal, $tanggal_akhir) {
                $query->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir . ' 23:59:59']);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $selisih = (new DateTime($tanggal_awal))->diff(new DateTime($tanggal_akhir))->days + 1;

        $jumlah_hadir = Absensi::whereBetween('created_at', [$tanggal_awal, $tanggal_akhir . ' 23:59:59'])->where('kehadiran', 'Hadir')->count();
        $jumlah_izin = Absensi::whereBetween('created_at', [$tanggal_awal, $tanggal_akhir . ' 23:59:59'])->where('kehadiran', 'Izin')->count();
        $jumlah_absen = $jumlah_mahasiswa * $selisih - $jumlah_hadir - $jumlah_izin;

        $summary = [
            'hadir' => $jumlah_hadir,
            'izin' => $jumlah_izin,
            'absen' => $jumlah_absen,
        ];
        
        return view('mahasiswa.daftar_absensi', compact('data_absen', 'summary', 'tanggal_awal', 'tanggal_akhir'));
    }

    // public function filter (Request $request) {
        
    //         if ($now->greaterThan($buka_absen)) {
    //             // $data_absen = Absensi::whereDate('created_at', $now->toDateString())
    //             //     ->orderBy('created_at', 'desc')
    //             //     ->paginate(20);
    //         } else {
    //             $tanggal_akhir = now()->format('Y-m-d');
    //             // $kemarin = $now->copy()->subDay();
    //             // $data_absen = Absensi::whereDate('created_at', $kemarin->toDateString())
    //             //     ->orderBy('created_at', 'desc')
    //             //     ->paginate(20);
    //         }

    
    //     $search = $request->input('search');
        
    //     $selisih = (new DateTime($request->tanggalAwal))->diff(new DateTime($request->tanggalAkhir))->days + 1;
        
    //     $data_absen = Absensi::join('mahasiswas', 'absensis.id_mahasiswa', '=', 'mahasiswas.id')
    //         ->where(function ($query) use ($tanggal_awal, $tanggal_akhir) {
    //             $query->whereBetween('absensis.created_at', [$tanggal_awal, $tanggal_akhir . ' 23:59:59']);
    //         })
    //         ->where(function ($query) use ($search) {
    //             $query->where('mahasiswas.nama', 'like', '%' . $search . '%')
    //                 ->orWhere('mahasiswas.nim', 'like', '%' . $search . '%');
    //         })
    //         ->orderBy('absensis.created_at', 'desc')
    //         ->select('absensis.*')
    //         ->paginate(20);
                
    //     $jumlah_hadir =  Absensi::whereBetween('created_at', [$tanggal_awal, $tanggal_akhir . ' 23:59:59'])->where('kehadiran', 'Hadir')->count();
    //     $jumlah_izin =  Absensi::whereBetween('created_at', [$tanggal_awal, $tanggal_akhir . ' 23:59:59'])->where('kehadiran', 'Izin')->count();
    //     $jumlah_absen = $jumlah_mahasiswa * $selisih - $jumlah_hadir - $jumlah_izin;
    
    //     $summary = [
    //         'hadir' => $jumlah_hadir,
    //         'izin' => $jumlah_izin,
    //         'absen' => $jumlah_absen,
    //     ];
        
    //     if ($search) {
    //         return view('mahasiswa.daftar_absensi', compact('data_absen', 'tanggal_awal', 'tanggal_akhir', 'search', 'summary'));    
    //     }
    //     return view('mahasiswa.daftar_absensi', compact('data_absen', 'tanggal_awal', 'tanggal_akhir', 'summary'));    
    // }
                        
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
