<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Role;

use Illuminate\Http\Request;

class RoleMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $daftar_data_mahasiswa = Mahasiswa::paginate(10);
                
        return view('biro_kemahasiswaan.daftar_mahasiswa', compact('daftar_data_mahasiswa'));
    }

    // public function search(Request $request)
    // {
    //     $search = $request->input('search');
    //     $query = Mahasiswa::query();

    //     if (!empty($search)) {
    //         $query->where('nama', 'like', '%' . $search . '%')->orWhere('nim', 'like', '%' . $search . '%') ;
    //     }

    //     $daftar_data_mahasiswa = $query->paginate(10);

    //     // $showPagination = $daftar_data_mahasiswa->total() > 10;

    //     return view('biro_kemahasiswaan._daftar_mahasiswa', compact('daftar_data_mahasiswa'));
    // }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $query = Mahasiswa::query();

        if (!empty($search)) {
            $query->where('nama', 'like', '%' . $search . '%')->orWhere('nim', 'like', '%' . $search . '%');
        }

        $daftar_data_mahasiswa = $query->paginate(10);

        // Append the search parameter to pagination links
        $daftar_data_mahasiswa->appends(['search' => $search]);

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