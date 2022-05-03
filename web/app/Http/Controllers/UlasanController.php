<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function index()
    {
        return view('ulasan.index', [
            'judul' => 'ulasan',
            'ulasans' => Ulasan::all(),
        ]);
    }

    public function store(Request $req)
    {
        // dd($req);
        //validasi, jika berhasil maka akan eksekusi kode dibawahnya
        $penampung = $req->validate([
            'user' => 'required',
            'isi_ulasan' => 'required|max:225',
        ]);

        //tulis data baru ke db
        Ulasan::create($penampung);

        return redirect('/web/ulasan')->with('pesanSukses', 'data baru berhasil ditambahkan');
    }

    public function destroy($id)
    {
        //hapus data dari db
        Ulasan::destroy($id);
        return redirect('/ulasan')->with('pesanSukses', 'data berhasil dihapus');
    }
}
