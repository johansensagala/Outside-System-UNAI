<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiByMahasiswaController extends Controller
{
    public function index () {
        return view('mahasiswa.absensi');
    }

    public function show () {
        return view('mahasiswa.detail_absensi');
    }
}
