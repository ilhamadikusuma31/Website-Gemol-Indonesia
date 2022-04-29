<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Pembeli(){ //relasi m-to-1  ke pembeli, func nya harus == nama model
        return $this->belongsTo(Pembeli::class);
    }
    public function DetailPenjualan(){ //relasi 1-to-m  ke detail_penjualan, func nya harus == nama model
        return $this->hasMany(DetailPenjualan::class);
    }

}
