<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
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
        @foreach ($produk as $item)
        <div class="h-96 w-80 rounded-2xl my-8 bg-white shadow-md overflow-hidden">
            <img src="{{ asset('/img/produk/'.$item->image) }}" alt="" class="h-1/2 w-full object-cover scale-[1.3] z-30 relative">
            <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-[#F0F5fe] h-1/2 relative">
                <h3 class="font-semibold text-xl text-gray-900 mb-1">{{ $item->nama_produk }}</h3>
                <div class="text-blue-700 font-bold font-jakarta text-xl mb-1">
                    {{ $item->harga }}
                </div>
                <p class="text-gray-500 text-base mb-2 line-clamp-2 font-jakarta">
                    {{ $item->umkm->nama ?? 'UMKM tidak ditemukan' }}
                </p>
                <div class="mt-auto absolute bottom-0 right-0">
                    <a href="#" class="inline-block mt-2 px-4 py-2 bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-tl-2xl rounded-br-xl hover:bg-blue-700 text-base font-semibold">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    </div>
</body>
<x-footer />

</html>