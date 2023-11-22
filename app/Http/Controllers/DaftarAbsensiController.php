<?php

namespace App\Http\Controllers;

use App\Models\Absensi;

use Illuminate\Http\Request;

class DaftarAbsensiController extends Controller
{
    public function index () {
        $data_absen = Absensi::get();

        return view('mahasiswa.daftar_absensi', compact('data_absen'));
    }
}
