@extends('layouts.dashboard-layout')

@section('title', 'Dashboard - Daftar Siswa')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('content-title', 'Dashboard - Daftar Siswa')

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
                                    Daftar Siswa - Eskul ({{ $eskul->eskul_nama }})
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
                                            <th>Nama</th>
                                            <th>NISN</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No. Telepon</th>
                                            <th>Status</th>
                                            <th>Kelas</th>
                                            <th>Ekstrakulikuler</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->siswa_nama }}</td>
                                                <td>{{ $item->siswa_nisn }}</td>
                                                <td>
                                                    @switch($item->siswa_jeniskelamin)
                                                        @case("L")
                                                            Laki - Laki
                                                            @break
                                                        @case("P")
                                                            Perempuan
                                                            @break
                                                    @endswitch
                                                </td>
                                                <td>{{ $item->siswa_telepon }}</td>
                                                <td>{{ $item->siswa_status }}</td>
                                                <td>{{ $item->kelas->kelas_nama }}</td>
                                                @if ($item->eskul_id == NULL)
                                                    <td>Belum Terdaftar</td>
                                                @else
                                                    <td>{{ $item->eskul->eskul_nama }}</td>
                                                @endif
                                                <td>
                                                    <div class="row">
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                            <button class="btn btn-sm btn-primary mr-1">Lihat</button>
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
