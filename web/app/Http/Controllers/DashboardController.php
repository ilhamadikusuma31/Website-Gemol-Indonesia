<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\Admin;
use GuzzleHttp\Promise\Create;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    //method ini dipanggil dari route yang di trigger setelah user ada di link Dashboard
    public function index()
    {
        //ini merujuk ke folder views Dashboard.blade.php
        //sambil ngirim var judul
        return view('Home', [
            'judul' => 'Dashboard'
        ]);
    }

    //method ini dipanggil dari route yang di trigger setelah user mengklik login di login.blade.php
    public function autentikasi(Request $req){

        // //validasi apakah user sudah mengisikannya, ngecek ke db admin (pengaturan kenapa bisa otomatis ada di auth.php)
        // $kredensial = $req -> validate([
        //     'password' => 'required',
        // ]);


        if(Hash::check($req->password,auth()->user()->password)){
            return view('setting_akun',['judul' => 'ubah pw broh']);
        }

        // if (auth()->user()->password == $req->password){
        //     return view('setting_akun',['judul => ubah pw broh']);
        // }

        // //cek apakah valid jika iya maka redirect ke dashboard
        // if(Auth::attempt($kredensial)){
        //     $req->session()->regenerate();
        //     return view('setting_akun',['judul => ubah pw broh']);
        //     // return redirect()->intended('/setting-akun');
        // }

        //kalo engga maka akan beri pesan error ke login.blade.php
        return back()->with('pesanLoginError', 'gagal login!');
    }

}
