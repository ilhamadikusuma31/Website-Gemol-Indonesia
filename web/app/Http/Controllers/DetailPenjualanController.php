<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use App\Models\Pembeli;
use App\Models\Penjualan;


class DetailPenjualanController extends Controller
{
    public function index(Request $req){
        return view('penjualan.detail', [
            'judul' => 'Detail | '.$req->nama_pembeli,
            'detailpenjualans' => DetailPenjualan::with('Barang')->where('penjualan_id', $req->penjualan_id)->get(),
            'nama_pembeli' => $req->nama_pembeli,
            'nama_barang' => Barang::where('barang_id', $req),
            'pembelis' => Pembeli::all(),
            'barangs' => Barang::all(),
            // 'barangs' => Barang::find($id)
        ]);

    }
}

