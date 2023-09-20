<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermohonanTempatTinggalController;
use App\Http\Controllers\FormulirPenjaminController;

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

// Route::get('/admin/absensi-mahasiswa', [AdminController::class, 'showAbsensiPermahasiswa'])->name('admin.absensi_permahasiswa');
// Route::get('/admin/absensi', [AdminController::class, 'showAbsensiPertanggal'])->name('admin.absensi_pertanggal');
// Route::get('/admin/daftar-pengajuan-outside', [AdminController::class, 'showDaftarPengajuanOutside'])->name('admin.daftar_pengajuan_outside');
// Route::get('/admin/daftar-penjamin', [AdminController::class, 'showDaftarPenjamin'])->name('admin.daftar_penjamin');
// Route::get('/admin/daftar-tempat-tinggal', [AdminController::class, 'showDaftarTempatTinggal'])->name('admin.daftar_tempat_tinggal');
// Route::get('/admin/absensi-mahasiswa/edit', [AdminController::class, 'showEditAbsensi'])->name('admin.edit_absensi');
Route::get('/admin/formulir-penjamin', [FormulirPenjaminController::class, 'index'])->name('admin.formulir_penjamin');
// Route::get('/admin/info-pengajuan-outside', [AdminController::class, 'showInfoPengajuanOutside'])->name('admin.info_pengajuan_outside');
// Route::get('/admin/info_tempat_tinggal', [AdminController::class, 'showInfoTempatTinggal'])->name('admin.info_tempat_tinggal');
// Route::get('/admin/absensi/input', [AdminController::class, 'showInputAbsensi'])->name('admin.input_absensi');
