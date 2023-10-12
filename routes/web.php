<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginPController;
use App\Http\Controllers\LoginBKController;
use App\Http\Controllers\LoginMController;
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

Route::get('mhs/login', [LoginMController::class, 'index'])->name('login-mhs')->middleware('guest');
Route::post('mhs/login', [LoginMController::class, 'authenticate']);
Route::post('mhs/logout', [LoginMController::class, 'logout'])->name('logout_mahasiswa');

Route::get('penjamin/login', [LoginPController::class, 'index'])->name('login-penjamin')->middleware('guest');
Route::post('penjamin/login', [LoginPController::class, 'authenticate']);
Route::post('penjamin/logout', [LoginPController::class, 'logout'])->name('logout_penjamin');

Route::get('bk/login', [LoginBKController::class, 'index'])->name('login-bk')->middleware('guest');
Route::post('bk/login', [LoginBKController::class, 'authenticate']);
Route::post('bk/logout', [LoginBKController::class, 'logout'])->name('logout_admin');




Route::get('/penjamin/permohonan-tempat-tinggal', [PermohonanTempatTinggalController::class, 'index'])->name('permohonan-tempat-tinggal.index');
Route::post('/penjamin/permohonan-tempat-tinggal', [PermohonanTempatTinggalController::class, 'store'])->name('permohonan-tempat-tinggal.store');

Route::get('/admin/formulir-penjamin/{id}', [FormulirPenjaminController::class, 'index'])->name('admin.formulir_penjamin');
Route::post('/admin/formulir-penjamin/{id}/setujui', [FormulirPenjaminController::class, 'approve']);
Route::post('/admin/formulir-penjamin/{id}/tolak', [FormulirPenjaminController::class, 'reject']);