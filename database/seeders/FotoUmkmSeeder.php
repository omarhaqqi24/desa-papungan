<?php

namespace Database\Seeders;

use App\Models\FotoUmkm;
use App\Models\JenisUmkm;
use App\Models\Umkm;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotoUmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisUmkm::truncate();

        $faker = Faker::create('id_ID');

        $umkms = Umkm::all();
        foreach ($umkms as $umkm){
            for ($i=0; $i<rand(1, 4);$i++){
                FotoUmkm::create([
                    'foto' => $faker->image(storage_path('app/public/foto-umkm'), 500, 500, null, false),
                    'umkm_id' => $umkm->id
                ]);
            }
        }

        $fotos = FotoUmkm::all();
        foreach ($fotos as $foto){
            if ($foto->foto == '0'){
                $foto->delete();
            }
        }
    }
}
