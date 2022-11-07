<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Eskul;
use App\Models\Absensi;
use App\Models\Jadwal;
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
        if($users->login_level == "admin"){
            return redirect()->route('dashboard')->with('status', 'Maaf anda tidak punya akses ke Aplikasi Client.');
        }
        $siswa = Siswa::where('login_id', $users->id)->first();
        return view('client.index', [
            'users' => $users,
            'siswa' => $siswa,
        ]);
    }

    public function client_absen()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        $eskul_id = $siswa->eskul_id;
        if ($eskul_id == NULL) {
            return redirect()->route('client')->with('status', 'Maaf, anda belum mendaftar Ekstrakulikuler. silahkan lakukan pendaftaran anggota ekstrakulikuler terlebih dahulu untuk melakukan absensi jadwal ekstrakulikuler.');
        }
        $eskul = Eskul::find($eskul_id);
        $jadwal = Jadwal::where('eskul_id', $eskul->id)->get();
        return view('client.client-absen', [
            'users' => $users,
            'siswa' => $siswa,
            'jadwal' => $jadwal,
        ]);
    }

    public function client_cek_absen(Request $request, $id)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        $jadwal_id = $id;
        $jadwal = Jadwal::find($jadwal_id);
        $absen = new Absen;
        $save_absen = $absen->create([
            'absen_status' => "HADIR",
            'absen_waktu' => now(),
            'absen_tanggal' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_absen->save();
        $lihat_absen = Absen::all();
        dump($save_absen);
        dump($lihat_absen);
        die;
    }

    public function client_profile()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        return view('client.client-profile', [
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

    public function client_menu_daftar_eskul()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        $eskul = Eskul::all();
        return view('client.client-menu-daftar-eskul', [
            'users' => $users,
            'siswa' => $siswa,
            'eskul' => $eskul,
        ]);
    }

    public function client_mendaftar_eskul($id)
    {
        $eskul_id = $id;
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        $eskul = Eskul::find($eskul_id);
        return view('client.client-mendaftar-eskul', [
            'users' => $users,
            'siswa' => $siswa,
            'eskul' => $eskul,
        ]);
    }

    public function client_post_mendaftar_eskul(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);

        $siswa_nama = $request->siswa_nama;
        $siswa_nisn = $request->siswa_nisn;
        $siswa_telepon = $request->siswa_telepon;

        $eskul_id = $request->eskul_id;
        $siswa_id = $request->siswa_id;

        $siswa = Siswa::find($siswa_id);
        $eskul = Eskul::find($eskul_id);

        $update_siswa = $siswa->update([
            'siswa_nama' => $siswa_nama,
            'siswa_nisn' => $siswa_nisn,
            'siswa_telepon' => $siswa_telepon,
            'eskul_id' => $eskul->id,
            'updated_at' => now()
        ]);

        if ($update_siswa == true) {
            return redirect()->route('client')->with('status', 'Berhasil mendaftarkan Ekstrakulikuler');
        } else {
            return redirect()->route('client')->with('status', 'Gagal mendaftarkan Ekstrakulikuler');
        }
    }

    public function client_daftar_jadwal()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        $eskul = Eskul::all();
        return view('client.client-daftar-jadwal', [
            'users' => $users,
            'siswa' => $siswa,
            'eskul' => $eskul,
        ]);
    }

    public function client_lihat_jadwal($id)
    {
        $eskul_id = $id;
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        $eskul = Eskul::find($eskul_id);
        $jadwal = Jadwal::where('eskul_id', $eskul_id)->get();
        return view('client.client-lihat-jadwal', [
            'users' => $users,
            'siswa' => $siswa,
            'jadwal' => $jadwal,
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

    public function client_prestasi_bahasa_inggris()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $siswa = Siswa::where('login_id', $users->id)->first();
        $eskul = Eskul::all();
        return view('client.client-prestasi-bahasa-inggris', [
            'users' => $users,
            'siswa' => $siswa,
            'eskul' => $eskul,
        ]);
    }
}
