<?php

namespace Database\Seeders;

use App\Models\Lembaga;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LembagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lembaga::truncate();

        $faker = Faker::create('id_ID');
        for ($i=0; $i < 8; $i++) { 
            Lembaga::create([
                'nama' => $faker->name(),
                'alamat' => $faker->address(),
                'kontak' => $faker->phoneNumber()
            ]);
        }
    }
}
