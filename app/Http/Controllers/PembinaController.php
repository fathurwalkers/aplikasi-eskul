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
        $eskul = Eskul::all();
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

        $pembina_nama = $request->pembina_nama;
        $pembina_nip = $request->pembina_nip;
        $pembina_telepon = $request->pembina_telepon;
        $pembina_alamat = $request->pembina_alamat;
        $pembina_jabatan_organik = $request->pembina_jabatan_organik;
        $pembina_jabatan_kegiatan = $request->pembina_jabatan_kegiatan;
        $pembina_jeniskelamin = $request->pembina_jeniskelamin;
        $pembina_kode = strtoupper(Str::random(10));

        // GENERATE DATA LOGIN
        $login = new Login;
        $token = Str::random(16);
        $level = "pembina";
        $hashPassword = Hash::make('12345', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        $username = strtolower(Str::random(10));
        $save_login = $login->create([
            'login_nama'        => $pembina_nama,
            'login_username'    => $username,
            'login_password'    => $hashPassword,
            'login_email'       => $faker->email(),
            'login_telepon'     => $pembina_telepon,
            'login_token'       => $hashToken,
            'login_level'       => $level,
            'login_status'      => "verified",
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
        $save_login->save();

        $login_id = $save_login->id;
        $eskul_id = $request->eskul_id;
        $eskul_find = Eskul::find($eskul_id);

        // GENERATE DATA Pembina
        $save_pembina = $pembina->create([
            'pembina_nama' => $pembina_nama,
            'pembina_nip' => $pembina_nip,
            'pembina_jeniskelamin' => $pembina_jeniskelamin,
            'pembina_telepon' => $pembina_telepon,
            'pembina_foto' => $gambar->getFileName(),
            'pembina_status' => "AKTIF",
            'pembina_jabatan_organik' => $pembina_jabatan_organik,
            'pembina_jabatan_kegiatan' => $pembina_jabatan_kegiatan,
            'pembina_kode' => $pembina_kode,
            'login_id' => $save_login->id,
            'eskul_id' => $eskul_find->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_pembina->save();

        return redirect()->route('daftar-pembina')->with('status', 'Berhasil Menambah Data Siswa.');
    }

    public function hapus_pembina(Request $request, $id)
    {
        $pembina_id = $id;
        $pembina = Pembina::find($pembina_id);
        $pembina_nama = $pembina->pembina_nama;
        $pembina_hapus = $pembina->forceDelete();
        if ($pembina_hapus == true) {
            $alert = "Data Pembina " . $pembina_nama . " telah berhasil dihapus.";
            return redirect()->route('daftar-pembina')->with('status', $alert);
        } else {
            $alert = "Data Pembina " . $pembina_nama . " gagal dihapus.";
            return redirect()->route('daftar-pembina')->with('status', $alert);
        }
    }

    public function post_ubah_pembina(Request $request, $id)
    {
        $pembina_id = $id;
        $pembina_nama = $request->pembina_nama;
        $pembina_telepon = $request->pembina_telepon;
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $pembina = Pembina::find($pembina_id);
        $pembina_update = $pembina->update([
            'pembina_nama' => $pembina_nama,
            'pembina_telepon' => $pembina_telepon,
            'updated_at' => now()
        ]);
        if ($pembina_update == true) {
            $alert = "Data Pembina " . $pembina_nama . " telah berhasil diubah.";
            return redirect()->route('daftar-pembina')->with('status', $alert);
        } else {
            $alert = "Data Pembina " . $pembina_nama . " gagal diubah.";
            return redirect()->route('daftar-pembina')->with('status', $alert);
        }
    }
}
