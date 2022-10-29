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

class JadwalController extends Controller
{
    public function daftar_jadwal()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $jadwal = Jadwal::all();
        $siswa = Siswa::all();
        return view('dashboard.daftar-jadwal', [
            'users' => $users,
            'jadwal' => $jadwal,
        ]);
    }

    public function hapus_jadwal(Request $request, $id)
    {
        $jadwal_id = $id;
        $jadwal = Jadwal::find($jadwal_id);
        $jadwal_tempat = $jadwal->jadwal_tempat;
        $jadwal_eskul = $jadwal->eskul->eskul_nama;
        $jadwal_hapus = $jadwal->forceDelete();
        if ($jadwal_hapus == true) {
            $alert = "Jadwal Ekstrakulikuler " . $jadwal_eskul . " (" . $jadwal_tempat . ") telah berhasil dihapus.";
            return redirect()->route('daftar-jadwal')->with('status', $alert);
        } else {
            $alert = "Jadwal Ekstrakulikuler " . $jadwal_eskul . " (" . $jadwal_tempat . ") gagal dihapus.";
            return redirect()->route('daftar-jadwal')->with('status', $alert);
        }
    }
}
