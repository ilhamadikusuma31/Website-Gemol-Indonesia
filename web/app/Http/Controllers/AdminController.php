<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    //method ini dipanggil dari route yang di trigger setelah user ada di link Admin
    public function update(Request $req)
    {
        // dd($req);
        if($req->password == $req->password2){
            $aturan=[
                'username' => 'required|max:255',
                'password' => 'required|min:8',
            ];

            //validasi
            $penampung =$req->validate($aturan);

            //enkripsi
            $penampung['password'] = bcrypt($penampung['password']);


            //timpa data di db
            Admin::where('id', $req->id)->update($penampung);

            return redirect('/')->with('pesanSukses','akun berhasil diperbarui');
        }

        else{

        }

    }

}
