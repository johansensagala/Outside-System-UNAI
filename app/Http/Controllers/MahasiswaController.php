<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    public function showAbsensi () {
        return view('mahasiswa.absensi');
    }

    public function showPengajuanPenjamin () {
        return view('mahasiswa.pengajuan_luar_asrama');
    }

    public function showPermohonanTinggal () {
        return view('mahasiswa.pengajuan_luar_asrama');
    }
}
