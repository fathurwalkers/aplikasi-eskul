@extends('layouts.client-layout')

@section('tombol-keluar')
    <div class="tombol-keluar mt-2">
        <a href="{{ route('client-prestasi-eskul') }}">
            <i class="bi bi-arrow-left-circle" style="font-size: 2rem; margin-right: 30px;"></i>
        </a>
        <h5 style="display: inline-block;">Prestasi Seni Rupa</h5>
    </div>
@endsection

@section('main-content')
    <div class="container">
        <div class="row mt-4 justify-content-center">

            <div class="col-11 mb-5 shadow-sm">
                <div class="card border-primary mb-3">
                    <img src="{{ asset('assets/client') }}/images/seni.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><b>
                                SMAN 2 Baubau Kembali Juara Umum FLS2N
                            </b>
                        </h5>
                        <p class="card-text">
                            Festival dan Lomba Seni Siswa Nasional (FLS2N) yang diselenggarakan oleh Musyawarah Kerja Kepala Sekolah (MKKS) SMAN se Kota Baubau dan bekerja sama dengan Kepala Cabang Dinas (KCD) Kota Baubau-Busel, SMAN 2 Baubau berhasil meraih juara umum.
                        </p>

                        <p class="card-text">
                                Demikian dikatakan kepala SMAN 2 Baubau, Muh Radi melalui koran ini, Senin (6/5). Ia mengungkapkan, prestasi yang telah diraih oleh siswanya selanjutnya akan mewakili Kota Baubau di tingkat Provinsi Sulawesi Tenggara (Sulra). Mengingat kegiatan FLS2N yang dilaksanakan itu sudah menjadi kegiatan rutinitas setiap tahun dari tingkat kota, provinsi hingga nasional.
                        </p>

                        <p class="card-text">
                            “Alhamdulillah dari berbagai lomba yang diikuti tersebut, SMAN 2 Baubau berhasil menorehkan 10 gelar juara untuk peringkat I, II dan III, sehingga menempatkan SMAN 2 Baubau untuk posisi Juara Umum. Untuk perolehan Juara I diraih siswa dalam lomba Tari Berpasangan, Monolog, Baca Puisi, Desain poster Putra, Desain Poster putri ” jelas Muhammad Radi di ruang kerjanya.
                        </p>

                        <p class="card-text">
                            Ia menambahkan, prestasi yang diraih oleh siswanya itu tidak terlepas dari hasil kerja keras siswa, pelatih dan pembinan serta dukungan dari orang tua siswa. Sehingga merasa bangga dengan hasil yang dicapai oleh siswa SMAN 2 Baubau tahun ini. Sebab siswanya telah mempersembahkan yang terbaik dalam mengikuti FLS2N tahun ini.
                        </p>

                        <p class="card-text">
                            “Kita berharap prestasi FLS2N yang diraih tersebut dapat berlanjut ditingkat propinsi dan Nasional. Sebagai sekolah penyelenggara Tari Berpasangan dan Monolog FLS2N tingkat Kota Baubau, kita telah berupaya semaksimal mungkin untuk kelancaran kegiatan tersebut, dengan memfasilitasi sarana dan prasarana,”tambahnya.
                        </p>

                        <p class="card-text">
                            Sementara itu, Staf Wakil Kepala Sekolah Bidang Kesiswaan Situ Chadija SPd menjelaskan, kegiatan FLS2N tingkat Kota Baubau yang berlangsung pada tanggal 2 -5 Mei 2019 diikuti sebanyak 100 lebih peserta dari SMA /MA Negeri dan Swasta se-Kota Baubau. Ia menyebutkan, cabang lomba yang diperlombakan yakni tari kreasi, solo song, gitar solo, desain poster dan kriya.
                        </p>

                        <p class="card-text">
                            Selain itu, lomba baca puisi, cipta puisi, film pendek dan monolog. Dalam kegiatan mendatangkan juri dari sanggar seni,lembaga seni dan budaya dari Kota Baubau. Lanjut Chadija, FLS2N bertujuan untuk membina dan meningkatkan kreativitas siswa terhadap bidang seni yang berkarakter pada budaya bangsa. Melalui kegiatan FLS2N, akan terwujud siswa SMA yang kreatif, cerdas dan berkarakter melalui penghayatan dan penguasaan seni budaya bangsa.
                        </p>

                        <p class="card-text">
                            “Dalam lomba yang digelar, berhasil terpilih siswa terbaik yang nantinya akan mewakili Baubau dalam lomba yang sama ke tingkat Provinsi Sulawesi Tenggara Mudah-mudahan siswa kita yang akan mewakili kota Baubau nantinya, bisa meraih prestasi yang membanggakan bagi sekolah, khususnya bagi Kota Baubau” tegas Chadija.
                        </p>

                        <p class="card-text">
                            Perlu diketahui, juara I tari terpasangan diraih Melvin Anggun Fazirah dan Anugrah Ananda Nurtika, <br />
                            juara I monolog diraih Fahrunnisa Ilmi,<br />
                            juara I puisi diraih oleh Nabila Sitratin,<br />
                            juara I desain poster putra diraih Wahyu Presetyali putra,juara I desain poster putri Robiati Adawia
                            dan juara II puisi diraih Wa Ode Iqrami Qur’aniah Baziqhoh.
                        </p>

                        <p class="card-text">
                            Termasuk juara II Seni Kriya Putra Indra Rahmawan,<br />
                            juara II Seni Kriya Putri diraih Pertua Nuramdhani,<br />
                            juara III Nyanyi Solo Putra Arya Dimas,<br />
                            juara III Gitar Solo diraih La Arifin<br />
                            , Juara empat Film Pendek diraih olehLukmanul Hakim dan La Ode Farhan.(m2).
                        </p>

                    </div>
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item list-group-item-primary">Seni Rupa SMAN 2 Kota Baubau</li>
                        <li class="list-group-item list-group-item-primary">Tingkat Sekota Baubau</li>
                        <li class="list-group-item list-group-item-primary">2019</li>
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
