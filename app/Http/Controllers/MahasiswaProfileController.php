<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MahasiswaProfileController extends Controller
{
    public function index ()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();

        return view('mahasiswa.profile', compact('mahasiswa'));
    }
}
