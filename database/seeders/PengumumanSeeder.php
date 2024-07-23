<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengumuman::truncate();

        $faker = Faker::create('id_ID');
        for ($i=0; $i < 20; $i++) { 
            Pengumuman::create([
                'judul' => $faker->sentence(),
                'isi' => $faker->paragraph(5),
            ]);
        }
    }
}
