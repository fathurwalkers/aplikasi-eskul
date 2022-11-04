@extends('layouts.client-layout')

@section('tombol-keluar')
    <div class="tombol-keluar mt-2">
        <a href="{{ route('client') }}">
            <i class="bi bi-arrow-left-circle" style="font-size: 2rem; margin-right: 30px;"></i>
        </a>
        <h5 style="display: inline-block;">Absensi</h5>
    </div>
@endsection

@section('main-content')

    <div class="container">
        <div class="card text-center mb-5 shadow-sm mt-4">
            <div class="card-header">
                Jadwal Absensi
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-11 mb-5 shadow-sm">
                            <div class="card border-primary mb-3">
                                <div class="card-header border-primary card-title font-weight-bold">Marching Band</div>
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Warji Hutagalung</h5>
                                    <p class="card-text h6">latihan Mingguan</p>
                                </div><a href="#" class="btn btn-success">Klik Untuk Absen</a>
                            </div>
                        </div>
                        <div class="col-11 mb-5 shadow-sm">
                            <div class="card border-primary mb-3">
                                <div class="card-header border-primary card-title font-weight-bold">Pramuka</div>
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Rudi Mustofa</h5>
                                    <p class="card-text h6">Camping Mingguan</p>
                                </div><a href="#" class="btn btn-success">Klik Untuk Absen</a>
                            </div>
                        </div>
                        <div class="col-11 mb-5 shadow-sm">
                            <div class="card border-primary mb-3">
                                <div class="card-header border-primary card-title font-weight-bold">Seni Rupa</div>
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Ina Kuswandari</h5>
                                    <p class="card-text h6">Melukis...</p>
                                </div><a href="#" class="btn btn-success">Klik Untuk Absen</a>
                            </div>
                        </div>
                        <div class="col-11 mb-5 shadow-sm">
                            <div class="card border-primary mb-3">
                                <div class="card-header border-primary card-title font-weight-bold">Bahasa Inggris</div>
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Rini Hariyah</h5>
                                    <p class="card-text h6">Grammer</p>
                                </div>
                                <a href="#" class="btn btn-success">Klik Untuk Absen</a>
                            </div>
                        </div>
                        <div class="col-12 mb-5 shadow-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br />
    <br />
    <br />
@endsection
