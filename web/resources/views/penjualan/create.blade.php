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
            <h1 class="h3 mb-0 text-gray-800">Kelola Penjualan</h1>

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
        <div class="jumbotron1 h-100 mt-5">
            <div class="row text-center">
                <div class="col-md-10">
                    <div class="container-fluid">
                        @if (session()->has('pesanSukses'))
                        <div class="alert alert-success fade show" role="alert">
                            {{ session('pesanSukses') }}
                        </div>
                        @endif
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Penjualan</h6>
                            </div>
                            <div class="card-body">
                                <form action="/create-penjualan" method="POST" enctype="multipart/form-data" id="formTambah">
                                    @csrf
                                    <div class="row mb-1">
                                        <div class="col-md-2 mt-2 mb-1 ms-1"><b>Pembeli</b></div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <select class="form-control" id="exampleFormControlSelect1" name="id"  Required>
                                                    @foreach ($pembelis as $p)
                                                        <option value="{{ $p->id }}">{{ $p->nama_pembeli }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- field input dinamis --}}
                                    <div class="col" id="inputForm">
                                        <div class="row mb-1">
                                            <div class="col-md-2 mt-2 mb-1"><b>Produk</b></div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <select class="form-control" id="exampleFormControlSelect1" name="nama_barang[]"  Required>
                                                        @foreach ($barangs as $b)
                                                            <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <b>Jumlah</b>
                                             </div>
                                             <div class="col-md-3">
                                                <div class="input-group mb-2">
                                                    <input type="number" min="0" class="form-control" id="inlineFormInputGroup" placeholder="" name="jumlah_barang[]" autocomplete="off" value="{{ old('jumlah_barang') }}" Required>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">pcs</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                {{-- <a href="#" class="btn btn-danger" id="removeRow"><i class="bi bi-dash-circle"></i></a> --}}
                                                <button class="btn btn-danger" id="removeRow"><i class="bi bi-dash-circle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- akhir input dinamis --}}
                                    <div id="newRow"></div>
                                        <div class="col">
                                            <button class="btn btn-success" id="addRow"><i class="bi bi-plus-circle"></i></button>
                                            {{-- <a href="#" class="btn btn-success" id="addRow"></a> --}}
                                        </div>
                                    <div class="row justify-content-center">
                                        <div class="col mb-1"><button class="btn btn-danger" type="" onclick="location.href = '/barang'"><i class="bi bi-backspace"></i></button></div>
                                        <div class="col mb-1 ms-2"><button class="btn btn-primary" data-toggle="modal" data-target="#popUpConfirmTambah" ><i class="bi bi-check-circle"></i></button></div>
                                        {{-- <div class="col mb-1 ms-2"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#popUpConfirmTambah" ><i class="bi bi-cart-plus"></i></a></div> --}}
                                    </div>
                                </form>
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
    $(document).ready(function(){
			// Handle click on paging links
			$('.tm-paging-link').click(function(e){
				e.preventDefault();

				var page = $(this).text().toLowerCase();
				$('.tm-gallery-page').addClass('hidden');
				$('#tm-gallery-page-' + page).removeClass('hidden');
				$('.tm-paging-link').removeClass('active');
				$(this).addClass("active");
			});
		});


        $('#addRow').click(function(e){
            e.preventDefault();
            var html = '';
                html+= '<div class="col" id="inputForm">';
                html+= '<div class="row mb-1">';
                html+= '<div class="col-md-2 mt-2 mb-1"><b>Produk</b></div>';
                html+= '<div class="col-md-5">';
                html+= '<div class="form-group">';
                html+= '<select class="form-control" id="exampleFormControlSelect1" name="nama_barang[]"  Required>';
                html+= '@foreach ($barangs as $b)';
                html+= '<option value="{{ $b->id }}">{{ $b->nama_barang }}</option>';
                html+= '@endforeach';
                html+= '</select>';
                html+= '</div>';
                html+= '</div>';

                html+= '<div class="col-md-2 mt-2">';
                html+= '<b>Jumlah</b>';
                html+= '</div>';
                html+= '<div class="col-md-3">';
                html+= '<div class="input-group mb-2">';
                html+= '<input type="number" min="0" class="form-control" id="inlineFormInputGroup" placeholder="" name="jumlah_barang[]" autocomplete="off" value="{{ old('jumlah_barang') }}" Required>';
                html+= '<div class="input-group-append">';
                html+= '<div class="input-group-text">pcs</div>';
                html+= '</div>';
                html+= '</div>';
                html+= '</div>';
                html+= '<div class="col">';
                html+= '<a href="" class="btn btn-danger" id="removeRow"><i class="bi bi-dash-circle"></i></a>';
                html+= '</div>';
                html+= '</div>';
                html+= '</div>';

            $('#newRow').append(html);

        })

        $(document).on('click', '#removeRow', function (e) {
            e.preventDefault();
            $(this).closest('#inputForm').remove();
        });




</script>
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
