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

$path_penjualan    ="penjualan/";
$path_pembeli      ="/pembeli";


@endphp
@extends('layouts/main')
@section('isi konten')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola {{ $nama_pembeli }}</h1>

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
                        <a href="/create-penjualan"> <button type="button" class="btn btn-info">Tambah</button></a>
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
                                            <th>Pembeli:</th>
                                            <th>Barang:</th>
                                            <th>Harga:</th>
                                            <th>Jumlah:</th>
                                            <th>Total Harga:</th>
                                            <th>Aksi:</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $angka = 1
                                        @endphp
                                        @foreach($detailpenjualans as $dp)
                                        <tr>
                                            <td>{{ $angka++}}</td>
                                            <td>{{ $dp->created_at }}</td>
                                            <td>{{ $nama_pembeli }}</td>
                                            <td>{{ $dp->Barang->nama_barang}}</td>
                                            <td>{{ $dp->Barang->harga_barang}}</td>
                                            <td>{{ $dp->jumlah_barang}}</td>
                                            <td>{{ $dp->Barang->harga_barang * $dp->jumlah_barang}}</td>

                                            <td>
                                                <a class="btn btn-sm btn-warning mt-1" href="/edit-penjualan" data-toggle="modal" data-target="#popUpConfirmEdit{{ $dp->id }}"><i class="bi bi-pencil-square"></i></a>
                                                <a class="btn btn-sm btn-danger mt-1" href="#" data-toggle="modal" data-target="#popUpConfirmHapus{{ $dp->id }}"><i class="bi bi-trash-fill"></i></a>
                                            </td>
                                        </tr>
                                          <!--  Modal Confirm Edit-->
                                          <div class="modal fade" id="popUpConfirmEdit{{ $dp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel" value="" >Mengedit <b>{{ucfirst(strtoupper($dp->nama_pembeli)) }}</b>?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="editPenjualan{{ $dp->id }}" action="/edit-penjualan" method="POST" enctype="multipart/form-data" id="formTambah">
                                                            @csrf
                                                            <input type="hidden" name="id" value= "{{ $dp->id }}">
                                                            {{-- <input type="hidden" name="penjualan_id" value= "{{ $dp->penjualan_id }}"> --}}
                                                            <div class="row mb-1">
                                                                <div class="col-md-4">Barang</div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="exampleFormControlSelect1" name="barang_id"  Required>
                                                                            @foreach ($barangs as $b)
                                                                                {{-- @if (old($b->id)==$b->id)
                                                                                <option value="{{ $b->id }}" selected>{{ $b->nama_barang}}</option>
                                                                                @else --}}
                                                                                <option value="{{ $b->id }}" {{$dp->barang_id == $b->id  ? 'selected' : ''}}>{{ $b->nama_barang}}</option>
                                                                                {{-- <option value="{{ $b->id }}">{{ $b->nama_barang}}</option> --}}
                                                                                {{-- @endif --}}
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <div class="col-md-4">Jumlah</div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <input type="number" min="0" class="form-control" id="formGroupExampleInput" name="jumlah_barang" value="{{ old('jumlah_barang',$dp->jumlah_barang) }}" autocomplete="off" Required >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer" id='modal-footer'>
                                                        {{-- cancel --}}
                                                        <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                                                        {{-- submit --}}
                                                        <button form="editPenjualan{{ $dp->id }}" class="btn btn-danger">ubah</button>

                                                        {{-- --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                          <!--  Modal Confirm Hapus-->
                                            <div class="modal fade" id="popUpConfirmHapus{{ $dp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel" value="" >yakin mau hapus <b>{{ucfirst(strtoupper($dp->nama_barang)) }}</b>?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Pilih "hapus" jika kamu yakin.</div>
                                                        <div class="modal-footer" id='modal-footer'>
                                                            {{-- cancel --}}
                                                            <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                                                            {{-- submit --}}
                                                            <form action="/hapus-penjualan/detail/{{ $dp->id }}" method="POST">
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


