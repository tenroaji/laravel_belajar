<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'nama' => 'Buku',
            'harga' => 10000,
            'stok' => 10,
        ]);

        Produk::create([
            'nama' => 'Pulpen',
            'harga' => 20000,
            'stok' => 5,
        ]);


        Produk::create([
            'nama' => 'Pensil',
            'harga' => 5000,
            'stok' => 20,
        ]);
    }
}
