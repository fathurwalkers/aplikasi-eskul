@extends('layouts.client-layout')

@section('tombol-keluar')
    <div class="tombol-keluar mt-2">
        <a href="{{ route('client') }}">
            <i class="bi bi-arrow-left-circle" style="font-size: 2rem; margin-right: 30px;"></i>
        </a>
        <h5 style="display: inline-block;">Jadwal Ekstrakulikuler</h5>
    </div>
@endsection

@section('main-content')

    <div class="container">

        <div class="container">
            <div class="card mb-4 shadow-sm mt-4">
                <div class="card-header">
                    Isi Data Dibawah ini
                </div>

                <form action="{{ route('client-post-mendaftar-eskul') }}" method="POST">
                    @csrf
                    <input type="hidden" name="eskul_id" value="{{ $eskul->id }}">
                    <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                    <div class="card-body">
                        <div class="row mt-2 justify-content-center">
                            <div class="mb-3">
                                <label for="siswa_nisn" class="form-label">NIS :</label>
                                <input type="text" class="form-control" id="siswa_nisn" name="siswa_nisn" value="{{ $siswa->siswa_nisn }}">
                            </div>
                            <div class="mb-3">
                                <label for="siswa_nama" class="form-label">Nama Lengkap:</label>
                                <input type="text" class="form-control" id="siswa_nama" name="siswa_nama" value="{{ $siswa->siswa_nama }}">
                            </div>
                            <div class="mb-3">
                                <div class="col-sm-10">
                                    <div class="mb-3">
                                        <label for="siswa_telepon" class="form-label">No. Handphone</label>
                                        <input type="text" class="form-control" id="siswa_telepon" name="siswa_telepon" value="{{ $siswa->siswa_telepon }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="siswa_kelas" class="form-label">Kelas :</label>
                                        <input type="text" class="form-control" id="siswa_kelas" name="siswa_kelas" value="{{ $siswa->kelas->kelas_nama }}" disabled>
                                    </div>
                                    <div class="mb-5">
                                        <label for="siswa_alasanbergabung" class="form-label">Alasan :</label>
                                        <input type="text" class="form-control" id="siswa_alasanbergabung"
                                            placeholder="Alasan Bergabung ...">
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-success">Kirim Daftar</button>
                                        <div class="col-12 mb-5 shadow-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <br />
    <br />
    <br />
    <br />
@endsection
