<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::insert([
            [
                'nama_barang' => 'T-Shirt',
                'gambar' => 'p-1.png',
                'harga' => 0,
                'stok' => 0,
                'keterangan' => 'Lets Discuss',
                'category_id' => 1
            ],
            [
                'nama_barang' => 'Hoodie',
                'gambar' => 'p-2.png',
                'harga' => 0,
                'stok' => 0,
                'keterangan' => 'Lets Discuss',
                'category_id' => 2
            ],
            [
                'nama_barang' => 'Mugs',
                'gambar' => 'p-3.png',
                'harga' => 0,
                'stok' => 0,
                'keterangan' => 'Lets Discuss',
                'category_id' => 3
            ],
            [
                'nama_barang' => 'Sweater',
                'gambar' => 'P-4.png',
                'harga' => 0,
                'stok' => 0,
                'keterangan' => 'Lets Discuss',
                'category_id' => 4
            ],
            [
                'nama_barang' => 'Totebag',
                'gambar' => 'p-5.png',
                'harga' => 0,
                'stok' => 0,
                'keterangan' => 'Lets Discuss',
                'category_id' => 5
            ],
            [
                'nama_barang' => 'Jacket',
                'gambar' => 'p-6.png',
                'harga' => 0,
                'stok' => 0,
                'keterangan' => 'Lets Discuss',
                'category_id' => 6
            ],
            [
                'nama_barang' => 'Long Sleeves',
                'gambar' => 'p-8.png',
                'harga' => 0,
                'stok' => 0,
                'keterangan' => 'Lets Discuss',
                'category_id' => 7
            ],
            [
                'nama_barang' => 'PDL Customs',
                'gambar' => 'p-9.png',
                'harga' => 0,
                'stok' => 0,
                'keterangan' => 'Lets Discuss',
                'category_id' => 8
            ],
        ]);
    }
}
