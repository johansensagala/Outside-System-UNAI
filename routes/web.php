<?php

use App\Http\Controllers\BiroKemahasiswaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginPenjaminController;
use App\Http\Controllers\LoginBiroKemahasiswaanController;
use App\Http\Controllers\LoginMahasiswaController;
use App\Http\Controllers\PermohonanTempatTinggalController;
use App\Http\Controllers\FormulirPenjaminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PenjaminController;
use App\Http\Controllers\BiroKemahasiswaanController;
use App\Http\Controllers\DaftarPenjaminanMahasiswaController;

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
    return redirect('/mhs/login');
});

Route::get('mhs/login', [LoginMahasiswaController::class, 'index'])->name('login-mahasiswa')->middleware('guest:mahasiswa');
Route::post('mhs/login', [LoginMahasiswaController::class, 'authenticate']);
Route::post('mhs/logout', [LoginMahasiswaController::class, 'logout'])->name('logout_mahasiswa');

Route::get('penjamin/login', [LoginPenjaminController::class, 'index'])->name('login-penjamin')->middleware('guest:penjamin');
Route::post('penjamin/login', [LoginPenjaminController::class, 'authenticate']);
Route::post('penjamin/logout', [LoginPenjaminController::class, 'logout'])->name('logout_penjamin');

Route::get('biro/login', [LoginBiroKemahasiswaanController::class, 'index'])->name('login-biro-kemahasiswaan')->middleware('guest:biro_kemahasiswaan');
Route::post('biro/login', [LoginBiroKemahasiswaanController::class, 'authenticate']);
Route::post('biro/logout', [LoginBiroKemahasiswaanController::class, 'logout'])->name('logout_biro_kemahasiswaan');

// Rute-rute untuk Mahasiswa
Route::middleware(['mahasiswa_middleware'])->group(function () {
    Route::get('/mhs/dashboard', [MahasiswaController::class, 'index']);
});

// Rute-rute untuk Penjamin
Route::middleware(['penjamin_middleware'])->group(function () {
    Route::get('/penjamin/dashboard', [PenjaminController::class, 'index']);
    Route::get('/penjamin/permohonan-tempat-tinggal', [PermohonanTempatTinggalController::class, 'index'])->name('penjamin.permohonan-tempat-tinggal');
    Route::post('/penjamin/permohonan-tempat-tinggal', [PermohonanTempatTinggalController::class, 'store']);

    Route::get('/penjamin/daftar-penjaminan-mahasiswa', [DaftarPenjaminanMahasiswaController::class, 'index']);
});

// Rute-rute untuk Biro Kemahasiswaan
Route::middleware(['biro_kemahasiswaan_middleware'])->group(function () {
    Route::get('/biro/dashboard', [BiroKemahasiswaanController::class, 'index']);
    Route::get('/biro/formulir-penjamin', [FormulirPenjaminController::class, 'index'])->name('biro_kemahasiswaan.daftar_penjamin');

    Route::get('/biro/formulir-penjamin/{id}', [FormulirPenjaminController::class, 'show'])->name('biro_kemahasiswaan.formulir_penjamin');
    Route::post('/biro/formulir-penjamin/{id}/setujui', [FormulirPenjaminController::class, 'approve']);
    Route::post('/biro/formulir-penjamin/{id}/tolak', [FormulirPenjaminController::class, 'reject']);
});