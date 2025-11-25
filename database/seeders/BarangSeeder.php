<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run()
    {
        Barang::create([
            'nama_barang' => 'Mami Poko',
            'stok' => 45,
            'harga' => 16000,
            'kategori' => 'Keperluan Bayi & Anak',
            'deskripsi' => 'Popok bayi merek Mami Poko.',
            'gambar' => null
        ]);
        // tambahkan lebih banyak jika ingin
    }
}
