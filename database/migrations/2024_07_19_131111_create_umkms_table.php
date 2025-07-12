<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->longText('deskripsi');
            $table->string('alamat');
            $table->string('kontak');
            $table->string('jam_buka');
            $table->float('lat');
            $table->float('long');
            $table->float('url_map');
            $table->string('no_nib');
            $table->string('no_halal');
            $table->string('no_bpom');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
