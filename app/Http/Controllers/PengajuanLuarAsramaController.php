<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLuarAsrama;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengajuanLuarAsramaController extends Controller
{
    public function index()
    {
        $idPenjamin = Auth::guard('mahasiswa')->user()->id;
        $data_penjaminan = PengajuanLuarAsrama::where('id_mahasiswa', $idPenjamin)->first();

        if ($data_penjaminan) {
            return view('mahasiswa.fixed_pengajuan_luar_asrama', compact('data_penjaminan'));
        } else {
            return view('mahasiswa.pengajuan_luar_asrama');
        }
    }   
}
