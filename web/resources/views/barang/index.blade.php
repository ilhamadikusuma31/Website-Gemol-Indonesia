@extends('layouts/main')
@section('isi konten')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Barang</h1>

            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Unduh Rekap</a>
        </div>

        @if (session()->has('pesanSukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('pesanSukses') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <!-- Content Row -->
        <div class="row">
            <div class="col mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="/create-barang"> <button type="button" class="btn btn-info">Tambah</button></a>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered display responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar:</th>
                                            <th>Nama:</th>
                                            <th>Jenis:</th>
                                            <th>Berat(gr):</th>
                                            <th>Harga:</th>
                                            <th>Status:</th>
                                            <th>Aksi:</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $angka = 1
                                        @endphp
                                        @foreach($barangs as $b)
                                        <tr>
                                            <td>{{ $angka++}}</td>
                                            <td><img src="{{ asset('storage/'.$b->foto_barang) }}" alt="" width="150px"></td>
                                            <td>{{ $b['nama_barang']   }}</td>
                                            <td>{{ $b->JenisBarang->nama_jenis_barang }}  </td>
                                            <td>{{ $b['berat_barang']  }}</td>
                                            <td>{{ $b['harga_barang']  }}</td>
                                            <td>{{ $b->StatusBarang->nama_status_barang }}</td>
                                            <td>
                                                <a href="/edit-barang/{{ $b->id }}"><button type="button" class="btn btn-sm btn-warning mt-1">edit⠀</button></a>
                                                <a data-toggle="modal" data-target="#popUpConfirmHapus" ><button type="button" class="btn btn-sm btn-danger mt-1">hapus</button></a>
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
    </div>
    <!--  Modal Confirm Hapus-->
    <div class="modal fade" id="popUpConfirmHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">yakin mau hapus data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "hapus" jika kamu yakin.</div>
                <div class="modal-footer">
                    {{-- cancel --}}
                    <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                    {{-- submit --}}
                    <form action="/hapus-barang/{{ $b->id }}" method="POST">
                        @csrf
                        <button class="btn btn-danger">hapus</button>
                    </form>
                    {{-- --}}
                </div>
            </div>
        </div>
    </div>
@endsection



