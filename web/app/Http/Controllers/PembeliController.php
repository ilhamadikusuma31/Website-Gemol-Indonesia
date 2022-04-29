<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PembeliController extends Controller
{
    public function index(){
        return view('pembeli.index', [
            'judul' => 'Data Pembeli',
            'pembelis' => Pembeli::all(),
        ]);
    }
    public function store(Request $req)
    {
        //validasi, jika berhasil maka akan eksekusi kode dibawahnya
        $penampung = $req->validate([
            'nama_pembeli' => 'required|max:225',
            'no_telp_pembeli' => 'required',
            'alamat_pembeli' => 'required',

        ]);

        //str to lower nama
        $penampung['nama_pembeli'] = Str::lower($penampung['nama_pembeli']);

        //tulis data baru ke db
        Pembeli::create($penampung);

        return redirect('/pembeli')->with('pesanSukses', 'data baru berhasil ditambahkan');
    }

    public function create(Request $req)
    {
        // dd($req->file('foto_barang'));
        $aturan=[
            'nama_pembeli' => 'required|max:225',
            'alamat_pembeli' => 'required|max:225',
            'no_telp_pembeli' => 'required|max:225',

        ];

        //validasi, jika berhasil maka akan eksekusi kode dibawahnya
        $penampung =$req->validate($aturan);

        //str to lower nama
        $penampung['nama_pembeli'] = Str::lower($penampung['nama_pembeli']);

        //tambah data di db
        Pembeli::create($penampung);

        return redirect('/pembeli')->with('pesanSukses', 'data berhasil ditambah');
    }
    public function update(Request $req)
    {
        $aturan=[
            'nama_pembeli' => 'required|max:225',
            'alamat_pembeli' => 'required|max:225',
            'no_telp_pembeli' => 'required|max:225',

        ];

        //validasi, jika berhasil maka akan eksekusi kode dibawahnya
        $penampung =$req->validate($aturan);

        //str to lower nama
        $penampung['nama_pembeli'] = Str::lower($penampung['nama_pembeli']);

        //timpa data di db
        Pembeli::where('id', $req->id)
                ->update($penampung);

        return redirect('/pembeli')->with('pesanSukses', 'data berhasil diubah');
    }

    public function destroy($id){

        $pembeli_id =0;
        foreach (Pembeli::all() as $p) {
            if ($p->id == $id){
                $pembeli_id = $id;
            }
        }

        $penjualan_id = 0;
        foreach(Penjualan::all() as $pnj){
            if($pnj->pembeli_id == $pembeli_id){
                $penjualan_id = $pnj->id;
            }
        }


        //hapus data dari db
        Pembeli::destroy($pembeli_id);

        //kalo hapus pembeli otomatis data pembeliannya beliau juga dihapus
        Penjualan::where('pembeli_id',"$pembeli_id")->delete();

        //kalo hapus pembeli otomatis data pembeliannya beliau juga dihapus
        DetailPenjualan::where('penjualan_id',"$penjualan_id")->delete();

        // Pembeli::truncate();
        return redirect('/pembeli')->with('pesanSukses', 'data berhasil dihapus');
    }
}
