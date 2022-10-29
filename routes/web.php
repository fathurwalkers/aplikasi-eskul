<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembinaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [BackController::class, 'login_client'])->name('login-client');
Route::get('/login-admin', [BackController::class, 'login_admin'])->name('login-admin');

Route::post('/proses-login', [BackController::class, 'post_login'])->name('post-login');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/dashboard', 'middleware' => 'ceklogin'], function () {
    // DASHBOARD ROUTE
    Route::get('/', [BackController::class, 'index'])->name('dashboard');

    // SISWA ROUTE
    Route::get('/siswa/daftar-siswa', [SiswaController::class, 'daftar_siswa'])->name('daftar-siswa');

    // PEMBINA ROUTE
    Route::get('/pembina/daftar-pembina', [PembinaController::class, 'daftar_pembina'])->name('daftar-pembina');

    // KELAS ROUTE
    Route::get('/kelas/daftar-kelas', [KelasController::class, 'daftar_kelas'])->name('daftar-kelas');

    // ESKUL ROUTE
    Route::get('/eskul/daftar-eskul', [EskulController::class, 'daftar_eskul'])->name('daftar-eskul');
});

Route::get('/generate', [GenerateController::class, 'generate_all'])->name('generate-all');
Route::get('/generate-siswa', [GenerateController::class, 'generate_siswa'])->name('generate-siswa');
Route::get('/generate-pembina', [GenerateController::class, 'generate_pembina'])->name('generate-pembina');
