@extends('layouts/main')
@section('isi konten')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
            </div>
            <div class="card-body">
                <form action="/edit-barang" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $barangYgMauDiedit->id}}">
                    <input type="hidden" name="foto_barang_lama" value="{{ $barangYgMauDiedit->foto_barang }}">
                    <div class="row mb-1">
                        <div class="col-md-2 preview">
                            <img src="{{ asset('storage/'.$barangYgMauDiedit->foto_barang) }}" alt="" id="foto" width="200px">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">Foto</div>
                        <div class="col-md-5"><div class="form-group">
                            <input type="file" class="form-control-file
                            @error('foto_barang')
                                is-invalid
                            @enderror" id="foto" name="foto_barang" accept="image/*" onchange="filePreview(event);">
                            @error('foto_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div></div>
                    </div>
                    {{-- <div class="row mb-1">
                        <div class="col-md-2">Foto</div>
                        <div class="col">
                            <img src="{{ asset('storage/'.$barangYgMauDiedit->foto_barang) }}" width="200px" alt="">
                        </div>
                    </div> --}}
                    {{-- <div class="row mb-1">
                    <div class="col-md-2">Upload Foto</div>
                        <div class="col-md-5"><div class="form-group">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto_barang" value="{{ $barangYgMauDiedit->foto_barang }}">
                        </div></div>
                    </div> --}}
                    <div class="row mb-1">
                        <div class="col-md-2">Nama Barang</div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput" name="nama_barang"  autocomplete="off" value="{{ old('nama_barang',$barangYgMauDiedit->nama_barang) }}" Required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">
                            Jenis Barang
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="jenis_barang_id" Required>
                                @foreach ($jenisBarang as $jb)
                                    @if (old($jb->id)==$jb->id)
                                        <option value="{{ $jb->id }}" selected>{{ $jb->nama_jenis_barang }}</option>
                                    @else
                                        <option value="{{ $jb->id }}">{{ $jb->nama_jenis_barang }}</option>
                                    @endif
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
                                <input type="number" min=0 class="form-control" id="inlineFormInputGroup" name="berat_barang" value="{{ old('berat_barang', $barangYgMauDiedit->berat_barang) }}" autocomplete="off" Required>
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
                                <input type="number" class="form-control" id="inlineFormInputGroup" name="harga_barang" value="{{ $barangYgMauDiedit->harga_barang}}" autocomplete="off" Required>
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
                                    @if (old($sb->id, $barangYgMauDiedit->id)==$sb->id)
                                    <option value="{{ $sb->id }}" selected>{{ $sb->nama_status_barang }}</option>
                                    @else
                                    <option value="{{ $sb->id }}">{{ $sb->nama_status_barang }}</option>
                                    @endif
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-beetween">
                    <div class="col mb-1"><button class="btn btn-danger" type="reset" onclick="location.href='/barang'">Kembali</button></div>
                        <div class="col mb-1"><button class="btn btn-primary" type="submit" name="sbmt" onclick="return confirm('Apakah Anda yakin ingin mengubah barang ini?')">Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
