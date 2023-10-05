<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjamin;
use App\Models\BiroKemahasiswaan;
use App\Models\PengajuanDataTempatTinggal;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class FormulirPenjaminController extends Controller
{
    public function index($id)
    {
        $data_tempat_tinggal = PengajuanDataTempatTinggal::where('id', $id)->first();

        return view('admin.formulir_penjamin', compact('data_tempat_tinggal'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'alamat' => 'required|string|max:255',
            'foto_tempat_tinggal' => 'required',
            'longitude' => 'required|integer',
            'latitude' => 'required|integer',
            'kapasitas' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $data = array_merge($request->all(), [
            'id_penjamin' => Auth::id(),
        ]);

        $penjamin = Penjamin::create($data);

        return response()->json(['data' => $penjamin], 201);
    }
}
