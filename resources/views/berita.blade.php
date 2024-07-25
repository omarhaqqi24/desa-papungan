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

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50 overflow-x-hidden">
    <x-navbar />
    <!-- Container -->
    <div class="mt-36 container items-center mx-auto space-y-10 text-justify px-10">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs text-base text-primary rounded-lg w-auto bg-gray-300 mx-auto">
            <ul class="px-5">
                <li><img src="{{ asset('/img/home-icon.svg') }}" alt="" class="min-w-[18px] min-h-[18px] "></li>
                <li><a>Informasi</a></li>
                <li><a>Berita</a></li>
                <li class="truncate">{{ $berita->data->judul }}</li>
            </ul>
        </div>
        <div class="flex flex-row">
            <!-- Judul -->
            <div class="space-y-5 basis-3/4 text-pretty">
                <div class=" text-black text-2xl md:text-4xl font-semibold font-jakarta">{{ $berita->data->judul }}
                </div>
                <!-- Tanggal and Admin info -->
                <div class="flex flex-col md:flex-row md:space-x-5 md:text-nowrap justify-items-start">
                    <div class="flex flex-row space-x-3 items-center">
                        <img src="{{ asset('img/calendar-icon.svg') }}" alt=""
                            class="max-h-[18px] max-w-[18px]">
                        <p class="text-lg">{{ $berita->data->createdAt }}</p>
                    </div>
                    <div class="flex flex-row space-x-3 items-center grow">
                        <img src="{{ asset('img/avatar-icon.svg') }}" alt="" class="max-h-[18px] max-w-[18px]">
                        <p class="text-lg truncate">Admin Desa Papungan</p>
                    </div>
                </div>
                <!-- berita img -->
                <img src="{{ $berita->data->foto }}" alt="" class="max-h-96 min-w-full object-cover">
                <!-- isi berita -->
                <p class="text-lg">{{ $berita->data->isi }}</p>
            </div>
        </div>
    </div>
    </div>
    <x-footer />

</body>

</html>

<!-- (bagian) Start -->
<!-- (bagian) End -->
