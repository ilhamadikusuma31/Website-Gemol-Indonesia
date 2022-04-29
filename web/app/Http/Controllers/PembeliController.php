<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
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

}
