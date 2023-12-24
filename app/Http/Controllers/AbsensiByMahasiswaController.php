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
    private $mahasiswa;
    private $id_mahasiswa;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->mahasiswa = Auth::guard('mahasiswa')->user();
            $this->id_mahasiswa = $this->mahasiswa->id;

            return $next($request);
        });
    }

    public function index()
    {
        $now = Carbon::now();
    
        $data_absen_today = Absensi::where('id_mahasiswa', $this->id_mahasiswa)
            ->whereDate('created_at', Carbon::today())
            ->where('kehadiran', 'Hadir')
            ->get();

        $batas_bawah = Carbon::createFromTime(19, 30);
        $batas_atas = Carbon::createFromTime(21, 0);
        $absen_time = $now->between($batas_bawah, $batas_atas);
        $belum_absen = $data_absen_today->isEmpty();

        $pengajuan_luar_asrama = $this->getPengajuanLuarAsrama($this->id_mahasiswa);

        if (!$pengajuan_luar_asrama) {
            return view('mahasiswa.no_absensi');
        }

        list($latitude, $longitude) = $this->getLocation($pengajuan_luar_asrama);

        return view('mahasiswa.aksi_absensi', compact('belum_absen', 'absen_time', 'latitude', 'longitude'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        $data_absen_today = Absensi::where('id_mahasiswa', $this->id_mahasiswa)
            ->whereDate('created_at', Carbon::today())
            ->get();

        $data_absen_today->each->delete();

        $absensi = new Absensi();
        $absensi->latitude = $request->input('latitude');
        $absensi->longitude = $request->input('longitude');

        if ($request->hasFile('foto')) {
            $absensi->foto = $request->foto->store('bukti_absensi');
        }

        $absensi->alasan = $request->input('alasan');
        $absensi->kehadiran = $request->input('kehadiran');
        $absensi->id_mahasiswa = $this->id_mahasiswa;
        $absensi->save();

        return redirect()->back();
    }

    private function getPengajuanLuarAsrama()
    {
        return PengajuanLuarAsrama::where('id_mahasiswa', $this->id_mahasiswa)
            ->where('status', 'disetujui')
            ->first();
    }

    private function getLocation($pengajuan_luar_asrama)
    {
        $status_tinggal = $pengajuan_luar_asrama->status_tinggal;

        if (in_array($status_tinggal, ['Married', 'Profesi Ners', 'Skripsi'])) {
            $latitude = $pengajuan_luar_asrama->latitude;
            $longitude = $pengajuan_luar_asrama->longitude;
        } else {
            $data_penjamin = PengajuanDataPenjamin::where('id_penjamin', $pengajuan_luar_asrama->id_penjamin)
                ->where('status', 'disetujui')
                ->first();

            $latitude = $data_penjamin->latitude;
            $longitude = $data_penjamin->longitude;
        }

        return [$latitude, $longitude];
    }
}
