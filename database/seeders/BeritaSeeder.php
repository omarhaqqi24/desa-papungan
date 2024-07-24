<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::truncate();

        $faker = Faker::create('id_ID');
        for ($i=0; $i < 20; $i++) { 
            Berita::create([
                'judul' => $faker->sentence(),
                'isi' => $faker->paragraph(5),
                'foto' => $faker->image(storage_path('app/public/berita'), 500, 500, null, false)
            ]);
        }
    }
}
