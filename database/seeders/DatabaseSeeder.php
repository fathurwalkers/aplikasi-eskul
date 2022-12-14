<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Kelas;
use App\Models\Eskul;
use App\Models\Siswa;
use App\Models\Pembina;
use App\Models\Absensi;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // ADMIN
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'FathurWalkers',
            'login_username' => 'fathurwalkers',
            'login_password' => $hashPassword,
            'login_email' => 'fathurwalkers44@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);


        // ADMIN 1
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('admin', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Administrator',
            'login_username' => 'admin',
            'login_password' => $hashPassword,
            'login_email' => 'administrator@gmail.com',
            'login_telepon' => '083400592841',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ---------------------------------------------------------------------------

        // petugas
        $token = Str::random(16);
        $role = "petugas";
        $hashPassword = Hash::make('petugas', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'petugas 1',
            'login_username' => 'petugas',
            'login_password' => $hashPassword,
            'login_email' => 'petugas@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // User Pertama
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('user1', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'User 1',
            'login_username' => 'user1',
            'login_password' => $hashPassword,
            'login_email' => 'user1@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // User Kedua
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('user2', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'User 2',
            'login_username' => 'user2',
            'login_password' => $hashPassword,
            'login_email' => 'user2@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);


        // GENERATE KELAS
        $kelas = new Kelas;
        $array_kelas = [
            'X-1',
            'X-2',
            'X-3',
            'X-4',
            'X-5',
            'X-6',
            'X-7',
            'X-8',
            'X-9',
            'X-10',
            'X-11',
            'X-12',
            'X-13',
            'X-14',
            'X-15',
            'X-16',
            'X-17',
            'X-18',

            'XI-IPA 1',
            'XI-IPA 2',
            'XI-IPA 3',
            'XI-IPA 4',
            'XI-IPA 5',
            'XI-IPA 6',
            'XI-IPA 7',
            'XI-IPA 8',
            'XI-IPA 9',
            'XI-IPS 1',
            'XI-IPS 2',
            'XI-IPS 3',
            'XI-IPS 4',

            'XII-IPA 1',
            'XII-IPA 2',
            'XII-IPA 3',
            'XII-IPA 4',
            'XII-IPA 5',
            'XII-IPA 6',
            'XII-IPA 7',
            'XII-IPA 8',
            'XII-IPA 9',
            'XII-IPS 1',
            'XII-IPS 2',
            'XII-IPS 3',
            'XII-IPS 4',
        ];
        foreach ($array_kelas as $item) {
            $save_kelas = Kelas::create([
                'kelas_kode' => strtoupper(Str::random(3)) . "-" . strtoupper(Str::random(3)),
                'kelas_nama' => $item,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_kelas->save();
        }


        // GENERATE ESKUL
        $array_eskul = [
            "Marching Band",
            "Pramuka",
            "Seni Tari",
            "Seni Musik",
            "Bahasa Inggris",
            "Sepak Bola",
            "Volly Ball",
        ];

        foreach ($array_eskul as $item) {
            $array_angkatan = [
                "I",
                "II",
                "III",
                "IV",
                "V",
                "VI",
                "VII",
                "VIII",
                "IX",
                "X",
            ];
            // foreach ($array_angkatan as $items) {
                Eskul::create([
                    'eskul_gambar' => $item . ".jpg",
                    'eskul_nama' => $item,
                    // 'eskul_angkatan' => $items,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            // }
        }
    }
}
