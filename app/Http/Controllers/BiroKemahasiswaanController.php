<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiroKemahasiswaanController extends Controller
{
    public function index () {
        return view('biro_kemahasiswaan.dashboard');
    }
}
