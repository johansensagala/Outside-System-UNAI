<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPenjamin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengajuanPenjaminController extends Controller
{
    public function index()
    {
        $idPenjamin = Auth::guard('mahasiswa')->user()->id;
        $data_penjaminan = PengajuanPenjamin::where('id_mahasiswa', $idPenjamin)->first();

        if ($data_penjaminan) {
            return view('mahasiswa.fixed_pengajuan_penjamin', compact('data_penjaminan'));
        } else {
            return view('mahasiswa.pengajuan_penjamin');
        }
    }   
}
