@extends('layouts.main')
@section('isi konten')
<div class="container-fluid">
    @if (session()->has('pesanError'))
    <div class="alert alert-danger" role="alert">
        {{ session('pesanError') }}
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
        </div>
        <div class="card-body">
            <form action="/setting-akun/admin" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                <div class="row mb-1">
                    <div class="col-md-2">Username</div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" name="username" value="{{ auth()->user()->username }}" autocomplete="off" Required>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">Password Baru</div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input id="password1" type="password" class="form-control" id="formGroupExampleInput" name="password" value="" autocomplete="off" Required>
                        </div>
                    </div>
                    <div class="col mt-1 ps-2">
                        <div class="input-group-addon" onclick="passwordVisibility(1);">
                            <i class="fa fa-eye" id="showPass1"></i>
                            <i class="fa fa-eye-slash d-none" id="hidePass1"></i>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-2">Konfirmasi Password Baru</div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input id="password2" type="password" class="form-control" id="formGroupExampleInput" name="password2" value="" autocomplete="off" Required>
                        </div>
                    </div>
                    <div class="col mt-1 ms-2">
                        <div class="input-group-addon" onclick="passwordVisibility(2);">
                            <i class="fa fa-eye" id="showPass2"></i>
                            <i class="fa fa-eye-slash d-none" id="hidePass2"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-beetween">
                    <div class="col mb-1">
                        <button class="btn btn-danger" type="reset" name="sbmt-cancel" onclick="location.href='/admin'">Batal</button>
                    </div>
                    <div class="col mb-1">
                        <button class="btn btn-primary" type="submit" name="sbmt" onclick="return confirm('Apakah Anda yakin ingin mengubah data akun?')">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
