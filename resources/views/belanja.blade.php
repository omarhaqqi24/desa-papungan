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

<body class="mytheme font-jakarta antialiased">
    <x-navbar />
    <div class="mt-28 space-y-20 md:px-0">
        <div id="belanja"></div>
        <div class="bg-blue-600 text-lightText w-full py-32 px-10">
            <div class="text-4xl font-semibold">Belanja Produk Desa Papungan</div>
            <div class="text-lg mt-4">Belanja Produk UMKM Khas Papungan disini!</div>
        </div>

        {{-- Produk yang diambil dari BelanjaController::index() --}}
        <div class="px-5 md:px-10 mt-10 flex flex-wrap justify-center gap-8 w-full">
            @forelse ($products as $product)
            <div class="h-96 w-80 rounded-2xl my-4 bg-white shadow-md overflow-hidden flex flex-col">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="h-1/2 w-full object-cover z-0">
                <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-white h-1/2 relative">
                    <h3 class="font-semibold text-lg text-gray-900 mb-1 font-jakarta">{{ $product['name'] }}</h3>
                    <div class="text-blue-700 font-bold font-jakarta text-lg mb-2">
                        Rp{{ $product['price_min'] }} - Rp{{ $product['price_max'] }}
                    </div>
                    <p class="text-gray-500 text-sm mb-2 line-clamp-2 font-jakarta">{{ $product['description'] }}</p>
                    <div class="mt-auto self-end">
                        <a href="{{ route('belanja.show', ['id' => $product['id']]) }}"
                            class="inline-block absolute bottom-0 right-0 mt-2 px-6 py-2 bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-tl-2xl hover:from-blue-500 hover:to-blue-700 text-sm font-semibold font-jakarta">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-gray-600 font-jakarta text-center w-full">Tidak ada produk yang tersedia saat ini.</p>
            @endforelse
        </div>

        <x-footer />
</body>

</html>