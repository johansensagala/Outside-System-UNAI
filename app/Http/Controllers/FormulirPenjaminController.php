<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjamin;
use App\Models\PengajuanDataPenjamin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class FormulirPenjaminController extends Controller
{
    public function index(Request $request)
    {
        $daftar_data_penjamin = PengajuanDataPenjamin::orderBy('created_at', 'desc')
            ->paginate(20);
            
        return view('biro_kemahasiswaan.daftar_penjamin', compact('daftar_data_penjamin'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $query = PengajuanDataPenjamin::query();

        if (!empty($search)) {
            $query->whereHas('penjamin', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            });
        }

        $daftar_data_penjamin = $query->get();

        if (empty($search)) {
            $daftar_data_penjamin = PengajuanDataPenjamin::get();
        }

        return view('biro_kemahasiswaan._daftar_penjamin', compact('daftar_data_penjamin'))->render();
    }

    public function status(Request $request)
    {
        $status = $request->input('status');
        $query = PengajuanDataPenjamin::query();

        $query->whereHas('penjamin', function ($query) use ($status) {
            $query->where('status', $status);
        });

        $daftar_data_penjamin = $query->get();

        return view('biro_kemahasiswaan._daftar_penjamin', compact('daftar_data_penjamin'))->render();
    }

    public function show($id)
    {
        $data_tempat_tinggal = PengajuanDataPenjamin::findOrFail($id);
        $penjamin = Penjamin::findOrFail($data_tempat_tinggal->id_penjamin);
    
        $daftar_permohonan_disetujui = PengajuanDataPenjamin::where('id_penjamin', $penjamin->id)
            ->where('status', 'disetujui')
            ->first();

        if (!$daftar_permohonan_disetujui) {
            $daftar_permohonan_disetujui = null;
        }
    
        return view('biro_kemahasiswaan.formulir_penjamin', compact('data_tempat_tinggal', 'penjamin', 'daftar_permohonan_disetujui'));
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

    public function generate_random_code() {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
    
        $currentYear = date('y');
    
        $currentMonth = date('n');
    
        if ($currentMonth >= 6 && $currentMonth <= 11) {
            $code .= '1';
        } else {
            $code .= '2';
        }
    
        for ($i = 0; $i < 4; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return "P{$currentYear}{$code}";
    }

    public function approve(Request $request, $id) {
        $data_tempat_tinggal = PengajuanDataPenjamin::where('id', $id)->first();

        Validator::make($request->all(), [
            'role' => 'required',
        ]);

        $data_tempat_tinggal->status = 'disetujui';

        if ($request->input('role') === 'dosen') {
            $data_tempat_tinggal->kapasitas = 2;
        } else {
            $data_tempat_tinggal->kapasitas = 1;
        }

        $data_tempat_tinggal->kode_penjamin = $this->generate_random_code();

        $data_tempat_tinggal->save();

        $penjamin = Penjamin::where('id', $data_tempat_tinggal->id_penjamin)->first();

        $penjamin->role = $request->input('role') ?: 'nondosen';
        $penjamin->save();

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

    public function cancel($id) {
        $data_tempat_tinggal = PengajuanDataPenjamin::where('id', $id)->first();

        $data_tempat_tinggal->status = 'pending';
        $data_tempat_tinggal->kode_penjamin = null;
        $data_tempat_tinggal->comment = null;
        $data_tempat_tinggal->save();

        $penjamin = Penjamin::where('id', $data_tempat_tinggal->id_penjamin)->first();

        $penjamin->role = 'nondosen';
        $penjamin->save();

        return redirect()->back();
    }
}
