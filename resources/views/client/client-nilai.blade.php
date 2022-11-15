@extends('layouts.client-layout')

@section('tombol-keluar')
    <div class="tombol-keluar mt-2">
        <a href="{{ route('client') }}">
            <i class="bi bi-arrow-left-circle" style="font-size: 2rem; margin-right: 30px;"></i>
        </a>
        <h5 style="display: inline-block;">Daftar Nilai</h5>
    </div>
@endsection

@section('main-content')
    <div class="row mt-1 mb-1">
        <div class="col-sm-12 col-md-12 col-lg-12">
            @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row mt-4 justify-content-center">

            <div class="col-11 mb-5 shadow-sm">
                <div class="card border-primary mb-3">
                    <div class="card-header">
                        {{ $eskul->eskul_nama }}
                    </div>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-info col-8 ">Absensi</li>
                        <li class="list-group-item col-4 text-center">{{ $nilai->nilai_absen }}</li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-info col-8">Prestasi</li>
                        <li class="list-group-item col-4 text-center">{{ $nilai->nilai_prestasi }}</li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-info col-8">Total Nilai</li>
                        <li class="list-group-item col-4 text-center">{{ $nilai->nilai_total }}</li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-info col-8">Grade</li>
                        <li class="list-group-item col-4 text-center">{{ $nilai->nilai_grade }}</li>
                    </ul>
                </div>
            </div>

            <div class="col-12 mb-5 shadow-sm">
            </div>
        </div>
    </div>

    <br />
    <br />
    <br />
@endsection
