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
                            <h4>
                                <b>
                                    Daftar Jadwal Ekstrakulikuler
                                </b>
                            </h4>
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
                                                <td>{{ date("d-m-Y", strtotime($item->jadwal_waktu)) }}</td>
                                                <td>{{ date("H:i", strtotime($item->jadwal_waktu)) }}</td>

                                                <td>
                                                    <div class="row">
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                            <button onclick="location.href = '#';" class="btn btn-sm btn-primary mr-1">Lihat</button>
                                                            @if ($users->login_level == "admin")
                                                            <button href="#" class="btn btn-sm btn-success mr-1">Ubah</button>
                                                            <button href="#" class="btn btn-sm btn-danger">Hapus</button>
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
