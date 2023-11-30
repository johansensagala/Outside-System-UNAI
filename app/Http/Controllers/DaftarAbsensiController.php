<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\PengajuanLuarAsrama;
use App\Models\PengajuanDataPenjamin;

use Carbon\Carbon;

use Illuminate\Http\Request;

class DaftarAbsensiController extends Controller
{
    public function index () {
        $now = Carbon::now();
        $tutup_absen = Carbon::now()->setTime(21, 0, 0);
    
        if ($now->greaterThan($tutup_absen)) {
            $data_absen = Absensi::whereDate('created_at', $now->toDateString())->get();
        } else {
            $kemarin = $now->subDay();
            $data_absen = Absensi::whereDate('created_at', $kemarin->toDateString())->get();
        }
    
        return view('mahasiswa.daftar_absensi', compact('data_absen'));
    }

    public function filterTanggal (Request $request) {
        $data_absen = Absensi::whereDate('created_at', $request->tanggalInput)->get();
    
        return view('mahasiswa.daftar_absensi', compact('data_absen'));
    }
    
    public function filterIntervalTanggal(Request $request) {
        $tanggalAwal = $request->tanggalAwal;
        $tanggalAkhir = $request->tanggalAkhir;
    
        $data_absen = Absensi::whereBetween('created_at', [$tanggalAwal, $tanggalAkhir])->get();
    
        return view('mahasiswa.daftar_absensi', compact('data_absen'));
    }
    
    public function show ($id) {
        $data_absen = Absensi::where('id', $id)->first();

        // dd($data_absen);

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
