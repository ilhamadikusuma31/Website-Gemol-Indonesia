<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use Illuminate\Support\Carbon;
use App\Models\Admin;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Pengeluaran;
use GuzzleHttp\Promise\Create;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Prophecy\Doubler\ClassPatch\ThrowablePatch;



class DashboardController extends Controller
{

    //method ini dipanggil dari route yang di trigger setelah user ada di link Dashboard
    public function index($t = "kosong")
    {

        //kalo rutenya adalah "admin/", t di set tahun ini
        if($t == "kosong"){
            $t = Carbon::now()->format('Y');
        }


        $dp = DetailPenjualan::all();
        $tahuns = [];


        //ngambil tahuns yang tersedia(tercatat), yang duplikat dihilangkan buat dropdown opsi liat tahun lain
        foreach($dp as $d){
            $tahuns[] = Str::substr($d['created_at'], 0, 4);
        }
        $tahuns = array_unique($tahuns);

        //ngambil data dari db sesuai yg diliat tahun nya
        $dp = DB::table('detail_penjualans')
                ->whereYear('created_at', $t)
                ->get();

        $pengeluarans = DB::table('pengeluarans')
                ->whereYear('created_at', $t)
                ->get();

        return view('home', [
            'judul' => 'Dashboard',
            'barangs' => Barang::all(),
            'detailPenjualans' => $dp, //ini buat ngoper data ke js buat grafik
            'pengeluarans' => $pengeluarans, //ini buat ngoper data ke js buat grafik
            'tahunYgTersedia' => $tahuns,
            'tahunIni' => $t,
            'detailPenjualansFull' => DetailPenjualan::with(['barang'])->whereYear('created_at', $t)->get(),
            'pengeluaransFull' => Pengeluaran::whereYear('created_at', $t)->get()
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

    public function penjualan_temp(Request $req){

    }

}
