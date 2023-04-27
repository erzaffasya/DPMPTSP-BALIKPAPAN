<?php

namespace Database\Seeders;

use App\Models\TagBerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TagBerita::create([
            'id' => 1,
            'nama_tag' => 'Tag 1',
        ]);
        TagBerita::create([
            'id' => 2,
            'nama_tag' => 'Tag 2',
        ]);
        TagBerita::create([
            'id' => 3,
            'nama_tag' => 'Tag 3',
        ]);
        TagBerita::create([
            'id' => 4,
            'nama_tag' => 'Tag 4',
        ]);
        TagBerita::create([
            'id' => 5,
            'nama_tag' => 'Tag 5',
        ]);
    }
}
