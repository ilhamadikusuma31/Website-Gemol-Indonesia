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
@extends('layouts.mainWeb')

@section('isi')
    <header class="row tm-welcome-section">
        <h2 class="col-12 text-center tm-section-title">Welcome to Gemol Indonesia</h2>
        <p class="col-12 text-center">Gemol merupakan Produsen yang bergerak dalam bidang inovasi olahan singkong, menggunakan bahan-bahan berkualitas terbaik (Premium)</p>
    </header>
    <div class="row tm-gallery">
        <div class="jumbotron1 h-100 mt-5">
            <div class="row text-center">
                <div class="col-md-8">
                    <div class="container-fluid">
                        @if (session()->has('pesanSukses'))
                        <div class="alert alert-success fade show" role="alert">
                            {{ session('pesanSukses') }}
                        </div>
                        <script>
                            $(function () {
                                    $("html, body").animate({scrollTop: $('html, body').get(0).scrollHeight}, 1000);
                                });
                        </script>
                        @endif
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">kasih ulasan boskuh</h6>
                            </div>
                            <div class="card-body">
                                <form action="/create-ulasan" method="POST" enctype="multipart/form-data" id="formTambah">
                                    @csrf
                                    <div class="row mb-1">
                                        <div class="col-md-2">
                                            <b>Nama Kamu</b>
                                        </div>
                                        <div class="col-md-6 mt-1">
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="" name="user" autocomplete="off" value="{{ old('user') }}" Required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-2">
                                            <b>Ulasan Kamu</b>
                                        </div>
                                        <div class="col-md-6 mt-1">
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="" name="isi_ulasan" autocomplete="off" value="{{ old('isi_ulasan') }}" Required>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col">
                                            <button class="btn btn-success" type="submit"><i class="bi bi-plus-circle"></i></button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col"><img src="{{ $path_img }}/Logo_Mitra_lingkaran.png" alt="" width="300px" style="opacity: 0.5"></div>
            </div>
          </div>
    </div>

@endsection
@section('script')
    <script src="{{ $path_js }}/parallax.min.js"></script>
    <script src="{{ $path_js }}/jquery.min.js"></script>
@endsection

