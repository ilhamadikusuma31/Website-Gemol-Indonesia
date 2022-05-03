<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimoniController extends Controller
{
    public function index()
    {
        return view('testimoni.index', [
            'judul' => 'testimoni',
            'testimonis' => Testimoni::all(),
        ]);
    }

    public function create()
    {
        return view('testimoni.create', [
            'judul' => 'create-testimoni',
        ]);
    }


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

    public function show()
    {
        //
    }


    public function edit($id)
    {
        return view('testimoni.edit', [
            'judul'              => 'edit-testimoni',
            'testimoniYgMauDiedit'  => Testimoni::find($id),
        ]);
    }


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

    public function destroy($id)
    {
        //hapus data dari db
        Testimoni::destroy($id);
        return redirect('/testimoni')->with('pesanSukses', 'data berhasil dihapus');
    }
}
