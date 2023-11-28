<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLuarAsrama;
use App\Models\PengajuanDataPenjamin;
use App\Models\Penjamin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DataPengajuanMahasiswaController extends Controller
{
    public function index () {
        // $id_mahasiswa = Auth::guard('mahasiswa')->user()->id;
        // $data_pengajuan_luar_asrama = PengajuanLuarAsrama::where('id_mahasiswa', $id_mahasiswa)
        //     ->latest('created_at')
        //     ->first();
    
        // return view('penjamin.fixed_permohonan_tempat_tinggal', compact('data_tempat_tinggal'));

        $id_mahasiswa = Auth::guard('mahasiswa')->user()->id;
        $data_pengajuan_luar_asrama = PengajuanLuarAsrama::where('id_mahasiswa', $id_mahasiswa)
            ->latest('created_at')
            ->first();

        if ($data_pengajuan_luar_asrama->id_penjamin) {
            $penjamin = Penjamin::where('id', $data_pengajuan_luar_asrama->id_penjamin)->first();

            $data_pengajuan_penjamin = PengajuanDataPenjamin::where('id_penjamin', $penjamin->id)->first();
            // dd($penjamin->id);

            return view('mahasiswa.fixed_pengajuan_luar_asrama', compact('data_pengajuan_luar_asrama', 'data_pengajuan_penjamin'));
        }

        return view('mahasiswa.fixed_pengajuan_luar_asrama', compact('data_pengajuan_luar_asrama'));
        // dd('test');
    }
}
