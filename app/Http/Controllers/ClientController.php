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
use App\Models\Siswa;
use App\Models\Kelas;

class ClientController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = session('data_login');
    }

    public function index()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        return view('client.index', [
            'users' => $users,
            'siswa' => $siswa,
        ]);
    }

    public function client_daftar_eskul()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        $eskul = Eskul::all();
        return view('client.client-daftar-eskul', [
            'users' => $users,
            'siswa' => $siswa,
            'eskul' => $eskul,
        ]);
    }

    public function client_prestasi_eskul()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        $eskul = Eskul::all();
        return view('client.client-prestasi-eskul', [
            'users' => $users,
            'siswa' => $siswa,
            'eskul' => $eskul,
        ]);
    }

    public function client_prestasi_marching_band()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        $eskul = Eskul::all();
        return view('client.client-prestasi-marching-band', [
            'users' => $users,
            'siswa' => $siswa,
            'eskul' => $eskul,
        ]);
    }

    public function client_prestasi_pramuka()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        $eskul = Eskul::all();
        return view('client.client-prestasi-pramuka', [
            'users' => $users,
            'siswa' => $siswa,
            'eskul' => $eskul,
        ]);
    }

    public function client_prestasi_seni_rupa()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        $eskul = Eskul::all();
        return view('client.client-prestasi-seni-rupa', [
            'users' => $users,
            'siswa' => $siswa,
            'eskul' => $eskul,
        ]);
    }
}
