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

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50 pt-[112px] overflow-x-hidden">
    <x-navbar />
    <!-- Cover -->
    <div class="w-full relative bg-zinc-100 h-screen">
        <img class="absolute h-screen w-full object-cover"
            src="{{ asset('/img/aryasatya-rafa-0AYAXeiHmMI-unsplash 1.jpg') }}" />
        <div class=" flex absolute flex-col justify-center items-center h-screen w-full bg-blue-600 bg-opacity-60">
            <div
                class="self-stretch text-center mx-4 text-zinc-100 text-4xl md:text-6xl mb-3 font-semibold font-jakarta ">
                Selamat Datang di Website<br />Desa Papungan</div>
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
                    <div class="py-0.5 justify-center items-center gap-2.5 flex">
                        <div
                            class="text-center text-blue-600 text-lg font-semibold md:font-medium font-jakarta leading-normal">
                            <span class="hidden md:inline">Baca Berita Lainnya </span>>>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical "Carousel" -->
            <div
                class="carousel carousel-vertical w-full rounded-box h-96 md:hidden flex items-center border border-neutral">
                @foreach ($berita->data->resource as $item)
                    <div class="carousel-item h-full border-b border-neutral">
                        <x-cardBerita :foto="$item->foto" :judul="$item->judul" :isi="$item->isi" :createdAt="$item->createdAt" />
                    </div>
                @endforeach
            </div>
            <!-- Horizontal Carousel -->
            <div class="hidden md:carousel w-full">
                @for ($i = 0; $i < 4; $i++)
                    <div class="carousel-item mx-2"><x-cardBerita :foto="$berita->data->resource[$i]->foto" :judul="$berita->data->resource[$i]->judul" :isi="$berita->data->resource[$i]->isi"
                            :createdAt="$item->createdAt" /></div>
                @endfor
            </div>
        </div>

        <!--Pengumuman -->
        <div class="space-y-5">
            <div class=" text-black text-2xl md:text-4xl font-semibold font-jakarta">Pengumuman</div>
            <p class="text-lg">Gorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit
                interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                per inceptos himenaeos. </p>
            <div class="flex flex-col lg:flex-row items-start">
                <div class="flex flex-col basis-1/2">
                    <div class=" text-black text-xl md:text-2xl font-semibold font-jakarta">Pengumuman Terkini</div>
                    @for ($i = 0; $i < 3; $i++)
                        <div className="CardPengumuman" class="p-10 border-b-2 border-neutral space-y-2">
                            <h1 class="card-title line-clamp-1">{{ $pengumuman->data[$i]->judul }}</h1>
                            <p class="text-neutral font-medium text-lg font-jakarta">
                                {{ $pengumuman->data[$i]->createdAt }}</p>
                            <p class="text-black font-medium text-lg font-jakarta line-clamp-3">
                                {{ $pengumuman->data[$i]->isi }}</p>
                            <p class="text-blue-600 font-medium text-right text-lg font-jakarta pt-5">Selengkapnya >>
                            </p>
                        </div>
                    @endfor
                    <div class=" text-blue-600 text-lg text-right md:text-lg font-medium font-jakarta m-4 mt-5">Baca
                        Pengumuman Lainnya >></div>
                </div>
                <div class="basis-1/2 p-10 px-0 md:px-10 w-full h-96">
                    <div class="carousel h-full w-full border-black border rounded-xl">
                        @for ($i = 0; $i < 5; $i++)
                            <div id="{{ $berita->data->resource[$i]->id }}"
                                class="carousel-item relative h-full w-full">
                                <img src="{{ $berita->data->resource[$i]->foto }}" class="w-full h-full object-cover"
                                    alt='' />
                            </div>
                        @endfor
                    </div>
                    <div class="flex justify-center mt-4">
                        @for ($i = 0; $i < 5; $i++)
                            <span
                                class="w-2 h-2 mr-2 rounded-full bg-gray-400 @if ($i == 0) bg-blue-500 @endif"></span>
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
                <p class="text-lg">Horem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et
                    velit interdum, ac
                    aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                    inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis. Ut commodo efficitur
                    neque. Ut diam quam, semper iaculis condimentum ac, vestibulum eu nisl.</p>
            </div>
        </div>
    </div>
    <x-footer />
</body>

</html>
