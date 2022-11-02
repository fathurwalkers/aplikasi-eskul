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
        <div class="row row-cols-2 row-cols-2 mt-4">

            @foreach ($eskul as $item)
                <div class="col-6 mb-5 shadow-sm">
                    <div class="card border-primary h-100 text-right">
                        <img src="{{ asset('assets') }}/{{ $item->eskul_gambar }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h6 class="card-title font-weight-bold">{{ $item->eskul_nama }}</h6>
                            <a href="{{ route('client-mendaftar-eskul', $item->id) }}" class="btn btn-primary btn-sm">Daftar</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <br />
    <br />
    <br />
@endsection
