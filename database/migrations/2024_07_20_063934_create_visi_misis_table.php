<?php

use App\Models\VisiMisi;
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
        Schema::create('visi_misis', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('isi_poin');
            $table->timestamps();
        });

        VisiMisi::create([
            'kategori' => 'visi',
            'isi_poin' => 'Gotong - royong membangun desa Papungan sebagai kawasan agropolitan, Desa yang jujur, transparan, adil, sejahtera, berdaya saing, mandiri, religious dan berbudaya'
        ]);
        VisiMisi::create([
            'kategori' => 'misi',
            'isi_poin' => 'Mewujudkan pemerintahan desa yang profesional, mandiri, jujur, transparan dan berwibawa dengan pengambilan keputusan yang cepat dan tepat dengan cara musyawarah mufakat bersama pemerintahan maupun masyarakat setempat.'
        ]);
        VisiMisi::create([
            'kategori' => 'misi',
            'isi_poin' => 'Bersama masyarakat meningkatkan perekonomian dengan cara memanfaatkan hasil pertanian, UMKM dan tenaga kerja masyarakat.'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visi_misis');
    }
};
