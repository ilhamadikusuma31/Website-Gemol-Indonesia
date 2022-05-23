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
@extends('layouts.main')
@section('isi konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Ulasan</h1>

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
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered display responsive" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User:</th>
                                        <th>Isi:</th>
                                        <th>Aksi:</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $angka = 1
                                    @endphp
                                    @foreach($ulasans as $t)
                                    <tr>
                                        <td>{{ $angka++}}</td>
                                        <td>{{ $t->user }}</td>
                                        <td>{{ $t->isi_ulasan }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-danger mt-1" href="#" data-toggle="modal" data-target="#popUpConfirmHapus{{ $t->id }}"><i class="bi bi-trash-fill"></i></a>
                                        </td>
                                    </tr>

                                      <!--  Modal Confirm Hapus-->
                                        <div class="modal fade" id="popUpConfirmHapus{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel" value="" >yakin mau hapus <b>{{ucfirst(strtoupper($t->isi_ulasan)) }}</b>?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Pilih "hapus" jika kamu yakin.</div>
                                                    <div class="modal-footer" id='modal-footer'>
                                                        {{-- cancel --}}
                                                        <button class="btn btn-success" type="button" data-dismiss="modal">Batal</button>
                                                        {{-- submit --}}
                                                        <form action="/hapus-ulasan/{{ $t->id }}" method="POST">
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
<script>
    function filePreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("foto");
            preview.src = src;
            preview.style.display = "block";
        }
    }
</script>

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

<script>
    $('.table').DataTable( {
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.childRowImmediate
        }
    }
} );
</script>
@endsection
