<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') . ' | Detail Produk' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#ffffff">
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
        <x-headerArtikel subJudul="Katalog Produk" judul="{{ $produk->nama_produk }}" />

        <div class="flex flex-col md:flex-row gap-10 py-5">
            {{-- Bagian Gambar Produk --}}
            <div class="md:w-1/2 flex justify-center items-center">
                <img src="{{ asset('img/produk/' . $produk->image) }}" alt="{{ $produk->nama }}" class="w-full h-auto max-h-[500px] object-cover rounded-xl shadow-lg">
            </div>

            <div class="md:w-1/2 flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-900 mb-3 font-jakarta">
                        {{ $produk->nama_produk }}
                    </h1>
                    <div class="text-blue-700 font-bold text-3xl mb-5 font-jakarta">
                        {{  $produk->harga  }}
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2 font-jakarta">Deskripsi</h2>
                    <p class="text-gray-600 text-base leading-relaxed mb-4 font-jakarta">
                        {{ $produk->umkm->deskripsi }}
                    </p>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2 font-jakarta">Alamat</h2>
                    <p class="text-gray-600 text-base font-jakarta mb-4">
                        {{ $produk->umkm->alamat }}
                    </p>
                </div>

                <div class="mt-4 flex flex-col sm:flex-row gap-4">
                    <a href="{{ 'https://wa.me/62' . substr($produk->umkm->kontak, 1) }}" target="_blank" rel="noopener noreferrer"
                        class="flex items-center justify-center px-6 py-2 bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-full text-base font-semibold hover:from-blue-500 hover:to-blue-700 transition duration-300 font-jakarta">
                        <img src="{{ asset('img/whatsapp-icon.svg') }}" alt="WhatsAppLogo" class="w-6 h-6 mr-2">
                        Hubungi Penjual
                    </a>

                    <a href="{{ $produk->umkm->url_map }}" target="_blank" rel="noopener noreferrer"
                        class="gradient-border-wrapper flex items-center justify-center px-6 py-2 bg-white text-blue-600 rounded-full text-base font-semibold transition duration-300 font-jakarta ">
                        <img src="{{ asset('img/google-maps-icon.svg') }}" alt="MapsLogo" class="w-6 h-6 mr-2">
                        Lihat di Maps
                    </a>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</body>

</html>