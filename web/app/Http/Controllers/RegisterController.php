<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateRegisterRequest;
use App\Models\Admin;
use GuzzleHttp\Promise\Create;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    //method ini dipanggil dari route yang di trigger setelah user berada di link register
    public function index()
    {
        //ini merujuk ke folder views Register.blade.php
        //sambil ngirim var judul
        return view('registrasi', [
            'judul' => 'Register'
        ]);
    }


    //method ini dipanggil dari route yang di trigger setelah user mengklik tombol register
    public function storeData(Request $req)
    {
        //validasi apakah semua data sudah disii dan ada pengecekan langsung dari db di kolom uname
        $penampung = $req->validate([
            'username' => 'required|max:255|unique:admins',
            'password' => 'required|min:8',
            'password2' => 'required|min:8',
        ]);

        //konfirm password apakah sama pass1 dan pass2 jika iya maka akan di buatkan 1 data baru ke db
        if ($penampung['password'] === $penampung['password2']){
            $penampung['password'] = bcrypt($penampung['password']);
            Admin::create($penampung);
        }

        //akan mengirim pesan ke halaman login.blade.php
        $req->session()->flash('pesan', 'akun anda berhasil ditambahkan silakan login');
        return redirect('/login');

    }


}
