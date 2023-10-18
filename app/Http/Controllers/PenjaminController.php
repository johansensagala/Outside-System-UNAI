<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjamin;
use Illuminate\Support\Facades\Validator;

class PenjaminController extends Controller
{
    public function index () {
        return view('penjamin.dashboard');
    }
    public function showPermohonanTempatTinggal () {
        return view('penjamin.permohonan_tempat_tinggal');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $book = Penjamin::create($request->all());

        return response()->json(['data' => $book], 201);
    }

    public function showPersetujuanPermohonanMahasiswa () {
        return view('penjamin.persetujuan_permohonan_mahasiswa');
    }
}
