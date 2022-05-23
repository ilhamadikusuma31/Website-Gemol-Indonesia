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

$path_testimoni = "/web/testimoni";
$path_ulasan = "/web/ulasan";
$path_brg          = "/barang";
$path_pengeluaran  ="/pengeluaran";
// $path_edit_brg     = "barang/barang_edit.php";
// $path_hapus_brg    = "barang/barang_hapus.php";
// $path_tambah_brg   = "barang/barang_tambah.php";
$path_export       = "/eksport";

$path_penjualan    ="penjualan/";
$path_pembeli      ="/pembeli";

@endphp

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Gemol Indonesia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
	<link href="{{ $path_css }}/templatemo-style.css" rel="stylesheet" />
    {{-- <script src="js/jquery.min.js"></script> --}}
</head>
<!--

Gemol Indonesia


-->
<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="opacity: 1">
        <div class="container rounded-2 pt-1 pb-1" style="background-color: rebeccapurple; opacity: 0.95">
        <div class="navbar-brand" >
            <a class="navbar-brand" href="#">
            <img src="{{ $path_img }}/Logo_Mitra_lingkaran.png" class="rounded-circle" alt="" width="30" height="30"
                class="d-inline-block align-text-top">
            Gemol
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mt-2">
            <li class="nav-item ">
                <a href="/" class="btn btn-navbar me-1 h6 {{ Request::is('/')? 'text-black' : 'text-white'}}  {{ Request::is('/')? 'btn-warning' : ''}}" >Home</a>
            </li>
            <li class="nav-item ">
                <a href="/profile" class="btn btn-navbar me-1 h6 {{ Request::is('/profile')? 'text-black' : 'text-white'}} {{ Request::is('/web/profile')? 'btn-warning' : ''}}" >Profile</a>
            </li>
            <li class="nav-item">
                <a href="{{ $path_testimoni }}" class="btn btn-navbar me-1 h6 {{ Request::is('web/testimoni')? 'text-black' : 'text-white'}} {{ Request::is('web/testimoni')? 'btn-warning' : ''}}" >Testimoni</a>
            </li>
            <li class="nav-item">
                <a href="{{ $path_ulasan }}" class="btn btn-navbar me-1 h6 {{ Request::is('web/ulasan')? 'text-black' : 'text-white'}} {{ Request::is('web/ulasan')? 'btn-warning' : ''}}" >Ulasan</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
  <!-- akhir navbar -->

	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="{{ $path_img }}/gemol_1.jpg">
			</div>
		</div>
        {{-- <div class="tm-header">
            <div class="row tm-header-inner">
                <div class="col-md-6 col-12">
                    <img src="{{ $path_img }}/simple-house-logo.png" alt="Logo" class="tm-site-logo" />
                    <div class="tm-site-text-box">
                        <h1 class="tm-site-title">Gemol Indonesia</h1>
                        <h6 class="tm-site-description">new restaurant template</h6>
                    </div>
                </div>
                <nav class="col-md-6 col-12 tm-nav">
                    <ul class="tm-nav-ul">
                        <li class="tm-nav-li"><a href="index.html" class="tm-nav-link active">Home</a></li>
                        <li class="tm-nav-li"><a href="about.html" class="tm-nav-link">About</a></li>
                        <li class="tm-nav-li"><a href="contact.html" class="tm-nav-link">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div> --}}
        <main>
            @yield('isi')
        </main>

        <footer class="tm-footer text-center">
            <p>Copyright &copy; 2022 Gemol Indonesia </p>
        </footer>


        <script src="{{ $path_js }}/jquery.min.js"></script>
            @yield('script')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>


