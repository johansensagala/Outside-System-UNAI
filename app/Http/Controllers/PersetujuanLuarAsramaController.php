<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLuarAsrama;
use App\Models\PengajuanDataPenjamin;
use App\Models\Penjamin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PersetujuanLuarAsramaController extends Controller
{
    public function index()
    {
        $daftar_pengajuan_luar_asrama = PengajuanLuarAsrama::whereNotIn('status_penjamin', ['pending', 'ditolak'])->get();

        // dd($daftar_pengajuan_luar_asrama->first()->mahasiswa->nama);
        return view('biro_kemahasiswaan.daftar_pengajuan_luar_asrama', compact('daftar_pengajuan_luar_asrama'));
    }

    public function show($id)
    {
        $pengajuan_luar_asrama = PengajuanLuarAsrama::where('id', $id)->first();

        if ($pengajuan_luar_asrama->id_penjamin) {
            $penjamin = Penjamin::where('id', $pengajuan_luar_asrama->id_penjamin)->first();

            $data_pengajuan_penjamin = PengajuanDataPenjamin::where('id_penjamin', $penjamin->id)->first();

            return view('biro_kemahasiswaan.pengajuan_luar_asrama', compact('pengajuan_luar_asrama', 'data_pengajuan_penjamin'));
        }

        return view('biro_kemahasiswaan.pengajuan_luar_asrama', compact('pengajuan_luar_asrama'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $query = PengajuanLuarAsrama::query();

        if (!empty($search)) {
            $query->whereHas('mahasiswa', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            });
        }

        $daftar_pengajuan_luar_asrama = $query->get();

        if (empty($search)) {
            $daftar_pengajuan_luar_asrama = PengajuanLuarAsrama::get();
        }

        return view('biro_kemahasiswaan._daftar_pengajuan_outside', compact('daftar_pengajuan_luar_asrama'))->render();
    }

    public function status_tinggal(Request $request)
    {
        $status = $request->input('status_tinggal');
        $query = PengajuanLuarAsrama::query();

        if (!empty($status)) {
            $query->where('status_tinggal', $status);
        }

        $daftar_pengajuan_luar_asrama = $query->get();

        return view('biro_kemahasiswaan._daftar_pengajuan_outside', compact('daftar_pengajuan_luar_asrama'))->render();
    }

    public function approve($id) {
        $pengajuan_luar_asrama = PengajuanLuarAsrama::where('id', $id)->first();

        $pengajuan_luar_asrama->status = 'disetujui';

        $pengajuan_luar_asrama->save();

        return redirect()->back();
    }
    
    public function reject(Request $request, $id) {
        $pengajuan_luar_asrama = PengajuanLuarAsrama::where('id', $id)->first();
        
        $pengajuan_luar_asrama->status = 'ditolak';

        $pengajuan_luar_asrama->comment = $request->input('comment');

        $pengajuan_luar_asrama->save();

        return redirect()->back();
    }
}
