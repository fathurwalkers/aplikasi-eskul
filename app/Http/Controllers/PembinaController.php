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

class PembinaController extends Controller
{
    public function daftar_pembina()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $pembina = Pembina::all();
        return view('dashboard.daftar-pembina', [
            'users' => $users,
            'pembina' => $pembina
        ]);
    }
}
