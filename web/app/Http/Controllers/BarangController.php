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

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //method ini dipanggil dari route yang di trigger setelah user ada di link barang
    public function index()
    {
        //ini merujuk ke folder views barang.blade.php
        //sambil ngirim beberapa key yang terisi judul=untuk title web, barangs = mengambil semua data dari model Barang
        return view('barang.index', [
            'judul' => 'barang',
            'barangs' => Barang::all(),

        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create', [
            'judul'              => 'create-barang',
            'jenisBarang'        => JenisBarang::all(), //ini buat populate/build option di form create di create.blade.php
            'statusBarang'       => StatusBarang::all(), //ini buat populate/build option di form create di create.blade.php
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreBarangRequest $req)
    // {


    // }
    public function store(Request $req)
    {
        $penampung = $req->validate([
            'foto_barang' => 'image|file|max:1024 ',
            'nama_barang' => 'required|max:225',
            'jenis_barang_id' => 'required',
            'berat_barang' => 'required',
            'harga_barang' => 'required',
            'status_barang_id' => 'required',
        ]);

        //upload gambar ke directory
        $penampung['foto_barang'] = $req->file('foto_barang')->store('barang-images');

        //tulis data baru ke db
        Barang::create($penampung);

        return redirect('/barang')->with('pesanSukses', 'data baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
