@extends('layouts.dashboard-layout')

@section('title', 'Dashboard - Daftar Pembina')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('content-title', 'Dashboard - Daftar Pembina')

{{-- ------------------- main content ------------------- --}}
@section('main-content')

    <div class="row mt-1 mb-1">
        <div class="col-sm-12 col-md-12 col-lg-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <h4>
                                    <b>
                                        Daftar Pembina
                                    </b>
                                </h4>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-md btn-info" data-toggle="modal"
                                    data-target="#modaltambah">
                                    Tambah Pembina
                                </button>
                            </div>

                            {{-- MODAL TAMBAH DATA SISWA --}}
                            <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabelLogout">
                                                Tambah Siswa
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('tambah-pembina') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="pembina_nama">Nama Pembina</label>
                                                            <input type="text" class="form-control" id="pembina_nama"
                                                                aria-describedby="emailHelp" placeholder="" name="pembina_nama">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="pembina_nip">NIP</label>
                                                            <input type="text" class="form-control" id="pembina_nip"
                                                                aria-describedby="emailHelp" placeholder="" name="pembina_nip">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="pembina_telepon">No. HP / Telepon</label>
                                                            <input type="text" class="form-control" id="pembina_telepon"
                                                                aria-describedby="emailHelp" placeholder=""
                                                                name="pembina_telepon">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="input-group-text" for="eskul_id">Kelas</label>
                                                            <select class="form-control" id="eskul_id" name="eskul_id">
                                                                @foreach ($eskul as $esc)
                                                                    <option value="{{ $esc->id }}">{{ $esc->eskul_nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <img id="output_image" class="border border-1" />
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlFile1">Foto : </label>
                                                            <input type="file" class="form-control-file"
                                                                onchange="preview_image(event)" name="foto">
                                                            <small class="form-text text-muted">Upload Pas Foto ekstensi
                                                                .jpg</small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="input-group-text" for="pembina_jeniskelamin">Jenis
                                                                Kelamin</label>
                                                            <select class="form-control" id="pembina_jeniskelamin"
                                                                name="pembina_jeniskelamin">
                                                                <option value="L">Laki-Laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="pembina_alamat">Alamat</label>
                                                            <input type="text" class="form-control" id="pembina_alamat"
                                                                aria-describedby="emailHelp"
                                                                placeholder="contoh : Jl. Bakti Abri" name="pembina_alamat">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="input-group-text" for="pembina_jabatan_organik">Jabatan Organik</label>
                                                            <select class="form-control" id="pembina_jabatan_organik"
                                                                name="pembina_jabatan_organik">
                                                                <option value="Staff Wakasek Kesiswaaan">Staff Wakasek Kesiswaaan</option>
                                                                <option value="Staff Sarana Prasana">Staff Sarana Prasana</option>
                                                                <option value="Staff Kurikulum">Staff Kurikulum</option>
                                                                <option value="Guru">Guru</option>
                                                                <option value="GTT">GTT</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="input-group-text" for="pembina_jabatan_kegiatan">Jabatan Kegiatan</label>
                                                            <select class="form-control" id="pembina_jabatan_kegiatan"
                                                                name="pembina_jabatan_kegiatan">
                                                                <option value="Pembina">Pembina</option>
                                                                <option value="Panitia">Panitia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info"
                                                    data-dismiss="modal">Batalkan</button>
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <hr />
                        <div class="row">
                            <div class="table-responsive">
                                <table id="example" class="display table-bordered" style="width:100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jabatan Organik</th>
                                            <th>Jabatan Kegiatan</th>
                                            <th>No. Telepon</th>
                                            <th>Ekstrakulikuler</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembina as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->pembina_nama }}</td>
                                                <td>{{ $item->pembina_nip }}</td>
                                                <td>{{ $item->pembina_jabatan_organik }}</td>
                                                <td>{{ $item->pembina_jabatan_kegiatan }}</td>
                                                <td>{{ $item->pembina_telepon }}</td>
                                                @if ($item->eskul_id == null)
                                                    <td>Belum Terdaftar</td>
                                                @else
                                                    <td>{{ $item->eskul->eskul_nama }}</td>
                                                @endif
                                                <td>
                                                    <div class="row">
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                            <button data-toggle="modal"
                                                            data-target="#modallihat{{ $item->id }}"
                                                            class="btn btn-sm btn-primary mr-1">Lihat</button>
                                                            @if ($users->login_level == 'admin')
                                                                <button data-toggle="modal"
                                                                data-target="#modalubahpembina{{ $item->id }}"
                                                                class="btn btn-sm btn-success mr-1">Ubah</button>
                                                                <button data-toggle="modal"
                                                                data-target="#hapusModal{{ $item->id }}"
                                                                class="btn btn-sm btn-danger">Hapus</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- MODAL LIHAT --}}
                                            <div class="modal fade" id="modallihat{{ $item->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                Data Siswa - {{ $item->siswa_nama }}
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row border-1">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                                    <img src="{{ asset('assets') }}/{{ $item->pembina_foto }}" alt="" width="150px">
                                                                </div>
                                                            </div>
                                                            <br />
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <p>
                                                                        Nama : {{ $item->pembina_nama }} <br>
                                                                        NISN : {{ $item->pembina_nip }} <br>
                                                                        Esktrakulikuler : {{ $item->eskul->eskul_nama }} <br>
                                                                        Jabatan Organik : {{ $item->pembina_jabatan_organik }} <br>
                                                                        Jabatan Kegiatan : {{ $item->pembina_jabatan_kegiatan }} <br>
                                                                        Jenis Kelamin :
                                                                        @switch($item->pembina_jeniskelamin)
                                                                            @case("L")
                                                                                Laki - Laki
                                                                                @break
                                                                            @case("P")
                                                                                Perempuan
                                                                                @break
                                                                        @endswitch <br>
                                                                        No. HP / Telepon : {{ $item->pembina_telepon }} <br>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning"
                                                                data-dismiss="modal">Batalkan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- END MODAL LIHAT --}}

                                            {{-- MODAL HAPUS --}}
                                            <div class="modal fade" id="hapusModal{{ $item->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                Konfirmasi
                                                                Tindakan Penghapusan!</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin ingin menghapus Data Siswa
                                                                {{ $item->pembina_nama }} ?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <form action="{{ route('hapus-pembina', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="logoutrequest">
                                                                <button type="button" class="btn btn-warning"
                                                                    data-dismiss="modal">Batalkan</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Hapus</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- END MODAL HAPUS --}}


                                            {{-- MODAL UBAH --}}
                                            <div class="modal fade" id="modalubahpembina{{ $item->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                Ubah Data Pembina
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('post-ubah-pembina', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">

                                                                <div class="row">
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="pembina_nama">Nama</label>
                                                                            <input type="text"
                                                                                class="form-control"
                                                                                id="pembina_nama"
                                                                                aria-describedby="emailHelp"
                                                                                name="pembina_nama"
                                                                                value="{{ $item->pembina_nama }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="pembina_telepon">No.
                                                                                Telepon</label>
                                                                            <input type="text"
                                                                                class="form-control"
                                                                                id="pembina_telepon"
                                                                                aria-describedby="emailHelp"
                                                                                name="pembina_telepon"
                                                                                value="{{ $item->pembina_telepon }}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-info"
                                                                    data-dismiss="modal">Batalkan</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">Ubah</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- END MODAL UBAH --}}


                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
{{-- ------------------- end main content ------------------- --}}

@push('js')
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
