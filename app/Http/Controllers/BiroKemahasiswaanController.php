<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class BiroKemahasiswaanController extends Controller
{
    public function index () {

        $mahasiswa_2020 = Mahasiswa::where('angkatan', '2020')->count();
        $mahasiswa_2021 = Mahasiswa::where('angkatan', '2021')->count();
        $mahasiswa_2022 = Mahasiswa::where('angkatan', '2022')->count();
        $mahasiswa_2023 = Mahasiswa::where('angkatan', '2023')->count();

        return view('biro_kemahasiswaan.dashboard', compact('mahasiswa_2020', 'mahasiswa_2021', 'mahasiswa_2022', 'mahasiswa_2023'));
    }
}
