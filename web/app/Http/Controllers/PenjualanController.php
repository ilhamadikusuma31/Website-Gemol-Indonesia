<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Barang;
use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PenjualanController extends Controller
{
    public function index(){
        return view('penjualan.index', [
            'judul' => 'Data Penjualan',
            'penjualans' => Penjualan::all(),

        ]);
    }

    public function create(){
        return view('penjualan.create',[
            'judul' => 'Tambah Data Penjualan',
            'barangs' => Barang::all(),
            'pembelis' => Pembeli::all(),
        ]);
    }

    public function store(Request $req)
    {
        // dd($req);


        //store data ke db penjualan
        $data_penjualan = [
            'pembeli_id' => $req->id,
            'tanggal' => Carbon::now(),
        ];
        Penjualan::create($data_penjualan);


        //store data ke db detail penjualan
        for($i = 0; $i < count($req->jumlah_barang); $i++ ){

            $jumlah[] = $req->jumlah_barang[$i];
            $barang[] = Barang::find($req->nama_barang[$i])->nama_barang;

            $data_detail_penjualan= [
                'jumlah_barang' => $req->jumlah_barang[$i],
                'penjualan_id' => Penjualan::all()->last()->id,
                'barang_id' => $req->nama_barang[$i],
            ];
            DetailPenjualan::create($data_detail_penjualan);
        }

        $req->session()->flash('pesanSukses', 'data penjualan berhasil ditambah');
        // $req->session()->flash('templateChat', $template_chat);
        return redirect('/penjualan');

    }
}
