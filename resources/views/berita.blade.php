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
        <div class="breadcrumbs text-base text-primary rounded-lg w-auto bg-gray-200 mx-auto">
            <ul class="px-5">
                <li><a href="{{ route('home') }}"><img src="{{ asset('/img/home-icon.svg') }}" alt=""
                            class="min-w-[18px] min-h-[18px] "></a></li>
                <li><a>Informasi</a></li>
                <li><a>Berita</a></li>
                <li class="truncate">{{ $berita->data->judul }}</li>
            </ul>
        </div>
        <div class="flex flex-row items-start">
            <!-- Judul -->
            <div class="space-y-5 basis-3/4 text-pretty">
                <div class=" text-black text-2xl md:text-4xl font-semibold font-jakarta">{{ $berita->data->judul }}
                </div>
                <!-- Tanggal and Admin info -->
                <div
                    class="flex flex-col md:flex-row md:space-x-5 md:text-nowrap justify-items-start space-y-2 md:space-y-0 p-2 md:p-0">
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
            <!-- Side content -->
            <div class="basis-1/4">
                <div class="hidden md:block text-xl font-semibold font-jakarta max-h-96 m-20 mt-0 mr-0">Lihat
                    Informasi Lainnya
                    <div class="w-full border-b-2 border-gray-400 my-2"></div>
                    <div
                        class="bg-white rounded-lg shadow border border-[#e0e2e7] flex flex-col p-4 space-y-2 w-full md:w-64">
                        <div class="px-2 flex flex-col">
                            <div class="px-2 text-xl font-medium w-full font-jakarta">Pengumuman
                                <div class="w-full border-b-2 border-[#e0e2e7] my-2"></div>
                            </div>
                        </div>
                        <div class="px-2 flex flex-col">
                            <div class="px-2 text-xl font-medium w-full font-jakarta">Berita
                                <div class="w-full border-b-2 border-[#e0e2e7] my-2"></div>
                            </div>
                        </div>
                        <div class="px-2 flex">
                            <div class="px-2 text-xl font-medium w-full font-jakarta">Aspirasi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <x-footer />

</body>

</html>

<!-- (bagian) Start -->
<!-- (bagian) End -->
