<?php

namespace App\Http\Controllers;

use App\Models\Penjamin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenjaminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('biro_kemahasiswaan.penjamin.index', [
            'penjamins' =>Penjamin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('biro_kemahasiswaan.penjamin.create', [
            'penjamins' =>Penjamin::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:penjamins'],
            'password' => 'required|min:8|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            'repassword' => 'required|same:password',
            'nama' => 'required|max:255',
            'nomor_telp' => 'required|numeric|digits_between:10,14', 'unique:penjamins',
        ], [
            'password.regex' => 'The password format is invalid. Password must be at least 8 characters with a combination of numbers and letters.',
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        Penjamin::create($validatedData);
        
        // $request->session()->flash('success', 'Registration successfull! Please login');
        
        return redirect('/biro/penjamin')->with('success', 'Registration successfull! Please login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjamin $penjamin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjamin $penjamin)
    {
        return view('biro_kemahasiswaan.penjamin.edit', [
            'penjamin' => $penjamin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjamin $penjamin)
    {
        $rules = [
            'username' => ['required', 'min:3', 'max:255', 'unique:penjamins,username,' . $penjamin->id],
            'nama' => 'required|max:255',
            'nomor_telp' => 'required|numeric|digits_between:10,14|unique:penjamins,nomor_telp,' . $penjamin->id,
            'role' => 'required'
        ];

        // Check if password is present in the request and not empty
        if ($request->filled('password')) {
            $rules['password'] = 'required|min:8|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/';
            $rules['repassword'] = 'required|same:password';
        }

        $validatedData = $request->validate($rules);

        // Update fields other than the password
        $penjamin->username = $validatedData['username'];
        $penjamin->nama = $validatedData['nama'];
        $penjamin->nomor_telp = $validatedData['nomor_telp'];
        $penjamin->role = $validatedData['role'];

        // Check if password is present in the request and not empty, then update it
        if ($request->filled('password')) {
            $penjamin->password = bcrypt($validatedData['password']);
        }

        $penjamin->save();

        return redirect('/biro/penjamin')->with('success', 'Penjamin telah di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjamin $penjamin)
    {
        Penjamin::destroy($penjamin->id);
        return redirect('biro/penjamin')->with('success', 'penjamin has been deleted!');
    }

    public function dashboad () {
        return view('penjamin.dashboard');
    }
}
