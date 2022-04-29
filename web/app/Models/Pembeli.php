<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Penjualan(){ //relasi 1-to-m  ke penjualan, func nya harus == nama model
        return $this->hasMany(Penjualan::class);
    }
}
