<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

</head>

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50">
    <x-navbar />

    <div class="mt-28 space-y-20 md:px-0">
        <!-- isi disini-->

            <!-- profil-->
    <div id="profil"></div>
        <div class="bg-blue-600 text-lightText w-full py-32 px-10">
            <div class="text-3xl font-semibold">Makam Mbah Moedjair Desa Papungan</div>
            <div class="text-sm font-normal">Home / Pariwisata Desa</div>
        </div>
    </div>

    <div class=" px-5 md:px-0 mt-10">
        <div class="container items-center mx-auto space-y-10">
            <x-headerArtikel subJudul="Kenali Pariwisata Desa Papungan  " judul="Profil Makam Mbah Moedjair" />
            <div class="text-sm font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore reiciendis
                omnis, inventore accusantium cum quod maiores sint impedit asperiores veritatis similique modi corrupti
                ducimus, vitae dolorem? Cum ut repudiandae quis!</div>
            <img src="img/unkown.png" alt="unknown" class="rounded-lg w-full">

                <!-- sejarah-->
    <div id="sejarah"></div>
            <x-cardSubjudul jenisJudul="PARIWISATA DESA" judul="Sejarah Makam Mbah Moedjair Penemu Ikan Moedjair"
                deskripsi="Menurut sebuah artikel terbaru yang diterbitkan oleh Sapariah Saturi di tahun 2022 tentang sang “pencipta” ikan mujair yang terlupakan . Artikel ini membahas mengenai kisah dan riwayat hidup seorang bernama Modjair yang akrab dipanggil Mbah Moedjair. Beliau menjadi tokoh terkenal dari Desa Papungan, Blitar, Jawa Timur yang berhasil menemukan dan membudidayakan ikan mujair di Indonesia.

Tak cukup sampai disitu, kami Tim 12 MMD Fakultas Ilmu Komputer Universitas Brawijaya yang berkesempatan langsung melaksanakan MMD (Mahasiswa Membangun Desa) atau biasa disebut KKN (Kuliah Kerja Nyata) di Desa Papungan, Blitar, Jawa Timur juga bertamu ke kediaman keturunan dari Mbah Moedjair untuk memvalidasi dan menambah informasi mengenai Mbah Moedjair mengenai riwayat hidup dan jasa-jasanya." />

            <div class="text-sm font-normal">Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per
                conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis. Ut commodo
                efficitur neque. Ut diam quam, semper iaculis condimentum ac, vestibulum eu nisl.</div>

            <div class=" my-10 mx-auto font-bold text-3xl">BLOM FIX</div>

                <!-- lokasi-->
    <div id="lokasi"></div>
            <x-cardSubjudul jenisJudul="LOKASI" judul="Peta Digital Makam Mbah Moedjair Desa Papungan"
                deskripsi="Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. " />

        </div>
    </div>
</body>
<x-footer />

</html>
