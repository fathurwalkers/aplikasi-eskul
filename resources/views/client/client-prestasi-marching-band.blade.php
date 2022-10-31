@extends('layouts.client-layout')

@section('tombol-keluar')
    <div class="tombol-keluar mt-2">
        <a href="{{ route('client-prestasi-eskul') }}">
            <i class="bi bi-arrow-left-circle" style="font-size: 2rem; margin-right: 30px;"></i>
        </a>
        <h5 style="display: inline-block;">Prestasi Marching Band</h5>
    </div>
@endsection

@section('main-content')
    <div class="container">
        <div class="row mt-4 justify-content-center">

            <div class="col-11 mb-5 shadow-sm">
                <div class="card border-primary mb-3">
                    <img src="{{ asset('assets/client') }}/images/mband.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><b>Upacara HUT Baubau, Marching Band SMAN 2 Baubau Tampil Memukau, Tuai Sorakan dan Tepuk Tangan</b></h5>
                        <p class="card-text">
                            Rangkaian upacara HUT ke-20 Kota Baubau, Marching Band Sekolah Menengah Atas Negeri atau SMAN 2 Baubau tampil memukau memikat peserta upacara.</p>

                        <p class="card-text">
                            Sejumlah pelajar SMAN 2 Baubau itu tampil apik membuat para peserta upacara dan warga menonton terpukau menonton atraksi anggota marching band tersebut.</p>

                        <p class="card-text">
                                Para pelajar SMAN 2 Baubau selain memainkan alat marching band hampir 6 menit, anggota marching band itu turut melakukan gerakan-gerakan atraksi.</p>

                        <p class="card-text">
                            Usai memainkan marching band, puluhan siswa siswi SMAN 2 Baubau menerima tepukan tangan dan sorakan meriah dari tamu mimbar dan penonton.</p>
                    </div>
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item list-group-item-primary">Marching Band Smada IV</li>
                        <li class="list-group-item list-group-item-primary">Tingkat Sekota Baubau</li>
                        <li class="list-group-item list-group-item-primary">2021</li>
                    </ul>
                </div>
            </div>

            <div class="col-12 mb-5 shadow-sm">
            </div>
        </div>

        <br />
        <br />
        <br />
    @endsection
