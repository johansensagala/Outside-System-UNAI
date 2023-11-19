<?php

use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjaminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LoginPenjaminController;
use App\Http\Controllers\RoleMahasiswaController;
use App\Http\Controllers\LoginMahasiswaController;
use App\Http\Controllers\FormulirPenjaminController;
use App\Http\Controllers\BiroKemahasiswaanController;
use App\Http\Controllers\PengajuanLuarAsramaController;
use App\Http\Controllers\PersetujuanLuarAsramaController;
use App\Http\Controllers\PersetujuanMahasiswaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AbsensiByMahasiswaController;
use App\Http\Controllers\DataPengajuanMahasiswaController;
use App\Http\Controllers\DataPermohonanPenjaminController;
use App\Http\Controllers\LoginBiroKemahasiswaanController;
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
    return redirect('/mhs/login');
});

Route::get('mhs/login', [LoginMahasiswaController::class, 'index'])->name('login-mahasiswa')->middleware('guest:mahasiswa');
Route::post('mhs/login', [LoginMahasiswaController::class, 'authenticate']);
Route::post('mhs/logout', [LoginMahasiswaController::class, 'logout'])->name('logout_mahasiswa');

Route::get('/penjamin/register', [RegisterController::class, 'index'])->name('register_penjamin');
Route::post('/penjamin/register', [RegisterController::class, 'store']);
Route::get('/penjamin/verify-otp', [RegisterController::class, 'showVerifyOtpForm'])->name('verify_otp');
Route::post('/penjamin/verify-otp', [RegisterController::class, 'verifyOtp']);

Route::get('penjamin/login', [LoginPenjaminController::class, 'index'])->name('login-penjamin')->middleware('guest:penjamin');
Route::post('penjamin/login', [LoginPenjaminController::class, 'authenticate']);
Route::post('penjamin/logout', [LoginPenjaminController::class, 'logout'])->name('logout_penjamin');

Route::get('biro/login', [LoginBiroKemahasiswaanController::class, 'index'])->name('login-biro-kemahasiswaan')->middleware('guest:biro_kemahasiswaan');
Route::post('biro/login', [LoginBiroKemahasiswaanController::class, 'authenticate']);
Route::post('biro/logout', [LoginBiroKemahasiswaanController::class, 'logout'])->name('logout_biro_kemahasiswaan');

// Rute-rute untuk Mahasiswa
Route::middleware(['mahasiswa_middleware'])->group(function () {
    Route::get('/mhs/dashboard', [MahasiswaController::class, 'index']);
    
    Route::get('/mhs/pengajuan-luar-asrama', [PengajuanLuarAsramaController::class, 'index'])->name('pengajuan-luar-asrama');
    Route::post('/mhs/pengajuan-luar-asrama', [PengajuanLuarAsramaController::class, 'process']);
    Route::post('/mhs/pengajuan-penjamin', [PengajuanLuarAsramaController::class, 'store_dengan_penjamin']);
    Route::post('/mhs/pengisian-alamat', [PengajuanLuarAsramaController::class, 'store_tanpa_penjamin'])->name('pengisian-alamat');

    Route::get('/mhs/data-pengajuan', [DataPengajuanMahasiswaController::class, 'index']);

    Route::get('/mhs/absensi', [AbsensiByMahasiswaController::class, 'index']);
    Route::get('/mhs/absensi/{year}/{month}/{date}', [AbsensiByMahasiswaController::class, 'show']);
});

// Rute-rute untuk Penjamin
Route::middleware(['penjamin_middleware'])->group(function () {
    Route::get('/penjamin/dashboard', [PenjaminController::class, 'index']);

    Route::get('/penjamin/permohonan-tempat-tinggal', [PermohonanTempatTinggalController::class, 'index'])->name('penjamin.permohonan-tempat-tinggal');
    Route::post('/penjamin/permohonan-tempat-tinggal', [PermohonanTempatTinggalController::class, 'store']);

    Route::get('/penjamin/data-permohonan', [DataPermohonanPenjaminController::class, 'index'])->name('penjamin.data-permohonan');

    Route::get('/penjamin/persetujuan-mahasiswa', [PersetujuanMahasiswaController::class, 'index']);
    Route::get('/penjamin/persetujuan-mahasiswa/{id}', [PersetujuanMahasiswaController::class, 'show']);
    Route::post('/penjamin/persetujuan-mahasiswa/{id}/setujui', [PersetujuanMahasiswaController::class, 'approve']);
    Route::post('/penjamin/persetujuan-mahasiswa/{id}/tolak', [PersetujuanMahasiswaController::class, 'reject']);
});

// Rute-rute untuk Biro Kemahasiswaan
Route::middleware(['biro_kemahasiswaan_middleware'])->group(function () {
    Route::get('/biro/dashboard', [BiroKemahasiswaanController::class, 'index']);

    Route::get('/biro/formulir-penjamin', [FormulirPenjaminController::class, 'index'])->name('biro_kemahasiswaan.daftar_penjamin');
    Route::get('/biro/search-penjamin', [FormulirPenjaminController::class, 'search'])->name('biro_kemahasiswaan.search_penjamin');
    Route::get('/biro/status-penjamin', [FormulirPenjaminController::class, 'status'])->name('biro_kemahasiswaan.status_penjamin');
    
    Route::get('/biro/daftar-mahasiswa', [RoleMahasiswaController::class, 'index'])->name('biro_kemahasiswaan.daftar_mahasiswa');
    Route::post('/biro/daftar-mahasiswa/{id}/toggle-role', [RoleMahasiswaController::class, 'index'])->name('biro_kemahasiswaan.toggle_role_mahasiswa');

    Route::get('/biro/formulir-penjamin/{id}', [FormulirPenjaminController::class, 'show'])->name('biro_kemahasiswaan.formulir_penjamin');
    Route::post('/biro/formulir-penjamin/{id}/setujui', [FormulirPenjaminController::class, 'approve']);
    Route::post('/biro/formulir-penjamin/{id}/tolak', [FormulirPenjaminController::class, 'reject']);

    Route::get('/biro/persetujuan-luar-asrama', [PersetujuanLuarAsramaController::class, 'index']);
    Route::get('/biro/persetujuan-luar-asrama/{id}', [PersetujuanLuarAsramaController::class, 'show']);
    
    Route::get('/biro/absensi-tempat-tinggal', [AbsensiController::class, 'index']);
    Route::get('/biro/absensi-tempat-tinggal/{id}', [AbsensiController::class, 'show']);
});