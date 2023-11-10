<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLuarAsrama;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PersetujuanLuarAsramaController extends Controller
{
    public function index()
    {
        $daftar_pengajuan_luar_asrama = PengajuanLuarAsrama::get();

        return view('biro_kemahasiswaan.daftar_persetujuan_permohonan_mahasiswa', compact('daftar_pengajuan_luar_asrama'));
    }
}
