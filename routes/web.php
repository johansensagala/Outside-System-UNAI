<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiroKemahasiswaan\LoginBKController;
use App\Http\Controllers\Mahasiswa\LoginMController;
use App\Http\Controllers\Penjamin\LoginPController;
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

Route::get('mhs/login', [LoginMController::class, 'index'])->name('login')->middleware('guest');
Route::post('mhs//login', [LoginController::class, 'authenticate']);
Route::post('mhs/logout', [LoginController::class, 'logout']);

Route::get('mhs/login', [LoginBKController::class, 'index'])->name('login')->middleware('guest');
Route::post('mhs//login', [LoginBKController::class, 'authenticate']);
Route::post('mhs/logout', [LoginBKController::class, 'logout']);

Route::get('mhs/login', [LoginPController::class, 'index'])->name('login')->middleware('guest');
Route::post('mhs//login', [LoginPController::class, 'authenticate']);
Route::post('mhs/logout', [LoginPController::class, 'logout']);

Route::get('/penjamin/permohonan-tempat-tinggal', [PermohonanTempatTinggalController::class, 'index'])->name('permohonan-tempat-tinggal');

Route::get('/admin/formulir-penjamin', [FormulirPenjaminController::class, 'index'])->name('admin.formulir_penjamin');