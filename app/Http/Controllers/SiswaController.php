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

class SiswaController extends Controller
{
    public function daftar_siswa()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::all();
        return view('dashboard.daftar-siswa', [
            'users' => $users,
            'siswa' => $siswa
        ]);
    }

    public function hapus_siswa(Request $request, $id)
    {
        $siswa_id = $id;
        $siswa = siswa::find($siswa_id);
        $siswa_nama = $siswa->siswa_nama;
        $siswa_hapus = $siswa->forceDelete();
        if ($siswa_hapus == true) {
            $alert = "Data Siswa" . $siswa_nama . " telah berhasil dihapus.";
            return redirect()->route('daftar-siswa')->with('status', $alert);
        } else {
            $alert = "Data Siswa" . $siswa_nama . " gagal dihapus.";
            return redirect()->route('daftar-siswa')->with('status', $alert);
        }
    }
}
