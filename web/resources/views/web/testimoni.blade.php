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

@endphp
@extends('layouts.mainWeb')

@section('isi')
{{-- @dd($testimonis) --}}
    <header class="row tm-welcome-section">
        <h2 class="col-12 text-center tm-section-title">Welcome to Gemol Indonesia</h2>
        <p class="col-12 text-center">Gemol merupakan Produsen yang bergerak dalam bidang inovasi olahan singkong, menggunakan bahan-bahan berkualitas terbaik (Premium)</p>
    </header>
    <div class="row tm-gallery">
    <!-- gallery page 1 -->
    <div id="tm-gallery-page-cookies" class="tm-gallery-page justify-content-center">
        @foreach ($testimonis as $t)
        <div class="col-md-3 mb-4 me-2">
            <div class="card h-100"  style="background-color: blanchedalmond">
                {{-- <img src="{{ asset('storage/'.$t->foto_testimoni) }}" alt="" class="img-fluid tm-gallery-img"> --}}
                <img src="/laravel/storage/app/public/{{ $t->foto_testimoni }}" alt="" class="img-fluid tm-gallery-img">
                <div class="container">
                <div class="card-body">
                    <div class="row ">
                    <div class="col-12 ms-0">
                        <h5 class="card-title"><h4 class="tm-gallery-title">{{ucfirst(trans($t->isi_testimoni)) }}</h4></h5>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        @endforeach
    </div> <!-- gallery page 1 -->
</div>

@endsection

