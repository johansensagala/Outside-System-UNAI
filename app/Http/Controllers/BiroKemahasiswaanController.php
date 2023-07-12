<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiroKemahasiswaanController extends Controller
{
    public function showAbsensiPermahasiswa () {
        return view('biro_kemahasiswaan.absensi_permahasiswa');
    }

    public function showAbsensiPertanggal () {
        return view('biro_kemahasiswaan.absensi_pertanggal');
    }

    public function showDaftarPengajuanOutside () {
        return view('biro_kemahasiswaan.daftar_pengajuan_outside');
    }

    public function showDaftarPenjamin () {
        return view('biro_kemahasiswaan.daftar_penjamin');
    }

    public function showDaftarTempatTinggal () {
        return view('biro_kemahasiswaan.daftar_tempat_tinggal');
    }

    public function showEditAbsensi () {
        return view('biro_kemahasiswaan.edit_absensi');
    }

    public function showFormulirPenjamin () {
        return view('biro_kemahasiswaan.formulir_penjamin');
    }

    public function showInfoPengajuanOutside () {
        return view('biro_kemahasiswaan.info_pengajuan_outside');
    }

    public function showInfoTempatTinggal () {
        return view('biro_kemahasiswaan.info_tempat_tinggal');
    }

    public function showInputAbsensi () {
        return view('biro_kemahasiswaan.input_absensi');
    }
}
