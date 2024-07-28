<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env("APP_NAME") . " | Profil Desa" }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <style>
        .markdown-content ul {
            list-style-type: disc;
            /* Bullet points */
            margin-left: 20px;
            /* Indentasi */
            padding-left: 20px;
            /* Padding */
        }

        .markdown-content li {
            margin-bottom: 5px;
            /* Jarak antar item list */
        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

</head>

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50">
    <x-navbar />

    <div class="mt-28 space-y-20 md:px-0">
        <!-- isi disini-->

        <!-- tentang kami-->
        <div id="tentangkami"></div>
        <div class="bg-blue-600 text-lightText w-full py-32 px-10">
            <div class="text-3xl font-semibold">Profil Desa Papungan</div>
            <div class="text-sm font-normal">Home / Profil Desa</div>
        </div>

        <div class=" px-5 md:px-0  ">
            <div class="container items-center mx-auto space-y-10 text-justify p-10 mt-10 ">
                <x-headerArtikel subJudul="Kenali Desa Papungan " judul="Tentang Kami" />
                <img src="{{ $data1->data->foto }}" alt="balai desa Papungan" class="rounded-lg w-full">

                <div class="text-sm font-jakarta markdown-content">{!! $data1->data->penjelasan !!}</div>

                <x-headerArtikel subJudul="PROFIL DESA" judul="Visi dan Misi dari Desa Papungan" />
                <div class="font-normal font-jakarta max-w-full lg:min-w-2xl" style="margin-top: 0.5rem;">
                    Berikut adalah Visi dan Misi Desa Papungan dengan visi yang bertujuan untuk menciptakan masyarakat
                    yang maju di bidang industri, pariwisata, pertanian, peternakan, dan perikanan untuk mencapai
                    kehidupan yang rukun dan makmur. Desa Papungan mengimplementasikan visi tersebut melalui misi dengan
                    tujuan jangka pendek yang operatif dan inovatif di berbagai sektor seperti pertanian, peternakan,
                    dan kebudayaan. Upaya ini juga melibatkan penyesuaian terhadap perubahan lingkungan dan situasi
                    untuk mendukung pembangunan desa secara berkelanjutan.
                </div>

                <div
                    class="container flex flex-col py-5 px-10 rounded-lg shadow-md md:mx-auto items-center space-y-3 bg-[url('/public/img/visi-bg.png')] bg-cover bg-no-repeat bg-left md:bg-center">
                    <div class="w-full flex justify-center items-center">
                        <div class="text-4xl font-semibold text-center font-jakarta">VISI</div>
                    </div>
                    <div class="text-xl font-normal text-center px-4 md:px-8 lg:px-16 xl:px-40 pb-10 font-jakarta">
                        "{{ $data3->data[0]->isi_poin }}"</div>
                </div>
                <div
                    class="container flex flex-col py-5 px-10 rounded-lg shadow-md md:mx-auto items-center space-y-3 bg-[url('/public/img/misi-bg.png')] bg-cover bg-no-repeat bg-left-top">
                    <div class="w-full flex justify-center items-center">
                        <div class="text-4xl font-semibold text-center font-jakarta">MISI</div>
                    </div>

                    <ul class="list-disc pl-5">
                        @for ($i = 2; $i <= count($data3->data); $i++)
                            <li class="text-base font-normal text-justify font-jakarta leading-tight mt-2 mb-0">
                                {{ $data3->data[$i - 1]->isi_poin }}
                            </li>
                        @endfor
                    </ul>
                </div>
                <!-- sejarah -->
                <div id="sejarah"></div>
                <x-cardSubjudul jenisJudul="PROFIL DESA" judul="Sejarah Desa Papungan" deskripsi="" />

                <div class="text-sm font-normal markdown-content"> {!! $data2->data->penjelasan !!}</div>
            </div>
        </div>
    </div>

</body>
<x-footer />

</html>

