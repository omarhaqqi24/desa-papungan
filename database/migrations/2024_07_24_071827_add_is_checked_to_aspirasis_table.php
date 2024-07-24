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
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->string('penulis')->after('isi')->default('~ anonim');
            $table->boolean('isChecked')->after('penulis')->default(0);
            $table->string('foto')->after('isChecked')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->dropColumn('penulis');
            $table->dropColumn('isChecked');
            $table->dropColumn('foto');
        });
    }
};
