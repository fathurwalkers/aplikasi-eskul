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
    return redirect('/login-admin');
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
    Route::post('/siswa/post-ubah-siswa/{id}', [SiswaController::class, 'post_ubah_siswa'])->name('post-ubah-siswa');
    Route::post('/siswa/hapus-siswa/{id}', [SiswaController::class, 'hapus_siswa'])->name('hapus-siswa');
    Route::post('/siswa/tambah-siswa', [SiswaController::class, 'tambah_siswa'])->name('tambah-siswa');

    // PEMBINA ROUTE
    Route::get('/pembina/daftar-pembina', [PembinaController::class, 'daftar_pembina'])->name('daftar-pembina');
    Route::post('/pembina/hapus-pembina/{id}', [PembinaController::class, 'hapus_pembina'])->name('hapus-pembina');
    Route::post('/pembina/tambah-pembina', [PembinaController::class, 'tambah_pembina'])->name('tambah-pembina');
    Route::post('/pembina/post-ubah-pembina/{id}', [PembinaController::class, 'post_ubah_pembina'])->name('post-ubah-pembina');

    // AKUN ROUTE
    Route::get('/akun/daftar-akun', [BackController::class, 'daftar_akun'])->name('daftar-akun');

    // JADWAL ROUTE
    Route::get('/jadwal/daftar-jadwal', [JadwalController::class, 'daftar_jadwal'])->name('daftar-jadwal');
    Route::post('/jadwal/tambah-jadwal', [JadwalController::class, 'tambah_jadwal'])->name('tambah-jadwal');
    Route::get('/jadwal/lihat-absen/{id}', [JadwalController::class, 'lihat_absen'])->name('lihat-absen');
    Route::post('/jadwal/hapus-jadwal/{id}', [JadwalController::class, 'hapus_jadwal'])->name('hapus-jadwal');

    // KELAS ROUTE
    Route::get('/kelas/daftar-kelas', [KelasController::class, 'daftar_kelas'])->name('daftar-kelas');
    Route::get('/kelas/lihat-kelas/{id}', [KelasController::class, 'lihat_kelas'])->name('lihat-kelas');

    // ESKUL ROUTE
    Route::get('/eskul/daftar-eskul', [EskulController::class, 'daftar_eskul'])->name('daftar-eskul');
    Route::get('/eskul/lihat-eskul/{id}', [EskulController::class, 'lihat_eskul'])->name('lihat-eskul');
    Route::post('/eskul/tambah-eskul', [EskulController::class, 'tambah_eskul'])->name('tambah-eskul');
});

Route::group(['prefix' => '/client', 'middleware' => 'ceklogin'], function () {
    // CLIENT ROUTE
    Route::get('/', [ClientController::class, 'index'])->name('client');
    Route::get('/client-profile', [ClientController::class, 'client_profile'])->name('client-profile');
    Route::post('/client-ubah-foto', [ClientController::class, 'client_ubah_foto'])->name('client-ubah-foto');

    Route::get('/client-absen', [ClientController::class, 'client_absen'])->name('client-absen');
    Route::post('/client-cek-absen/{id}', [ClientController::class, 'client_cek_absen'])->name('client-cek-absen');

    Route::get('/client-daftar-eskul', [ClientController::class, 'client_daftar_eskul'])->name('client-daftar-eskul');
    Route::get('/client-daftar-jadwal', [ClientController::class, 'client_daftar_jadwal'])->name('client-daftar-jadwal');
    Route::get('/client-lihat-jadwal/{id}', [ClientController::class, 'client_lihat_jadwal'])->name('client-lihat-jadwal');

    Route::get('/client-mendaftar-eskul/{id}', [ClientController::class, 'client_mendaftar_eskul'])->name('client-mendaftar-eskul');
    Route::post('/client-post-mendaftar-eskul', [ClientController::class, 'client_post_mendaftar_eskul'])->name('client-post-mendaftar-eskul');

    Route::get('/client-prestasi-eskul', [ClientController::class, 'client_prestasi_eskul'])->name('client-prestasi-eskul');

    Route::get('/client-menu-daftar-eskul', [ClientController::class, 'client_menu_daftar_eskul'])->name('client-menu-daftar-eskul');

    Route::get('/client-prestasi-marching-band', [ClientController::class, 'client_prestasi_marching_band'])->name('client-prestasi-marching-band');

    Route::get('/client-prestasi-pramuka', [ClientController::class, 'client_prestasi_pramuka'])->name('client-prestasi-pramuka');

    Route::get('/client-prestasi-seni-rupa', [ClientController::class, 'client_prestasi_seni_rupa'])->name('client-prestasi-seni-rupa');

    Route::get('/client-prestasi-bahasa-inggris', [ClientController::class, 'client_prestasi_bahasa_inggris'])->name('client-prestasi-bahasa-inggris');
});

Route::get('/generate', [GenerateController::class, 'generate_all'])->name('generate-all');
Route::get('/generate-siswa', [GenerateController::class, 'generate_siswa'])->name('generate-siswa');
Route::get('/generate-siswa-perkelas', [GenerateController::class, 'generate_siswa_perkelas'])->name('generate-siswa-perkelas');
Route::get('/generate-default-siswa', [GenerateController::class, 'generate_default_siswa'])->name('generate-default-siswa');
Route::get('/generate-jadwal', [GenerateController::class, 'generate_jadwal'])->name('generate-jadwal');
Route::get('/generate-pembina', [GenerateController::class, 'generate_pembina'])->name('generate-pembina');
