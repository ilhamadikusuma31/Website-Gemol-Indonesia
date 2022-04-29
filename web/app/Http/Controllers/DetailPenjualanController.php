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
        // $nama_pembeli = $p->Pembeli->nama_pembeli;
        // dd(DetailPenjualan::where('penjualan_id', $id)->get());
        // dd(DetailPenjualan::find($id));

        return view('penjualan.detail', [
            'judul' => 'Detail | '.$req->nama_pembeli,
            'detailpenjualans' => DetailPenjualan::where('penjualan_id', $req->penjualan_id)->get(),
            'nama_pembeli' => $req->nama_pembeli,
            'nama_barang' => Barang::where('barang_id', $req)
            // 'barangs' => Barang::find($id)
        ]);

    }



    public function destroy($id){

        // dd( DetailPenjualan::where('penjualan_id',"$id"));
        // dd($id);
        DetailPenjualan::destroy($id);
        redirect('/penjualan')->with('pesanSukses','data berhasil dihapus');
    }
}

