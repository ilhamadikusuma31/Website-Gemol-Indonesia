@extends('layouts.main')
@section('isi konten')
    <div class="container-fluid">
        <!-- Form untuk menambah -->
        <!-- nb: kasih att name di tag input agar bisa dikirimkan datanya -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
            </div>
            <div class="card-body">
                <!-- multipart/form-data : agar file foto bisa diup ke dir -->
                <form action="/create-barang" method="POST" enctype="multipart/form-data" id="formTambah">
                    @csrf
                    <div class="row mb-1">
                        <div class="col-md-2 preview">
                            <img src="" alt="" id="foto" width="200px">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">Foto</div>
                        <div class="col-md-5"><div class="form-group">
                            <input type="file" class="form-control-file
                            @error('foto_barang')
                                is-invalid
                            @enderror"
                            id="foto" name="foto_barang" accept="image/*" onchange="filePreview(event);" Required>
                            @error('foto_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div></div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">Nama Barang</div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput" name="nama_barang" value="{{ old('nama_barang') }}" autocomplete="off" Required >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">
                            Jenis Barang
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="jenis_barang_id"  Required>
                                @foreach ($jenisBarang as $jb)
                                    <option value="{{ $jb->id }}">{{ $jb->nama_jenis_barang }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">
                            Berat Barang
                        </div>
                        <div class="col-md-5">
                            <div class="input-group mb-2">
                                <input type="number" min=0 class="form-control" id="inlineFormInputGroup" placeholder="" name="berat_barang"  autocomplete="off" value="{{ old('berat_barang') }}" Required>
                                <div class="input-group-append">
                                    <div class="input-group-text">gram</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">
                            Harga Barang
                        </div>
                        <div class="col-md-5">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="" name="harga_barang" autocomplete="off" value="{{ old('harga_barang') }}" Required>
                                <div class="input-group-append">
                                    <div class="input-group-text">,00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">
                            Status
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="status_barang_id" Required>
                                @foreach ($statusBarang as $sb)
                                    <option value="{{ $sb->id }}">{{ $sb->nama_status_barang }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col mb-1"><button class="btn btn-danger" type="" onclick="location.href = '/barang'"><i class="bi bi-backspace"></i></button></div>
                        <div class="col mb-1 ms-2"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#popUpConfirmTambah" ><i class="bi bi-plus-circle"></i></a></div>
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
                <h5 class="modal-title" id="exampleModalLabel">yakin mau tambah data ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Tambah" jika kamu yakin.</div>
            <div class="modal-footer" id='modal-footer'>
                {{-- cancel --}}
                <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                {{-- submit --}}
                <button form="formTambah" type="submit" class="btn btn-danger">Tambah</button>
                {{-- --}}
            </div>
        </div>
    </div>
</div>
@endsection

