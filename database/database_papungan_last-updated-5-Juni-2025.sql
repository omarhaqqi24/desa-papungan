-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2025 at 08:35 PM
-- Server version: 10.6.22-MariaDB-cll-lve
-- PHP Version: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paph4975_desa-papungan`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspirasis`
--

CREATE TABLE `aspirasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  `nama` varchar(255) NOT NULL DEFAULT '~ anonim',
  `isChecked` tinyint(1) NOT NULL DEFAULT 0,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aspirasis`
--

INSERT INTO `aspirasis` (`id`, `judul`, `isi`, `nama`, `isChecked`, `foto`, `created_at`, `updated_at`) VALUES
(12, 'Evaluasi Kinerja', 'Kinerja Pak Qudlori sangat bagus!', 'Jaya Winata', 0, '', '2024-07-29 01:48:26', '2024-07-29 01:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `isAccepted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `isi`, `nama`, `foto`, `isAccepted`, `created_at`, `updated_at`) VALUES
(16, 'Modernisasi Wisata Sejarah Edukatif di Desa Papungan: Pemasangan QR Code oleh Kelompok 12 Mahasiswa Membangun Desa FILKOM UB di Makam Mbah Moedjair', 'Blitar, 20 Juli 2024 – Kelompok 12 Mahasiswa Membangun Desa Fakultas Ilmu Komputer, Universitas Brawijaya (FILKOM) pada Jumat (19/07/2024) secara resmi melaksanakan pemasangan QR Code dalam rangka modernisasi wisata sejarah edukatif di Desa Papungan, Kecamatan Kanigoro, Kabupaten Blitar, di lokasi bersejarah Makam Mbah Moedjair.\r\nProyek ini diawali dengan tahap pertama yaitu pembersihan makam Mbah Moedjair yang dilakukan oleh Kelompok 12 Mahasiswa Membangun Desa FILKOM UB pada hari yang sama yaitu, Jumat (19/07/2024). Pembersihan ini bertujuan untuk memberikan kesan yang lebih rapi dan terawat pada area makam, sehingga terlihat lebih bersih dan bagus saat didokumentasikan dan dapat meningkatkan daya tarik wisatawan yang berkunjung. Pembersihan ini juga merupakan langkah awal yang penting sebelum dilakukan pemasangan QR Code.', 'Putri Torsia', '86TWNIfbySpk5beiffivLZL66IQ2OwdScoMafDuE.jpg', 1, '2024-07-28 21:01:42', '2024-07-28 21:02:04'),
(17, 'SOTH (Sekolah Orang Tua Hebat) Desa Papungan', 'Sekolah Orang Tua Hebat, atau biasa disebut dengan SOTH, adalah sekolah pengasuhan yang digagas oleh Badan Kependudukan Keluarga Berencana Nasional (BKKBN) Kabupaten Blitar bekerja sama dengan Pemerintah Desa Papungan. Sekolah ini merupakan terobosan untuk dapat meningkatkan kemampuan orangtua dalam mengasuh anak, terutama anak BALITA. Posisi PKK pada kegiatan ini adalah sebagai Pendamping. Kegiatan ini terdiri dari Penyampaian Materi Pembelajaran, Pemeriksaan Kesehatan, Praktek Keterampilan, Senam, Permainan dan lain-lain. SOTH Desa Papungan rencana diadakan 13 kali pertemuan, di mulai hari ini tanggal 13 Agustus 2024, Jumlah peserta SOTH kali ini berjumlah 35 orang.', 'Defi Indriani', 'qb0SvzYc5Rdn6HPyJUz3GjWA7gVqJ3vJH4koDRke.jpg', 1, '2024-08-13 18:46:47', '2024-08-13 18:47:08'),
(18, 'Pembagian Bantuan Pangan Cadangan  Beras Pemerintah (CBP)', 'Berdasarkan Keputusan Pemerintah Republik Indonesia c.q. Badan Pangan  Nasional Republik Indonesia, sebagian warga Desa Papungan dinyatakan berhak memperoleh Bantuan Pangan Cadangan Beras Pemerintahan (CBP) Tahap III Tahun 2024 dari Pemerintah Republik Indonesia. \r\nProgram ini merupakan bagian dari upaya pemerintah untuk membantu masyarakat meringankan beban pengeluaran, khususnya di tengah kenaikan harga bahan pangan pokok.\r\nSiapa yang dapat bantuan beras?\r\nPenerima bansos beras 10 kilogram adalah mereka yang masuk dalam kategori penerima Program Keluarga Harapan (PKH), Bantuan Pangan Non Tunai (BPNT), dan KPM balita atau yang berisiko stunting yang telah terdaftar dalam Data Terpadu Kesejahteraan Sosial (DTKS).', 'Defi Indriani', 'DMhEcnKhUPvGlNzh7qVUrp7aNztGspHZq8vvnjDb.jpg', 1, '2024-08-13 19:01:29', '2024-08-13 19:01:52'),
(19, 'Sekolah Lanjutan Lansia Tangguh (Selantang) Desa Papungan', 'Pada hari Jumat tanggal 16 Agustus 2024, aula kantor Desa Papungan Kecamatan Kanigoro Kabupaten Blitar menjadi saksi dari suatu peristiwa yang menginspirasi: acara \"Sekolah Lansia Tangguh\". Dengan kehadiran 35 lansia yang penuh semangat, acara ini menjadi tonggak penting dalam upaya memperkuat dan memberdayakan generasi emas kita.\r\n\r\nDalam setiap pertemuan, lansia dari berbagai latar belakang berkumpul untuk saling berbagi pengalaman, belajar, dan menginspirasi satu sama lain. Tujuannya bukan hanya untuk memberikan pengetahuan baru, tetapi juga untuk membangun komunitas yang kuat dan mendukung. Sekolah Lansia Tangguh ini rencana akan diadakan selama 13 kali pertemu\r\n\r\nDalam acara ini, semangat yang luar biasa terpancar dari para peserta. Dari mata yang penuh semangat hingga tawa yang penuh kegembiraan, peserta sekolah lansia menunjukkan betapa pentingnya memiliki semangat positif dan keinginan untuk terus belajar, bahkan di usia senja. Ini adalah bukti hidup bahwa usia hanyalah angka, dan semangat tidak pernah pudar.\r\n\r\nSekolah lansia ini mengeksplorasi berbagai topik, mulai dari kesehatan fisik dan mental hingga keterampilan sosial dan kreativitas. Para peserta juga memiliki kesempatan untuk berpartisipasi dalam diskusi kelompok dan kegiatan fisik yang bermanfaat. Pertukaran ide dan pengalaman menjadi inti dari setiap pertemuan, dan keakraban di antara peserta semakin kuat setiap bulannya.\r\n\r\nSalah satu puncak acara ini adalah proses wisuda. Para lansia yang telah aktif mengikuti seluruh program sekolah lansia akan diakui dan diberikan penghargaan khusus. Ini adalah momen yang memberikan rasa prestasi dan mengingatkan bahwa usia bukanlah penghalang untuk mencapai tujuan dan merayakan pencapaian.\r\n\r\nSekolah Lansia Tangguh bukan hanya tentang mengajar, tetapi juga tentang belajar bersama dan menciptakan ikatan yang kokoh di antara generasi yang lebih tua. Acara ini mendedikasikan dirinya untuk memupuk semangat, pengetahuan, dan kemandirian di kalangan lansia. Melalui upaya ini, Desa Papungan telah menciptakan lingkungan yang mendukung lansia untuk terus berkembang dan memberikan kontribusi berharga bagi masyarakat.\r\n\r\nDi dunia yang terus berubah, acara seperti \"Sekolah Lansia Tangguh\" adalah contoh nyata bagaimana menghormati dan mengapresiasi kontribusi lansia, serta bagaimana memberi mereka kesempatan untuk terus berkembang. Semoga semangat yang dihasilkan dari acara ini dapat menginspirasi dan menyinari jalan bagi generasi mendatang.', 'Defi Indriani', 'Wa5m4MTA68kniCRex6VhoZY3uNhZTA3YXtwIvAqo.jpg', 1, '2024-08-21 21:20:12', '2024-08-21 21:20:30'),
(21, 'Kirab Budaya dalam rangka \"HAUL MBAH MUDJAIR ke-67\"', 'Mbah Moedjair lahir di Desa Papungan, Kecamatan Kanigoro, Kabupaten Blitar, Jawa Timur pada tahun 1890. Pria bernama asli Iwan Muluk itu menikah dengan Partimah dan dikaruniai 7 orang anak. Namanya mencuat ke publik setelah beliau menemukan ikan mujair yang kita kenal hingga hari ini.\r\n\r\nPenemu ikan mujair ini meninggal pada 7 September 1957 lantaran penyakit asma yang dideritanya. Untuk mengenang jasa beliau yang telah mengenalkan ikan mujair kepada warga sekitar dan bisa dinikmati atas jasanya hingga saat ini, pemerintah Desa Papungan rutin mengadakan kirab Budaya atau Haul Mbah Mudjair setiap tahunnya pada tanggal 7 September\r\n\r\nPada tahun ini, Pemerintah Desa Papungan menyelenggarakan Haul dengan diawali khataman Alquran yang bertempat di pesarean Mbah Mujair, khataman ini dilaksanakan pada tanggal 5 September 2024 dan diikuti oleh seluruh perangkat desa Papungan dan jajarannya, beserta para Tokoh Masyarakat dan keluarga besar Mbah Mujair sendiri.\r\n\r\nAcara dilanjutkan dengan Kirab Budaya pada tanggal 7 September yang juga dimeriahkan oleh seluruh Perangkat Desa Papungan dan jajarannya, para Pamong Desa Papungan, Tokoh Masyarakat, perwakilan dari setiap rukun tetangga se Desa Papungan, Karang taruna Desa Papungan, dan dimeriahkan oleh kesenian Jaranan Turonggo Kembang Kencono\r\n\r\nAcara demi acara telah terselenggara dengan sukses, semoga kedepannya seluruh bagian dari Desa Papungan bisa turut memeriahkan kirab budaya peringatan haul Mbah Mujair ini.', 'Defi Indriani', 'ceuejUGfC8cS6B2gjhXz8Cf0V7JBdPAMiBqMigLP.jpg', 1, '2024-09-08 19:00:35', '2024-09-08 19:00:41'),
(23, 'STOP GRATIFIKASI', 'Mari budayakan GCG (Gerakan Cegah gratifikasi) yang bersih, anti suap, anti korupsi dan anti gratifikasi.\r\n\r\nStop gratifikasi, apapun bentuknya.\r\nJaga diri, jaga teman, jaga Lingkungan', 'Defi Indriani', 'DqO767fy9IepNIAPUpQTHWgqJu4hLkbw9JjcKRnZ.jpg', 1, '2024-10-08 23:04:11', '2024-10-08 23:04:18'),
(24, 'PERTEMUAN RUTIN TP PKK KEC. KANIGORO', 'Kanigoro, 15 Oktober 2024 – Kelompok Pemberdayaan dan Kesejahteraan Keluarga (PKK) Kecamatan Kanigoro kembali menggelar pertemuan rutin pada hari Selasa (15/10) di Balai Desa Papungan. Kegiatan ini dihadiri oleh seluruh pengurus PKK Kecamatan, perwakilan desa, serta kader-kader PKK dari berbagai desa di wilayah Kanigoro dan turut hadir juga Ketua Tim Penggerak PKK Kabupaten Blitar.\r\nAgenda utama pertemuan kali ini adalah pertemuan rutin TP PKK Kecamatan Kanigoro dan Pembinaan Adminitrasi PKK oleh TP PKK Kabupaten Blitar, yang bertujuan untuk meningkatkan kemampuan pengelolaan administrasi bagi kader-kader PKK di tingkat desa. Dalam sambutannya, Ketua TP PKK Kabupaten Blitar, Ibu Toha Agus Susanti, menekankan pentingnya administrasi yang baik sebagai pondasi bagi kelancaran program-program yang dijalankan oleh PKK di berbagai tingkatan.\r\n\"Administrasi yang rapi dan teratur akan mempermudah kami dalam mengelola program-program yang ada, serta memudahkan evaluasi dan pertanggungjawaban kepada masyarakat dan pemerintah,\" ujar Ibu Toha.\r\nSelain itu, pembinaan ini juga mencakup sesi pelatihan yang dipandu oleh Tim PKK Kabupaten Blitar. Mereka memberikan penjelasan detail mengenai penyusunan laporan kegiatan, pengarsipan, serta tata cara pencatatan keuangan yang benar sesuai dengan standar PKK.\r\nSelain pembinaan administrasi, pertemuan rutin kali ini juga diisi dengan diskusi mengenai program kerja PKK di Kecamatan Kanigoro, terutama dalam upaya meningkatkan kesehatan keluarga, kesejahteraan masyarakat, serta pemberdayaan perempuan\r\nDengan adanya kegiatan ini, diharapkan peran PKK di tingkat desa maupun kecamatan dapat semakin optimal dalam mendukung pembangunan dan kesejahteraan masyarakat, khususnya di Kecamatan Kanigoro.', 'Tim Media Warta Mudjair', 'HX3wmiBXAWbrIpPLvJYG1xgP1hmz2BjBsyzexH1o.jpg', 1, '2024-10-14 21:28:12', '2024-10-14 21:29:16'),
(25, 'Wisuda Sekolah Orang Tua Hebat dan Sekolah Lansia Tangguh di Desa Papungan: Bentuk Penghargaan bagi Peran Lansia dalam Masyarakat', 'Blitar, 24 Oktober 2024 – Desa Papungan, Kecamatan Kanigoro, Kabupaten Blitar, hari ini menjadi saksi momen istimewa dengan digelarnya wisuda untuk para peserta Sekolah Orang Tua Hebat dan Sekolah Lansia Tangguh. Acara yang berlangsung meriah di Balai Desa Papungan ini menjadi puncak dari program edukasi bagi orang tua dan lansia yang bertujuan untuk meningkatkan kualitas hidup, kesehatan, dan keterampilan sosial mereka.\r\n\r\nSekolah Orang Tua Hebat dan Sekolah Lansia Tangguh adalah program inovatif yang dicanangkan oleh pemerintah desa bekerja sama dengan lembaga kesehatan dan organisasi masyarakat. Program ini berfokus pada pemberdayaan lansia dan orang tua dengan memberikan edukasi tentang kesehatan, pengelolaan emosi, keterampilan menghadapi tantangan kehidupan, serta mengembangkan hubungan sosial yang lebih baik dengan keluarga dan lingkungan sekitar.\r\n\r\nKepala Desa Papungan, Bapak Qudlori, dalam sambutannya menyampaikan rasa bangganya atas pencapaian para peserta. “Hari ini kita tidak hanya merayakan kelulusan, tapi juga menghargai kerja keras para lansia dan orang tua yang terus semangat belajar dan berkembang. Mereka adalah teladan bagi generasi muda tentang pentingnya ilmu pengetahuan sepanjang hayat.”\r\n\r\nAcara wisuda diikuti oleh 34 lansia dan 25 orang tua. Para peserta telah mengikuti program ini dengan materi yang mencakup kesehatan fisik dan mental, pola asuh positif bagi cucu, serta aktivitas sosial yang meningkatkan kemandirian dan kebahagiaan di usia senja.\r\n\r\nSalah satu wisudawan, Ibu Siti Fatimah, menyampaikan rasa syukur dan kebahagiaannya. \"Saya senang sekali bisa mengikuti program ini. Selain mendapatkan banyak pengetahuan, saya juga merasa lebih sehat dan percaya diri. Kegiatan seperti ini membuat kami merasa tetap dihargai dan bermanfaat di usia lanjut.\"\r\n\r\nProgram ini mendapat dukungan penuh dari Dinas P3APPKB Kabupaten Blitar dan Puskesmas Kanigoro, yang juga berperan dalam memberikan penyuluhan kesehatan dan pengawasan terhadap kondisi fisik para peserta. Menurut Kepala Dinas P3APPKB Kabupaten Blitar, Drs. Micael Hankam Indoro, M.Si \"program ini sangat membantu dalam meningkatkan kesadaran lansia tentang pentingnya menjaga kesehatan serta menghindari risiko penyakit degeneratif,\" Katanya. \r\n\r\nAcara wisuda ini juga diisi dengan hiburan seperti penampilan tari dan musik tradisional oleh para lansia BKL Tulip, juga orang tua hebat BKB Mawar serta pemberian sertifikat kepada para peserta sebagai tanda apresiasi atas komitmen mereka. Suasana penuh kegembiraan dan kehangatan terlihat dari semangat para wisudawan, keluarga, dan tamu undangan yang hadir.\r\n\r\nDengan kesuksesan program ini, Desa Papungan berharap dapat terus melanjutkan program pemberdayaan serupa di masa depan, serta menginspirasi desa-desa lain untuk melibatkan lansia dan orang tua dalam kegiatan yang bermanfaat.', 'Tim Media Warta Mudjair', 'PBMUTvqqaK0gsuJrVWfSGyaAIbL4YPKNpGHwkqzX.jpg', 1, '2024-10-23 22:20:30', '2024-10-23 22:20:50'),
(26, 'HARI KANKER SEDUNIA', 'Hari Kanker Sedunia diperingati setiap tanggal 4 Februari untuk meningkatkan kesadaran dan dukungan bagi para penyintas kanker di seluruh dunia. Pada tahun 2025, tema yang diusung adalah \"United by Unique\" atau \"Dipersatukan oleh Keunikan\". Tema ini menekankan bahwa setiap pengalaman dengan kanker adalah unik, namun kita dapat bersatu dalam solidaritas dan kepedulian untuk menciptakan lingkungan yang inklusif dengan menyediakan akses perawatan yang adil dan berkualitas. \r\n\r\nDi Indonesia, berdasarkan data dari Pusat Observasi Global (Globocan), pada tahun 2022 terdapat lebih dari 408.661 kasus baru dan hampir 242.099 kematian akibat kanker. Jenis kanker dengan angka kematian tertinggi meliputi kanker payudara, kanker leher rahim, kanker paru, dan kanker kolorektal. \r\n\r\nOrganisasi Kesehatan Dunia (WHO) mencatat bahwa sekitar 30 hingga 50 persen kasus kanker dapat dicegah dengan tindakan yang tepat. Pencegahan tersebut meliputi penerapan pola hidup sehat, seperti konsumsi makanan bergizi, rajin berolahraga, dan rutin memeriksakan kesehatan. \r\n\r\nPeringatan Hari Kanker Sedunia tahun ini mengajak seluruh pihak untuk bersatu menciptakan dunia yang lebih peduli dan sensitif terhadap penderita kanker, dengan menyoroti pentingnya perawatan yang berfokus pada kebutuhan masyarakat dan mencari cara baru untuk membawa perubahan yang lebih baik.', 'Tim Media Warta Mudjair', 'O4MP9a6iF3yHt38cNb07AQjqvbXyX7cXn828Cz1W.png', 1, '2025-02-04 17:53:48', '2025-02-04 17:53:54'),
(27, 'Pelatihan Media Sosial untuk UMKM: Strategi FYP dan Sosialisasi Keamanan Kelistrikan di Desa Papungan', 'Papungan, 13 Februari 2025 – Rumah BUMN Blitar menggelar pelatihan bertajuk \"Tips & Trik FYP di Media Sosial untuk Meningkatkan Penjualan Produk dan Sosialisasi Keamanan Kelistrikan\". Acara yang diselenggarakan di Aula Kantor Desa Papungan tersebut bertujuan untuk membantu pelaku UMKM dalam memanfaatkan media sosial guna meningkatkan penjualan sekaligus menyebarkan informasi terkait keselamatan listrik. \r\n\r\nDalam sambutannya, Kepala Desa Papungan, Bapak Qudlori, mengapresiasi kegiatan ini sebagai langkah positif dalam pemberdayaan ekonomi masyarakat. “Pelatihan seperti ini sangat bermanfaat bagi pelaku usaha lokal agar bisa berkembang di era digital. Semoga dengan adanya acara ini, UMKM kita semakin maju,” ujarnya.  \r\n\r\nSementara itu, Pimpinan Rumah BUMN Blitar, Ibu Sulis, menjelaskan pentingnya strategi digital dalam pemasaran produk lokal. “Media sosial adalah alat yang sangat efektif untuk promosi. Dengan memahami algoritma dan cara kerja FYP, para pelaku UMKM bisa menjangkau pasar yang lebih luas,” kata Ibu Sulis.  \r\n\r\nAcara ini dihadiri oleh berbagai peserta, termasuk pelaku usaha kecil, mahasiswa, dan masyarakat umum yang tertarik dengan strategi pemasaran digital serta aspek keselamatan listrik.\r\n\r\nPemateri handal juga turut memandu suksesnya agenda tersebut. Yuniar Mahmud Ganda selaku Manajer PLN ULP Sutojayan yang membahas soal penggunaan listrik dalam kehidupan sehari-hari secara bijak. Selain Yuniar, ada Deni Andis I.S., S.T selaku CEO Funvita Indonesia yang mengajak peserta untuk menggunakan media sosial agar bisa dimanfaatkan dengan baik.\r\n\r\n\"Pemanfaatan media sosial beragam, salah satunya untuk berjualan melalui platform-platform digital seperti Facebook, Instagram, TikTok maupun yang lainya,\" ungkap Andis (sapaan akrab Deni Andis).\r\n\r\nSelain memberikan materi, Andis juga mengajak peserta untuk praktik langsung dalam penggunaan media sosial TikTok dan mempromosikan produk UMKM yang mereka miliki. Langkah demi langkah dipandu dengan telaten oleh Andis sampai akhirnya peserta paham bagaimana trik dan tips agar konten jualannya FYP di media sosial.\r\n\r\nMelalui kegiatan ini, diharapkan agar ada tindak lanjut pendampingan kedepannya, juga para peserta dapat mengoptimalkan penggunaan media sosial untuk meningkatkan omset sekaligus memahami pentingnya keselamatan dalam penggunaan listrik sehari-hari.', 'Media Warta Mudjair', 'eEa8yE17pAUrZIVC5DDhtvisQ1rZwuAr9lCJlbjr.jpg', 1, '2025-02-13 14:01:49', '2025-02-13 14:04:35'),
(28, 'Peresmian dan Pengambilan Sumpah Anggota BPD Antar Waktu Desa Papungan', 'Blitar, 17 Februari 2025 – Pemerintah Desa Papungan, Kecamatan Kanigoro, Kabupaten Blitar, menggelar acara peresmian dan pengambilan sumpah anggota Badan Permusyawaratan Desa (BPD) Antar Waktu periode 2019–2027. Acara ini berlangsung dengan khidmat dan dihadiri oleh berbagai pihak terkait.  \r\n\r\nAula Kantor Desa Papungan menjadi saksi atas terlantiknya Muhamad Zaini secara resmi sebagai anggota BPD Antar Waktu Desa Papungan dalam upacara yang disaksikan oleh Camat Kanigoro, Bapak Aan. Dalam sambutannya, beliau menekankan pentingnya peran BPD dalam menjalankan fungsi pengawasan dan aspirasi masyarakat guna mendukung pembangunan desa yang lebih baik.  \r\n\r\nAcara ini berlangsung dengan susunan sebagai berikut:  \r\n1. Pembukaan \r\n2. Menyanyikan Lagu Indonesia Raya\r\n3. Prosesi Pelantikan\r\n4. Penandatanganan Berita Acara\r\n5. Sambutan oleh Camat Kanigoro, Bapak Aan\r\n6. Doa \r\n\r\nTurut hadir dalam acara tersebut Kepala Desa Papungan beserta jajarannya, seluruh anggota BPD Desa Papungan, Babinsa dan Babinkamtibmas Desa Papungan, serta pendamping desa. Kehadiran para pemangku kepentingan ini menunjukkan sinergi yang kuat dalam pemerintahan desa untuk mewujudkan tata kelola yang transparan dan partisipatif.  \r\n\r\nDengan dilantiknya Muhamad Zaini sebagai anggota BPD, diharapkan ia dapat menjalankan tugasnya dengan penuh tanggung jawab serta berkontribusi dalam pembangunan Desa Papungan ke arah yang lebih maju dan sejahtera.', 'Warta Mudjair', 'EOiRFgYo6FzZxJtVnKHNA5cNveDN2rfvqFJKStsX.jpg', 1, '2025-02-17 01:20:07', '2025-02-17 01:21:01'),
(29, 'Posyandu Lansia Desa Papungan, Kanigoro, Blitar, Sukses Gelar Layanan Kesehatan dan Edukasi untuk Masyarakat', 'Blitar, 22 Februari 2025– Posyandu Lansia Desa Papungan, Kecamatan Kanigoro, Kabupaten Blitar, mengadakan kegiatan rutin pelayanan kesehatan dan sosialisasi bagi warga lanjut usia (lansia), hari ini (tanggal, bulan, tahun). Acara yang berlangsung di aula kantor desa tersebut dihadiri oleh kader posyandu, petugas kesehatan, serta para lansia yang antusias mengikuti pemeriksaan dan penyuluhan.\r\n\r\nKetua Posyandu Lansia Desa Papungan, dalam sambutannya, menyampaikan bahwa kegiatan ini merupakan bentuk kepedulian pemerintah desa dan para kader terhadap kesehatan lansia. Selain pemeriksaan kesehatan dasar seperti pengecekan tekanan darah dan berat badan, para lansia juga mendapatkan penyuluhan gizi, informasi pencegahan penyakit degeneratif, serta pentingnya menjaga pola hidup sehat.\r\n\r\n“Tujuan kami adalah memastikan para lansia di Desa Papungan tetap sehat, mandiri, dan memiliki kualitas hidup yang baik. Dengan adanya pemeriksaan rutin dan sosialisasi, kami berharap bisa mendeteksi dini masalah kesehatan sekaligus memberikan edukasi tentang cara mencegahnya,” ujar salah satu kader Posyandu Lansia.\r\n\r\nAcara ini juga mendapat dukungan dari Pemerintah Desa Papungan. Kepala Desa Papungan menuturkan bahwa kegiatan Posyandu Lansia menjadi program prioritas untuk meningkatkan taraf kesehatan masyarakat, khususnya kelompok usia lanjut. Ia berharap kegiatan seperti ini dapat terus berjalan secara konsisten dan mendapat dukungan dari seluruh lapisan masyarakat.\r\n\r\nDalam kesempatan yang sama, petugas kesehatan setempat memberikan motivasi kepada para lansia agar tetap aktif, misalnya melalui senam ringan, menjaga pola makan seimbang, dan rutin memeriksakan kesehatan. Para lansia yang hadir pun tampak senang dan bersemangat mengikuti kegiatan, serta memanfaatkan fasilitas pemeriksaan kesehatan gratis yang disediakan.\r\n\r\nDengan terselenggaranya kegiatan ini, diharapkan kesadaran masyarakat Desa Papungan tentang pentingnya menjaga kesehatan di usia senja semakin meningkat. Program Posyandu Lansia juga menjadi wadah bagi para lansia untuk saling berinteraksi dan berbagi pengalaman, sehingga dapat memupuk kebersamaan serta memperkuat hubungan sosial di lingkungan desa.', 'Warta Mudjair', 'zXVmW4nBMu2qqpJ4pPFKQw60lgUr5T9Z62SKwvuu.jpg', 1, '2025-02-22 04:38:28', '2025-02-22 04:38:45'),
(30, 'Halal Bihalal dan Pengajian Umum  Desa Papungan Penuh Hikmah dan Kebersamaan', 'Papungan, 28 April 2025 — Pemerintah Desa Papungan, Kecamatan Kanigoro, Kabupaten Blitar sukses menggelar acara Halal Bihalal dan Pengajian Umum yang berlangsung khidmat dan penuh kebersamaan. Acara ini diselenggarakan di balai desa setempat dengan menghadirkan mubaligh kondang, Ustadz Abdul Qodir Jaelani, sebagai penceramah utama.\r\n\r\nAcara ini dihadiri oleh Kepala Desa Papungan beserta jajarannya, para Ketua RT dan RW, Babinsa, Bhabinkamtibmas, Karang Taruna Mudjair Papungan, para pelaku UMKM, BPD Desa Papungan, serta seluruh lapisan masyarakat desa yang antusias mengikuti jalannya kegiatan.\r\n\r\nDalam tausiyahnya, Ustadz Abdul Qodir Jaelani menyampaikan tiga pesan utama untuk meraih kehidupan yang penuh barokah. Pertama, menjaga kehalalan dalam makanan; kedua, memperbanyak berkumpul dengan para ulama; dan ketiga, menjaga salat fardhu secara berjamaah di masjid. Tiga poin ini, menurut beliau, adalah kunci penting agar kehidupan umat menjadi lebih tenang, berkah, dan diridai Allah SWT.\r\n\r\nKepala Desa Papungan dalam sambutannya menyampaikan apresiasi atas antusiasme masyarakat dan berharap kegiatan seperti ini dapat terus dilaksanakan secara rutin sebagai wadah silaturahmi dan pembinaan rohani masyarakat desa.\r\n\r\nAcara diakhiri dengan doa bersama, menciptakan suasana penuh kehangatan dan persaudaraan di antara seluruh elemen masyarakat Desa Papungan.', 'Warta Mudjair', 'uOjJfFsUGIQ8zRr033v2TJP7m4dSiJv5rkD4H81e.jpg', 1, '2025-04-29 08:57:40', '2025-04-29 08:58:16'),
(31, 'Musyawarah Desa Khusus Papungan Bentuk Koperasi Desa \"Merah Putih\"', 'Papungan, 23 Mei 2025 — Pemerintah Desa Papungan, Kecamatan Kanigoro, Kabupaten Blitar menggelar Musyawarah Desa Khusus (Musdessus) dalam rangka pembentukan Koperasi Desa “Merah Putih”. \r\n\r\nAcara ini dihadiri oleh berbagai unsur masyarakat, Kepala Desa Papungan, Camat Kanigoro, Babinsa dan Bhabinkamtibmas termasuk perwakilan dari Dinas Koperasi Kabupaten Blitar, Bu Rossa.\r\n\r\nDalam sambutannya, Bu Rossa menekankan pentingnya koperasi desa sebagai penggerak ekonomi masyarakat. Ia menyampaikan bahwa koperasi ini akan memiliki enam jenis usaha, yaitu: simpan-pinjam, pertanian, kelautan, gerai sembako (wajib dimiliki), Apik Desa, kantor koperasi, klinik/tempat pendingin, dan pergudangan. Usaha-usaha ini didukung oleh kolaborasi dengan 18 kementerian.\r\n\r\nTahapan pembentukan koperasi dijelaskan sebagai berikut:\r\n\r\n* Mei: Pembentukan melalui Musyawarah Desa Khusus.\r\n* Juni: Pembentukan badan hukum koperasi.\r\n* Juli: Peluncuran secara nasional.\r\n\r\nBu Rossa juga menekankan pentingnya integritas pengurus koperasi. Pengurus tidak boleh memiliki hubungan darah satu sama lain dan tidak boleh berasal dari unsur pimpinan desa, meskipun pengawas diperbolehkan dari unsur tersebut.\r\n\r\nAdapun syarat menjadi pengawas koperasi adalah:\r\n\r\n1. Tidak pernah menyebabkan usaha lain bangkrut atau pailit.\r\n2. Tidak pernah dipenjara karena masalah keuangan.\r\n\r\nSeluruh keputusan dan hasil musyawarah ini dituangkan dalam berita acara, daftar hadir, serta dokumentasi foto sebagai bukti administratif.\r\n\r\nDalam agenda tersebut juga dibentuk pengurus Koperasi Merah Putih Papungan Kecamatan Kanigoro Kabupaten Blitar yang diketuai oleh Bapak Mudjiono. \r\nKetua\r\n- Bpk. Mujiono\r\n\r\nWakil ketua bidang keanggotaan\r\n- Muhamad Thoyib\r\n\r\nWakil ketua bidang usaha\r\n- Alimi\r\n\r\nSekretaris \r\n- Triya Wibowo\r\n\r\nBendahara\r\n- Gunawan Wibisono\r\nPengawas\r\n\r\nKetua\r\n- Bpk. Khudhori mustajib\r\nAnggota\r\n- Ashari\r\n- Vivi\r\n\r\nTugas selanjutnya diberikan kepada Kepala Desa untuk segera melaksanakan rapat pendirian koperasi sesuai prosedur dan jadwal yang telah ditetapkan.', 'Warta Mudjair', 'PHwMes8tQ1FV1mdCmniGH6XWOOBnmRG4ogvPUCxf.jpg', 1, '2025-05-28 06:52:40', '2025-05-28 06:53:02'),
(33, 'STOP GRATIFIKASI', '\"Satu langkah kecil menolak gratifikasi, satu langkah besar menuju Indonesia bebas korupsi.\"', 'Defi Indriani', 'VxJEG1j3w9HM3ZAlXs0jWMCbiYxqU4GiYSC7c7h8.jpg', 1, '2025-06-17 21:10:23', '2025-06-17 21:10:36'),
(34, 'STOP GRATIFIKASI', 'Budaya anti gratifikasi adalah kunci terciptanya pemerintahan yang bersih dan berwibawa.\r\nBersih, transparan, dan akuntabel: inilah harapan kita untuk masa depan', 'Defi Indriani', '9EeYQqkAlGgOYK5E2NjT0ufdAuwLARBjOlTZe2fF.jpg', 1, '2025-06-17 23:13:14', '2025-06-17 23:13:23'),
(35, 'Sosialisasi Pelaksanaan Seleksi Perangkat Desa', 'Hari ini mereka berkumpul untuk mengikuti sosialisasi seleksi penerimaan perangkat desa yang baru. Ini adalah momen penting bagi desa kita, karena kita akan mencari sosok-sosok terbaik yang akan membantu menjalankan roda pemerintahan desa ke depan. Saya berharap, melalui seleksi ini, kita dapat menemukan perangkat desa yang kompeten, berintegritas, dan memiliki semangat pengabdian yang tinggi untuk memajukan desa kita bersama. Kepada para calon peserta seleksi, saya ucapkan selamat mengikuti tahapan seleksi. Junjung tinggi sportivitas, kejujuran, dan tetap semangat dalam menghadapi setiap tahapan seleksi.\r\n\r\n\"Mari kita sukseskan bersama proses seleksi ini demi terwujudnya pemerintahan desa yang lebih baik.\"', 'Defi Indriani', 'FF1QaYoQB8NIBYi7KR71VgfJOEpDtMRuAW5CZteT.jpg', 1, '2025-06-24 21:52:46', '2025-06-24 21:53:24'),
(36, 'Persyaratan Pendaftaran dan Jadwal  Calon Perangkat Desa', '* Ketentuan lain dan persyaratan khusus dapat menhubungi NARAHUBUNG.\r\n    Wendhy (08165452423)\r\n   Toyib (08563443930)\r\n   Sri Setyo (085749247417)\r\n* Untuk Surat Pernyataan, Daftar Riwayat Hidup, dan Surat Lamaran, bisa diambil di Kantor Sekretariat (Kantor Desa Papungan), saat dibukanya waktu pendaftaran.', 'Defi Indriani', 'fVuNHlF5ba24dR6gTN7LapPrt64ZYY1FW4u5wePe.jpg', 1, '2025-06-24 22:17:51', '2025-06-24 22:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_desas`
--

CREATE TABLE `data_desas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `penjelasan` longtext NOT NULL,
  `penjelasan_raw` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_desas`
--

INSERT INTO `data_desas` (`id`, `foto`, `penjelasan`, `penjelasan_raw`, `created_at`, `updated_at`) VALUES
(1, 'JOEoNzFGPKaZNiYdxcbXQMHSwPFWTk3MCRoLs39Q.jpg', '<p>Desa Papungan, terletak di Kecamatan Kanigoro, Kabupaten Blitar, Jawa Timur, terkenal dengan sejarah budidaya ikan mujair oleh Mbah Moedjair. Desa ini menawarkan kekayaan budaya dan pemandangan alam yang indah. Berbatasan dengan Desa Pojok Kelurahan Garum di utara, Desa Banggle di timur, Desa Tlogo dan Desa Gaprang di selatan, serta Desa Kuningan dan Kelurahan Gedog di barat, Papungan terdiri dari tiga dusun: Dusun Papungan, Dusun Sekardangan, dan Dusun Gajah, dengan 9 RW dan 34 RT. Dengan semangat gotong royong dan inovasi, masyarakat Desa Papungan terus berupaya meningkatkan kesejahteraan bersama melalui berbagai program pembangunan dan pelestarian budaya. Kunjungi Desa Papungan untuk merasakan kehangatan warganya dan keunikan sejarah yang melekat di setiap sudutnya.</p>', 'Desa Papungan, terletak di Kecamatan Kanigoro, Kabupaten Blitar, Jawa Timur, terkenal dengan sejarah budidaya ikan mujair oleh Mbah Moedjair. Desa ini menawarkan kekayaan budaya dan pemandangan alam yang indah. Berbatasan dengan Desa Pojok Kelurahan Garum di utara, Desa Banggle di timur, Desa Tlogo dan Desa Gaprang di selatan, serta Desa Kuningan dan Kelurahan Gedog di barat, Papungan terdiri dari tiga dusun: Dusun Papungan, Dusun Sekardangan, dan Dusun Gajah, dengan 9 RW dan 34 RT. Dengan semangat gotong royong dan inovasi, masyarakat Desa Papungan terus berupaya meningkatkan kesejahteraan bersama melalui berbagai program pembangunan dan pelestarian budaya. Kunjungi Desa Papungan untuk merasakan kehangatan warganya dan keunikan sejarah yang melekat di setiap sudutnya.', '2024-07-28 03:34:50', '2024-07-28 20:52:21'),
(2, '35e4fa35895e5560fa06c8f1aa1324cd.png', '<p>Secara umum Sejarah Desa Papungan sulit untuk dijelaskan, hal ini dikarenakan tidak ada dokumen dan bukti sejarah yang otentik yang dapat digunakan sebagai bahan dalam mengungkap sejarah desa secara obyektif dan bertanggungjawab. Namun dari berbagai penelusuran sejarah dengan metoda wawancara dengan saksi sejarah yang sudah sepuh yang dianggap dapat memberikan data tentang sejarah desa Papungan.<br />\nDikisahkan secara turun temurun bahwa asal mula disebut Papungan, pada zaman dahulu banyak binatang buas dan apabila diburu atau dikepung masuk senggreng dan terus hilang.  Lama-lama menjadi Papungan senggreng sampai sekarang di dusun papungan sebelah timur laut disebut Senggreng.<br />\nPada awalnya berdirinya desa Papungan terdiri dari 3 (tiga) dusun yaitu : <br /></p>\n<ul>\n<li>Dusun Papungan<br /></li>\n<li>Dusun Gajah<br /></li>\n<li>Dusun Sekardangan<br />\n<br />\nAdapun kisah-kisah ketiga dusun tersebut sebagai berikut :<br /></li>\n<li>Dusun Gajah: Asal mula disebut dusun gajah, pada zaman dahulu ada kedungnya gajah (Gothean gajah) letaknya di sebelah barat laut dusun Gajah dan sampai sekarang masih ada bekasnya (petilasan) sedangkan anak dukuhnya disebut Duwet. Yang didahulunya dipotong adalah pohon duwet. Yang babat dusun Gajah adalah Onggo Joyo dan amat Derongi dan keduanya adalah anak strojati asal Ponorogo.<br />\n<br /></li>\n<li>Dusun Papungan: Yang Babat Dusun Papungan bernama Singo Menggolo dan dimakamkan di Karangtengah.<br />\n<br /></li>\n<li>Dusun Sekardangan: Pada Zaman babatnya terdapat bunga yang besar dan ajaib, warna yang atas merah dan yang dibawah warnanya putih. Dari kisah inilah akhirnya disebut Sekardangan. Yang babat adalah orang yang bernama Guno Leksono berasal dari Solo dan dimakamkan di Karang Tengah.</li>\n</ul>', 'Secara umum Sejarah Desa Papungan sulit untuk dijelaskan, hal ini dikarenakan tidak ada dokumen dan bukti sejarah yang otentik yang dapat digunakan sebagai bahan dalam mengungkap sejarah desa secara obyektif dan bertanggungjawab. Namun dari berbagai penelusuran sejarah dengan metoda wawancara dengan saksi sejarah yang sudah sepuh yang dianggap dapat memberikan data tentang sejarah desa Papungan.\r\nDikisahkan secara turun temurun bahwa asal mula disebut Papungan, pada zaman dahulu banyak binatang buas dan apabila diburu atau dikepung masuk senggreng dan terus hilang.  Lama-lama menjadi Papungan senggreng sampai sekarang di dusun papungan sebelah timur laut disebut Senggreng.\r\nPada awalnya berdirinya desa Papungan terdiri dari 3 (tiga) dusun yaitu : \r\n- Dusun Papungan\r\n- Dusun Gajah\r\n- Dusun Sekardangan\r\n\r\nAdapun kisah-kisah ketiga dusun tersebut sebagai berikut :\r\n- Dusun Gajah: Asal mula disebut dusun gajah, pada zaman dahulu ada kedungnya gajah (Gothean gajah) letaknya di sebelah barat laut dusun Gajah dan sampai sekarang masih ada bekasnya (petilasan) sedangkan anak dukuhnya disebut Duwet. Yang didahulunya dipotong adalah pohon duwet. Yang babat dusun Gajah adalah Onggo Joyo dan amat Derongi dan keduanya adalah anak strojati asal Ponorogo.\r\n\r\n- Dusun Papungan: Yang Babat Dusun Papungan bernama Singo Menggolo dan dimakamkan di Karangtengah.\r\n\r\n- Dusun Sekardangan: Pada Zaman babatnya terdapat bunga yang besar dan ajaib, warna yang atas merah dan yang dibawah warnanya putih. Dari kisah inilah akhirnya disebut Sekardangan. Yang babat adalah orang yang bernama Guno Leksono berasal dari Solo dan dimakamkan di Karang Tengah.', '2024-07-28 03:34:54', '2024-07-28 20:51:44'),
(3, 'PgnIrYFZkGifPV1LvxQhQ1M2Aaj20V897KSmOQqV.png', '<p>Struktur organisasi Desa Papungan dipimpin oleh Kepala Desa, Qudlori, yang didukung oleh Sekretaris Desa, Bambang Triwasono. Di bawah Sekretaris Desa, terdapat beberapa bagian: Wendhy Adhan Madani menjabat sebagai Kasi Pemerintahan; Alvian Lukman Nur K. sebagai Kasi Kesejahteraan dan Pelayanan, dibantu oleh Saiful Romadlon sebagai staf; M. Bastomi S. sebagai Kaur Perencanaan dan Umum, dengan Defi Indriani sebagai stafnya; serta Abdul Aziz sebagai Kaur Keuangan, dibantu oleh Afnia Farida Hanim sebagai staf. Selain itu, terdapat tiga Kamituwo atau Kepala Dusun yang bertanggung jawab atas masing-masing dusun: Zaenal Abidin di Dusun Gajah, Alvian Lukman Nur K. di Dusun Papungan, dan Fibri Firmansyah di Dusun Sekardangan.</p>', 'Struktur organisasi Desa Papungan dipimpin oleh Kepala Desa, Qudlori, yang didukung oleh Sekretaris Desa, Bambang Triwasono. Di bawah Sekretaris Desa, terdapat beberapa bagian: Wendhy Adhan Madani menjabat sebagai Kasi Pemerintahan; Alvian Lukman Nur K. sebagai Kasi Kesejahteraan dan Pelayanan, dibantu oleh Saiful Romadlon sebagai staf; M. Bastomi S. sebagai Kaur Perencanaan dan Umum, dengan Defi Indriani sebagai stafnya; serta Abdul Aziz sebagai Kaur Keuangan, dibantu oleh Afnia Farida Hanim sebagai staf. Selain itu, terdapat tiga Kamituwo atau Kepala Dusun yang bertanggung jawab atas masing-masing dusun: Zaenal Abidin di Dusun Gajah, Alvian Lukman Nur K. di Dusun Papungan, dan Fibri Firmansyah di Dusun Sekardangan.', '2024-07-28 03:35:01', '2024-07-28 20:53:51'),
(4, NULL, 'https://www.youtube.com/embed/0qdpec8USmA?si=qLYxfRC72XMThCL-', '-', '2024-07-28 03:35:01', '2024-07-29 11:22:09'),
(5, NULL, 'https://www.youtube.com/embed/jEVjgFkpzt4?si=A4QROAt3RwfJrpT4', '-', NULL, '2024-07-29 02:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_umkms`
--

CREATE TABLE `foto_umkms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `umkm_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_umkms`
--

INSERT INTO `foto_umkms` (`id`, `foto`, `umkm_id`, `created_at`, `updated_at`) VALUES
(2, '5615104fd19ec2f47cd8da3f345a92eb.png', 1, '2024-07-24 13:29:59', '2024-07-24 13:29:59'),
(5, '412912bd84caf5cc9e742038d32a7484.png', 2, '2024-07-24 13:30:32', '2024-07-24 13:30:32'),
(6, '3a115bd9b1e07874e7d19d9754f63a77.png', 2, '2024-07-24 13:30:39', '2024-07-24 13:30:39'),
(11, '3d1d6a7a16c4c56cd9148bca55191ace.png', 5, '2024-07-24 13:32:02', '2024-07-24 13:32:02'),
(12, '5a35eae0ecca59c7b421313868a9d193.png', 6, '2024-07-24 13:32:09', '2024-07-24 13:32:09'),
(13, '2f7632319840fe399b5d4acf4590d3de.png', 6, '2024-07-24 13:32:16', '2024-07-24 13:32:16'),
(15, 'efa7bc5374d8b69740df2d6199e90486.png', 7, '2024-07-24 13:32:54', '2024-07-24 13:32:54'),
(16, 'c8e71a4e5d01bb10c630241cb08323e8.png', 4, '2024-07-28 03:35:08', '2024-07-28 03:35:08'),
(17, '5680b91dbd260a851d2966e878a928d2.png', 4, '2024-07-28 03:35:14', '2024-07-28 03:35:14'),
(18, 'def942a80d8836ee29b555683638c0ef.png', 4, '2024-07-28 03:35:18', '2024-07-28 03:35:18'),
(19, 'ed6e64eeb80c2b449dc17a430e83eaa4.png', 4, '2024-07-28 03:35:20', '2024-07-28 03:35:20'),
(20, 'e3721a3d264b84986aa12ffea1f07a01.png', 5, '2024-07-28 03:35:26', '2024-07-28 03:35:26'),
(21, 'd44081a8a18a338e0c323cd92ca965b9.png', 5, '2024-07-28 03:35:30', '2024-07-28 03:35:30'),
(22, 'd528c03d249c9a636ab2c29ce5d9d606.png', 5, '2024-07-28 03:35:35', '2024-07-28 03:35:35'),
(23, '81f367af228e876e4f8661ebb0c46ce2.png', 5, '2024-07-28 03:35:43', '2024-07-28 03:35:43'),
(24, '913e418ca657ba4cb2562ce3085f9f6c.png', 6, '2024-07-28 03:35:49', '2024-07-28 03:35:49'),
(25, '25508b34fc5b8ce5eebd3bfb9697f745.png', 6, '2024-07-28 03:35:54', '2024-07-28 03:35:54'),
(26, '56213627ce363862063e9e5a862fb227.png', 8, '2024-07-28 03:36:00', '2024-07-28 03:36:00'),
(27, 'f5b48a6a5fce98456c7c11792cff1bbf.png', 8, '2024-07-28 03:36:04', '2024-07-28 03:36:04'),
(28, 'wLOB9Fwjr62Z8FMFE2SBhKxY9EQYCCLjdZV1o2C9.jpg', 1, '2024-07-28 06:59:06', '2024-07-28 06:59:06'),
(29, 'MSVt8hWBDkRdgpu8oMewQGu3DosT0YYXWPTn6JNa.jpg', 1, '2024-07-28 06:59:57', '2024-07-28 06:59:57'),
(30, 'aX4p1NB1U42LpvNbi6PMdYom5RQ97jFFTqG4D322.jpg', 1, '2024-07-28 07:00:13', '2024-07-28 07:00:13'),
(31, '9rHMEcc1TnsYB4Ln9VGBSTSq8zHxBZ7fMMqZhGTP.jpg', 1, '2024-07-28 07:03:25', '2024-07-28 07:03:25'),
(32, 'XLQysy5FyQJQhMFZkuUEumEoyrTWCreXIKb1uIOm.jpg', 1, '2024-07-28 07:48:35', '2024-07-28 07:48:35'),
(33, 'Ie6MOTAckTml5h8uD2tgzAETmdXKsRFd2H4jATYO.jpg', 1, '2024-07-28 16:03:46', '2024-07-28 16:03:46'),
(34, 'VVrinMM2IG6ZiVQIyPTiSDs8hU0trMOnPRDqMwCB.jpg', 10, '2024-07-28 16:58:59', '2024-07-28 16:58:59'),
(35, 'kzlTs671DOJbHHbOohu3kPUXoRKVPXCsi0rE5baH.jpg', 11, '2024-07-28 16:59:23', '2024-07-28 16:59:23'),
(36, 'CU5D5lJ7AYkGcdFsHkIDWqxBo2NQD3FS8Z4mbJ8p.jpg', 13, '2024-07-28 17:14:46', '2024-07-28 17:14:46'),
(37, 'ktL1gtcKL7tdgb9zMHKgP7teYSuppAehF85EQ4Pl.png', 13, '2024-07-28 17:23:56', '2024-07-28 17:23:56'),
(38, 'SD2lstjjYVSxeLMta28VXct2OfLjojE6hJalaArw.jpg', 17, '2024-07-28 17:38:00', '2024-07-28 17:38:00'),
(39, '1LSP8UE8ZQ3RjY5lcSNNwnHxML1QRxMrMvNRosRF.jpg', 18, '2024-07-28 17:39:04', '2024-07-28 17:39:04'),
(40, 'LGM5sZIInszZKaFHf2D7JaKXgkf6uR78H7MworJr.jpg', 19, '2024-07-28 21:24:34', '2024-07-28 21:24:34'),
(41, 'mPsuAveUo2sYRg2Kz2DO0lxVvG5TVayfptNzXCue.jpg', 20, '2024-07-28 21:27:22', '2024-07-28 21:27:22'),
(42, '4XrbLWHCBk061lFzVULl3SRNtgwXInUHseQgbNcV.jpg', 20, '2024-07-28 21:28:08', '2024-07-28 21:28:08'),
(43, 'EwAE0k7rvrTMqjc3vnIsUGg65jKUoHgtbtAoF3Ae.jpg', 20, '2024-07-28 21:33:06', '2024-07-28 21:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Desa', 1, '2024-07-28 03:36:04', '2024-07-28 03:36:04'),
(2, 'Sekretaris Desa', 2, '2024-07-28 03:36:04', '2024-07-28 03:36:04'),
(3, 'Kaur Keuangan', 3, '2024-07-28 03:36:04', '2024-07-28 03:36:04'),
(4, 'Kaur Perencanaan dan Umum', 3, '2024-07-28 03:36:04', '2024-07-28 03:36:04'),
(5, 'Kasi Pemerintahan', 4, '2024-07-28 03:36:04', '2024-07-28 03:36:04'),
(6, 'Kasi Kesejahteraan dan Pelayanan', 4, '2024-07-28 03:36:04', '2024-07-28 03:36:04'),
(7, 'Staf Keuangan Desa', 6, '2024-07-28 03:36:04', '2024-07-28 03:36:04'),
(8, 'Staf Perencanaan dan Umum', 6, '2024-07-28 03:36:04', '2024-07-28 03:36:04'),
(9, 'Staf Kesejahteraan dan Pelayanan', 6, '2024-07-28 03:36:04', '2024-07-28 03:36:04'),
(10, 'Kamituwo Gajah', 5, '2024-08-04 04:09:36', '2024-08-04 04:09:36'),
(11, 'Kamituwo Papungan', 5, '2024-08-04 04:09:36', '2024-08-04 04:09:36'),
(12, 'Kamituwo Sekardangan', 5, '2024-08-04 04:11:12', '2024-08-04 04:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_umkms`
--

CREATE TABLE `jenis_umkms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `umkm_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_umkms`
--

INSERT INTO `jenis_umkms` (`id`, `jenis`, `umkm_id`, `created_at`, `updated_at`) VALUES
(39, 'Opak Gambir', 20, '2024-07-28 20:26:49', '2024-07-28 20:26:49'),
(40, 'Sambel Pecel', 19, '2024-07-28 20:26:59', '2024-07-28 20:26:59'),
(46, 'Matari', 23, '2024-07-29 03:38:36', '2024-07-29 03:38:36'),
(47, 'Warung Makan', 23, '2024-07-29 03:38:36', '2024-07-29 03:38:36'),
(52, 'Opak Gambir', 22, '2024-07-29 03:46:57', '2024-07-29 03:46:57'),
(53, 'Matari', 22, '2024-07-29 03:46:57', '2024-07-29 03:46:57'),
(54, 'lainnya', 24, '2024-07-29 03:49:05', '2024-07-29 03:49:05'),
(55, 'Opak Gambir', 25, '2024-07-29 10:09:10', '2024-07-29 10:09:10'),
(56, 'Warung Makan', 26, '2024-07-29 10:14:50', '2024-07-29 10:14:50'),
(57, 'Durian', 27, '2024-07-29 10:18:07', '2024-07-29 10:18:07'),
(58, 'Bakpia', 28, '2024-07-29 10:20:40', '2024-07-29 10:20:40'),
(61, 'Opak Gambir', 29, '2024-07-29 10:26:11', '2024-07-29 10:26:11'),
(62, 'Opak Gambir', 31, '2024-07-29 10:28:44', '2024-07-29 10:28:44'),
(63, 'Warung Makan', 32, '2024-07-29 10:30:26', '2024-07-29 10:30:26'),
(64, 'Kue Kering', 33, '2024-07-29 10:32:03', '2024-07-29 10:32:03'),
(65, 'Susu', 34, '2024-07-29 10:36:51', '2024-07-29 10:36:51'),
(66, 'Opak Gambir', 30, '2024-07-29 10:45:41', '2024-07-29 10:45:41'),
(67, 'lainnya', 30, '2024-07-29 10:45:41', '2024-07-29 10:45:41'),
(68, 'Opak Gambir', 35, '2024-07-29 10:49:04', '2024-07-29 10:49:04'),
(69, 'Rengginang', 35, '2024-07-29 10:49:04', '2024-07-29 10:49:04'),
(70, 'lainnya', 35, '2024-07-29 10:49:04', '2024-07-29 10:49:04'),
(71, 'Rempeyek', 36, '2024-07-29 10:54:14', '2024-07-29 10:54:14'),
(72, 'Keripik', 36, '2024-07-29 10:54:14', '2024-07-29 10:54:14'),
(73, 'Opak Gambir', 21, '2024-07-29 10:54:39', '2024-07-29 10:54:39'),
(74, 'Cenil', 37, '2024-07-29 10:58:31', '2024-07-29 10:58:31'),
(75, 'Opak Gambir', 38, '2024-07-29 11:01:12', '2024-07-29 11:01:12'),
(76, 'Matari', 38, '2024-07-29 11:01:12', '2024-07-29 11:01:12'),
(77, 'Keripik', 39, '2024-07-29 11:04:43', '2024-07-29 11:04:43'),
(78, 'Opak Gambir', 40, '2024-07-29 11:06:54', '2024-07-29 11:06:54'),
(79, 'Sermier', 41, '2024-07-29 11:09:35', '2024-07-29 11:09:35'),
(80, 'Opak Gambir', 42, '2024-07-29 11:10:53', '2024-07-29 11:10:53'),
(81, 'Opak Gambir', 43, '2024-07-29 11:12:59', '2024-07-29 11:12:59'),
(82, 'lainnya', 44, '2024-07-29 11:16:15', '2024-07-29 11:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lembagas`
--

CREATE TABLE `lembagas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lembagas`
--

INSERT INTO `lembagas` (`id`, `nama`, `alamat`, `kontak`, `created_at`, `updated_at`) VALUES
(10, 'Karang Taruna Mudjair Papungan', 'Jl. Setro Jati No.01', '085823650523', '2024-07-28 20:02:15', '2024-07-29 03:32:41'),
(12, 'Badan Permusyawaratan Desa', 'Jl. Setro Jati No.01', '-', '2024-07-28 20:41:18', '2024-07-29 11:12:17'),
(17, 'BUMDES Desa Papungan', 'Jl. Setro Jati No.01', '-', '2024-07-29 03:51:57', '2024-07-29 11:12:33'),
(18, 'Kelompok Informasi Masyarakat (KIM) \"Warta Mudjair\"', 'Jl. Setro Jati No.01', '081554257054', '2024-07-29 11:14:16', '2024-07-29 11:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_14_184801_create_personal_access_tokens_table', 1),
(5, '2024_07_14_185351_create_beritas_table', 1),
(6, '2024_07_16_175620_create_perangkat_desas_table', 1),
(7, '2024_07_17_050303_drop_name_from_users_table', 1),
(8, '2024_07_17_052059_add_is_accepted_to_beritas_table', 1),
(9, '2024_07_17_173041_create_pengumumen_table', 1),
(10, '2024_07_17_174645_rename_teks_column', 1),
(11, '2024_07_18_050641_create_aspirasis_table', 1),
(12, '2024_07_18_052833_change_teks_datatype_on_beritas_table', 1),
(13, '2024_07_18_060756_change_isi_datatype_on_pengumumen_table', 1),
(14, '2024_07_18_162641_add_kontak_to_perangkat_desas', 1),
(15, '2024_07_18_180912_create_jabatans_table', 1),
(16, '2024_07_19_060544_create_data_desas_table', 1),
(17, '2024_07_19_131111_create_umkms_table', 1),
(18, '2024_07_19_133036_create_foto_umkms_table', 1),
(19, '2024_07_19_142901_create_lembagas_table', 1),
(20, '2024_07_19_174234_create_jenis_umkms_table', 1),
(21, '2024_07_20_032556_drop_jenis_from_umkms', 1),
(22, '2024_07_20_063934_create_visi_misis_table', 1),
(23, '2024_07_21_031330_change_jabatan_to_jabatan_id_on_perangkat_desas_table', 1),
(24, '2024_07_21_164940_create_pariwisatas_table', 1),
(25, '2024_07_24_071827_add_is_checked_to_aspirasis_table', 1),
(26, '2024_07_24_090341_change_foto_from_data_desas', 1),
(27, '2024_07_26_150832_rename_penulis_column', 2),
(28, '2024_07_26_211301_add_nama_column', 3),
(29, '2024_07_28_080630_add_penjelasan_raw_column', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pariwisatas`
--

CREATE TABLE `pariwisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `penjelasan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pariwisatas`
--

INSERT INTO `pariwisatas` (`id`, `foto`, `penjelasan`, `created_at`, `updated_at`) VALUES
(6, 'fh8Xco4fVN5AqfKjf93DJKp9SKDuS21ru1Sqa69K.jpg', 'Makam Mbah Moedjair', '2024-08-12 16:44:32', '2024-08-12 16:44:32'),
(7, 'tQ4udJhIZ3XTPfg3pFtVwbPjiG6xiFIZfbrvpGQF.jpg', 'Makam Mbah Moedjair', '2024-08-12 16:45:31', '2024-08-12 16:45:31'),
(8, 'VP7cv7xqqTkK8Hwt1bmqprRZWwtm8jr7sh1QV1r1.jpg', 'Makam Mbah Moedjair', '2024-08-12 16:45:31', '2024-08-12 16:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumumen`
--

CREATE TABLE `pengumumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `isAccepted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumumen`
--

INSERT INTO `pengumumen` (`id`, `judul`, `isi`, `nama`, `isAccepted`, `created_at`, `updated_at`) VALUES
(12, 'Ayo Ikuti dan Meriahkan! Acara Senam TERA se-Kecamatan', 'Kepada seluruh warga Desa Papungan, mari bersama-sama kita meriahkan acara Senam TERA se-Kecamatan yang akan dilaksanakan pada:\r\n🗓 Tanggal: Jumat, 19 Juli 2024\r\n⏰ Waktu: Pukul 06.00 WIB\r\n📍 Tempat: Balai Desa Papungan', 'riri', 1, '2024-07-28 03:36:28', '2024-07-28 21:09:34'),
(23, 'Penting! Jangan Lewatkan! Acara Pengambilan Sembako untuk Warga Desa Papungan', 'Kepada seluruh warga Desa Papungan, kami mengumumkan bahwa akan diadakan acara Pengambilan Sembako yang disediakan khusus untuk warga desa. Acara ini akan dilaksanakan pada:\r\n🗓 Tanggal: Rabu, 10 Juli 2024 🕰 Waktu:\r\nSesi 1: 10.00 - 12.00\r\nSesi 2: 12.30 - 14.00', 'riri', 1, '2024-07-28 21:12:02', '2024-07-28 21:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat_desas`
--

CREATE TABLE `perangkat_desas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perangkat_desas`
--

INSERT INTO `perangkat_desas` (`id`, `nama`, `kontak`, `foto`, `created_at`, `updated_at`, `jabatan_id`) VALUES
(2, 'Bambang Triwasono', '0367 8669 9391', 'iv3o5L5syADZF5fSD3KtHHStabSBqKHCfC5QcI4z.jpg', '2024-07-28 03:36:41', '2024-07-28 21:08:11', 2),
(3, 'Wendhy Adhan Madani', '0820 2896 856', 'mBggvR9Bkcu8f80U2b10GpYZdFJ9QwG24vLeUGgC.jpg', '2024-07-28 03:36:48', '2024-07-28 21:10:37', 5),
(4, 'M. Bastomi S.', '(+62) 359 0941 666', 'oBnr0VZQPWvfInIss28am77XY35NmYZJtwyzpzNk.jpg', '2024-07-28 03:36:51', '2024-07-28 21:09:43', 4),
(5, 'Abdul Aziz', '(+62) 346 2852 6966', 'Eh02hpxvNQ44GXHy3V2e1WGWqulkKjoLIMFNuH09.jpg', '2024-07-28 03:36:55', '2024-07-28 21:11:15', 3),
(6, 'Alvian Lukman Nur Khakim', '0294 1338 656', 'RshJoCW6QFaRqhTmJ6hmaSZM4oByiHn1iMKQMCeL.jpg', '2024-07-28 03:37:00', '2024-07-28 21:12:04', 6),
(7, 'Afnia Farida Hanim', '(+62) 28 2240 744', '4efDftwj1a7ZRYs6i7c8V0FpTsXeTIncbwJS0cXL.jpg', '2024-07-28 03:37:07', '2024-07-28 21:12:55', 7),
(8, 'Defi Indriani', '(+62) 5856665522', 'X8Xe0TVQVrG14Cqqos1IFPr0SZGzeRzxxYNY3s65.jpg', '2024-07-28 03:37:14', '2024-07-29 03:31:02', 8),
(10, 'Qudlori', '-', 'dpc6OkaCTSsWrtn30pFAJ8IgfJJrk0IfDrK2oro5.jpg', '2024-07-28 20:55:39', '2024-07-28 21:07:15', 1),
(11, 'Saiful Romadlon', '0820 2896 856', 'J4duN6XF1oqt2QgLXPwcMKAeoRNB3vFGNj4ZDItR.jpg', '2024-07-28 21:14:30', '2024-07-28 21:25:22', 9);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(13, 'App\\Models\\User', 1, 'access-token', '9a402106aa4c0cd9e02d2912fa0453342ead10b04e83677cb328523a308af03d', '[\"*\"]', '2024-07-25 11:01:47', NULL, '2024-07-25 06:46:56', '2024-07-25 11:01:47'),
(14, 'App\\Models\\User', 1, 'access-token', 'c44fe3652ef625ced3365b6568fb9f912755a3ad56691bdb7083319374c2afda', '[\"*\"]', '2024-07-26 02:10:24', NULL, '2024-07-25 23:23:48', '2024-07-26 02:10:24'),
(15, 'App\\Models\\User', 1, 'access-token', '966ff90000d2c99ba5eacfab1138578bf2c3df61050f045f6d9df3ee038afadc', '[\"*\"]', NULL, NULL, '2024-07-26 07:26:49', '2024-07-26 07:26:49'),
(16, 'App\\Models\\User', 1, 'access-token', 'fc7622679ebda53b8e164558d4d31d00046245b9321fcfdc9ed291491586bdbb', '[\"*\"]', '2024-07-26 20:17:18', NULL, '2024-07-26 14:47:36', '2024-07-26 20:17:18'),
(17, 'App\\Models\\User', 1, 'access-token', 'a12bf7f8694ad76accb77ebd71df0542cd1e3ad322310925c298ca5631014212', '[\"*\"]', NULL, NULL, '2024-07-27 00:20:15', '2024-07-27 00:20:15'),
(19, 'App\\Models\\User', 1, 'access-token', 'dceacbab8ae1cfb66cafc4be193181a89100b5dc1819ab241804d66ce81cab9d', '[\"*\"]', '2024-07-27 12:18:40', NULL, '2024-07-27 09:28:48', '2024-07-27 12:18:40'),
(20, 'App\\Models\\User', 1, 'access-token', '923867d13e320e90022298a18a9c46822a0d9fbe339a73ffe25493ba1c934451', '[\"*\"]', '2024-07-27 19:29:05', NULL, '2024-07-27 15:23:43', '2024-07-27 19:29:05'),
(22, 'App\\Models\\User', 1, 'access-token', 'd2b1929766f71da9e22c4c993359042faf5b56de65496e739d33d7b6407079a5', '[\"*\"]', '2024-07-28 07:23:53', NULL, '2024-07-28 04:27:13', '2024-07-28 07:23:53'),
(23, 'App\\Models\\User', 1, 'access-token', '572f216565959052b8f88cee40d3002f6b9acd0eb977dfe96347f08646e933b0', '[\"*\"]', '2024-07-28 07:48:35', NULL, '2024-07-28 07:02:37', '2024-07-28 07:48:35'),
(24, 'App\\Models\\User', 1, 'access-token', '3c1624f64cab22416a337c70bf977c5d15d0b1f446a90b08a6b40eba4681d652', '[\"*\"]', '2024-07-28 18:00:28', NULL, '2024-07-28 15:42:39', '2024-07-28 18:00:28'),
(25, 'App\\Models\\User', 1, 'access-token', 'ad0584eaee2a0023d12a783a5940a204a7355292b49904f1f13440d349a24c15', '[\"*\"]', '2024-07-28 18:43:01', NULL, '2024-07-28 18:40:09', '2024-07-28 18:43:01'),
(27, 'App\\Models\\User', 1, 'access-token', 'b146e337f1ce92cf4626768e31b409938cbe8166e07f636228000fd18fe6012c', '[\"*\"]', NULL, NULL, '2024-07-28 19:16:05', '2024-07-28 19:16:05'),
(28, 'App\\Models\\User', 1, 'access-token', '5052e04bce4c443992a82a5e8e38b4743ae8f9ed8a679ea97b85b5af19d005d2', '[\"*\"]', '2024-07-28 21:13:22', NULL, '2024-07-28 19:34:33', '2024-07-28 21:13:22'),
(29, 'App\\Models\\User', 1, 'access-token', '4c8136bb3663b2f652ae564a5c64dce189f614183c3af230b68132e13f037b35', '[\"*\"]', '2024-07-28 21:28:08', NULL, '2024-07-28 19:36:22', '2024-07-28 21:28:08'),
(30, 'App\\Models\\User', 1, 'access-token', 'e5914503183c83c49dc82af8b9cfd1bac89fce5eb9d6d7603fc4e46cd23e4c50', '[\"*\"]', '2024-07-28 21:33:05', NULL, '2024-07-28 19:46:18', '2024-07-28 21:33:05'),
(38, 'App\\Models\\User', 1, 'access-token', 'af02adff6662b538af7265a2e5f5c67663c36cfe09ca4dfbf21ad1e258d82f7b', '[\"*\"]', NULL, NULL, '2024-07-29 02:04:51', '2024-07-29 02:04:51'),
(40, 'App\\Models\\User', 1, 'access-token', 'df85da74df0bd77a1234e32d23f6f139c6e1888e2078a67d984e55cc4f52ff62', '[\"*\"]', '2024-07-29 02:07:48', NULL, '2024-07-29 02:06:15', '2024-07-29 02:07:48'),
(43, 'App\\Models\\User', 1, 'access-token', '047acde292ed6469bf8114c619f4a07077b3d75fef9d6bf7fab2375f72f98806', '[\"*\"]', NULL, NULL, '2024-07-29 02:33:45', '2024-07-29 02:33:45'),
(44, 'App\\Models\\User', 1, 'access-token', '70edcd93bab0398b467268246f38118c69acdd50733689e16dca2efc510b3827', '[\"*\"]', '2024-07-29 03:49:05', NULL, '2024-07-29 02:43:04', '2024-07-29 03:49:05'),
(45, 'App\\Models\\User', 1, 'access-token', 'b15191eb05ed97b271137cd851a2ff2a7397cd0d444b6a82651613ad2efc8960', '[\"*\"]', '2024-07-29 03:52:38', NULL, '2024-07-29 02:43:07', '2024-07-29 03:52:38'),
(47, 'App\\Models\\User', 1, 'access-token', 'b0d021da446d0e651f2cdefc1203d38a9d83f1a2fe48e37187cedd158ad74ef7', '[\"*\"]', '2024-07-29 02:54:09', NULL, '2024-07-29 02:46:03', '2024-07-29 02:54:09'),
(48, 'App\\Models\\User', 1, 'access-token', '1b737fb91cd36134adf86da6b003de21a5dbff2ec9925bcf756c5c0d68472839', '[\"*\"]', NULL, NULL, '2024-07-29 09:41:29', '2024-07-29 09:41:29'),
(50, 'App\\Models\\User', 1, 'access-token', 'd65f73c502521623a6ba30648a6765cb328f21c54362a075d6f13341a684e54d', '[\"*\"]', '2024-07-29 12:15:28', NULL, '2024-07-29 10:04:46', '2024-07-29 12:15:28'),
(51, 'App\\Models\\User', 1, 'access-token', '6b75a751ec24832602ace864947fd9a3835fb524a554ca5b192c02601a9e4160', '[\"*\"]', NULL, NULL, '2024-07-29 11:43:03', '2024-07-29 11:43:03'),
(55, 'App\\Models\\User', 1, 'access-token', '4d8d1c6c261ecaf3c831d0be78912a136b57113177e37ddf1fdba49451fd2cf0', '[\"*\"]', '2024-08-03 20:56:41', NULL, '2024-08-03 20:50:44', '2024-08-03 20:56:41'),
(56, 'App\\Models\\User', 1, 'access-token', '39a41fb341731d262f28fb8df6172961005832cc8d59c63ccea87a98913b199a', '[\"*\"]', NULL, NULL, '2024-08-03 21:12:09', '2024-08-03 21:12:09'),
(58, 'App\\Models\\User', 1, 'access-token', '29911caf24f9dee046cc1a9c63e13b6ed9750a3925189656d476470969ca8ffa', '[\"*\"]', '2024-08-04 18:46:10', NULL, '2024-08-04 18:43:06', '2024-08-04 18:46:10'),
(59, 'App\\Models\\User', 1, 'access-token', '164508acae85b989fe2393e8ff9c1dd084e9bfacd32c67f342737340abf8cb41', '[\"*\"]', '2024-08-11 07:19:08', NULL, '2024-08-11 07:18:46', '2024-08-11 07:19:08'),
(60, 'App\\Models\\User', 1, 'access-token', '65e4a78b374579c61b682400a025d7fd3c399ee50853340757696e392c9c6e2f', '[\"*\"]', '2024-08-12 09:49:08', NULL, '2024-08-12 09:16:12', '2024-08-12 09:49:08'),
(61, 'App\\Models\\User', 1, 'access-token', '31ba847e276b5d89338a5d47e5992b07344b1d6939057bd76ba6a5e2fe21e293', '[\"*\"]', '2024-08-13 19:03:29', NULL, '2024-08-13 18:23:23', '2024-08-13 19:03:29'),
(62, 'App\\Models\\User', 1, 'access-token', 'b4c27875a0f905a0c4d77b7ac44829d9c6e8580a61e43393b1263b4fb5489c2a', '[\"*\"]', '2024-08-21 21:21:03', NULL, '2024-08-21 21:12:17', '2024-08-21 21:21:03'),
(63, 'App\\Models\\User', 1, 'access-token', '572e52d9ae4f00d9a67597d5c79caeedf591f34fdbd25f79e0f6e28bf4da128f', '[\"*\"]', '2024-09-08 19:59:14', NULL, '2024-09-08 18:23:03', '2024-09-08 19:59:14'),
(65, 'App\\Models\\User', 1, 'access-token', 'c51a8fd7626600c52f4fe0f2d36db19d80ba95e23a5f6dd3d498982c5153e85f', '[\"*\"]', '2024-10-07 21:03:02', NULL, '2024-10-07 21:00:34', '2024-10-07 21:03:02'),
(66, 'App\\Models\\User', 1, 'access-token', '809af782727e362a934da97941ab43caab35367cf2db87f3f87ad8e9e5be2802', '[\"*\"]', '2024-10-08 23:04:19', NULL, '2024-10-08 22:40:51', '2024-10-08 23:04:19'),
(67, 'App\\Models\\User', 1, 'access-token', '8e2a61781054d00e090594e168b04cebd0d61a189f5201bf5ba6bebaa63815fb', '[\"*\"]', NULL, NULL, '2024-10-14 19:10:30', '2024-10-14 19:10:30'),
(68, 'App\\Models\\User', 1, 'access-token', '695525616d42c9f0c159f58d2ccdcf63634d345fa3bad7dd392c14859b899fa3', '[\"*\"]', '2024-10-14 21:34:54', NULL, '2024-10-14 21:04:32', '2024-10-14 21:34:54'),
(69, 'App\\Models\\User', 1, 'access-token', '1dbc9a1abf4a56e9e124fd210eb38689aedecea10af903fadceef136d99f2326', '[\"*\"]', '2024-10-23 22:20:50', NULL, '2024-10-23 21:01:18', '2024-10-23 22:20:50'),
(70, 'App\\Models\\User', 1, 'access-token', '02082ea159c0b03fe327ae004fdd920ce5536b7182dc0432235397b20c30ddab', '[\"*\"]', '2024-10-24 18:21:52', NULL, '2024-10-24 18:21:23', '2024-10-24 18:21:52'),
(71, 'App\\Models\\User', 1, 'access-token', '859f626ae1f7b113f2063a7922b8c8400880989011f9df5ba9669babfbbc52e4', '[\"*\"]', '2025-02-04 17:53:54', NULL, '2025-02-04 17:46:06', '2025-02-04 17:53:54'),
(74, 'App\\Models\\User', 1, 'access-token', 'ed95c7d3b1f2381ccd53f9a5693a8dbbded07448447f4a9c9d359e0ac6d61b86', '[\"*\"]', '2025-02-17 01:21:01', NULL, '2025-02-17 01:14:08', '2025-02-17 01:21:01'),
(76, 'App\\Models\\User', 1, 'access-token', '2ad3044a05b8980e4edd8f34886627cb6410e1ff89c769172b2a0318543c8b6d', '[\"*\"]', '2025-04-29 08:58:16', NULL, '2025-04-29 08:43:03', '2025-04-29 08:58:16'),
(77, 'App\\Models\\User', 1, 'access-token', 'c3c0025c52ea8bd87741d8f093b4bcbd71ce0e8567047329cd0fb5d84382c07d', '[\"*\"]', NULL, NULL, '2025-05-28 04:07:20', '2025-05-28 04:07:20'),
(78, 'App\\Models\\User', 1, 'access-token', 'b9c1065f2f439abf4fdc35648717cd80e396101fea20f3bca43998112ac08fc0', '[\"*\"]', NULL, NULL, '2025-05-28 04:10:16', '2025-05-28 04:10:16'),
(80, 'App\\Models\\User', 1, 'access-token', '5242e1d5764b7a97cc2b7fa1ddc094dca5557420e001ede3cde7992fdc82cdf9', '[\"*\"]', '2025-06-17 23:13:23', NULL, '2025-06-17 20:42:09', '2025-06-17 23:13:23'),
(81, 'App\\Models\\User', 1, 'access-token', '98aab5a9c040cd361b0c779d630e546bc12715d4fb498e4db3d4047d2eb258e3', '[\"*\"]', '2025-06-24 22:18:04', NULL, '2025-06-24 21:22:49', '2025-06-24 22:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1eMC7MH97tV6ADAGhyiqpQ7OyeQbX090LxR0jI0f', NULL, '180.248.30.116', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDRXNjg5SzgxMWVOWW5DWkFIN0prS0E4Nk1QcDlzRnV6Z21POVQwdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751375782),
('2mZuKOxLxWs3DJhC153NP0To1b6jBh1jyzYUXw8v', NULL, '204.236.207.144', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnRTS1NNRE5OaXF6QVRoQjJpcENQUm1hVlhCR1Y1SEx3WEg4OUdIVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbS9wZXRhLXdpbGF5YWgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751376925),
('36cCgQME0dzKaA6hBzfd1gCK3Y8QgTqhXRqi68LU', NULL, '195.211.77.142', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0xKMUF5RWVwTlB1eGNkZWE3VEtaSWhGRllsMWRjT2Y3cUJ1RnlTaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751376686),
('3KujTCExmE1S4PgIPKTdpyzoBNNRCHXxeBXP9FUx', NULL, '205.169.39.44', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGZiVWxiTDBwUnlYUWlYdFJOZTRkQlBhak5FcWFSQ1IzazlvWUFnTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751376752),
('7j2BLHqyukA8G1C0btlId9eesrSssoPVD7iVqfxc', NULL, '180.248.21.65', 'Mozilla/5.0 (X11; Linux x86_64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVNjbW9nbWZnc2NsM2dHME1DdlRHYjdQb1E4OHhMNGNZUWNzWFVGZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbS9wZXRhLXdpbGF5YWgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751376623),
('c2rdKeME9m2HQapTaSq09JMypOqfAfzQOwpgloDN', NULL, '13.220.5.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.66 Safari/537.36 Edg/103.0.1264.44', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHNZZXlma2tvMTl6TU1NQzdYRUtJQ3FjanJ6OUtUVU5sdWNQU25PVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbS9wZXRhLXdpbGF5YWgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751376851),
('eCd6FvFSrF8ebiQp00NddivO4tgujCswM6deG7tv', NULL, '180.252.115.167', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUnMwNTJsYmhlVVlJMmxFSHZWOGZjVHI4TEc4TUV0TG1zZnJMQnU5QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751376642),
('Ed5d3XE7POgSrG9GYbhekxFs8VLlHFORNOn41Wkr', NULL, '66.249.70.68', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.7151.103 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQW1CRFBFR0FZdEZVRUw2bDRFUldXNTR3NHFpd0lOV1hGMDFPdFgxSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbS9wP3RhcmdldElEPXNlamFyYWgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751370911),
('jaZwWhwWXPd57X7BxRfIRLNluq2BMzBj1s19jACI', NULL, '180.252.115.167', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFV6ZHljdkVPU2h2aDJaa012U1dWM0trTHF2ZVFWTVhkd1lCN0N1diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbS9wZXRhLXdpbGF5YWgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751376644),
('k5jhDSM2N3ivCbHzzR4f8gVUStvJSdWR9i6tVNtj', NULL, '154.28.229.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFJuWFVtY2NpSTRTOUxJZ3BYMVBFTlRwRW1XQmJJWUt2SWNxRFM4VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751376696),
('neXwOb3uEuhw31ikTKQC4oE3CXWcy8FUMCLDsbb4', NULL, '104.164.173.40', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicjU1ZVNjZnl3ZDQ3c1BKbU5BOXV5aUFFTDRkanpTeGtiNkJqOGh5MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751376703),
('QBABxgu5eXLwiSnRIeFY6In1rHZzey3K8WaXKhzP', NULL, '195.211.77.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmNFSmlGZDNPZm1MQ21JbUQxc0VuQUxMOHdIb3JsZlJkR0k0NEZnUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751376672),
('sT5qBykceLyvLe9CsqsBTNzxwA5EtUdER6XXpkYp', NULL, '180.252.115.167', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSlp1Tnh6NlptdU9PbWFpVTZUbmFNaEI2bzFpeGhrOVZoSDl6YkJXZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751376651),
('UcxBAnyvfzrb3kVsHZq3IfNLSyCb2AguioXX5g3U', NULL, '101.255.119.73', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWxGSG5DNTRITGN6ZHdDSzNGR1RHcmxxY2JWMGNSODdlU0RWYWxQQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbS9wP3RhcmdldElEPXRlbnRhbmdrYW1pIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751370774),
('VdapAK259mZ5yeRhml2DkpHohSmzeLgntunZ8wlf', NULL, '180.248.21.65', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQW1vSTY1aVVyM042c3hkRVJpR293VVp4eDNidlJKeHFoWGRSY3NvQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751376631),
('vXjXACOcIbw5xSJqvcM7o3jcWhexfQf0igXBs4Qk', NULL, '52.204.12.123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.66 Safari/537.36 Edg/103.0.1264.44', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXQydkRONGRuclRKaUlnbVpkckRJcGRuZlFzUjU3em9LUWJvNFdRSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbS9wZXRhLXdpbGF5YWgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751376850),
('XCYUTxizwg1ksSMZaunyiu0ltMVHpwRHWsT5YHVg', NULL, '34.122.147.229', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/125.0.6422.60 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidWFjbTFXb0p1OThuNmdkOHVRUElzald6SDZNVWdQcXZWTUV3NGtzViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbS9wZXRhLXdpbGF5YWgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751376756),
('xffjPhvvHW3cBKLNMVxpULi6E8AF7k8r7yuvQavM', NULL, '18.208.169.223', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGU0MlU2TDRlN3EyTDRNTDRpZmtMQW5NMUdCdTMxclFkUGlvNFZMSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbS9wZXRhLXdpbGF5YWgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751376871),
('xKT0RpoW0AOalScvPFJQXIac7gvn7lVxpcOCVuXH', NULL, '154.28.229.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY3V2RGY3Zzhyc1RJSHl3TDYzb2k1ZjFCekwxOFY4VDJZSzNwOWF3biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vcGFwdW5nYW4tYmxpdGFya2FiLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751376712);

-- --------------------------------------------------------

--
-- Table structure for table `umkms`
--

CREATE TABLE `umkms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `jam_buka` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `long` double NOT NULL,
  `no_nib` varchar(255) NOT NULL,
  `no_pirt` varchar(255) NOT NULL,
  `no_halal` varchar(255) NOT NULL,
  `no_bpom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `umkms`
--

INSERT INTO `umkms` (`id`, `nama`, `deskripsi`, `alamat`, `kontak`, `jam_buka`, `lat`, `long`, `no_nib`, `no_pirt`, `no_halal`, `no_bpom`, `created_at`, `updated_at`) VALUES
(19, 'S2 Echo', 'Menambah bumbu menambah rasa', 'RT 3/RW 9', '085649382847', '07.00-21.00', -8.112816, 112.202583, '-', 'ada', 'ada', '-', '2024-07-28 20:16:42', '2024-07-28 20:26:59'),
(20, 'Langgeng Mulya', 'Terdapat kemasan 200 gr dan 500 gr, berdiri sejak tahun 2012, ENAK GURIH RENYAH', 'RT 3/RW 9', '085655528973', '07.00-21.00', -8.1101752, 112.190017, 'ada', 'ada', 'ada', '-', '2024-07-28 20:20:20', '2024-07-28 20:26:49'),
(21, 'Aneska Camilan', 'Berdiri sejak 2021', 'RT 1/RW 9', '-', '07.00-21.00', -8.111467, 112.197807, '-', 'ada', 'ada', '-', '2024-07-28 20:26:35', '2024-07-29 10:54:39'),
(22, 'Dua Putra Mandiri', 'Menerima pesanan opak gambir dan matari ( kembang goyang) dengan berbagai macam kemasan.', 'Dusun Sekardangan RT 03 RW 08 Desa Papungan Kec. Kanigoro Kab. Blitar', '081335939208', '07.00-21.00', -8.1120907, 112.1991165, 'ADA', 'ADA', 'ADA', '-', '2024-07-28 20:32:26', '2024-07-29 03:46:57'),
(23, 'Ani Puspita', 'aaaa', 'Jl.Akordion perumahan Bumi Tunggulwulung Indah BLok M-3', '098736748953', '23:00 - 05-00', -8.1050557174604, 6.83924, '0240 2714 401', '79870', '0975 4096 694', '(+62) 447 3618 0187', '2024-07-29 03:38:15', '2024-07-29 03:38:15'),
(24, 'Toko Besi Berkah Bangunan', 'hhhh', 'Duwet Papungan', '08585858585', '07.00 - 16.00', -8.1024178, 112.2000079, '-', '-', '-', '-', '2024-07-29 03:49:05', '2024-07-29 03:49:05'),
(25, 'Opak Gambir Bu Winarti', 'Berdiri sejak 2012. Melayani khususnya pesanan besar, pesan antar dan bisa pick-up sendiri', 'RT 3/RW 9', '081216542959', '07.00-21.00', -8.112455, 112.201218, '-', '-', '-', '-', '2024-07-29 10:09:10', '2024-07-29 10:09:10'),
(26, 'Warong 17', 'Buka dari tahun 2021', 'RT 1/RW 1', '085706226561', '10.00-21.00 (Senin Libur)', -8.0944875, 112.2067344, '0509220045421', '-', '-', '-', '2024-07-29 10:14:50', '2024-07-29 10:14:50'),
(27, 'Agen Buah Durian', 'duren', 'RT 1/RW 1', '-', '07.00-21.00', -8.089969, 112.204752, '-', '-', '-', '-', '2024-07-29 10:18:07', '2024-07-29 10:18:07'),
(28, 'Bakpia Aretha', 'menerima pesanan min.6 kotak', 'RT 2/RW 3', '081358535071', '07.00-21.00', -8.09896, 112.204361, 'ada', 'ada', 'ada', '-', '2024-07-29 10:20:40', '2024-07-29 10:20:40'),
(29, 'Ayda Opak Gambir', 'gurih, nikmat, lezat', 'RT 3/RW 2', '085604770211', '07.00-21.00', -8.095087, 112.204605, '-', 'ada', 'ada', '-', '2024-07-29 10:23:55', '2024-07-29 10:26:11'),
(30, 'Snack Rejeki', 'menerima distributor ke toko oleh-oleh khas blitar', 'RT 3/RW 2', '081337253905', '07.00-21.00', -8.096832, 112.20105, 'ada', 'ada', 'ada', '-', '2024-07-29 10:25:56', '2024-07-29 10:25:56'),
(31, 'Arya Jaya', 'Berdiri sejak tahun 2019', 'RT 3/RW 9', '085854575193', '07.00-21.00', -8.112032, 112.201363, '-', '-', '-', '-', '2024-07-29 10:28:44', '2024-07-29 10:28:44'),
(32, 'Warung Sumbulatin', '-', 'RT 1/RW 7', '-', '07.00-21.00', -8.107667, 112.192589, '-', '-', '-', '-', '2024-07-29 10:30:26', '2024-07-29 10:30:26'),
(33, 'Difa Cookies', 'Menerima pesanan langsung / via WA', 'RT 3/RW 7', '081336786562', '09.00-16.00', -8.108366, 112.192535, '-', 'ada', '-', '-', '2024-07-29 10:32:03', '2024-07-29 10:32:03'),
(34, 'Saanen Jaya', 'Ready Stock', 'RT 1/RW 8', '085755427700', '07.00-21.00', -8.110455, 112.195946, 'ada', 'ada', 'ada', '-', '2024-07-29 10:36:51', '2024-07-29 10:36:51'),
(35, 'Rizki Abadi', 'terima pesanan untuk souvenir acara hajatan', 'RT 2/RW 8', '085704878778', '07.00-21.00', -8.1078151, 112.1963617, '-', 'ada', 'ada', '-', '2024-07-29 10:49:04', '2024-07-29 10:49:04'),
(36, 'Keripik Pisang Dewi Ratih', 'Keripik tahan 3 bulan dan peyek hanya tahan sebentar', 'RT 3/RW 8', '085804188498', '07.00-21.00', -8.111429, 112.199287, 'ada', '-', '-', '-', '2024-07-29 10:54:14', '2024-07-29 10:54:14'),
(37, 'Rubiyah Kicak Cenil', '-', 'RT 1/RW 9', '-', '07.00-21.00', -8.1115739, 112.1954616, '-', '-', '-', '-', '2024-07-29 10:58:31', '2024-07-29 10:58:31'),
(38, 'Sekar Mawar', '-', 'RT 3/RW 8', '0855335445002', '07.00-21.00', -8.1082588, 112.1975727, '-', '-', '-', '-', '2024-07-29 11:01:12', '2024-07-29 11:01:12'),
(39, 'FI BI Sekar Ayu', 'SEJAK 2017', 'RT 3/RW 9', '085735977540', '07.00-21.00', -8.113844, 112.199997, '-', 'ada', '-', '-', '2024-07-29 11:04:43', '2024-07-29 11:04:43'),
(40, 'Eka Mandiri', 'SEJAK 2010', 'RT 3/RW 9', '081239391109', '07.00-21.00', -8.109946, 112.199593, '-', 'ada', 'ada', '-', '2024-07-29 11:06:54', '2024-07-29 11:06:54'),
(41, 'Sermier 70', 'enak, gurih, renyah. terima pesanan dan ready stock', 'RT 4/RW 6', '085648825646', '07.00-21.00', -8.1084073, 112.1944051, 'ada', 'ada', 'ada', '-', '2024-07-29 11:09:35', '2024-07-29 11:09:35'),
(42, 'Martunah', '-', 'RT 1/RW 9', '085749538683', '07.00-21.00', -8.111325, 112.198792, '-', '-', '-', '-', '2024-07-29 11:10:53', '2024-07-29 11:10:53'),
(43, 'Sekar Jaya', 'SEJAK 2017', 'RT 3/RW 9', '085859231948', '07.00-21.00', -8.112096, 112.201202, '-', 'ada', 'ada', '-', '2024-07-29 11:12:59', '2024-07-29 11:12:59'),
(44, 'Jenang Campur Kasri', '-', 'RT 3/RW 7', '-', '10.00-15.00', -8.107927, 112.1913353, '-', '-', '-', '-', '2024-07-29 11:16:15', '2024-07-29 11:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `username_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `username_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '$2y$12$P0AlQjandeM3hSX5strj2eJ3lC0YNG.ffoMn.QY5lSJ35BpDvkkKq', NULL, '2024-08-04 03:28:20', '2024-08-04 03:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misis`
--

CREATE TABLE `visi_misis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `isi_poin` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visi_misis`
--

INSERT INTO `visi_misis` (`id`, `kategori`, `isi_poin`, `created_at`, `updated_at`) VALUES
(1, 'visi', 'Gotong - royong membangun desa Papungan sebagai kawasan agropolitan, Desa yang jujur, transparan, adil, sejahtera, berdaya saing, mandiri, religious dan berbudayaa', '2024-07-28 03:37:15', '2024-07-29 03:26:45'),
(2, 'misi', 'Mewujudkan pemerintahan desa yang profesional, mandiri, jujur, transparan dan berwibawa dengan pengambilan keputusan yang cepat dan tepat dengan cara musyawarah mufakat bersama pemerintahan maupun masyarakat setempat.', '2024-07-28 03:37:15', '2024-07-29 12:14:47'),
(3, 'misi', 'Bersama masyarakat meningkatkan perekonomian dengan cara memanfaatkan hasil pertanian, UMKM dan tenaga kerja masyarakat.', '2024-07-28 03:37:15', '2024-07-28 03:37:15'),
(25, 'misi', 'Meningkatkan kapasitas dan daya saing usaha masyarakat melalui penguatan kreatifitas keterampilan dan inovasi masyarakt desa Papungan untuk menghasilkan produk yang berkualitas dan diterima oleh masyarakat Desa Papungan maupun luar Desa Papungan.', '2024-07-29 12:13:53', '2024-07-29 12:13:53'),
(26, 'misi', 'Memfungsikan BUMDES sebagai sarana penyedia kebutuhan pemerintahan desa Papungan maupun kebutuhan masyarakat desa', '2024-07-29 12:14:02', '2024-07-29 12:14:02'),
(27, 'misi', 'Lebih meningkatkan kepedulian pendidikan non formal dengan  memberikan insentif bagi guru MADIN dan TPQ/TPA di Desa Papungan', '2024-07-29 12:14:12', '2024-07-29 12:14:12'),
(28, 'misi', 'Mendukung dan memeruskan program pemerintah dibidang ekonomi, pendidikan dan kesehatan', '2024-07-29 12:14:22', '2024-07-29 12:14:22'),
(29, 'misi', 'Meningkatkan kebersamaan seluruh pemuda desa Papungan disetiap kegiatan yang dilakukan pemerintah Desa Papungan agar terjalin kebersamaan yang kuat.', '2024-07-29 12:14:32', '2024-07-29 12:14:32'),
(30, 'misi', 'Memperkuat pembangunan kebudayaan dan akhlaq masyarakat desa Papungan dengan semangat inovasi Mbah Mudjair.', '2024-07-29 12:15:01', '2024-07-29 12:15:01'),
(31, 'misi', 'Meneruskan pembangunan gedung olah raga sebagai sarana kesehatan  masyarakat.', '2024-07-29 12:15:19', '2024-07-29 12:15:19'),
(32, 'misi', 'Pengadaan mobil jenazah sebagai sarana layanan emergency bagi pasien gawat darurat, Pelayanan angkutan jenazah dan Mempercepat evakuasi pasien dari kediamannya dengan prosedur mudah, Cepat dan siap 24 Jam.', '2024-07-29 12:15:28', '2024-07-29 12:15:28'),
(33, 'misi', 'Membangun tugu perbatasan antar Desa', '2024-08-03 20:52:20', '2024-08-03 20:52:20'),
(34, 'misi', 'Meningkatkan sarana dan prasarana jalan Desa serta Drainase  yang ada di Se-luruh Desa Papungan', '2024-08-03 20:53:18', '2024-08-03 20:53:18'),
(35, 'misi', 'Mewujudkan dan mengembangkan kegiatan keagamaan untuk menambah keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa', '2024-08-03 20:53:26', '2024-08-03 20:53:26'),
(36, 'misi', 'Mewujudkan dan mendorong terjadinya usaha-usaha kerukunan antar dan intern warga masyarakat yang disebabkan karena adanya perbedaan agama, keyakinan, organisasi, dan lainnya dalam suasana saling menghargai dan menghormati.', '2024-08-03 20:53:39', '2024-08-03 20:53:39'),
(37, 'misi', 'Membangun dan meningkatkan hasil pertanian dengan jalan penataan pengairan, perbaikan jalan sawah / jalan usaha tani, pemupukan, dan pola tanam yang baik.', '2024-08-03 20:53:46', '2024-08-03 20:53:46'),
(38, 'misi', 'Menata Pemerintahan Desa Papungan yang kompak dan  bertanggung jawab dalam dengan pelayanan masyarakat secara terpadu dan serius untuk mengemban amanat masyarakat.', '2024-08-03 20:53:52', '2024-08-03 20:53:52'),
(40, 'misi', 'Menumbuh Kembangkan Kelompok – kelompok usaha yang ada di Desa', '2024-08-03 20:54:06', '2024-08-03 20:54:06'),
(41, 'misi', 'Meningkatkan koordinasi dan kerjasama dengan dinas terkait dalam meningkat kan pengolahan potensi Desa', '2024-08-03 20:54:10', '2024-08-03 20:54:10'),
(42, 'misi', 'Membangun dan mendorong majunya bidang pendidikan baik formal maupun informal yang mudah diakses dan dinikmati seluruh warga masyarakat tanpa terkecuali yang mampu menghasilkan insan intelektual, inovatif dan enterpreneur (wirausahawan).', '2024-08-03 20:54:30', '2024-08-03 20:54:30'),
(43, 'misi', 'Membangun dan mendorong usaha-usaha untuk pengembangan dan optimalisasi sektor pertanian, perkebunan, peternakan, perdagangan dan perikanan, baik tahap produksi maupun tahap pengolahan hasilnya.', '2024-08-03 20:54:36', '2024-08-03 20:54:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirasis`
--
ALTER TABLE `aspirasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `data_desas`
--
ALTER TABLE `data_desas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foto_umkms`
--
ALTER TABLE `foto_umkms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_umkms`
--
ALTER TABLE `jenis_umkms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lembagas`
--
ALTER TABLE `lembagas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pariwisatas`
--
ALTER TABLE `pariwisatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengumumen`
--
ALTER TABLE `pengumumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perangkat_desas`
--
ALTER TABLE `perangkat_desas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perangkat_desas_jabatan_id_foreign` (`jabatan_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `umkms`
--
ALTER TABLE `umkms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- Indexes for table `visi_misis`
--
ALTER TABLE `visi_misis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspirasis`
--
ALTER TABLE `aspirasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `data_desas`
--
ALTER TABLE `data_desas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_umkms`
--
ALTER TABLE `foto_umkms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis_umkms`
--
ALTER TABLE `jenis_umkms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lembagas`
--
ALTER TABLE `lembagas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pariwisatas`
--
ALTER TABLE `pariwisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengumumen`
--
ALTER TABLE `pengumumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `perangkat_desas`
--
ALTER TABLE `perangkat_desas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `umkms`
--
ALTER TABLE `umkms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visi_misis`
--
ALTER TABLE `visi_misis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perangkat_desas`
--
ALTER TABLE `perangkat_desas`
  ADD CONSTRAINT `perangkat_desas_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
