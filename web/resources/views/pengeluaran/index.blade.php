@extends('layouts/main')
@section('isi konten')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Pengeluaran</h1>

            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Unduh Rekap</a>
        </div>

        @if (session()->has('pesanSukses'))
        <div class="alert alert-success" role="alert">
            {{ session('pesanSukses') }}
        </div>
        @endif

        <!-- Content Row -->
        <div class="row">
            <div class="col mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="/create-pengeluaran"> <button type="button" class="btn btn-info">Tambah</button></a>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered display responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal:</th>
                                            <th>Nama Pengeluaran:</th>
                                            <th>Total Pengeluaran:</th>
                                            <th>Aksi:</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $angka = 1
                                        @endphp
                                        @foreach($pengeluarans as $p)
                                        <tr>
                                            <td>{{ $angka++}}</td>
                                            <td>{{ $p->tanggal_pengeluaran   }}</td>
                                            <td>{{ $p->nama_pengeluaran   }}</td>
                                            <td>{{ $p->total_pengeluaran   }}</td>
                                            <td>
                                                <a href="/edit-pengeluaran/{{ $p->id }}"><button type="button" class="btn btn-sm btn-warning mt-1">edit⠀</button></a>

                                                <form action="/hapus-pengeluaran/{{ $p->id }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm mt-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">hapus</button>
                                                </form>
                                                {{-- <a href="#" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')"><button type="button" class="btn btn-danger btn-sm mt-1">hapus</button></a> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $pengeluarans->sum('total_pengeluaran') }}</td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




