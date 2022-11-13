@extends('layouts.dashboard-layout')

@section('title', 'Dashboard - Daftar Jadwal Ekstrakulikuler')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('content-title', 'Dashboard - Daftar Jadwal Ekstrakulikuler')

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
                                        Daftar Jadwal Ekstrakulikuler
                                    </b>
                                </h4>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-md btn-info" data-toggle="modal"
                                    data-target="#modaltambah">
                                    Tambah Jadwal
                                </button>
                            </div>
                        </div>

                        {{-- MODAL TAMBAH DATA JADWAL --}}
                        <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelLogout">
                                            Tambah Jadwal
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('tambah-jadwal') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tempat Kegiatan</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp"
                                                            placeholder="contoh : Gedung A SMADA" name="jadwal_tempat">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Ekstrakulikuler</label>
                                                        <select class="form-control" id="exampleFormControlSelect1"
                                                            name="eskul_id">

                                                            @foreach ($eskul as $j)
                                                                <option value="{{ $j->id }}">{{ $j->eskul_nama }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Keterangan</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="jadwal_keterangan"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Tanggal</label>
                                                        <input type="date" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp"
                                                             name="jadwal_tanggal">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Waktu</label>
                                                        <input type="time" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp"
                                                             name="jadwal_waktu">
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

                        <hr />
                        <div class="row">
                            <div class="table-responsive">
                                <table id="example" class="display table-bordered" style="width:100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th>Ekstrakulikuler</th>
                                            <th>Tempat</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwal as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>

                                                <td>{{ $item->eskul->eskul_nama }}</td>
                                                <td>{{ $item->jadwal_tempat }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->jadwal_waktu)) }}</td>
                                                <td>{{ date('H:i', strtotime($item->jadwal_waktu)) }}</td>

                                                <td>
                                                    <div class="row">
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                            <button onclick="location.href = '{{ route('lihat-absen', $item->id) }}';"
                                                                class="btn btn-sm btn-primary mr-1">Lihat Absen</button>
                                                            @if ($users->login_level == 'admin')
                                                                <button href="#"
                                                                    class="btn btn-sm btn-success mr-1">Ubah</button>
                                                                <button href="#" class="btn btn-sm btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#hapusModal{{ $item->id }}">Hapus</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- MODAL HAPUS  --}}
                                            <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">Konfirmasi
                                                                Tindakan Penghapusan!</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin ingin menghapus Data Jadwal Ekstrakulikuler
                                                                <b>{{ $item->eskul->eskul_nama }}</b> di
                                                                <b>{{ $item->jadwal_tempat }}</b> ini ?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <form action="{{ route('hapus-jadwal', $item->id) }}"
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
