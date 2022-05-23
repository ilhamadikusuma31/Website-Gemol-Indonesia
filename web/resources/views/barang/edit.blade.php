@php
$path_web_gemol    = "/";
$path_login        = "login";
$path_logout       = "logout";
$path_registrasi   = "registrasi";
$path_main         = "/admin";
$path_img          = "/img";
$path_vendor       = "/vendor";
$path_css          = "/css";
$path_js           = "/js";
// $path_setting_admin= "setting_admin.php";


$path_ulasan = "/ulasan";
$path_testimoni = "/testimoni";

$path_brg          = "/barang";
$path_pengeluaran  ="/pengeluaran";
$path_export       = "/eksport";

$path_penjualan    ="/penjualan";
$path_pembeli      ="/pembeli";


@endphp
@extends('layouts/main')
@section('isi konten')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
            </div>
            <div class="card-body">
                <form action="/edit-barang" method="POST" enctype="multipart/form-data" id="formEdit">
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
                        <div class="col mb-1"><button class="btn btn-danger" type="reset" onclick="location.href='/barang'"><i class="bi bi-backspace"></i></button></div>
                        <div class="col mb-1"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#popUpConfirmEdit" ><i class="bi bi-check-circle"></i></a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  Modal Confirm Edit-->
    <div class="modal fade" id="popUpConfirmEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">yakin mau ubah data ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih ubah jika kamu yakin.</div>
            <div class="modal-footer" id='modal-footer'>
                {{-- cancel --}}
                <button class="btn btn-success" type="button" data-dismiss="modal">Batal</button>
                {{-- submit --}}
                <button form="formEdit" type="submit" class="btn btn-danger">ubah</button>
                {{-- --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <!-- Bootstrap core JavaScript-->
    <script src ="{{ $path_vendor}}/jquery/jquery.min.js"></script>
    <script src="{{ $path_vendor}}/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ $path_vendor}}/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ $path_js }}/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ $path_vendor }}/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ $path_js }}/demo/chart-area-demo.js"></script>
    <script src="{{ $path_js }}/demo/chart-pie-demo.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ $path_js }}/password-visibility.js"></script>
    {{-- <script src="{{ $path_js }}/script.js"></script> --}}
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.9/css/dataTables.responsive.css"></script>
@endsection


