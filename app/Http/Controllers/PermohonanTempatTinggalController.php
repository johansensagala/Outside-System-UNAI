<?php

namespace App\Http\Controllers;

use App\Models\PengajuanDataPenjamin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PermohonanTempatTinggalController extends Controller
{
    public function index()
    {
        return view('penjamin.permohonan_tempat_tinggal');
    }    

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'foto_tempat_tinggal' => 'required|file|max:2048|image|mimes:jpeg,png,jpg,gif',
            'foto_kartu_keluarga' => 'required|file|max:2048|image|mimes:jpeg,png,jpg,gif',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        $data_tempat_tinggal = new PengajuanDataPenjamin();

        $data_tempat_tinggal->alamat = $request->input('alamat');
        $data_tempat_tinggal->latitude = $request->input('latitude');
        $data_tempat_tinggal->longitude = $request->input('longitude');
        $data_tempat_tinggal->foto_tempat_tinggal = $request->foto_tempat_tinggal->store('foto_tempat_tinggal');
        $data_tempat_tinggal->foto_kartu_keluarga = $request->foto_kartu_keluarga->store('foto_kartu_keluarga');
        $data_tempat_tinggal->id_penjamin = Auth::guard('penjamin')->user()->id;

        $data_tempat_tinggal->save();

        return redirect()->route('penjamin.data-permohonan');
    }
}