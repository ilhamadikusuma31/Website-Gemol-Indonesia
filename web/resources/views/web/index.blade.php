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
	<link href="css/templatemo-style.css" rel="stylesheet" />
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
            <img src="img/logo_mitra_lingkaran.png" class="rounded-circle" alt="" width="30" height="30"
                class="d-inline-block align-text-top">
            Gemol
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="btn btn-navbar me-1 h6 btn-warning" href="/">Home</a>
            </li>
            <li class="nav-item ">
                <a class="btn btn-navbar me-1 h6 " href="#">Profile</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-navbar me-1 h6" href="#">Testimoni</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-navbar me-1 h6" href="#">FAQ</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
  <!-- akhir navbar -->

	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="/img/gemol_1.jpg">
			</div>
		</div>
        <div class="tm-header">
            <div class="row tm-header-inner">
                <div class="col-md-6 col-12">
                    <img src="/img/simple-house-logo.png" alt="Logo" class="tm-site-logo" />
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
        </div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Welcome to Gemol Indonesia</h2>
				<p class="col-12 text-center">Gemol merupakan Produsen yang bergerak dalam bidang inovasi olahan singkong, menggunakan bahan-bahan berkualitas terbaik (Premium)</p>
			</header>

			<div class="tm-paging-links">
				<nav>
					<ul>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link active">Cookies</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Coffee</a></li>
						{{-- <li class="tm-paging-item"><a href="#" class="tm-paging-link">Noodle</a></li> --}}
					</ul>
				</nav>
			</div>

			<!-- Gallery -->
			<div class="row tm-gallery">

				<!-- gallery page 1 -->
				<div id="tm-gallery-page-cookies" class="tm-gallery-page">
                    @foreach ($barangs as $b)
                    <div class="col-md-3 mb-4 me-3">
                        <div class="card h-100"  style="background-color: blanchedalmond">
                            <img src="{{ asset('storage/'.$b->foto_barang) }}" alt="" class="img-fluid tm-gallery-img">
                          <div class="container">
                            <div class="card-body">
                              <div class="row ">
                                <div class="col-12 ms-0">
                                  <h5 class="card-title"><h4 class="tm-gallery-title">{{ucfirst(trans($b->nama_barang)) }}</h4></h5>
                                  <h5 class="card-title"><span class="badge rounded-pill bg-dark">{{ $b->berat_barang }} gram</span></h5>
                                </div>
                              </div>
                              <div class="row">
                                <div class="h5 ms-1"><p class="tm-gallery-price"><span class="badge rounded-pill bg-success">Rp.{{ $b->harga_barang }}</p></span></p></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
				</div> <!-- gallery page 1 -->
                {{-- <a href="https://api.whatsapp.com/send?phone=085740319465&text=Halo%20DafundaTekno.%0ASaya%20Ingin%20Bekerja%20Sama%20Dengan%20Situs%20Anda" class="btn btn-primary"></a> --}}

                <div class="jumbotron1 h-100 mt-5">
                    <div class="row text-center">
                        <div class="col-md-8">
                            <div class="container-fluid">
                                @if (session()->has('pesanSukses'))
                                <div class="alert alert-success fade show" role="alert">
                                    {{ session('pesanSukses') }}
                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=6281382144239&text={{ session('templateChat') }}" class="btn btn-success"><i class="bi bi-whatsapp"></i></a>
                                </div>

                                <script>
                                    // $(document).scrollTop($('#jumbotron1').height());

                                    $(function () {
                                            $("html, body").animate({scrollTop: $('html, body').get(0).scrollHeight}, 1000);
                                        });
                                </script>
                                @endif
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Pesan Boskuh</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="/create-pesanan" method="POST" enctype="multipart/form-data" id="formTambah">
                                            @csrf
                                            <div class="row mb-1">
                                                <div class="col-md-2">
                                                    <b>Nama Kamu</b>
                                                </div>
                                                <div class="col-md-6 mt-1">
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="" name="nama_pembeli" autocomplete="off" value="{{ old('nama_pembeli') }}" Required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-md-2">
                                                    <b>Alamat Kamu</b>
                                                </div>
                                                <div class="col-md-6 mt-1">
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="" name="alamat_pembeli" autocomplete="off" value="{{ old('alamat_pembeli') }}" Required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-md-2 mt-3">
                                                    <b>No.hp Kamu</b>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-2">
                                                        <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="" name="no_telp_pembeli" autocomplete="off" value="{{ old('no_hp_pembeli') }}" Required>
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
                                                <div class="col mb-1 ms-2"><button class="btn btn-primary" data-toggle="modal" data-target="#popUpConfirmTambah" ><i class="bi bi-cart-plus"></i></button></div>
                                                {{-- <div class="col mb-1 ms-2"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#popUpConfirmTambah" ><i class="bi bi-cart-plus"></i></a></div> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col"><img src="img/logo_mitra_lingkaran.png" alt="" width="300px" style="opacity: 0.5"></div>
                    </div>
                  </div>
                <div class="jumbotron2 h-100">
                    <div class="row">
                        <div class="col-md-8"></div>
                        {{-- <div class="col"><img src="img/logo_mitra_lingkaran.png" alt="" width="300px" style="opacity: 0.5"></div> --}}
                    </div>
                  </div>
				<!-- gallery page 2 -->
				<div id="tm-gallery-page-coffee" class="tm-gallery-page hidden">
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<img src="img/comingsoon.png" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title"></h4>
								<p class="tm-gallery-description"></p>
								<p class="tm-gallery-price"></p>
							</figcaption>
						</figure>
				</div> <!-- gallery page 2 -->
			</div>
			<div class="tm-section tm-container-inner">
				<div class="row">
					<div class="col-md-6">
						<figure class="tm-description-figure">
                            <div class="row">
                                <div class="col">
                                    <img src="img/gemol_2.jpg" alt="Image" class="img-fluid" width="400px"/>
                                </div>
                                <div class="col">
                                    <img src="img/gemol_3.jpg" alt="Image" class="img-fluid" width="400px"/>
                                </div>
                            </div>
						</figure>
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
		</main>

    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>

		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2022 Gemol Indonesia </p>
		</footer>

	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
