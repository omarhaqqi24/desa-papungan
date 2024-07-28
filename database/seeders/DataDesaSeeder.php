<?php

namespace Database\Seeders;

use App\Models\DataDesa;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataDesa::truncate();

        $faker = Faker::create('id_ID');

        for ($i=0; $i<3; $i++){
            DataDesa::create([
                'foto' => $faker->image(storage_path('app/public/data_desa'), 500, 500, null, false),
                'penjelasan' => $faker->paragraph(4),
                'penjelasan_raw' => $faker->paragraph(4)
            ]);
        }

        DataDesa::create([
            'foto' => null,
            'penjelasan' => 'link here',
            'penjelasan_raw' => 'link here'
        ]);
    }
}
