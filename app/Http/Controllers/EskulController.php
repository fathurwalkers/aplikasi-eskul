<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Absensi;
use App\Models\Eskul;
use App\Models\Pembina;
use App\Models\Siswa;
use App\Models\Kelas;

class EskulController extends Controller
{
    public function daftar_eskul()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $eskul = Eskul::all();
        $siswa = Siswa::all();
        return view('dashboard.daftar-eskul', [
            'users' => $users,
            'eskul' => $eskul,
        ]);
    }

    public function lihat_eskul($id)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('eskul_id', $id)->get();
        $eskul = Eskul::find($id);
        return view('dashboard.lihat-eskul', [
            'users' => $users,
            'siswa' => $siswa,
            'eskul' => $eskul,
        ]);
    }
}
