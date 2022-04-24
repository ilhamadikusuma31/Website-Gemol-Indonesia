@extends('layouts.main')
@section('isi konten')
    <div class="container-fluid">
        <!-- Form untuk menambah -->
        <!-- nb: kasih att name di tag input agar bisa dikirimkan datanya -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pengeluaran</h6>
            </div>
            <div class="card-body">
                <!-- multipart/form-data : agar file foto bisa diup ke dir -->
                <form action="/create-pengeluaran" method="POST" id="uploadForm">
                    @csrf
                    <div class="row mb-1">
                        <div class="col-md-2">Tanggal pengeluaran</div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="date" class="form-control" id="formGroupExampleInput" name="tanggal_pengeluaran" value="{{ old('tanggal_pengeluaran') }}" autocomplete="off" Required >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">Nama pengeluaran</div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput" name="nama_pengeluaran" value="{{ old('nama_pengeluaran') }}" autocomplete="off" Required >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">
                            Total Pengeluaran
                        </div>
                        <div class="col-md-5">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="" name="total_pengeluaran" autocomplete="off" value="{{ old('total_pengeluaran') }}" Required>
                                <div class="input-group-append">
                                    <div class="input-group-text">,00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-beetween">
                        <div class="col mb-1"><button class="btn btn-danger" type="" onclick="location.href = '/pengeluaran'">Kembali</button></div>
                        <div class="col mb-1"><button class="btn btn-primary" type="submit" name="sbmt" onclick="return confirm('Apakah Anda yakin ingin menambah pengeluaran ini?')">Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
