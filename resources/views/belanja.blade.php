<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="Belanja produk UMKM khas Desa Papungan.">
    <meta name="keywords" content="Belanja, UMKM, Papungan, Desa, Produk, Khas">
    <meta name="author" content="Desa Papungan">

    <title>{{ env('APP_NAME') . ' | Belanja Produk' }}</title>
    @vite('resources/css/app.css')

    <style>
        .font-jakarta {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50">
    <x-navbar />
    <div class="mt-28 space-y-20 md:px-0">
        <!-- isi disini-->

        <!-- belanja-->
        <div id="belanja"></div>
        <div class="bg-secondary text-base-100 w-full py-32 px-10">
            <div class="text-3xl font-semibold">Belanja Produk Desa Papungan</div>
            <div class="text-sm font-normal">Home / Belanja</div>
        </div>
    </div>
    </div>
    <div class="px-5 md:px-10 mt-10 flex flex-wrap justify-around items-center w-full">
        @foreach ($produk as $itemn)
        <x-CardBelanja :item="$itemn" />
        @endforeach
    </div>

    </div>
</body>
<x-footer />

</html>