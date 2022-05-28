
@php
$path_web_gemol    = "/";
$path_img          = "/img";
$path_vendor       = "/vendor";
$path_css          = "/css";
$path_js           = "/js";




@endphp

@extends('layouts.mainWeb')
@section('isi')
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
<div class="container header mt-5">
    <div class="row">
        <div class="col-md-5">
            <div class="h4 fw-bolder">
                Kami adalah Gemol Indonesia
            </div>
            <div class="h6 mt-4 lh-lg">
                Gemol resmi berdiri pada tahun 2016.
                Cookies Cassava adalah salah satu produk unggulan yang kami tawarkan kepada masyarakat luas,
                khususnya Jember sebagai alternatif cemilan sehat. Banyak manfaat yang terkandung dalam olahan singkong. Dengan kemasan yang unik, Gemol akan mampu bersaing dikelasnya.
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
<div class="container mt-4 mb-5 pt-5">
    <div class="col-md-12 text-center">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ $path_img }}/profile/1.png" class="d-block w-100" alt="{{ $path_img }}/gemol_5.jpg">
                </div>
              <div class="carousel-item">
                <img src="{{ $path_img }}/profile/2.png" class="d-block w-100" alt="{{ $path_img }}/gemol_2.jpg">
              </div>
              <div class="carousel-item">
                <img src="{{ $path_img }}/profile/3.png" class="d-block w-100" alt="{{ $path_img }}/gemol_7.jpg">
              </div>
              <div class="carousel-item">
                <img src="{{ $path_img }}/profile/4.png" class="d-block w-100" alt="{{ $path_img }}/gemol_7.jpg">
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
</div>
<div class="container mt-5 pt-5">
    <div class="row text-center">
        <div class="col">
            <div class="h3">
                Founder
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col foto-founder">
            <img src="{{ $path_img }}/profile/pakPras.png" alt="foto pak Pras" width="500px">
            <div class="h5 mb-5">Lucky Pratama Setiawan (Pras)</div>
        </div>
    </div>
</div>
@endsection



