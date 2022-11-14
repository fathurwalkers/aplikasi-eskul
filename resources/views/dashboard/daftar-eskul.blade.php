@extends('layouts.dashboard-layout')

@section('title', 'Dashboard - Daftar Ekstrakulikuler')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('content-title', 'Dashboard - Daftar Ekstrakulikuler')

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
                                        Daftar Ekstrakulikuler
                                    </b>
                                </h4>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-md btn-info" data-toggle="modal"
                                    data-target="#modaltambah">
                                    Tambah Ekstrakulikuler
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
                                            Tambah Ekstrakulikuler
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('tambah-eskul') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="eskul_nama">Nama Ekstrakulikuler</label>
                                                        <input type="text" class="form-control" id="eskul_nama"
                                                            aria-describedby="emailHelp"
                                                            placeholder="contoh : Olahraga Basket" name="eskul_nama">
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
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($eskul as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>

                                                <td>{{ $item->eskul_nama }}</td>

                                                <td>
                                                    <div class="row">
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                            <button onclick="location.href = '{{ route('lihat-eskul', $item->id) }}';" class="btn btn-sm btn-primary mr-1">Lihat Ekstrakulikuler</button>
                                                            <button onclick="location.href = '{{ route('daftar-nilai', $item->id) }}';" class="btn btn-sm btn-info mr-1">Lihat Nilai</button>
                                                            @if ($users->login_level == "admin")
                                                            {{-- <button href="#" class="btn btn-sm btn-success mr-1">Ubah</button>
                                                            <button href="#" class="btn btn-sm btn-danger">Hapus</button> --}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
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
