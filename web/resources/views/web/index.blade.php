<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Gemol Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
</head>
<!--

Gemol Indonesia

https://templatemo.com/tm-539-simple-house

-->
<body>

	<div class="container">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/gemol_1.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="img/simple-house-logo.png" alt="Logo" class="tm-site-logo" />
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

		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2022 Gemol Indonesia </p>
		</footer>
	</div>
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
	</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

