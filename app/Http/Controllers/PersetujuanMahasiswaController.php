<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLuarAsrama;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersetujuanMahasiswaController extends Controller
{
    public function index()
    {
        $id_penjamin = Auth::guard('penjamin')->user()->id;
        $daftar_pengajuan_mahasiswa = PengajuanLuarAsrama::where('id_penjamin', $id_penjamin)->get();

        return view('penjamin.daftar_persetujuan_permohonan_mahasiswa', compact('daftar_pengajuan_mahasiswa'));
    }

    public function show($id)
    {
        $data_mahasiswa = PengajuanLuarAsrama::where('id', $id)->first();

        return view('penjamin.persetujuan_permohonan_mahasiswa', compact('data_mahasiswa'));
    }

    public function approve($id) {
        $data_tempat_tinggal = PengajuanLuarAsrama::where('id', $id)->first();

        $data_tempat_tinggal->status_penjamin = 'disetujui';

        $data_tempat_tinggal->save();

        return redirect()->back();
    }
    
    public function reject($id) {
        $data_tempat_tinggal = PengajuanLuarAsrama::where('id', $id)->first();
        
        $data_tempat_tinggal->status_penjamin = 'ditolak';

        $data_tempat_tinggal->save();

        return redirect()->back();
    }
}
