<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriBerita::create([
            'id' => 1,
            'nama_kategori' => 'Kategori 1',
            'deskripsi' => 'Deskripsi Kategori 1',
        ]);
        KategoriBerita::create([
            'id' => 2,
            'nama_kategori' => 'Kategori 2',
            'deskripsi' => 'Deskripsi Kategori 2',
        ]);
        KategoriBerita::create([
            'id' => 3,
            'nama_kategori' => 'Kategori 3',
            'deskripsi' => 'Deskripsi Kategori 3',
        ]);
        KategoriBerita::create([
            'id' => 4,
            'nama_kategori' => 'Kategori 4',
            'deskripsi' => 'Deskripsi Kategori 4',
        ]);
    }
}
