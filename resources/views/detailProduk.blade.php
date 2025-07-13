<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') . ' | ' . $product['name'] }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="Detail produk {{ $product['name'] }} dari Desa Papungan.">
    <meta name="keywords" content="Produk, Belanja, Desa Papungan, {{ $product['name'] }}">
    <meta name="author" content="Desa Papungan">

    @vite('resources/css/app.css')

    <style>
        .font-jakarta {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .gradient-border-wrapper {
            position: relative;
            z-index: 1;
            display: inline-flex; /* Agar wrapper menyesuaikan ukuran konten */
        }

        .gradient-border-wrapper::before {
            content: '';
            position: absolute;
            inset: 0; 
            padding: 2px;
            border-radius: 9999px;
            background: linear-gradient(to right, #6dafffff, #3B82F6);
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            z-index: -1; /* Letakkan di belakang tombol */
            pointer-events: none; /* Agar tidak menghalangi klik tombol */
        }

        .gradient-border-wrapper:hover::before {
            background: linear-gradient(to right, #519efcff, #0462f9ff);
        }
    </style>
</head>

<body class="mytheme font-jakarta antialiased">
    <x-navbar />
    <div class="mt-40 space-y-20 md:px-0"> </div>


    <div class="container mx-auto px-5 md:px-10 mt-10 space-y-10">
        <x-headerArtikel subJudul="Katalog Produk" judul="{{ $product['name'] }}" />

        <div class="flex flex-col md:flex-row gap-10 py-5">
            {{-- Bagian Gambar Produk --}}
            <div class="md:w-1/2 flex justify-center items-center">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-auto max-h-[500px] object-cover rounded-xl shadow-lg">
            </div>

            <div class="md:w-1/2 flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-900 mb-3 font-jakarta">
                        {{ $product['name'] }}
                    </h1>
                    <div class="text-blue-700 font-bold text-3xl mb-5 font-jakarta">
                        Rp{{ $product['price_min'] }} - Rp{{ $product['price_max'] }}
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2 font-jakarta">Deskripsi</h2>
                    <p class="text-gray-600 text-base leading-relaxed mb-4 font-jakarta">
                        {{ $product['description'] }}
                        @if(strlen($product['description']) > 150)
                        <a href="#" class="text-blue-600 hover:underline">Lihat selengkapnya</a>
                        @endif
                    </p>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2 font-jakarta">Alamat</h2>
                    <p class="text-gray-600 text-base font-jakarta mb-4">
                        {{ $product['address'] }}
                    </p>
                </div>

                <div class="mt-4 flex flex-col sm:flex-row gap-4">
                    <a href="{{ $product['whatsapp_link'] }}" target="_blank" rel="noopener noreferrer"
                        class="flex items-center justify-center px-6 py-2 bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-full text-base font-semibold hover:from-blue-500 hover:to-blue-700 transition duration-300 font-jakarta">
                        <img src="{{ asset('img/whatsapp-icon.svg') }}" alt="WhatsAppLogo" class="w-6 h-6 mr-2">
                        Hubungi Penjual
                    </a>

                    <a href="{{ $product['maps_link'] }}" target="_blank" rel="noopener noreferrer"
                        class="gradient-border-wrapper flex items-center justify-center px-6 py-2 bg-white text-blue-600 rounded-full text-base font-semibold transition duration-300 font-jakarta ">
                        <img src="{{ asset('img/google-maps-icon.svg') }}" alt="MapsLogo" class="w-6 h-6 mr-2">
                        Lihat di Maps
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Bagian Produk Lainnya --}}
    <div class="container mx-auto px-5 md:px-10 py-10">
        <div class="mt-5 space-y-10">
            <x-headerArtikel subJudul="Katalog Produk" judul="Produk Lainnya" />
            <div class="flex flex-wrap justify-center gap-8 w-full">
                @forelse ($otherProducts as $otherProduct)
                <div class="h-96 w-80 rounded-2xl my-4 bg-white shadow-md overflow-hidden flex flex-col">
                    <img src="{{ $otherProduct['image'] }}" alt="{{ $otherProduct['name'] }}" class="h-1/2 w-full object-cover z-0">
                    <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-white h-1/2 relative">
                        <h3 class="font-semibold text-lg text-gray-900 mb-1 font-jakarta">{{ $otherProduct['name'] }}</h3>
                        <div class="text-blue-700 font-bold font-jakarta text-lg mb-2">
                            Rp{{ $otherProduct['price_min'] }} - Rp{{ $otherProduct['price_max'] }}
                        </div>
                        <p class="text-gray-500 text-sm mb-2 line-clamp-2 font-jakarta">{{ $otherProduct['description'] }}</p>
                        <div class="mt-auto self-end">
                            <a href="{{ route('belanja.show', ['id' => $otherProduct['id']]) }}"
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
        </div>
    </div>

    <x-footer />
</body>

</html>