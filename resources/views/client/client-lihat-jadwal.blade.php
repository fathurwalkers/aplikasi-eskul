@extends('layouts.client-layout')

@section('tombol-keluar')
    <div class="tombol-keluar mt-2">
        <a href="{{ route('client-daftar-jadwal') }}">
            <i class="bi bi-arrow-left-circle" style="font-size: 2rem; margin-right: 30px;"></i>
        </a>
        <h5 style="display: inline-block;">Jadwal Ekstrakulikuler - {{ $eskul->eskul_nama }}</h5>
    </div>
@endsection

@section('main-content')
    <div class="container">
        <div class="row mt-4 justify-content-center">

            @foreach ($jadwal as $items)
            <div class="col-11 mb-5 shadow-sm">
                <div class="card border-primary mb-3">
                    <div class="card-header border-primary card-title font-weight-bold">{{ date("D", strtotime($items->jadwal_waktu)) }}, {{ date("d M Y", strtotime($items->jadwal_waktu)) }}</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">{{ $items->jadwal_tempat }}</h5>
                        <p class="card-text h6">
                            {{ $items->jadwal_keterangan }}
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-primary">{{ date("H:i", strtotime($items->jadwal_waktu)) }}</div>
                </div>
            </div>
            @endforeach

        </div>

        <br />
        <br />
        <br />
    @endsection
