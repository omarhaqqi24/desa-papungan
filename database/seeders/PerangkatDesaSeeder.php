<?php

namespace Database\Seeders;

use App\Models\PerangkatDesa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::deleteDirectory('perangkat-desa');
        Storage::makeDirectory('perangkat-desa');

        $faker = Faker::create('id_ID');

        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Qudlori Setiawan',
            'jabatan_id' => 1,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Bambang Setiawan',
            'jabatan_id' => 2,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Wendhy Setiawan',
            'jabatan_id' => 3,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Denny Setiawan',
            'jabatan_id' => 4,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Slamet Setiawan',
            'jabatan_id' => 5,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Bastomi Setiawan',
            'jabatan_id' => 6,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Zaenal Setiawan',
            'jabatan_id' => 7,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Kurniawan Setiawan',
            'jabatan_id' => 8,
            'kontak' => $faker->phoneNumber()
        ]);
    }
}
