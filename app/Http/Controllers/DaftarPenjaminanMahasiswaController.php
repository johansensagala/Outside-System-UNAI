<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarPenjaminanMahasiswaController extends Controller
{
    public function index()
    {
        $daftar_data_penjamin = PengajuanDataPenjamin::get();
            
        return view('biro_kemahasiswaan.daftar_penjamin', compact('daftar_data_penjamin'));
    }
}
