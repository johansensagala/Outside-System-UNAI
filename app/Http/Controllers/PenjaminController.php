<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjaminController extends Controller
{
    public function showPermohonanTempatTinggal () {
        return view('penjamin.permohonan_tempat_tinggal');
    }

    public function showPersetujuanPermohonanMahasiswa () {
        return view('penjamin.persetujuan_permohonan_mahasiswa');
    }
}
