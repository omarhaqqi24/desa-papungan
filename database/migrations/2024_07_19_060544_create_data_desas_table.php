<?php

use App\Models\DataDesa;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_desas', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->longText('penjelasan');
            $table->timestamps();
        });

        for ($x = 0; $x < 3; $x++){
            DataDesa::create([
                'foto' => '',
                'penjelasan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_desas');
    }
};
