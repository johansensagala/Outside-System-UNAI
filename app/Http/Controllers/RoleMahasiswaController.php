<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;

use Illuminate\Http\Request;

class RoleMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $daftar_data_mahasiswa = Mahasiswa::get();
            
        return view('biro_kemahasiswaan.daftar_mahasiswa', compact('daftar_data_mahasiswa'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $query = Mahasiswa::query();

        if (!empty($search)) {
            $query->whereHas('mahasiswa', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            });
        }

        $daftar_data_mahasiswa = $query->get();

        if (empty($search)) {
            $daftar_data_mahasiswa = Mahasiswa::get();
        }

        return view('biro_kemahasiswaan._daftar_mahasiswa', compact('daftar_data_mahasiswa'))->render();
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::where('id')->first();

        return view('biro_kemahasiswaan.daftar_mahasiswa', compact('penjamin'));
    }

    public function toggleRole(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        $mahasiswa->update(['role' => !$mahasiswa->role]);
    
        return view('biro_kemahasiswaan._daftar_mahasiswa', compact('daftar_data_mahasiswa'))->render();
    }
}