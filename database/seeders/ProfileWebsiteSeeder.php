<?php

namespace Database\Seeders;

use App\Models\ProfileWebsite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileWebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfileWebsite::create([
            'id' => 1,
        ]);
    }
}
