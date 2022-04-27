@extends('layouts.main')
@section('isi konten')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pengeluaran</h6>
            </div>
            <div class="card-body">
                <form action="/edit-pengeluaran" method="POST" id="formEdit">
                    @csrf
                    <input type="hidden" name="id" value="{{ $pengeluaranYgMauDiedit->id }}">
                    <div class="row mb-1">
                        <div class="col-md-3">Tanggal pengeluaran</div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="date" class="form-control" id="formGroupExampleInput" name="tanggal_pengeluaran" value="{{ old('tanggal_pengeluaran', $pengeluaranYgMauDiedit->tanggal_pengeluaran) }}" autocomplete="off" Required >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-3">Nama pengeluaran</div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput" name="nama_pengeluaran" value="{{ old('nama_pengeluaran', $pengeluaranYgMauDiedit->nama_pengeluaran) }}" autocomplete="off" Required >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1" >
                        <div class="col-md-3">
                            Total Pengeluaran
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="" name="total_pengeluaran" autocomplete="off" value="{{ old('total_pengeluaran', $pengeluaranYgMauDiedit->total_pengeluaran) }}" Required>
                                <div class="input-group-append">
                                    <div class="input-group-text">,00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-3">
                            <p></p>
                        </div>
                        <div class="col">
                                <a href="/pengeluaran" class="btn btn-danger"><i class="bi bi-backspace"></i></a>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#popUpConfirmTambah" ><i class="bi bi-plus-circle"></i></a>
                        </div>
                        <div class="col-md-3">
                            <p></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!--  Modal Confirm Tambah-->
        <div class="modal fade" id="popUpConfirmTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">yakin mau ubah data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Ubah" jika kamu yakin.</div>
                <div class="modal-footer" id='modal-footer'>
                    {{-- cancel --}}
                    <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                    {{-- submit --}}
                    <button form="formEdit" type="submit" class="btn btn-danger">Ubah</button>
                    {{-- --}}
                </div>
            </div>
        </div>
    </div>
@endsection
