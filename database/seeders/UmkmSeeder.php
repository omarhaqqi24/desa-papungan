<?php

namespace Database\Seeders;

use App\Models\JenisUmkm;
use App\Models\Umkm;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        function generateRandomFloat($min, $max)
        {
            return $min + mt_rand() / mt_getrandmax() * ($max - $min);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Umkm::truncate();
        JenisUmkm::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create('id_ID');

        for ($i=0; $i < 7; $i++){
            $umkm = Umkm::create([
                'nama' => $faker->name(),
                'deskripsi' => $faker->sentence(3),
                'alamat' => $faker->address(),
                'kontak' => $faker->phoneNumber(),
                'jam_buka' => __($faker->time()." - ".$faker->time()),
                'lat' => generateRandomFloat(-8.110000, -8.090000),
                'long' => generateRandomFloat(112.186000, 112.204000),
                'no_nib' => $faker->phoneNumber(),
                'no_pirt' => $faker->phoneNumber(),
                'no_halal' => $faker->phoneNumber(),
                'no_bpom' => $faker->phoneNumber()
            ]);
    
            $jenises = $faker->words($faker->numberBetween(1, 4));
            foreach ($jenises as $jenis){
                JenisUmkm::create([
                    'jenis' => $jenis,
                    'umkm_id' => $umkm->id
                ]);
            }

        }
    }
}
