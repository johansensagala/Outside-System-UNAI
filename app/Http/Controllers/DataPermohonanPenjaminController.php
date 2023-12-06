<?php

namespace App\Http\Controllers;

use App\Models\PengajuanDataPenjamin;
use App\Models\PengajuanLuarAsrama;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DataPermohonanPenjaminController extends Controller
{
    public function index () {
        $id_penjamin = Auth::guard('penjamin')->user()->id;

        $data_tempat_tinggal = PengajuanDataPenjamin::where('id_penjamin', $id_penjamin)
            ->where('status', 'disetujui')
            ->get();

        if ($data_tempat_tinggal->isEmpty()) {
            $data_tempat_tinggal = PengajuanDataPenjamin::where('id_penjamin', $id_penjamin)
                ->latest('created_at')
                ->first();
        } else {
            $data_tempat_tinggal = PengajuanDataPenjamin::where('id_penjamin', $id_penjamin)
                ->where('status', 'disetujui')
                ->first();
        }
        
        $jumlah_pengajuan_penjamin_disetujui = PengajuanLuarAsrama::where('id_penjamin', $id_penjamin)
            ->where('status_penjamin', 'disetujui')
            ->where('status', 'disetujui')
            ->count();
        
        return view('penjamin.fixed_permohonan_tempat_tinggal', compact('data_tempat_tinggal', 'jumlah_pengajuan_penjamin_disetujui'));
    }
}
