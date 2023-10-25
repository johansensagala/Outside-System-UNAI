<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjamin;
use App\Models\BiroKemahasiswaan;
use App\Models\PengajuanDataPenjamin;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FormulirPenjaminController extends Controller
{
    public function index()
    {
        $daftar_data_penjamin = PengajuanDataPenjamin::get();
            
        return view('biro_kemahasiswaan.daftar_penjamin', compact('daftar_data_penjamin'));
    }

    public function show($id)
    {
        $data_tempat_tinggal = PengajuanDataPenjamin::where('id', $id)->first();
        $penjamin = Penjamin::where('id', $data_tempat_tinggal->id_penjamin)->first();

        return view('biro_kemahasiswaan.formulir_penjamin', compact('data_tempat_tinggal', 'penjamin'));
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

    public function generateRandomCode() {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Karakter yang tersedia
        $code = '';
    
        // Dapatkan tahun saat ini dalam format dua digit
        $currentYear = date('y');
    
        // Dapatkan bulan saat ini (1-12)
        $currentMonth = date('n');
    
        // Tentukan digit keempat sesuai dengan bulan saat ini
        if ($currentMonth >= 6 && $currentMonth <= 11) {
            $code .= '1'; // Bulan Juni sampai November
        } else {
            $code .= '2'; // Bulan Desember sampai Mei
        }
    
        // Dapatkan 4 karakter acak untuk karakter 5-8
        for ($i = 0; $i < 4; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return "P{$currentYear}{$code}";
    }

    public function approve($id) {
        $data_tempat_tinggal = PengajuanDataPenjamin::where('id', $id)->first();

        $data_tempat_tinggal->status = 'disetujui';

        $data_tempat_tinggal->kode_penjamin = $this->generateRandomCode();

        $data_tempat_tinggal->save();

        return redirect()->back();
    }
    
    public function reject(Request $request, $id) {
        $data_tempat_tinggal = PengajuanDataPenjamin::where('id', $id)->first();

        Validator::make($request->all(), [
            'comment' => 'nullable|string|max:255',
        ]);

        $data_tempat_tinggal->comment = $request->input('comment');
        
        $data_tempat_tinggal->status = 'ditolak';

        $data_tempat_tinggal->save();

        return redirect()->back();
    }
}
