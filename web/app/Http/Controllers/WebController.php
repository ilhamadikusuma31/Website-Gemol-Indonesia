<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB as DB;
use App\Events\NotifPenjualan;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Pembeli;
use App\Models\DetailPenjualanTemp;
use App\Models\PembeliTemp;
use App\Models\PenjualanTemp;
use App\Models\Testimoni;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Database\Factories\BarangFactory;

use function PHPUnit\Framework\returnSelf;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //method ini dipanggil dari route yang di trigger setelah user ada di link Web
    public function index()
    {
        return view('web.index', [
            'barangs' => Barang::all(),
        ]);
    }


    // }
    public function store(Request $req)
    {

        // dd(->nama_barang$req->nama_barang[0]);

        //store data ke db pembeli
        $data_pembeli = [
                        'nama_pembeli' => $req->nama_pembeli,
                        'no_telp_pembeli'=> $req->no_telp_pembeli,
                        'alamat_pembeli' => $req->alamat_pembeli
                    ];
        $cekUname = Pembeli::where('nama_pembeli','like','%'.$req->nama_pembeli.'%') -> first();
        if(!$cekUname){
            //kalo ga ada data pembeli di db dengan nama tsb, buatkan data pembeli baru
            PembeliTemp::create($data_pembeli);
        }


        //store data ke db penjualan
        $data_penjualan = [
            // 'pembeli_id' => Pembeli::all()->last()->id,
            'pembeli_id'=> PembeliTemp::select('id')->where('nama_pembeli', $req->nama_pembeli)->first()['id'],
            'tanggal' => Carbon::now(),
        ];

        // var_dump($data_penjualan['pembeli_id']);die;
        PenjualanTemp::create($data_penjualan);


        //arr ini menampung data untuk generate chat wa
        $nama = $data_pembeli['nama_pembeli'];
        $telp = $data_pembeli['no_telp_pembeli'];
        $alamat = $data_pembeli['alamat_pembeli'];
        $jumlah =[];
        $barang =[];

        //store data ke db detail penjualan
        for($i = 0; $i < count($req->jumlah_barang); $i++ ){

            $jumlah[] = $req->jumlah_barang[$i];
            $barang[] = Barang::find($req->nama_barang[$i])->nama_barang;

            $data_detail_penjualan= [
                'jumlah_barang' => $req->jumlah_barang[$i],
                'penjualan_id' => PenjualanTemp::all()->last()->id,
                'barang_id' => $req->nama_barang[$i],
            ];
            DetailPenjualanTemp::create($data_detail_penjualan);
        }

        //array to string
        $barang = implode(",",$barang);
        $jumlah = implode(",",$jumlah);

        $template_chat =
        "
        Halo%20Gemol%20Indonesia.%0A
        Saya%20ingin%20membeli%20:%0A
        nama%20:%20$nama%0A
        alamat%20:%20$alamat%0A
        no.telp%20:%20$telp%0A
        produk%20:%20[$barang]%0A
        jumlah%20produk%20:%20[$jumlah]%0A

        ";

        NotifPenjualan::dispatch("ada-pesanan-baru");


        $req->session()->flash('pesanSukses', 'data pesanan akan segera diproses, silakan hubungi dan klik via');
        $req->session()->flash('templateChat', $template_chat);
        return redirect('/');

    }

    public function testimoni(){
        return view('web.testimoni', [
            'testimonis' => Testimoni::all(),
        ]);
    }
    public function ulasan(){
        return view('web.ulasan',[
            'ulasans' => Ulasan::all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Web  $Web
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web  $Web
     * @return \Illuminate\Http\Response
     */
    //method ini dipanggil dari route yang di trigger setelah user ada di link edit Web
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWebRequest  $request
     * @param  \App\Models\Web  $Web
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Web  $Web
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }
}
