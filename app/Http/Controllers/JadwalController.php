<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Absen;
use App\Models\Eskul;
use App\Models\Pembina;
use App\Models\Siswa;
use App\Models\Jadwal;
use App\Models\Kelas;
use Illuminate\Support\Carbon;

class JadwalController extends Controller
{
    public function daftar_jadwal()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $jadwal = Jadwal::all();
        $eskul = Eskul::all();
        return view('dashboard.daftar-jadwal', [
            'users' => $users,
            'jadwal' => $jadwal,
            'eskul' => $eskul,
        ]);
    }

    public function lihat_absen($id)
    {
        $jadwal_id = $id;
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $jadwal = Jadwal::find($jadwal_id);
        $absen = Absen::where('jadwal_id', $jadwal->id)->get();
        return view('dashboard.lihat-absen', [
            'users' => $users,
            'jadwal' => $jadwal,
            'absen' => $absen,
        ]);
    }

    public function ubah_jadwal(Request $request, $id)
    {
        $jadwal_id = $id;
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $jadwal = Jadwal::find($jadwal_id);

        $eskul_id = $request->eskul_id;
        $jadwal_tempat = $request->jadwal_tempat;
        $jadwal_keterangan = $request->jadwal_keterangan;
        $jadwal_tanggal = $request->jadwal_tanggal;
        $jadwal_waktu = $request->jadwal_waktu;

        if ($jadwal_tanggal !== NULL && $jadwal_waktu !== NULL) {
            $jadwal_tanggal_waktu = Carbon::createFromFormat('d-m-Y H:i',Carbon::parse($request->jadwal_tanggal)->format('d-m-Y') . " " . $request->jadwal_waktu);
            $eskul = Eskul::find($eskul_id);
            $update_jadwal = $jadwal->update([
                'jadwal_tempat' => $jadwal_tempat,
                'jadwal_keterangan' => $jadwal_keterangan,
                'jadwal_waktu' => $jadwal_tanggal_waktu,
                'eskul_id' => $eskul->id,
                'updated_at' => now()
            ]);
            return redirect()->route('daftar-jadwal')->with('status', 'Data Jadwal Berhasil diubah.');
        } else {
            $eskul = Eskul::find($eskul_id);
            $update_jadwal = $jadwal->update([
                'jadwal_tempat' => $jadwal_tempat,
                'jadwal_keterangan' => $jadwal_keterangan,
                'eskul_id' => $eskul->id,
                'updated_at' => now()
            ]);
            return redirect()->route('daftar-jadwal')->with('status', 'Data Jadwal Berhasil diubah.');
        }

        dump($jadwal_tempat);
        dump($jadwal_keterangan);
        dump($eskul_id);
        dump($jadwal_tanggal);
        dump($jadwal_waktu);
        die;

    }

    public function tambah_jadwal(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $jadwal = new Jadwal;
        $eskul = Eskul::find(intval($request->eskul_id));

        $jadwal_tempat = $request->jadwal_tempat;
        $jadwal_keterangan = $request->jadwal_keterangan;
        $jadwal_tanggal = $request->jadwal_tanggal;
        $jadwal_waktu = $request->jadwal_waktu;
        $jadwal_tanggal_waktu = Carbon::createFromFormat('d-m-Y H:i',Carbon::parse($request->jadwal_tanggal)->format('d-m-Y') . " " . $request->jadwal_waktu);

        $save_jadwal = $jadwal->create([
            "jadwal_tempat" => $jadwal_tempat,
            "jadwal_keterangan" => $jadwal_keterangan,
            "jadwal_waktu" => $jadwal_tanggal_waktu,
            "eskul_id" => $eskul->id,
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        $status_save = $save_jadwal->save();
        switch ($status_save) {
            case true:
                return redirect()->route('daftar-jadwal')->with('status', 'Data Jadwal Berhasil ditambahkan.');
                break;
            case false:
                return redirect()->route('daftar-jadwal')->with('status', 'Data Jadwal Gagal ditambahkan.');
                break;
        }
    }

    public function hapus_jadwal(Request $request, $id)
    {
        $jadwal_id = $id;
        $jadwal = Jadwal::find($jadwal_id);
        $absen = Absen::where('jadwal_id', $jadwal->id)->get();

        foreach ($absen as $item) {
            $f_absen = Absen::find($item->id);
            $h_absen = $f_absen->forceDelete();
        }

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
