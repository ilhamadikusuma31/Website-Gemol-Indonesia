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

<div class="row">
    <div class="col mb-4">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered display responsive" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar:</th>
                                <th>Nama:</th>
                                <th>Jenis:</th>
                                <th>Berat(gr):</th>
                                <th>Harga:</th>
                                <th>Status:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $angka = 1
                            @endphp
                            @foreach($barangs as $b):
                            <tr>
                                <td>{{ $angka++}}</td>
                                {{-- <td><img src="/laravel/storage/app/public/{{ $b->foto_barang }}" alt="" width="150px"></td> --}}
                                <td><img src="{{ asset('storage/'.$b->foto_barang) }}" alt="" width="150px"></td>
                                <td>{{ $b['nama_barang']   }}</td>
                                <td>{{ $b->JenisBarang->nama_jenis_barang }}  </td>
                                <td>{{ $b['berat_barang']  }}</td>
                                <td>{{ $b['harga_barang']  }}</td>
                                <td>{{ $b->StatusBarang->nama_status_barang }}</td>
                            </tr>
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

    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                {extend: 'copy', className: "btn btn-primary ms-1 bi bi-clipboard"},
                {extend: 'excel', className: "btn btn-primary bi bi-file-earmark-spreadsheet"},
                {extend: 'pdf', className: "btn btn-primary bi bi-file-earmark-pdf"},
                {extend: 'print', className: "btn btn-primary bi bi-printer"},
                // 'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

@endsection
