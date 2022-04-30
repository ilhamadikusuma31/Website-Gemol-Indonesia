@extends('layouts/main')
@section('isi konten')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Pembeli</h1>

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
                        <a class="btn btn-info mt-1" href="#" data-toggle="modal" data-target="#popUpConfirmTambah">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered display responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            {{-- <th>Gambar:</th> --}}
                                            <th>Nama:</th>
                                            <th>Alamat:</th>
                                            <th>No.Telp:</th>
                                            <th>Dibuat:</th>
                                            <th>Diedit:</th>
                                            <th>Aksi:</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $angka = 1
                                        @endphp
                                        @foreach($pembelis as $p)
                                        <tr>
                                            <td>{{ $angka++}}</td>
                                            <td>{{ $p->nama_pembeli  }}</td>
                                            <td>{{ $p->alamat_pembeli  }}</td>
                                            <td>{{ $p->no_telp_pembeli  }}</td>
                                            <td>{{ $p->created_at  }}</td>
                                            <td>{{ $p->updated_at  }}</td>
                                            <td>
                                                {{-- <a class="btn btn-sm btn-warning mt-1" href="/edit-pembeli/{{ $p->id }}"><i class="bi bi-pencil-square"></i></a> --}}
                                                <a class="btn btn-sm btn-warning mt-1" href="#" data-toggle="modal" data-target="#popUpConfirmEdit{{ $p->id }}"><i class="bi bi-pencil-square"></i></a>
                                                <a class="btn btn-sm btn-danger mt-1" href="#" data-toggle="modal" data-target="#popUpConfirmHapus{{ $p->id }}"><i class="bi bi-trash-fill"></i></a>
                                            </td>
                                        </tr>
                                          <!--  Modal Confirm Edit-->
                                            <div class="modal fade" id="popUpConfirmEdit{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel" value="" >Mengedit <b>{{ucfirst(strtoupper($p->nama_pembeli)) }}</b>?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="editPembeli{{ $p->id }}" action="/edit-pembeli" method="POST" enctype="multipart/form-data" id="formTambah">
                                                                @csrf
                                                                <input type="hidden" name="id" value= "{{ $p->id }}">
                                                                <div class="row mb-1">
                                                                    <div class="col">Nama Pembeli</div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="formGroupExampleInput" name="nama_pembeli" value="{{ old('nama_pembeli',$p->nama_pembeli) }}" autocomplete="off" Required >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <div class="col">Alamat</div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="formGroupExampleInput" name="alamat_pembeli" value="{{ old('alamat_pembeli',$p->alamat_pembeli) }}" autocomplete="off" Required >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <div class="col">No Telp</div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <input type="number" class="form-control" id="formGroupExampleInput" name="no_telp_pembeli" value="{{ old('no_telp_pembeli',$p->no_telp_pembeli) }}" autocomplete="off" Required >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                        <div class="modal-footer" id='modal-footer'>
                                                            {{-- cancel --}}
                                                            <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                                                            {{-- submit --}}
                                                            <button form="editPembeli{{ $p->id }}" class="btn btn-danger">ubah</button>

                                                            {{-- --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          <!--  Modal Confirm Hapus-->
                                            <div class="modal fade" id="popUpConfirmHapus{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel" value="" >yakin mau hapus <b>{{ucfirst(strtoupper($p->nama_pembeli)) }}</b>?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Pilih "hapus" jika kamu yakin.</div>
                                                        <div class="modal-footer" id='modal-footer'>
                                                            {{-- cancel --}}
                                                            <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                                                            {{-- submit --}}
                                                            <form action="/hapus-pembeli/{{ $p->id }}" method="POST">
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
     <!--  Modal Confirm Tambah-->
     <div class="modal fade" id="popUpConfirmTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" value="" >Tambah Pembeli</b>?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="tambahPembeli" action="/create-pembeli" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="id" value= ""> --}}
                        <div class="row mb-1">
                            <div class="col">Nama Pembeli</div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="nama_pembeli" value="{{ old('nama_pembeli') }}" autocomplete="off" Required >
                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">Alamat</div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="alamat_pembeli" value="{{ old('alamat_pembeli') }}" autocomplete="off" Required >
                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">No Telp</div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="no_telp_pembeli" value="{{ old('no_telp_pembeli') }}" autocomplete="off" Required >
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer" id='modal-footer'>
                    {{-- cancel --}}
                    <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                    {{-- submit --}}
                    <button form="tambahPembeli" class="btn btn-danger">tambah</button>

                    {{-- --}}
                </div>
            </div>
        </div>
    </div>

@endsection

