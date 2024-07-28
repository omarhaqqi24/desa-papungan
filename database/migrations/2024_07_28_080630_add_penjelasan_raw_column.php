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
        Schema::table('data_desas', function (Blueprint $table) {
            $table->longText('penjelasan_raw')->after('penjelasan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_desas', function (Blueprint $table) {
            $table->dropColumn('penjelasan_raw');
        });
    }
};
