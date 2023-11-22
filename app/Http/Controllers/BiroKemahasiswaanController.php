<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class BiroKemahasiswaanController extends Controller
{
    public function index () {

        $mahasiswa_2020 = Mahasiswa::where('angkatan', '<=', '2020')->count();
        $mahasiswa_2021 = Mahasiswa::where('angkatan', '2021')->count();
        $mahasiswa_2022 = Mahasiswa::where('angkatan', '2022')->count();
        $mahasiswa_2023 = Mahasiswa::where('angkatan', '2023')->count();
        $mahasiswa_2020_lakilaki = Mahasiswa::where('angkatan', '2020')->where('jenis_kelamin', 'Laki-laki')->count();
        $mahasiswa_2021_lakilaki = Mahasiswa::where('angkatan', '2021')->where('jenis_kelamin', 'Laki-laki')->count();
        $mahasiswa_2022_lakilaki = Mahasiswa::where('angkatan', '2022')->where('jenis_kelamin', 'Laki-laki')->count();
        $mahasiswa_2023_lakilaki = Mahasiswa::where('angkatan', '2023')->where('jenis_kelamin', 'Laki-laki')->count();
        $mahasiswa_2020_perempuan = Mahasiswa::where('angkatan', '2020')->where('jenis_kelamin', 'Perempuan')->count();
        $mahasiswa_2021_perempuan = Mahasiswa::where('angkatan', '2021')->where('jenis_kelamin', 'Perempuan')->count();
        $mahasiswa_2022_perempuan = Mahasiswa::where('angkatan', '2022')->where('jenis_kelamin', 'Perempuan')->count();
        $mahasiswa_2023_perempuan = Mahasiswa::where('angkatan', '2023')->where('jenis_kelamin', 'Perempuan')->count();

        return view('biro_kemahasiswaan.dashboard', compact('mahasiswa_2020', 'mahasiswa_2021', 'mahasiswa_2022', 'mahasiswa_2023',
                                                            'mahasiswa_2020_lakilaki', 'mahasiswa_2021_lakilaki', 'mahasiswa_2022_lakilaki', 'mahasiswa_2023_lakilaki',
                                                            'mahasiswa_2020_perempuan', 'mahasiswa_2021_perempuan', 'mahasiswa_2022_perempuan', 'mahasiswa_2023_perempuan'));
    }
}
