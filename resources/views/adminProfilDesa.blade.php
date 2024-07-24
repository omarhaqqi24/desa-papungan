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

<body class="mytheme font-jakarta antialiased dark:text-white/50">
    <x-admin-navbar />

    <div class="w-screen pl-32 py-3 h-20 bg-secondary text-lightText">
        <div class="text-3xl font-bold">Profil Desa Papungan</div>
        <div class="">Home / Profil Desa</div>
    </div>

    <div class="pl-20 mt-5 space-y-4">
        <div class="w-1/2 flex items-center">
            <div class="font-medium px-4">Kenali Desa Papungan</div>
            <div class="flex-grow border-b-2 border-gray-500"></div>
        </div>

        <div class="text-3xl font-semibold text-darkText">Tentang Kami</div>
        <div class="">Berikut adalah penjelasan dari Profil desa yang ditampilkan</div>

        <!-- Tombol Edit-->
        <x-admin-edit-button forValue="PD-01" judulPenjelasan="Penjelasan"
            subPenjelasan="(Penjelasan profil organisasi desa)" nameTextarea="namaInput" nameInputPhoto="namaInput" />

        <!-- Tombol Edit-->
        <x-admin-edit-button forValue="PD-02" judulPenjelasan="Penjelasan"
            subPenjelasan="(Penjelasan profil organisasi desa)" nameTextarea="namaInput" nameInputPhoto="namaInput" />

</body>

</html>
