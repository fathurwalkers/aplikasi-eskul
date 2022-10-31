<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\JadwalController;

Route::get('/', function () {
    return redirect('/dashboard');
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

    // PEMBINA ROUTE
    Route::get('/akun/daftar-akun', [BackController::class, 'daftar_akun'])->name('daftar-akun');

    // JADWAL ROUTE
    Route::get('/jadwal/daftar-jadwal', [JadwalController::class, 'daftar_jadwal'])->name('daftar-jadwal');
    Route::post('/jadwal/tambah-jadwal', [JadwalController::class, 'tambah_jadwal'])->name('tambah-jadwal');
    Route::post('/jadwal/hapus-jadwal/{id}', [JadwalController::class, 'hapus_jadwal'])->name('hapus-jadwal');

    // KELAS ROUTE
    Route::get('/kelas/daftar-kelas', [KelasController::class, 'daftar_kelas'])->name('daftar-kelas');
    Route::get('/kelas/lihat-kelas/{id}', [KelasController::class, 'lihat_kelas'])->name('lihat-kelas');

    // ESKUL ROUTE
    Route::get('/eskul/daftar-eskul', [EskulController::class, 'daftar_eskul'])->name('daftar-eskul');
    Route::get('/eskul/lihat-eskul/{id}', [EskulController::class, 'lihat_eskul'])->name('lihat-eskul');
});

Route::group(['prefix' => '/client', 'middleware' => 'ceklogin'], function () {
    // CLIENT ROUTE
    Route::get('/', [ClientController::class, 'index'])->name('client');

    Route::get('/client-daftar-eskul', [ClientController::class, 'client_daftar_eskul'])->name('client-daftar-eskul');

    Route::get('/client-prestasi-eskul', [ClientController::class, 'client_prestasi_eskul'])->name('client-prestasi-eskul');
});

Route::get('/generate', [GenerateController::class, 'generate_all'])->name('generate-all');
Route::get('/generate-siswa', [GenerateController::class, 'generate_siswa'])->name('generate-siswa');
Route::get('/generate-jadwal', [GenerateController::class, 'generate_jadwal'])->name('generate-jadwal');
Route::get('/generate-pembina', [GenerateController::class, 'generate_pembina'])->name('generate-pembina');
