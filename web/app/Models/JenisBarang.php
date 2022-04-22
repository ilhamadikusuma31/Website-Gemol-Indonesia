<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Barang(){ //relasi 1-to-m ke jenis barang, func nya harus == nama model
        return $this->hasMany(Barang::class);
    }
}
