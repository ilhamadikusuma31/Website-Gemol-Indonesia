<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\StatusBarang;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Barang::create([
            'nama_barang' => 'cookies singkong cheese sago',
            'harga_barang' => 25000,
            'jenis_barang_id' => 1,
            'foto_barang' => 'cookies_singkong_cheese_sago_225_gram.jpg',
            'berat_barang' => 225,
            'status_barang_id' => 1
            ]);

            Barang::create([
            'nama_barang' => 'cookies singkong chocolate chip',
            'harga_barang' => 25000,
            'jenis_barang_id' => 1,
            'foto_barang' => 'cookies_singkong_chocolate_chip_225_gram.jpg',
            'berat_barang' => 225,
            'status_barang_id' => 1
            ]);

            Barang::create([
            'nama_barang' => 'cookies singkong chocostick',
            'harga_barang' => 50000,
            'jenis_barang_id' => 1,
            'foto_barang' => 'cookies_singkong_chocostick_250_gram.jpg',
            'berat_barang' => 225,
            'status_barang_id' => 1
            ]);


            Barang::create([
            'nama_barang' => 'cookies singkong chocostick',
            'harga_barang' => 50000,
            'jenis_barang_id' => 1,
            'foto_barang' => 'cookies_singkong_chocostick_250_gram.jpg',
            'berat_barang' => 225,
            'status_barang_id' => 1
            ]);



            JenisBarang::create([
            'nama_jenis_barang' => 'cookies',
            ]);

            JenisBarang::create([
            'nama_jenis_barang' => 'coffee',
            ]);

            StatusBarang::create([
            'nama_status_barang' => 'normal',
            ]);


            StatusBarang::create([
            'nama_status_barang' => 'rekomendasi',
            ]);


    }
}
