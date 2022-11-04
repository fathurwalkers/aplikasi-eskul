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
        $kelas = Kelas::all();
        $kelas = Eskul::all();
        return view('dashboard.daftar-pembina', [
            'users' => $users,
            'pembina' => $pembina,
            'eskul' => $eskul,
            'kelas' => $kelas,
        ]);
    }

    public function tambah_pembina(Request $request)
    {
        $faker                  = Faker::create('id_ID');
        $pembina = new Pembina;
        $gambar_cek = $request->file('foto');
        if (!$gambar_cek) {
            $gambar = "null;";
        } else {
            $randomNamaGambar = Str::random(10) . '.jpg';
            $gambar = $request->file('foto')->move(public_path('foto'), strtolower($randomNamaGambar));
        }

        $siswa_nama = $request->siswa_nama;
        $siswa_nisn = $request->siswa_nisn;
        $siswa_telepon = $request->siswa_telepon;
        $siswa_alamat = $request->siswa_alamat;
        $siswa_jeniskelamin = $request->siswa_jeniskelamin;
        $siswa_status = "AKTIF";

        // GENERATE DATA LOGIN
        $login = new Login;
        $token = Str::random(16);
        $level = "user";
        $hashPassword = Hash::make('12345', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        $username = strtolower(Str::random(10));
        $save_login = $login->create([
            'login_nama'        => $siswa_nama,
            'login_username'    => $username,
            'login_password'    => $hashPassword,
            'login_email'       => $faker->email(),
            'login_telepon'     => $siswa_telepon,
            'login_token'       => $hashToken,
            'login_level'       => $level,
            'login_status'      => "verified",
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
        $save_login->save();

        $login_id = $save_login->id;
        $kelas_id = $request->siswa_kelas;

        // dump($siswa_nama);
        // dump($siswa_nisn);
        // dump($siswa_telepon);
        // dump($siswa_alamat);
        // dump($siswa_jeniskelamin);
        // dump($siswa_status);
        // dump($login_id);
        // dump($kelas_id);
        // die;

        // GENERATE DATA SISWA
        $save_siswa = $siswa->create([
            'siswa_nama' => $siswa_nama,
            'siswa_nisn' => $siswa_nisn,
            'siswa_jeniskelamin' => $siswa_jeniskelamin,
            'siswa_alamat' => $siswa_alamat,
            'siswa_telepon' => $siswa_telepon,
            'siswa_foto' => $gambar->getFileName(),
            'siswa_status' => $siswa_status,
            'login_id' => $save_login->id,
            'kelas_id' => $kelas_id,
            'eskul_id' => NULL,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_siswa->save();
        return redirect()->route('daftar-siswa')->with('status', 'Berhasil Menambah Data Siswa.');
    }
}
