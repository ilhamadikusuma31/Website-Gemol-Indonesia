
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




@endphp

@extends('layouts.mainWeb')
@section('parallax-jumbotron')
<div class="placeholder">
    <div class="parallax-window" data-parallax="scroll" data-image-src="{{ $path_img }}/gemol_1.png">
    </div>
</div>
@endsection
@section('isi')
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
        <div id="tm-gallery-page-cookies" class="tm-gallery-page justify-content-center row">
            <div class="row">
                <h5 class="h3 mt-5 mb-3 row justify-content-center">Katalog</h5>
            </div>
            <div class="row justify-content-center">
                @foreach ($barangs as $b)
                <div class="col-md-3 mb-4">
                    <div class="card h-100"  style="background-color: blanchedalmond">
                        <img src="{{ asset('storage/'.$b->foto_barang) }}" alt="" class="img-fluid tm-gallery-img">
                        {{-- <img src="/laravel/storage/app/public/{{ $b->foto_barang }}" alt="" class="img-fluid tm-gallery-img"> --}}
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
            </div>
            <div class="row">
                <h5 class="h3 mt-5 mb-2 row justify-content-center">Pilihan Terbaik</h5>
            </div>
            <div class="row justify-content-center">
                @foreach ($barang_rekomendasis as $b)
                <div class="col-md-3 mb-4">
                    <div class="card h-100"  style="background-color: blanchedalmond">
                        <img src="{{ asset('storage/'.$b->foto_barang) }}" alt="" class="img-fluid tm-gallery-img">
                        {{-- <img src="/laravel/storage/app/public/{{ $b->foto_barang }}" alt="" class="img-fluid tm-gallery-img"> --}}
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
            </div>
        </div> <!-- gallery page 1 -->

        {{-- <div class="row">

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
        </div> --}}


        <div class="jumbotron1 h-100 mt-5">
            <div class="row text-center">
                <div class="col-md-9">
                    <div class="container-fluid">
                        @if (session()->has('pesanSukses'))
                        <div class="alert alert-success fade show" role="alert">
                            {{ session('pesanSukses') }}
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=6281291855701&text={{ session('templateChat') }}" class="btn btn-success"><i class="bi bi-whatsapp"></i></a>
                        </div>

                        {{-- modal berhasil pesan --}}
                        <div class="modal show" tabindex="-1" id="modalBerhasilPesan">
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
                        @endif
                        <div class="row">
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Pesan Boskuh</h6>
                            </div>
                            <div class="card-body">
                                <form action="/create-pesanan" method="POST" id="formPesanan">
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
                                    <div class="row mb-1">
                                        <div class="col-md-2 mt-3">
                                            <b>Total Harga</b>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-2">
                                                <input id="totalHarga" type="number" class="form-control" id="inlineFormInputGroup" autocomplete="off" value="" disabled>
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
                                            <div class="col-md-1 mt-2">
                                                <b>Jumlah</b>
                                             </div>
                                             <div class="col-md-3">
                                                <div class="input-group mb-2">
                                                    <input id="jumlahBarang" type="number" min="0" class="form-control jumlahBarang" id="inlineFormInputGroup" placeholder="" name="jumlah_barang[]" autocomplete="off" value="{{ old('jumlah_barang') }}" Required>
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
                                        <div class="col mb-1">
                                            <button class="btn btn-success" id="addRow"><i class="bi bi-plus-circle"></i></button>
                                        </div>
                                        <div class="col">
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#popUpConfirmPesan"><i class="bi bi-cart-plus"></i></a>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col"><img src="{{ $path_img }}/Logo_Mitra_lingkaran.png" alt="" width="300px" style="opacity: 0.5"></div>
            </div>
          </div>
        <div class="jumbotron2 h-100">
            <div class="row">
                <div class="col-md-8"></div>
                {{-- <div class="col"><img src="{{ $path_img }}Logo_Mitra_lingkaran.png" alt="" width="300px" style="opacity: 0.5"></div> --}}
            </div>
          </div>
        <!-- gallery page 2 -->
        <div id="tm-gallery-page-coffee" class="tm-gallery-page hidden">
            <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                <figure>
                    {{-- <img src="{{ $path_img }}/comingsoon.png" alt="Image" class="img-fluid tm-gallery-img" /> --}}
                    <figcaption>
                        <h4 class="tm-gallery-title"></h4>
                        <p class="tm-gallery-description"></p>
                        <p class="tm-gallery-price"></p>
                    </figcaption>
                </figure>
        </div> <!-- gallery page 2 -->
    </div>


<!-- Pesan Modal-->
<div class="modal fade" id="popUpConfirmPesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">mau pesan ini?</h5>
                <button class="close btn" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Pesan" jika kamu yakin.</div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-danger" type="submit" form="formPesanan">Pesan</button>
                {{-- <a class="btn btn-primary" href="/">Pesan</a> --}}
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="js/parallax.min.js"></script>
<script src="js/jquery.min.js"></script>

<script>
    let angka = 1;
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


    // function hitungTotalHarga(){
    //     let jumlah_barang = $("input[name='jumlah_barang[]']").map(function(){return $(this).val();}).get();
    //     let nama_barang = $("input[name='nama_barang[]']").map(function(){return $(this).val();}).get();
    //     alert(jumlah_barang);
    //     alert(nama_barang);
    // }

    // $('.jumlahBarang').on('change', function() {
    //         $('#totalHarga').val(angka++);
    //         hitungTotalHarga();
    //     });

    $('#addRow').click(function(e){
        e.preventDefault();
        hitungTotalHarga();
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

            html+= '<div class="col-md-1 mt-2">';
            html+= '<b>Jumlah</b>';
            html+= '</div>';
            html+= '<div class="col-md-3">';
            html+= '<div class="input-group mb-2">';
            html+= '<input id="jumlahBarang" type="number" min="0" class="form-control jumlahBarang" id="inlineFormInputGroup" placeholder="" name="jumlah_barang[]" autocomplete="off" value="{{ old('jumlah_barang') }}" Required>';
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


