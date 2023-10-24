<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPenjamin;
use Illuminate\Http\Request;

class DaftarPenjaminanMahasiswaController extends Controller
{
    public function index()
    {
        $daftar_data_mahasiswa = PengajuanPenjamin::get();
            
        return view('penjamin.daftar_mahasiswa', compact('daftar_data_mahasiswa'));
    }
}
