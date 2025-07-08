<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env("APP_NAME") }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')

</head>

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50 pt-[112px] overflow-x-hidden">
    <x-navbar />
    <!-- Cover -->
    <div class="w-full relative bg-zinc-100 h-screen">
        <img class="absolute h-screen w-full object-cover"
            src="{{ asset('/img/aryasatya-rafa-0AYAXeiHmMI-unsplash 1.jpg') }}" />
        <div class=" flex absolute flex-col justify-center items-center h-screen w-full bg-blue-600 bg-opacity-60">
            <div
                class="self-stretch text-center mx-4 text-zinc-100 text-4xl md:text-6xl mb-3 font-semibold font-jakarta ">
                Selamat Datang di Website<br />Desa</div>
            <div class="self-stretch text-center mx-4 text-zinc-100 text-lg md:text-xl font-jakarta ">Temukan semua
                informasi terbaru terkait Desa Papungan!</div>
        </div>
    </div>
    <div class="p-10 mt-10 container items-center mx-auto space-y-10 text-justify">
        <!-- Berita terkini -->
        <div class="space-y-5">
            <div class="flex flex-row justify-between items-center">
                <div class=" text-black text-2xl md:text-4xl font-semibold font-jakarta">Berita Terkini</div>
                <div class=" py-3 rounded-[32px] justify-center items-center gap-2.5 inline-flex">
                    <div class="flex justify-end text-blue-600 text-lg font-medium font-jakarta m-4 mt-5">
                        <a href="{{ route('informasi.index', ['targetID' => 'berita']) }}"
                            class="flex items-center w-full justify-end gap-2">
                            <span class="hidden md:inline">Baca Berita Lainnya</span>
                            <img src="{{ asset('/img/arrow-selengkapnya.svg') }}" alt="" class="ml-2 md:ml-0">
                        </a>
                    </div>
                </div>
            </div>
            <!-- Vertical "Carousel" -->
            <div class="md:hidden">
                <?php $iter = 0; ?>
                @foreach ($berita->data as $item)
                    <a href="{{ url('berita/' . $item->id) }}">
                        <div class="carousel-item h-auto w-full mb-5">
                            <x-cardBerita :foto="$item->foto" :judul="$item->judul" :isi="$item->isi" :createdAt="$item->createdAt" />
                        </div>
                    </a>
                    <?php $iter++; ?>
                    @if ($iter > 2)
                    @break
                @endif
            @endforeach
        </div>
        <!-- Horizontal Carousel -->
        <div class="hidden md:carousel w-full">
            <?php $iter = 0; ?>
            @foreach ($berita->data as $item)
                <a href="{{ url('berita/' . $item->id) }}">
                    <div class="carousel-item mx-2 w-72">
                        <x-cardBerita :foto="$item->foto" :judul="$item->judul" :isi="$item->isi" :createdAt="$item->createdAt" />
                    </div>
                </a>
                <?php $iter++; ?>
                @if ($iter > 4)
                @break
            @endif
        @endforeach
    </div>
</div>

<!--Pengumuman -->
<div class="space-y-5">
    <div class=" text-black text-2xl md:text-4xl font-semibold font-jakarta">Pengumuman</div>
    <p class="text-lg">Berikut pengumuman penting bagi seluruh warga Desa Papungan. Jangan lupa untuk selalu
        membaca pengumuman dan menandai kalender Anda agar tidak melewatkan informasi penting di hari-hari
        mendatang!</p>
    <div class="flex flex-col lg:flex-row items-start">
        <div class="flex flex-col basis-1/2">
            <div class=" text-black text-xl md:text-2xl font-semibold font-jakarta">Pengumuman Terkini</div>
            <?php $iter = 0; ?>
            @foreach ($pengumuman->data as $item)
                <a href="{{ url('pengumuman/' . $item->id) }}" class="CardPengumuman p-10 hover:bg-gray-300 duration-200 rounded-md">
                    <h1 class="card-title ">{{ $item->judul }}</h1>
                    <p class="text-neutral font-medium text-lg font-jakarta">{{ $item->createdAt }}</p>
                    <p class="text-black font-medium text-lg font-jakarta line-clamp-3 mt-4">{{ $item->isi }}
                    </p>
                    <div class="w-full flex justify-end mt-8 mb-4 pr-2">
                        <div class="text-blue-500 flex items-center">
                            Selengkapnya
                            <img src="{{ asset('/img/arrow-selengkapnya.svg') }}" alt=""
                                class="hidden md:block ml-2">
                        </div>
                    </div>
                    <div class="w-full border-b-2 border-gray-400"></div>
                </a>
                <?php $iter++; ?>
                @if ($iter > 3)
                @break
            @endif
        @endforeach
        <div
            class="flex justify-end text-blue-600 text-lg text-right md:text-lg font-medium font-jakarta m-4 mt-5 pr-8">
            <a href="{{ route('informasi.index', ['targetID' => 'pengumuman']) }}"
                class="hidden md:flex items-center">
                Baca Pengumuman Lainnya
                <img src="{{ asset('/img/arrow-selengkapnya.svg') }}" alt="" class="ml-2">
            </a>
        </div>
    </div>
    <div class="basis-1/2 mt-5 pb-10 px-0 md:px-10 w-full h-96">
        <div class="carousel h-full w-full rounded-xl">
            <?php $iter = 0; ?>
            @foreach ($berita->data as $item)
                <div id="{{ $item->id }}" class="carousel-item relative h-full w-full">
                    <a href="{{ url('berita/' . $item->id) }}" class="w-full h-full">
                        <img src="{{ $item->foto }}" class="w-full h-full object-cover" alt='' />
                    </a>
                </div>
                <?php $iter++; ?>
                @if ($iter > 4)
                @break
            @endif
        @endforeach
    </div>
    <div class="flex justify-center mt-4">
        @for ($i = 0; $i < 5; $i++)
            <span class="w-2 h-2 mr-2 rounded-full bg-gray-400"></span>
        @endfor
    </div>
</div>
</div>
</div>
<!-- Peta Wilayah -->
<div class=" text-black text-2xl md:text-4xl font-semibold font-jakarta">Peta Wilayah</div>
<div class="flex flex-col md:flex-row justify-between">
<div class="md:min-h-96 space-y-5 md:min-w-1/2 md:min-h-1/2 md:h-auto mr-6 basis-1/2">
<iframe src="{{ route('peta-wilayah') }}" title="" class="w-full min-h-96 h-full"></iframe>
</div>
<div class="flex flex-col basis-1/2 space-y-5 mt-5">
<div class=" text-black text-xl md:text-2xl font-semibold font-jakarta">Wilayah Desa Papungan</div>
<img src="{{ asset('img/Peta Administrasi Desa Papungan.png') }}" alt="" class="w-full h-auto">
<p class="text-lg">Peta administrasi Desa Papungan ini menggambarkan batas wilayah, pembagian wilayah
    administratif menjadi beberapa RT (Rukun Tetangga) dan RW (Rukun Warga), serta lokasi desa yang
    berbatasan dengan desa-desa lain seperti Kuningan, Banggle, Gaprang, dan Tlogo. Peta ini juga
    menunjukkan posisi Desa Papungan yang terletak di dekat Kota Blitar. Selain itu, peta ini
    mencantumkan sumber data yang digunakan dalam pembuatannya, yaitu Badan Informasi Geospasial (2022)
    dan SAS Planet (2023).</p>
</div>
</div>
</div>
<x-footer />

</body>

</html>

