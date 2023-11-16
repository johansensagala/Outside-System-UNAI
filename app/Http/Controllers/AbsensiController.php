<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index () {
        return view('biro_kemahasiswaan.absensi');
    }

    public function show () {
        return view('biro_kemahasiswaan.detail_absensi');
    }
}
