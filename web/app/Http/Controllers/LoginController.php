<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\UpdateLoginRequest;
use App\Models\Admin;
use GuzzleHttp\Promise\Create;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    //method ini dipanggil dari route yang di trigger setelah user ada di link login
    public function index()
    {
        //ini merujuk ke folder views Login.blade.php
        //sambil ngirim var judul
        return view('login', [
            'judul' => 'Login'
        ]);
    }

    //method ini dipanggil dari route yang di trigger setelah user mengklik login di login.blade.php
    public function autentikasi(Request $req){

        //validasi apakah user sudah mengisikannya, ngecek ke db admin (pengaturan kenapa bisa otomatis ada di auth.php)
        $kredensial = $req -> validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        //cek apakah valid jika iya maka redirect ke dashboard
        if(Auth::attempt($kredensial)){
            $req->session()->regenerate();
            return redirect()->intended('/');
        }

        //kalo engga maka akan beri pesan error ke login.blade.php
        return back()->with('pesanLoginError', 'gagal login!');
    }

    //ini liat dokumentasi laravel untuk code logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
