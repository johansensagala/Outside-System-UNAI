<?php

namespace App\Http\Controllers;

use App\Models\PengajuanDataPenjamin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DataPermohonanPenjaminController extends Controller
{
    public function index () {
        $idPenjamin = Auth::guard('penjamin')->user()->id;
        $data_tempat_tinggal = PengajuanDataPenjamin::where('id_penjamin', $idPenjamin)->first();
    
        return view('penjamin.fixed_permohonan_tempat_tinggal', compact('data_tempat_tinggal'));
    }
}
