<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PenjaminProfileController extends Controller
{
    public function index ()
    {
        $penjamin = Auth::guard('penjamin')->user();

        return view('penjamin.profile', compact('penjamin'));
    }
}
