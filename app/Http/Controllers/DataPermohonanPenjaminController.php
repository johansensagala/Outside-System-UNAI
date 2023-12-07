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

    public function edit ($id) {
        return view('penjamin.ubah_data_tempat_tinggal', compact('id'));
    }

    public function store (Request $request, $id) {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'foto_tempat_tinggal' => 'required|file|max:2048|image|mimes:jpeg,png,jpg,gif',
            'foto_kartu_keluarga' => 'nullable|file|max:2048|image|mimes:jpeg,png,jpg,gif',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        $data_tempat_tinggal = PengajuanDataPenjamin::where('id_penjamin', $id)->first();

        if ($request->input('alamat')) {
            $data_tempat_tinggal->alamat = $request->input('alamat');
        }
        if ($request->input('latitude')) {
            $data_tempat_tinggal->latitude = $request->input('latitude');
        }
        if ($request->input('longitude')) {
            $data_tempat_tinggal->longitude = $request->input('longitude');
        }
        if ($request->hasFile('foto_tempat_tinggal')) {
            $data_tempat_tinggal->foto_tempat_tinggal = $request->file('foto_tempat_tinggal')->store('foto_tempat_tinggal');
        }
        if ($request->hasFile('foto_kartu_keluarga')) {
            $data_tempat_tinggal->foto_kartu_keluarga = $request->file('foto_kartu_keluarga')->store('foto_kartu_keluarga');
        }
            
        $data_tempat_tinggal->status = 'pending';

        $data_tempat_tinggal->save();

        return redirect()->route('penjamin.data-permohonan');
    }
}
