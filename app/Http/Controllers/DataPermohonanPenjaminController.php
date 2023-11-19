<?php

namespace App\Http\Controllers;

use App\Models\PengajuanDataPenjamin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DataPermohonanPenjaminController extends Controller
{
    public function index () {
        $idPenjamin = Auth::guard('penjamin')->user()->id;

        $data_tempat_tinggal = PengajuanDataPenjamin::where('id_penjamin', $idPenjamin)
            ->where('status', 'disetujui')
            ->get();

        if ($data_tempat_tinggal->isEmpty()) {
            $data_tempat_tinggal = PengajuanDataPenjamin::where('id_penjamin', $idPenjamin)
                ->latest('created_at')
                ->first();
        } else {
            $data_tempat_tinggal = PengajuanDataPenjamin::where('id_penjamin', $idPenjamin)
                ->where('status', 'disetujui')
                ->first();
        }
        
        return view('penjamin.fixed_permohonan_tempat_tinggal', compact('data_tempat_tinggal'));
    }
}
