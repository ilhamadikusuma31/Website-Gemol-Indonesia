@php

// session_start();
//require "../function.php";


//nama uname admin yang sekarang sedang mengakses
//$uname = $_SESSION['nama_admin']; //diset di login.php

$path_web_gemol    = "index.php";
$path_login        = "login";
$path_logout       = "logout";
$path_registrasi   = "registrasi";
$path_main         = "/";
$path_img          = "/img";
$path_vendor       = "/vendor";
$path_css          = "/css";
$path_js           = "/js";
$path_setting_admin= "setting_admin.php";


$path_brg          = "/barang";
$path_edit_brg     = "barang/barang_edit.php";
$path_hapus_brg    = "barang/barang_hapus.php";
$path_tambah_brg   = "barang/barang_tambah.php";
$path_export       = "/eksport";

$path_penjualan    ="penjualan/penjualan.php";

//kalo sesi admin tidak ada, di redirect ke halaman login
// if(!isset($_SESSION["admin_login"])){
//     header("location: login.php");
//     exit;
// }

//confirm pw dari modal untuk mengubah pw atau uname nanti di redirect ke form untuk mengisi uname dan pw baru
// if(isset($_POST["sbmt-pw"])){
//     $pw_db = getData("SELECT * FROM admin WHERE username = '$uname'")[0]['password'];
//     $pw = $_POST["confirmPW"];

//     if(password_verify($pw,$pw_db)){
//         $_SESSION['admin_edit_akun'] = true;
//         header("location: setting_admin.php");

//     }
//     else{
//         echo
//         "<script>
//             $(document).ready(function(){
//                 $('#popUpConfirmPwSalah').modal('show');
//                 });
//         </script>";
//     }
//     }



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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="shortcut icon" href="{{ $path_img }}/Logo_Mitra_lingkaran.png">



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

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>
                @yield('isi konten')
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="popUpConfirmLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">mau keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika kamu yakin.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= $path_logout; ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirm PW Modal-->
    <div class="modal fade" id="popUpConfirmPW" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                        <form id="formConfirmPW" method="POST">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control" type="password" placeholder="Password" id="password1" name="confirmPW" autocomplete="off" required>
                                        <span class="form-control-focus"></span>
                                    </div>
                                    <div class="col-2 mt-2 ms-1">
                                        <div class="input-group-addon" onclick="passwordVisibility(1);">
                                            <i class="fa fa-eye" id="showPass1"></i>
                                            <i class="fa fa-eye-slash d-none" id="hidePass1"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= $path_logout; ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- PW salah modal-->
    <div class="modal fade" id="popUpConfirmPwSalah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Password Salah!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="#">OK</a>
                </div>
            </div>
        </div>
    </div>

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
    <script src="{{ $path_js }}/script.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.9/css/dataTables.responsive.css"></script>


</body>

</html>

<script>
$(document).ready(function () {
    $("#table").DataTable();
    });

$('#table').DataTable( {
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.childRowImmediate
        }
    }
} );

$(document).ready(function () {
    $(".table").DataTable();
});
</script>






