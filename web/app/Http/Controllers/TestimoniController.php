<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //method ini dipanggil dari route yang di trigger setelah user ada di link barang
    public function index()
    {
        return view('barang.index', [
            'judul' => 'barang',
            'barangs' => Testimoni::all(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimoni.create', [
            'judul' => 'create-testimoni',
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
        //validasi, jika berhasil maka akan eksekusi kode dibawahnya
        $penampung = $req->validate([
            'foto_testimoni' => 'image|file|max:1500',
            'isi_testimoni' => 'required|max:225',
        ]);

        //upload gambar ke directory
        $penampung['foto_testimoni'] = $req->file('foto_testimoni')->store('testimoni-images');

        //tulis data baru ke db
        Testimoni::create($penampung);

        return redirect('/testimoni')->with('pesanSukses', 'data baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show()
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
            'testimoniYgMauDiedit'  => Testimoni::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $aturan=[
            'foto_testimoni' => 'image|file|max:1500',
            'isi_testimoni' => 'required|max:225',
        ];

        //validasi, jika berhasil maka akan eksekusi kode dibawahnya
        $penampung =$req->validate($aturan);

        //upload gambar ke direktori
        if($req->file('foto_testimoni')){
            Storage::delete($req->foto_testimoni_lama);
            $penampung['foto_testimoni'] = $req->file('foto_testimoni')->store('testimoni-images');
        }

        //timpa data di db
        Testimoni::where('id', $req->id)
                ->update($penampung);

        return redirect('/testimoni')->with('pesanSukses', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus data dari db
        Testimoni::destroy($id);
        return redirect('/testimoni')->with('pesanSukses', 'data berhasil dihapus');
    }
}
