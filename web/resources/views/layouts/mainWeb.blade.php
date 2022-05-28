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
$path_ulasan = "/web/ulasan";
$path_testimoni = "/web/testimoni";
$path_profile = "/web/profile";


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
    <link rel="shortcut icon" href="{{ $path_img }}/Logo_Mitra_lingkaran.png">
	<link href="{{ $path_css }}/templatemo-style.css" rel="stylesheet" />
    {{-- <script src="js/jquery.min.js"></script> --}}
</head>
<!--

Gemol Indonesia


-->
<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top justify-content-center" style="opacity: 1">
        <div class="container-fluid ms-1 me-1 rounded-2" style="background-color: rebeccapurple; opacity: 0.95">
        <div class="navbar-brand ms-auto text-center" >
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
        <div class="collapse navbar-collapse me-0" id="navbarNavDropdown">
            <ul class="navbar-nav mt-1">
            <li class="nav-item ">
                <a href="/" class="btn btn-navbar me-1 h6 {{ Request::is('/')? 'text-black' : 'text-white'}}  {{ Request::is('/')? 'btn-warning' : ''}}" >Home</a>
            </li>
            <li class="nav-item ">
                <a href="{{ $path_profile }}" class="btn btn-navbar me-1 h6 {{ Request::is('web/profile')? 'text-black' : 'text-white'}} {{ Request::is('web/profile')? 'btn-warning' : ''}}" >Profile</a>
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
        @yield('parallax-jumbotron')
        <main>
            @yield('isi')
        </main>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <figure class="tm-description-figure">
                        <div class="row">
                            {{-- carousel kir i --}}
                            <div class="col-md-6">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                      <img src="{{ $path_img }}/gemol_5.jpg" class="d-block w-100" alt="{{ $path_img }}/gemol_5.jpg">
                                    </div>
                                  <div class="carousel-item">
                                    <img src="{{ $path_img }}/gemol_2.jpg" class="d-block w-100" alt="{{ $path_img }}/gemol_2.jpg">
                                  </div>
                                  <div class="carousel-item">
                                    <img src="{{ $path_img }}/gemol_7.jpg" class="d-block w-100" alt="{{ $path_img }}/gemol_7.jpg">
                                  </div>
                                  <div class="carousel-item">
                                    <img src="{{ $path_img }}/gemol_3.jpg" class="d-block w-100" alt="{{ $path_img }}/gemol_3.jpg">
                                  </div>
                                  <div class="carousel-item">
                                    <img src="{{ $path_img }}/gemol_4.jpg" class="d-block w-100" alt="{{ $path_img }}/gemol_4.jpg">
                                  </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                            </div>
                            {{-- akhir carousel kiri --}}
                            {{-- carousel kanan --}}
                            <div class="col-md-6">
                                <div class="mapouter"><div class="gmap_canvas"><iframe width="270" height="270" id="gmap_canvas" src="https://maps.google.com/maps?q=gemol%20indonesia%20jember&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:270px;width:270px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:270px;width:270px;}</style></div></div>                </figure>
                            </div>
                <div class="col-md-6">
                    <div class="tm-description-box">
                        <h4 class="tm-gallery-title">Informasi dan Pemesanan :</h4>
                        <p class="tm-mb-45">08222 941 5735</p>
                        <h4 class="tm-gallery-title">Follow us :</h4>
                        <p class="tm-mb-45">@Gemol.indonesia @Gemol Indonesia</p>
                        <h4 class="tm-gallery-title">Rumah Produksi :</h4>
                        <p class="tm-mb-45">Bumi Tegal Besar Blok CA No. 49, Tegal Besar, Kaliwates - Jember 68133</p>
                    </div>
                </div>
            </div>
        </div>

        <footer class="tm-footer text-center">
            <p>Copyright &copy; 2022 Gemol Indonesia </p>
        </footer>


        <script src="{{ $path_js }}/jquery.min.js"></script>
            @yield('script')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>


