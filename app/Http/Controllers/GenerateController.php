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

class GenerateController extends Controller
{
    public function generate_siswa()
    {
        $faker                  = Faker::create('id_ID');
        $kelas = Kelas::all()->toArray();

        for ($i=0; $i < 25; $i++) {
            $kelas_random = Arr::random($kelas);
            $siswa = new Siswa;
            $login = new Login;
            $array_gender = ["L", "P"];
            $foto = "default-user.png";
            $gender = Arr::random($array_gender);
            $nisn = $faker->randomNumber(8);
            $telepon = $faker->phoneNumber();
            $status = "AKTIF";
            $alamat = $faker->address();
            switch ($gender) {
                case "L":
                    $nama = $faker->firstNameMale() . " " . $faker->lastNameMale();
                    break;
                case "P":
                    $nama = $faker->firstNameFemale() . " " . $faker->lastNameFemale();
                    break;
            }

            // GENERATE DATA LOGIN
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
                'login_nama'        => $nama,
                'login_username'    => $username,
                'login_password'    => $hashPassword,
                'login_email'       => $faker->email(),
                'login_telepon'     => $telepon,
                'login_token'       => $hashToken,
                'login_level'       => $level,
                'login_status'      => "verified",
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
            $save_login->save();

            // GENERATE DATA SISWA
            $save_siswa = $siswa->create([
                'siswa_nama' => $nama,
                'siswa_nisn' => $nisn,
                'siswa_jeniskelamin' => $gender,
                'siswa_alamat' => $alamat,
                'siswa_telepon' => $telepon,
                'siswa_foto' => $foto,
                'siswa_status' => $status,
                'login_id' => $save_login->id,
                'kelas_id' => $kelas_random["id"],
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_siswa->save();
        }
        // return redirect()->route('daftar-siswa')->with('status', 'Berhasil melakukan Auto Generate Data Siswa.');
    }

    public function generate_pembina()
    {
        $faker = Faker::create('id_ID');
        $eskul = Eskul::all()->toArray();
        $array_jabatan_organik = [
            "Staff Wakasek Kesiswaaan",
            "Staff Sarana Prasana",
            "Staff Kurikulum",
            "Guru",
            "GTT",
        ];

        for ($i=0; $i < 10; $i++) {
            $eskul_random = Arr::random($eskul);
            $jabatan_organik_random = Arr::random($array_jabatan_organik);
            $pembina = new Pembina;
            $login = new Login;
            $array_gender = ["L", "P"];
            $foto = "default-user.png";
            $gender = Arr::random($array_gender);
            $nip = $faker->randomNumber(8);
            $telepon = $faker->phoneNumber();
            $status = "AKTIF";
            $alamat = $faker->address();
            $kode = strtoupper(Str::random(10));
            switch ($gender) {
                case "L":
                    $nama = $faker->firstNameMale() . " " . $faker->lastNameMale();
                    break;
                case "P":
                    $nama = $faker->firstNameFemale() . " " . $faker->lastNameFemale();
                    break;
            }

            // GENERATE DATA LOGIN
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
                'login_nama'        => $nama,
                'login_username'    => $username,
                'login_password'    => $hashPassword,
                'login_email'       => $faker->email(),
                'login_telepon'     => $telepon,
                'login_token'       => $hashToken,
                'login_level'       => $level,
                'login_status'      => "verified",
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
            $save_login->save();

            // GENERATE DATA Pembina
            $save_pembina = $pembina->create([
                'pembina_nama' => $nama,
                'pembina_nip' => $nip,
                'pembina_jeniskelamin' => $gender,
                'pembina_telepon' => $telepon,
                'pembina_foto' => $foto,
                'pembina_status' => $status,
                'pembina_jabatan_organik' => $jabatan_organik_random,
                'pembina_jabatan_kegiatan' => "Pembina",
                'pembina_kode' => $kode,
                'login_id' => $save_login->id,
                'eskul_id' => $eskul_random["id"],
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_pembina->save();
        }
        // return redirect()->route('daftar-pembina')->with('status', 'Berhasil Auto Generate Data Pembina.');
    }

    public function generate_all()
    {
        $this->generate_siswa();
        $this->generate_pembina();
        return redirect()->route('dashboard')->with('status', 'Berhasil melakukan Auto Generate Data.');
    }
}
