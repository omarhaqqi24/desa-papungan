<?php

namespace Database\Seeders;

use App\Models\Aspirasi;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AspirasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aspirasi::truncate();

        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10; $i++) { 
            Aspirasi::create([
                'judul' => $faker->sentence(),
                'isi' => $faker->paragraph(5),
                'penulis' => $faker->name(),
                'foto' => $faker->image(storage_path('app/public/aspirasi'), 500, 500, null, false)
            ]);
        }
    }
}
