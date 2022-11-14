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
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function daftar_nilai($id)
    {
        $eskul_id = $id;
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $eskul = Eskul::find($eskul_id);
        $nilai = Nilai::where('eskul_id', $eskul->id)->get();
        return view('dashboard.daftar-nilai', [
            'users' => $users,
            'eskul' => $eskul,
            'nilai' => $nilai,
        ]);
    }
}
