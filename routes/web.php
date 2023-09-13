<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermohonanTempatTinggalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/penjamin/permohonan-tempat-tinggal', [PermohonanTempatTinggalController::class, 'index'])->name('permohonan-tempat-tinggal');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('/mahasiswa/absensi', [MahasiswaController::class, 'showAbsensi'])->name('mahasiswa.absensi');
// Route::get('/mahasiswa/pengajuan-penjamin', [MahasiswaController::class, 'showPengajuanPenjamin'])->name('mahasiswa.pengajuan_penjamin');
// Route::get('/mahasiswa/permohonan-tinggal', [MahasiswaController::class, 'showPermohonanTinggal'])->name('mahasiswa.permohonan_tinggal');

// Route::get('/penjamin/permohonan-tempat-tinggal', [PenjaminController::class, 'showPermohonanTempatTinggal'])->name('penjamin.permohonan_tempat_tinggal');
// Route::get('/penjamin/persetujuan-permohonan-mahasiswa', [PenjaminController::class, 'showPersetujuanPermohonanMahasiswa'])->name('penjamin.persetujuan_permohonan_mahasiswa.blade');

// Route::get('/biro-kemahasiswaan/absensi-mahasiswa', [BiroKemahasiswaanController::class, 'showAbsensiPermahasiswa'])->name('biro_kemahasiswaan.absensi_permahasiswa');
// Route::get('/biro-kemahasiswaan/absensi', [BiroKemahasiswaanController::class, 'showAbsensiPertanggal'])->name('biro_kemahasiswaan.absensi_pertanggal');
// Route::get('/biro-kemahasiswaan/daftar-pengajuan-outside', [BiroKemahasiswaanController::class, 'showDaftarPengajuanOutside'])->name('biro_kemahasiswaan.daftar_pengajuan_outside');
// Route::get('/biro-kemahasiswaan/daftar-penjamin', [BiroKemahasiswaanController::class, 'showDaftarPenjamin'])->name('biro_kemahasiswaan.daftar_penjamin');
// Route::get('/biro-kemahasiswaan/daftar-tempat-tinggal', [BiroKemahasiswaanController::class, 'showDaftarTempatTinggal'])->name('biro_kemahasiswaan.daftar_tempat_tinggal');
// Route::get('/biro-kemahasiswaan/absensi-mahasiswa/edit', [BiroKemahasiswaanController::class, 'showEditAbsensi'])->name('biro_kemahasiswaan.edit_absensi');
// Route::get('/biro-kemahasiswaan/formulir-penjamin', [BiroKemahasiswaanController::class, 'showFormulirPenjamin'])->name('biro_kemahasiswaan.formulir_penjamin');
// Route::get('/biro-kemahasiswaan/info-pengajuan-outside', [BiroKemahasiswaanController::class, 'showInfoPengajuanOutside'])->name('biro_kemahasiswaan.info_pengajuan_outside');
// Route::get('/biro-kemahasiswaan/info_tempat_tinggal', [BiroKemahasiswaanController::class, 'showInfoTempatTinggal'])->name('biro_kemahasiswaan.info_tempat_tinggal');
// Route::get('/biro-kemahasiswaan/absensi/input', [BiroKemahasiswaanController::class, 'showInputAbsensi'])->name('biro_kemahasiswaan.input_absensi');
