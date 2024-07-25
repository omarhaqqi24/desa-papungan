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
        <!-- profil umkm-->
        <div id="profilumkm"></div>
        <div class="bg-blue-600 text-white w-full py-32 px-10">
            <div class="text-3xl font-semibold">UMKM Desa Papungan</div>
            <div class="text-sm font-normal">Home / UMKM</div>
        </div>
    </div>

    <div class=" px-5 md:px-0 mt-10">
        <div class="container items-center mx-auto space-y-10 text-justify">
            <x-headerArtikel subJudul="Kenali UMKM " judul="Profil UMKM Desa Papungan" />
            <div class="text-sm font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore reiciendis
                omnis, inventore accusantium cum quod maiores sint impedit asperiores veritatis similique modi corrupti
                ducimus, vitae dolorem? Cum ut repudiandae quis!</div>
            <img src="img/unkown.png" alt="unknown" class="rounded-lg w-full">

            <x-cardSubjudul jenisJudul="PARIWISATA DESA" judul="Sejarah Makam Mbah Moedjair Penemu Ikan Moedjair"
                deskripsi="lorem" />

        </div>
    </div>


    <!-- peta umkm-->
    <div id="petaumkm"></div>



    <!-- daftar umkm-->
    <div id="daftarumkm"></div>
</body>
<x-footer />

</html>
