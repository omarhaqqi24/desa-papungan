<?php

namespace Database\Seeders;

use App\Models\Jabatan;
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
        PerangkatDesa::truncate();

        Storage::deleteDirectory('perangkat-desa');
        Storage::makeDirectory('perangkat-desa');

        $faker = Faker::create('id_ID');

        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Qudlori Setiawan',
            'jabatan_id' => (Jabatan::where('nama', 'Kepala Desa')->select('id')->get())[0]->id,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Bambang Setiawan',
            'jabatan_id' => (Jabatan::where('nama', 'Sekretaris Desa')->select('id')->get())[0]->id,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Wendhy Setiawan',
            'jabatan_id' => (Jabatan::where('nama', 'Kaur Keuangan')->select('id')->get())[0]->id,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Denny Setiawan',
            'jabatan_id' => (Jabatan::where('nama', 'Kaur Perencanaan dan Umum')->select('id')->get())[0]->id,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Slamet Setiawan',
            'jabatan_id' => (Jabatan::where('nama', 'Kasi Pemerintahan')->select('id')->get())[0]->id,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Bastomi Setiawan',
            'jabatan_id' => (Jabatan::where('nama', 'Kasi Kesejahteraan dan Pelayanan')->select('id')->get())[0]->id,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Zaenal Setiawan',
            'jabatan_id' => (Jabatan::where('nama', 'Staf Keuangan Desa')->select('id')->get())[0]->id,
            'kontak' => $faker->phoneNumber()
        ]);
        PerangkatDesa::create([
            'foto' => $faker->image(storage_path('app/public/perangkat-desa'), 500, 500, null, false),
            'nama' => 'Kurniawan Setiawan',
            'jabatan_id' => (Jabatan::where('nama', 'Staf Perencanaan dan Umum')->select('id')->get())[0]->id,
            'kontak' => $faker->phoneNumber()
        ]);
    }
}
