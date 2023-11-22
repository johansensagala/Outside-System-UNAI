<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\PengajuanDataPenjamin;
use App\Models\PengajuanLuarAsrama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AbsensiByMahasiswaController extends Controller
{
    public function index () {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $id_mahasiswa = $mahasiswa->id;

        $data_absen = Absensi::where('id_mahasiswa', $id_mahasiswa)->get();

        $data_absen_today = Absensi::where('id_mahasiswa', $id_mahasiswa)
                                ->whereDate('created_at', Carbon::today())
                                ->get();

        $now = Carbon::now();
        $batas_bawah = Carbon::createFromTime(21, 0);
        $batas_atas = Carbon::createFromTime(21, 30);
    
        $absen_time = $now->between($batas_bawah, $batas_atas);
        
        $belum_absen = $data_absen_today->isEmpty();

        $pengajuan_luar_asrama = PengajuanLuarAsrama::where('id_mahasiswa', $id_mahasiswa)->where('status', 'disetujui')->first();
        $status_tinggal = $pengajuan_luar_asrama->status_tinggal;

        if ($status_tinggal == 'Married' || $status_tinggal == 'Profesi Ners' || $status_tinggal == 'Skripsi') {
            $latitude = $pengajuan_luar_asrama->latitude;
            $longitude = $pengajuan_luar_asrama->longitude;
        } else {
            $data_penjamin = PengajuanDataPenjamin::where('id_penjamin', $pengajuan_luar_asrama->id_penjamin)->where('status', 'disetujui')->first();

            $latitude = $data_penjamin->latitude;
            $longitude = $data_penjamin->longitude;
        }
        
        return view('mahasiswa.absensi', compact('data_absen', 'mahasiswa', 'belum_absen', 'absen_time', 'latitude', 'longitude'));
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
        $absensi->kehadiran = 'hadir';
        $absensi->id_mahasiswa = Auth::guard('mahasiswa')->user()->id;

        $absensi->save();

        // return view('penjamin.fixed_permohonan_tempat_tinggal', compact('data_tempat_tinggal'));
        return redirect()->back();
    }
}
