<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Admin;
use App\Models\JenisBarang;
use App\Models\StatusBarang;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BarangController extends Controller
{

    //method ini dipanggil dari route yang di trigger setelah user ada di link barang
    public function index()
    {
        //ini merujuk ke folder views barang.blade.php
        //sambil ngirim beberapa key yang terisi judul=untuk title web, barangs = mengambil semua data dari model Barang
        return view('barang.index', [
            'judul' => 'barang',
            'barangs' => Barang::all(),
            // 'jenisBarang'        => JenisBarang::all(), //ini buat populate/build option di form create di create.blade.php
            // 'statusBarang'       => StatusBarang::all(), //ini buat populate/build option di form create di create.blade.php

        ]);
    }



    public function create()
    {
        return view('barang.create', [
            'judul'              => 'create-barang',
            'jenisBarang'        => JenisBarang::all(), //ini buat populate/build option di form create di create.blade.php
            'statusBarang'       => StatusBarang::all(), //ini buat populate/build option di form create di create.blade.php
        ]);
    }


    public function store(Request $req)
    {
        //validasi, jika berhasil maka akan eksekusi kode dibawahnya
        $penampung = $req->validate([
            'foto_barang' => 'image|file|max:1500',
            'nama_barang' => 'required|max:225',
            'jenis_barang_id' => 'required',
            'berat_barang' => 'required',
            'harga_barang' => 'required',
            'status_barang_id' => 'required',
        ]);

        //str to lower nama
        $penampung['nama_barang'] = Str::lower($penampung['nama_barang']);

        //upload gambar ke directory
        $penampung['foto_barang'] = $req->file('foto_barang')->store('barang-images');

        //tulis data baru ke db
        Barang::create($penampung);

        return redirect('/barang')->with('pesanSukses', 'data baru berhasil ditambahkan');
    }

    //method ini dipanggil dari route yang di trigger setelah user ada di link edit barang
    public function edit($id)
    {
        return view('barang.edit', [
            'judul'              => 'edit-barang',
            'barangYgMauDiedit'  => Barang::find($id),
            'jenisBarang'        => JenisBarang::all(), //ini buat populate/build option di form edit di edit.blade.php
            'statusBarang'       => StatusBarang::all(), //ini buat populate/build option di form edit di edit.blade.php
        ]);
    }

    public function update(Request $req)
    {
        // dd($req->file('foto_barang'));
        $aturan=[
            'foto_barang' => 'image|file|max:1500',
            'nama_barang' => 'required|max:225',
            'jenis_barang_id' => 'required',
            'berat_barang' => 'required',
            'harga_barang' => 'required',
            'status_barang_id' => 'required',
        ];

        //validasi, jika berhasil maka akan eksekusi kode dibawahnya
        $penampung =$req->validate($aturan);

        //str to lower nama
        $penampung['nama_barang'] = Str::lower($penampung['nama_barang']);

        //upload gambar ke direktori
        if($req->file('foto_barang')){
            Storage::delete($req->foto_barang_lama);
            $penampung['foto_barang'] = $req->file('foto_barang')->store('barang-images');
        }

        //timpa data di db
        Barang::where('id', $req->id)
                ->update($penampung);

        return redirect('/barang')->with('pesanSukses', 'data berhasil diubah');
    }

    public function destroy($id)
    {
        //hapus data dari db
        Barang::destroy($id);
        return redirect('/barang')->with('pesanSukses', 'data berhasil dihapus');
    }

    public function export()
    {
        return view('barang.export', [
            'judul' => 'barang',
            'barangs' => Barang::all(),
        ]);
    }
}
