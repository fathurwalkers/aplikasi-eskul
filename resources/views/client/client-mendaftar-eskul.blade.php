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
                <div class="card-body">
                    <div class="row mt-2 justify-content-center">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">NIS :</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="Nomor Induk siswa ...">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Nama Lengkap:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2"
                                placeholder="Masukkan Nama Lengkap...">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="HH-BB-TTTT">
                        </div>
                        <div class="mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                        value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                        value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                        Perempuan
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">No. Handphone</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="+62 8xx xxxx xxxx">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Kelas :</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="Masukkan Kelas ...">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Angkatan :</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Masukkan Angkatan ...">
                                </div>
                                <div class="mb-5">
                                    <label for="formGroupExampleInput2" class="form-label">Alasan :</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="Alasan Bergabung ...">
                                </div>
                                <div class="text-center mt-3">
                                    <a href="#" class="btn btn-success">Kirim Daftar</a>
                                    <div class="col-12 mb-5 shadow-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <br />
    <br />
    <br />
    <br />
@endsection
