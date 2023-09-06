<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjamin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PenjaminController extends Controller
{
    public function index () {
        return view('penjamin.persetujuan_permohonan_mahasiswa');
    }
}
