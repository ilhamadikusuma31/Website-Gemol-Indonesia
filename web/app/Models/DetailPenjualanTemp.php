<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualanTemp extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function Penjualan(){ //relasi m-to-1  ke penjualan, func nya harus == nama model
        return $this->belongsTo(PenjualanTemp::class);
    }
    public function Barang(){ //relasi m-to-1  ke barang, func nya harus == nama model
        return $this->belongsTo(Barang::class);
    }
}
