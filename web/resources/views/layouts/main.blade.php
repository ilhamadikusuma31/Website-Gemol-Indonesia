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

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | {{ $judul }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ $path_vendor }}/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ $path_css }}/style-admin.css" rel="stylesheet">
    <link href="{{ $path_css }}/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="shortcut icon" href="{{ $path_img }}/Logo_Mitra_lingkaran.png">

    <!-- Bootstrap core JavaScript-->
    <script src ="{{ $path_vendor}}/jquery/jquery.min.js"></script>
    <script src="{{ $path_vendor}}/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ $path_vendor}}/jquery-easing/jquery.easing.min.js"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('partials/sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- navbar -->
                @include('partials/navbar')
                <!-- End of navbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                @yield('isi konten')
                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PPLAM F5 ({{ Illuminate\Support\Carbon::now()->format('Y') }})</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
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
     {{-- <script src="{{ $path_js }}/demo/chart-area-demo.js"></script> --}}
     {{-- <script src="{{ $path_js }}/demo/chart-pie-demo.js"></script> --}}



     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <script src="{{ $path_js }}/password-visibility.js"></script>
     {{-- <script src="{{ $path_js }}/script.js"></script> --}}
     <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
     <script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
     <script src="//cdn.datatables.net/responsive/2.2.9/css/dataTables.responsive.css"></script>
    @yield('script')


</body>

</html>

<script>
// $(document).ready(function () {
//     $("#table").DataTable();
//     });



// $(document).ready(function () {
//         $(".table").DataTable();
//     });





</script>






