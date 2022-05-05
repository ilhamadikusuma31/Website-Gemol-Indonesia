<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\Admin;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Pengeluaran;
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
        return view('home', [
            'judul' => 'Dashboard',
            'barangs' => Barang::all(),
            'detailPenjualans' => DetailPenjualan::all() //ini buat ngoper data ke js buat grafik
        ]);
    }

    //method ini dipanggil dari route yang di trigger setelah user mengklik submit ubah password di main.blade.php
    //method ini untuk ganti pw admin
    public function autentikasi(Request $req){

        //cek apakah req->password == password si user sekarang yg lagi login
        if(Hash::check($req->password, auth()->user()->password)){
            return view('setting_akun_admin',['judul' => 'ubah pw broh']);
        }

        //kalo engga maka akan beri pesan error ke login.blade.php
        return back()->with('pesanLoginError', 'gagal login!');
    }

    public function update(Request $req)
    {
        // dd($req);
        if($req->password == $req->password2){
            $aturan=[
                'username' => 'required|max:255',
                'password' => 'required|min:8',
            ];

            //validasi
            $penampung =$req->validate($aturan);

            //enkripsi
            $penampung['password'] = bcrypt($penampung['password']);


            //timpa data di db
            Admin::where('id', $req->id)->update($penampung);

            return redirect('/')->with('pesanSukses','akun berhasil diperbarui');
        }

        else{
            return redirect('/')->with('pesanError', 'password tidak sama! harap masuk kembali');
        }

    }

}
