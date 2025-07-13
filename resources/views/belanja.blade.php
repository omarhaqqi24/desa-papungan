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
        @foreach ($produk as $item)
        <div class="h-[416px] w-[360px] rounded-2xl my-8 bg-white shadow-md overflow-hidden">
            <img src="{{ asset('/img/produk/'.$item->image) }}" alt="" class="h-1/2 w-full object-cover scale-[1.3] z-30 relative">
            <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-[#F0F5fe] h-1/2 relative border-2 border-[#D5E1FE]">
                <h3 class="text-xl text-gray-900 mb-1 font-bold">{{ $item->nama_produk }}</h3>
                <p class="text-gray-500 mb-2 line-clamp-2 flex items-center text-xs font-medium font-inter">
                    <img src="{{  asset('/img/icon-toko.png')  }}" alt="" class="inline mr-2">
                    {{ $item->umkm->nama ?? 'UMKM tidak ditemukan' }}
                </p>
                <div class="text-[#2453C6] font-bold font-jakarta text-base mb-1">
                    {{ $item->harga }}
                </div>
                <div class="w-[316px] h-10 text-sm overflow-hidden text-[#858D9D]">
                    {{  $item->umkm->deskripsi  }}
                </div>
                <div class="mt-auto absolute bottom-0 right-0">
                    <a href="#" class="inline-block mt-2 px-4 py-2 bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-tl-2xl rounded-br-xl hover:bg-blue-700 text-base font-semibold">
                        Lihat Detail
                    </a>
                </div>
                <div class="absolute bottom-4 left-0 w-[180px] flex gap-1 pl-4">
                    @if($item->umkm->no_nib!="-")
                        <span class="inline-block px-4 py-1 text-[#9785FE] bg-[#DDD7FF] rounded-full text-xs mr-0.5">NIB</span>
                    @endif
                    @if($item->umkm->no_halal!="-")
                        <span class="inline-block px-4 py-1 text-[#54B17D] bg-[#BFF5D7] rounded-full text-xs mr-0.5">HALAL</span>
                    @endif
                    @if($item->no_pirt!="-")
                        <span class="inline-block px-4 py-1 text-[#5786F9] bg-[#D5E1FE] rounded-full text-xs mr-0.5">PIRT</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    </div>
</body>
<x-footer />

</html>