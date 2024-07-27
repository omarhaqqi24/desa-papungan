<?php

namespace Database\Seeders;

use App\Models\VisiMisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::truncate();
        VisiMisi::create(['kategori' => 'visi', 'isi_poin' => 'Gotong - royong membangun desa Papungan sebagai kawasan agropolitan, Desa yang jujur, transparan, adil, sejahtera, berdaya saing, mandiri, religious dan berbudaya']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Mewujudkan pemerintahan desa yang profesional, mandiri, jujur, transparan dan berwibawa dengan pengambilan keputusan yang cepat dan tepat dengan cara musyawarah mufakat bersama pemerintahan maupun masyarakat setempat.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Bersama masyarakat meningkatkan perekonomian dengan cara memanfaatkan hasil pertanian, UMKM dan tenaga kerja masyarakat.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Meningkatkan kapasitas dan daya saing usaha masyarakat melalui penguatan kreativitas keterampilan dan inovasi masyarakat desa Papungan untuk menghasilkan produk yang berkualitas dan diterima oleh masyarakat Desa Papungan maupun luar Desa Papungan.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Memfungsikan BUMDES sebagai sarana penyedia kebutuhan pemerintahan desa Papungan maupun kebutuhan masyarakat desa.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Lebih meningkatkan kepedulian pendidikan non formal dengan memberikan insentif bagi guru MADIN dan TPQ/TPA di Desa Papungan.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Mendukung dan meneruskan program pemerintah dibidang ekonomi, pendidikan dan kesehatan.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Meningkatkan kebersamaan seluruh pemuda desa Papungan di setiap kegiatan yang dilakukan pemerintah Desa Papungan agar terjalin kebersamaan yang kuat.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Memperkuat pembangunan kebudayaan dan akhlak masyarakat desa Papungan dengan semangat inovasi mbah mudjair.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Meneruskan pembangunan gedung olah raga sebagai sarana kesehatan masyarakat.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Pengadaan mobil jenazah sebagai sarana layanan emergency bagi pasien gawat darurat, Pelayanan angkutan jenazah dan Mempercepat evakuasi pasien dari kediamannya dengan prosedur mudah, Cepat dan siap 24 Jam.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Membangun tugu perbatasan antar Desa.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Meningkatkan sarana dan prasarana jalan Desa serta Drainase yang ada di Seluruh Desa Papungan.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Mewujudkan dan mengembangkan kegiatan keagamaan untuk menambah keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Mewujudkan dan mendorong terjadinya usaha-usaha kerukunan antar dan intern warga masyarakat yang disebabkan karena adanya perbedaan agama, keyakinan, organisasi, dan lainnya dalam suasana saling menghargai dan menghormati.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Membangun dan meningkatkan hasil pertanian dengan jalan penataan pengairan, perbaikan jalan sawah / jalan usaha tani, pemupukan, dan pola tanam yang baik.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Menata Pemerintahan Desa Papungan yang kompak dan bertanggung jawab dalam dengan pelayanan masyarakat secara terpadu dan serius untuk mengemban amanat masyarakat.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Menumbuh Kembangkan Kelompok-kelompok usaha yang ada di Desa.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Meningkatkan koordinasi dan kerjasama dengan dinas terkait dalam meningkatkan pengolahan potensi Desa.']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Membangun dan mendorong majunya bidang pendidikan baik formal maupun informal yang mudah diakses dan dinikmati seluruh warga masyarakat tanpa terkecuali yang mampu menghasilkan insan intelektual, inovatif dan entrepreneur (wirausahawan).']);
        VisiMisi::create(['kategori' => 'misi', 'isi_poin' => 'Membangun dan mendorong usaha-usaha untuk pengembangan dan optimalisasi sektor pertanian, perkebunan, peternakan, perdagangan dan perikanan, baik tahap produksi maupun tahap pengolahan hasilnya.']);
    }
}
