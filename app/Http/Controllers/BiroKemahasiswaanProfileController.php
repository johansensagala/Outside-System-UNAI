<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BiroKemahasiswaanProfileController extends Controller
{
    public function index ()
    {
        $biro_kemahasiswaan = Auth::guard('biro_kemahasiswaan')->user();

        return view('biro_kemahasiswaan.profile', compact('biro_kemahasiswaan'));
    }
}
