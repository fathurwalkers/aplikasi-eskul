@extends('layouts.client-layout')

@section('tombol-keluar')
    <div class="tombol-keluar mt-2">
        <a href="{{ route('client-prestasi-eskul') }}">
            <i class="bi bi-arrow-left-circle" style="font-size: 2rem; margin-right: 30px;"></i>
        </a>
        <h5 style="display: inline-block;">Prestasi Bahasa Inggris</h5>
    </div>
@endsection

@section('main-content')
    <div class="container">
        <div class="row mt-4 justify-content-center">

            <div class="col-11 mb-5 shadow-sm">
                <div class="card border-primary mb-3">
                    <img src="{{ asset('assets/client') }}/images/b.inggris.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <b>
                                Siswa SMAN 2 Baubau Tetap Berprestasi di Tengah Pandemi, Kuncinya
                            </b>
                        </h5>
                        <p class="card-text">
                            Pandemi Covid-19 rupanya tidak menghalangi para siswa di SMAN 2 Baubau untuk mendulang prestasi. Di tengah keterbatasan belajar tatap muka, siswa mampu mencetak banyak prestasi di berbagai bidang selama 2021.
                        </p>

                        <p class="card-text">
                            Lebih dari 30 bidang prestasi ditorehkan siswa SMAN 2 Baubau baik tingkat kota, provinsi, maupun nasional. Kuncinya ada pada proses pembinaan oleh guru kepada para siswa.
                        </p>

                        <p class="card-text">
                            “Walaupun pandemi proses pembinaan ekstra kurikuler di sekolah tetap berjalan. Kita tetap jaga diri (dari Covid-19) proses pembinaannya kan tidak banyak, palingan lima orang,” ucap Kepala SMAN 2 Baubau, Hasma Ramli, Selasa (14 Desember 2021).
                        </p>

                        <p class="card-text">
                            Pembinaan kepada para siswa inilah yang dimaksimalkan oleh pihak sekolah dengan tetap menerapkan protokol kesehatan. Misalnya mencuci tangan, memakai masker, dan menjaga jarak. Mekanismenya juga dilakukan secara online dan offline.
                        </p>

                        <p class="card-text">
                            “Guru ditugaskan untuk pembinaan hanya satu atau dua guru, sehingga tidak akan menimbulkan kerumunan. Begitu juga siswa binaan karena diseleksi untuk siswa yang berprestasi dan berkeinginan mengembangkan ilmu dan bakatnya,” jelas Hasma Ramli.
                        </p>

                        <p class="card-text">
                            Beberapa prestasi diraih siswa, seperti Findria Ayu Hadi merebut juara 1 Lomba Orasi Hari Lingkungan tingkat nasional yang diselenggarakan Institute Pertanian Bogor, juara 2 Lomba Pidato Keagamaan Teknokrat di Lampung tingkat nasional, serta Juara 1 Lomba Jejak Tradisi Daerah tingkat provinsi.
                        </p>

                        <p class="card-text">
                            “Aulia Fatmala mendapat juara 1 lomba Debat Bahasa Inggris, menjadi finalis Province Celebes Debating, dan masih banyak lagi prestasi,” tambahnya. (C)
                        </p>


                    </div>
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item list-group-item-primary">Bahasa Inggris SMAN 2 Kota Baubau</li>
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
