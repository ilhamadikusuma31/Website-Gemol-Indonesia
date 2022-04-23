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
                <form action="" method="POST" enctype="multipart/form-data" id="uploadForm">

                    <div class="row mb-1">
                        <div class="col-md-2 preview">
                            <img src="" alt="" id="foto" width="200px">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">Foto</div>
                        <div class="col-md-5"><div class="form-group">
                            <input type="file" class="form-control-file" id="foto" name="foto_brg" accept="image/*" onchange="filePreview(event);" Required>
                        </div></div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">Nama Barang</div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput" name="nama_brg" autocomplete="off" Required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">
                            Jenis Barang
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="jenis_brg" Required>
                                @foreach ($jenisBarang as $jb)
                                    <option value="">{{ $jb['nama_jenis_barang'] }}</option>
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
                                <input type="number" min=0 class="form-control" id="inlineFormInputGroup" placeholder="" name="berat_brg" autocomplete="off" Required>
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
                                <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="" name="harga_brg" autocomplete="off" Required>
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
                            <select class="form-control" id="exampleFormControlSelect1" name="status_brg" Required>
                                @foreach ($statusBarang as $sb)
                                    <option value="">{{ $sb['nama_status_barang'] }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-beetween">
                        <div class="col mb-1"><button class="btn btn-danger" type="" onclick="location.href = '/barang'">Kembali</button></div>
                        <div class="col mb-1"><button class="btn btn-primary" type="submit" name="sbmt" onclick="return confirm('Apakah Anda yakin ingin menambah barang ini?')">Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
