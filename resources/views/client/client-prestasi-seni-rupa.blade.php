@extends('layouts.client-layout')

@section('tombol-keluar')
    <div class="tombol-keluar mt-2">
        <a href="{{ route('client-prestasi-eskul') }}">
            <i class="bi bi-arrow-left-circle" style="font-size: 2rem; margin-right: 30px;"></i>
        </a>
        <h5 style="display: inline-block;">Prestasi Pramuka</h5>
    </div>
@endsection

@section('main-content')
    <div class="container">
        <div class="row mt-4 justify-content-center">

            <div class="col-11 mb-5 shadow-sm">
                <div class="card border-primary mb-3">
                    <img src="{{ asset('assets/client') }}/images/pramuka.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><b>
                                SMAN 2 Baubau Kembali Juara Umum FLS2N
                            </b>
                        </h5>
                        <p class="card-text">
                            Pramuka Gugus Depan (Gudep) Jogugu La Arafani Pangkalan SMAN 2 Baubau memperingati hari jadinya yang ke 18, perayaan ini dilaksanakan di lapangan utama SMAN 2 Baubau, Senin (19/9/2022).</p>

                        <p class="card-text">
                            Perayaan hari jadi Gudep Jogugu La Arafani ini dihadiri oleh berbagai pihak, diantaranya Ketua Kwartir Cabang Kota Baubau, seluruh unsur pembina gudep, Mabigus Jogugu La Arafani, Ketua DKC Kota Baubau, dan juga Andalan Kwartir Cabang Kota Baubau.</p>

                        <p class="card-text">
                            Di hari jadi Gudep Jogugu La Arafani yang ke 18 ini, beberapa prestasi yang pernah diraih selama tahun 2022 ikut dipersembahkan, selain itu juga menjadi kado terbaik pada ulang tahun ke 18 ini, 2 orang alumni dari Gudep Jogugu La Arafani berhasil lolos pada penerimaan Akpol tahun 2022 dan Bintara Polri, mereka adalah Mantan Ketua Dewan Ambalan Putra dan Ketua Dewan Ambalan Putri Gudep Jogugu La Arafani.</p>

                        <p class="card-text">
                            Ketua Kwartir Cabang Kota Baubau, Roni Muhtar merasa bangga akan capaian yang telah ditorehkan oleh Gudep ini, menurutnya ini merupakan keberhasilan pembinaan Pramuka di Gudep Jogugu La Arafani, secara umum ia juga merasa bangga akan prestasi dari SMAN 2 Baubau apa lagi Wali Kota Baubau saat ini merupakan Alumni SMAN 2 Baubau.</p>
                    </div>
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item list-group-item-primary">Pramuka SMAN 2 Kota Baubau</li>
                        <li class="list-group-item list-group-item-primary">Tingkat Sekota Baubau</li>
                        <li class="list-group-item list-group-item-primary">2022</li>
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
