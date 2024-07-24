<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Jabatan::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Jabatan::create([
            'nama' => 'Kepala Desa',
            'order' => 1
        ]);
        Jabatan::create([
            'nama' => 'Sekretaris Desa',
            'order' => 2
        ]);
        Jabatan::create([
            'nama' => 'Kaur Keuangan',
            'order' => 3
        ]);
        Jabatan::create([
            'nama' => 'Kaur Perencanaan dan Umum',
            'order' => 3
        ]);
        Jabatan::create([
            'nama' => 'Kasi Pemerintahan',
            'order' => 4
        ]);
        Jabatan::create([
            'nama' => 'Kasi Kesejahteraan dan Pelayanan',
            'order' => 4
        ]);
        Jabatan::create([
            'nama' => 'Staf Keuangan Desa',
            'order' => 5
        ]);
        Jabatan::create([
            'nama' => 'Staf Perencanaan dan Umum',
            'order' => 5
        ]);
    }
}
