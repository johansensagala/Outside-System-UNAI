<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class RoleMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $daftar_data_mahasiswa = Mahasiswa::paginate(20);
                
        return view('biro_kemahasiswaan.mahasiswa.daftar_mahasiswa', compact('daftar_data_mahasiswa'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::where('id')->first();

        return view('biro_kemahasiswaan.mahasiswa.daftar_mahasiswa', compact('penjamin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();

        return view('biro_kemahasiswaan.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'role' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $mahasiswa = Mahasiswa::where('id', $id)->first();

        $mahasiswa->role = $request->input('role');
        $mahasiswa->save();

        // dd($id);
        return redirect('/biro/daftar-mahasiswa')->with('success', "Role Mahasiswa {$mahasiswa->nama} telah berubah!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }

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

        return view('biro_kemahasiswaan.mahasiswa._daftar_mahasiswa', compact('daftar_data_mahasiswa'))->render();
    }
}
