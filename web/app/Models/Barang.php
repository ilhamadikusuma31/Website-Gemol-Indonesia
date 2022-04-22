<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];  //att yang dijaga, gaboleh di create

    public function JenisBarang(){ //relasi m-to-1  ke jenis barang, func nya harus == nama model
        return $this->belongsTo(JenisBarang::class);
    }

    public function StatusBarang(){ //relasi m-to-1  ke Status barang, func nya harus == nama model
        return $this->belongsTo(StatusBarang::class);
    }
}
