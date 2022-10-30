@extends('layouts.client-layout')

@section('tombol-keluar')
    <div class="tombol-keluar mt-2">
        <a href="{{ route('client') }}">
            <i class="bi bi-arrow-left-circle" style="font-size: 2rem; margin-right: 30px;"></i>
        </a>
        <h5 style="display: inline-block;">Kegiatan Ekstrakulikuler</h5>
    </div>
@endsection

@section('main-content')
    <div class="container">
        <div class="row mt-4  justify-content-center">

            @foreach ($eskul as $items)
            <div class="col-11 mb-5 shadow-sm">
                <div class="card border-primary h-100 text-right">
                    <img src="{{ asset('assets') }}/{{ $items->eskul_gambar }}" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h6 class="card-title font-weight-bold">{{ $items->eskul_nama }}</h6>
                        <a href="kegiatanMarching.html" class="btn btn-primary btn-sm">Lihat kegiatan</a>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- <div class="col-11 mb-5 shadow-sm">
                <div class="card border-success h-100 text-right">
                    <img src="{{ asset('assets/client') }}/images/pramuka.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h6 class="card-title font-weight-bold">Pramuka</h6>
                        <a href="kegiatanPramuka.html" class="btn btn-success btn-sm">Lihat kegiatan</a>
                    </div>
                </div>
            </div>
            <div class="col-11 mb-5 shadow-sm">
                <div class="card border-warning h-100 text-right">
                    <img src="{{ asset('assets/client') }}/images/seni.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h6 class="card-title font-weight-bold">Seni Rupa</h6>
                        <a href="kegiatanSeni.html" class="btn btn-warning btn-sm">Lihat kegiatan</a>
                    </div>
                </div>
            </div>
            <div class="col-11 mb-5 shadow-sm">
                <div class="card border-danger h-100 text-right">
                    <img src="{{ asset('assets/client') }}/images/b.inggris.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h6 class="card-title font-weight-bold">Bahasa Inggris</h6>
                        <a href="kegiatanBing.html" class="btn btn-danger btn-sm">Lihat kegiatan</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <br />
    <br />
    <br />

@endsection
