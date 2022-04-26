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
                                                <a href="/edit-pengeluaran/{{ $p->id }}"><button type="button" class="btn btn-sm btn-warning mt-1"><i class="bi bi-pencil-square"></i></button></a>
                                                <a data-toggle="modal" data-target="#popUpConfirmHapus{{ $p->id }}" ><button type="button" class="btn btn-sm btn-danger mt-1"><i class="bi bi-trash-fill"></i></button></a>
                                                {{-- <button id= 'deleteBtn' type="button" value="{{ $p->id }}" class="btn btn-sm btn-danger mt-1"><i class="bi bi-trash-fill"></i></button></a> --}}

                                            </td>
                                        </tr>
                                          <!--  Modal Confirm Hapus-->
                                            <div class="modal fade" id="popUpConfirmHapus{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <input type="hidden" name="" id="idPengeluaranDiModal" value="">
                                                        <h5 class="modal-title" id="exampleModalLabel">yakin mau hapus data <b>{{ucfirst(strtoupper($p->nama_pengeluaran)) }}</b><br/> dengan jumlah <b>Rp.{{ $p->total_pengeluaran }}</b>?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Pilih "hapus" jika kamu yakin.</div>
                                                    <div class="modal-footer">
                                                        {{-- cancel --}}
                                                        <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                                                        {{-- submit --}}
                                                        <form action="/hapus-pengeluaran/{{ $p->id }}" method="POST">
                                                            @csrf
                                                            <button class="btn btn-danger">hapus</button>
                                                        </form>
                                                        {{-- --}}
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
    </div>

@endsection






