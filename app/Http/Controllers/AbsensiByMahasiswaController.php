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

        $now = Carbon::now();
    
        $data_absen_today = Absensi::where('id_mahasiswa', $id_mahasiswa)
            ->whereDate('created_at', Carbon::today())
            ->where('kehadiran', 'Hadir')
            ->get();

        $batas_bawah = Carbon::createFromTime(19, 30);
        $batas_atas = Carbon::createFromTime(22, 0);
    
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
        
        return view('mahasiswa.aksi_absensi', compact('mahasiswa', 'belum_absen', 'absen_time', 'latitude', 'longitude'));
    }

    public function store (Request $request) {
        $request->validate([
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        $mahasiswa = Auth::guard('mahasiswa')->user();
        $id_mahasiswa = $mahasiswa->id;

        $data_absen_today = Absensi::where('id_mahasiswa', $id_mahasiswa)
            ->whereDate('created_at', Carbon::today())
            ->get();

        $data_absen_today->each(function ($absensi) {
            $absensi->delete();
        });

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
