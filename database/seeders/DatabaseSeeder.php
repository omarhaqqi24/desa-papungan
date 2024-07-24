<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AspirasiSeeder::class,
            BeritaSeeder::class,
            DataDesaSeeder::class,
            FotoUmkmSeeder::class,
            JabatanSeeder::class,
            LembagaSeeder::class,
            PariwisataSeeder::class,
            PengumumanSeeder::class,
            PerangkatDesaSeeder::class,
            UmkmSeeder::class,
            UserSeeder::class,
            VisiMisiSeeder::class
        ]);
    }
}
