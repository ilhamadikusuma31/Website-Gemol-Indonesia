<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Http\Requests\StorePengeluaranRequest;
use App\Http\Requests\UpdatePengeluaranRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengeluaran.index', [
            'judul' => 'pengeluaran',
            'pengeluarans' => Pengeluaran::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.create', [
            'judul'              => 'create-pengeluaran',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePengeluaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $penampung = $req->validate([
            'tanggal_pengeluaran' => 'required',
            'nama_pengeluaran' => 'required',
            'total_pengeluaran' => 'required',
        ]);


        //tulis data baru ke db
        Pengeluaran::create($penampung);

        return redirect('/pengeluaran')->with('pesanSukses', 'data baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pengeluaran.edit', [
            'judul'                   => 'edit-pengeluaran',
            'pengeluaranYgMauDiedit'  => Pengeluaran::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengeluaranRequest  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $aturan=[
            'tanggal_pengeluaran' => 'required',
            'nama_pengeluaran' => 'required',
            'total_pengeluaran' => 'required',
        ];

        //validasi, jika berhasil maka akan eksekusi kode dibawahnya
        $penampung =$req->validate($aturan);

        //str to lower nama
        $penampung['nama_pengeluaran'] = Str::lower($penampung['nama_pengeluaran']);


        //timpa data di db
        Pengeluaran::where('id', $req->id)
                ->update($penampung);

        return redirect('/pengeluaran')->with('pesanSukses', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus data dari db
        Pengeluaran::destroy($id);
        return redirect('/pengeluaran')->with('pesanSukses', 'data berhasil dihapus');
    }
}
