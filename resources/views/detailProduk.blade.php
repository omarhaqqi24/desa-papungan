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
            display: inline-flex;
            /* Agar wrapper menyesuaikan ukuran konten */
            display: inline-flex;
            /* Agar wrapper menyesuaikan ukuran konten */
        }

        .gradient-border-wrapper::before {
            content: '';
            position: absolute;
            inset: 0;
            padding: 3px;
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
            z-index: -1;
            /* Letakkan di belakang tombol */
            pointer-events: none;
            /* Agar tidak menghalangi klik tombol */
            z-index: -1;
            /* Letakkan di belakang tombol */
            pointer-events: none;
            /* Agar tidak menghalangi klik tombol */
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
        <x-headerArtikel subJudul="Katalog Produk" judul="{{ $produk->umkm->nama }}" />

        <div class="flex flex-col md:flex-row gap-10 py-5">
            <div class="md:w-[460px] md:h-[420px] flex justify-center items-center rounded-xl overflow-hidden">
                <img src="{{ asset('img/produk/' . $produk->image) }}" alt="{{ $produk->nama }}" class="w-full h-full object-cover shadow-lg">
            </div>

            <div class="md:w-auto flex flex-col justify-between">
                <div>
                    <h1 class="text-4xl font-semibold text-gray-900 mb-3 font-jakarta">
                        {{ $produk->nama_produk }}
                    </h1>
                    <div class="text-blue-700 font-bold text-[46px] mb-5 font-jakarta">
                        {{ $produk->harga  }}
                    </div>
                    <h2 class="text-2xl font-semibold text-gray-700 mb-2 font-jakarta">Deskripsi</h2>
                    <p class="text-gray-600 text-xl leading-relaxed mb-4 font-jakarta">
                        {{ $produk->umkm->deskripsi }}
                    </p>
                    <h2 class="text-2xl font-semibold text-gray-700 mb-2 font-jakarta">Alamat</h2>
                    <p class="text-gray-600 text-xl font-jakarta mb-4">
                        {{ $produk->umkm->alamat }}
                    </p>
                </div>

                <div class="mt-4 flex flex-col sm:flex-row gap-4">
                    <a href="{{ 'https://wa.me/62' . substr(rtrim(rtrim($produk->umkm->kontak, '0'), '.'), 1) }}" target="_blank" rel="noopener noreferrer"
                        class="w-[260px] h-12 flex items-center justify-center px-6 py-2 bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-full text-xl font-semibold hover:from-blue-500 hover:to-blue-700 transition duration-300 font-jakarta">
                        <img src="{{ asset('img/whatsapp-icon.svg') }}" alt="WhatsAppLogo" class="w-7 h-7 mr-2">
                        Hubungi Penjual
                    </a>

                    <a href="{{ $produk->umkm->url_map }}" target="_blank" rel="noopener noreferrer"
                        class="w-56 h-12 gradient-border-wrapper flex items-center justify-center px-6 py-2 bg-white text-blue-600 rounded-full text-xl font-semibold transition duration-300 font-jakarta ">
                        <img src="{{ asset('img/google-maps-icon.svg') }}" alt="MapsLogo" class="w-8 h-8 mr-2">
                        Lihat di Maps
                    </a>
                </div>
            </div>
        </div>
        <div class="space-y-5">
            <div class="flex flex-row justify-between items-center">
                <div class=" text-3xl font-semibold mt-4">Produk Lainnya</div>
            </div>

            <!-- Horizontal Carousel -->
            <div class="hidden md:block w-full overflow-hidden">
                <div class="w-full h-auto overflow-x-scroll flex flex-nowrap gap-12 ">
                    @foreach ($produkLain as $item)
                    <a href="{{ url('produk/' . $item->id) }}">
                        <div class="carousel-item h-auto mb-5">
                            <x-CardBelanja :item="$item" />
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Vertical Carousel (Mobile) -->
            <div class="md:hidden w-full overflow-hidden">
                <div class="w-auto h-[420px] overflow-y-scroll flex flex-col flex-nowrap gap-12 ">
                    @foreach ($produkLain as $item)
                    <a href="{{ url('produk/' . $item->id) }}">
                        <div class="carousel-item h-auto mb-5">
                            <x-CardBelanja :item="$item" />
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

        <x-footer />
</body>

</html>