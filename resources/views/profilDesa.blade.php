<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') . ' | Profil Desa' }}</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')

</head>

<body class="mytheme font-jakarta antialiased ">
    <x-navbar />

    <div class="mt-28 space-y-20 md:px-0">
        <div id="tentangkami"></div>
        <div class="bg-blue-600 text-lightText w-full py-32 px-10">
            <div class="text-4xl font-semibold">Profil Desa Papungan</div>
            <div class="text-lg mt-4">Home / Profil Desa</div>
        </div>

        <div class="px-5 md:px-0">
            <div class="container items-center mx-auto space-y-10 text-justify p-10 mt-10 ">
                <x-headerArtikel subJudul="TENTANG KAMI" judul="Kenali Desa Papungan" />
                <img src="{{ $data1->data->foto }}" alt="balai desa Papungan" class="rounded-lg w-full">

                <div class="text-lg font-jakarta markdown-content leading-relaxed text-gray-500">{!! $data1->data->penjelasan !!}</div>

                <x-headerArtikel subJudul="PROFIL DESA" judul="Visi dan Misi dari Desa Papungan" />
                <div class="text-lg font-jakarta text-gray-500 markdown-content leading-relaxed max-w-full lg:min-w-2xl mt-2">
                    Berikut adalah Visi dan Misi Desa Papungan dengan visi yang bertujuan untuk menciptakan masyarakat
                    yang maju di bidang industri, pariwisata, pertanian, peternakan, dan perikanan untuk mencapai
                    kehidupan yang rukun dan makmur. Desa Papungan mengimplementasikan visi tersebut melalui misi dengan
                    tujuan jangka pendek yang operatif dan inovatif di berbagai sektor seperti pertanian, peternakan,
                    dan kebudayaan. Upaya ini juga melibatkan penyesuaian terhadap perubahan lingkungan dan situasi
                    untuk mendukung pembangunan desa secara berkelanjutan.
                </div>

                <div
                    class="container border border-gray-300 gap-4 flex flex-col py-8 px-10 rounded-xl md:mx-auto items-center space-y-3 bg-[url('/public/img/visi-bg.png')] bg-cover bg-no-repeat bg-left md:bg-center">
                    <div class="w-full flex justify-center items-center">
                        <div class="text-4xl font-semibold text-center font-jakarta">Visi</div>
                    </div>
                    <div class="text-xl text-gray-500 italic text-center px-4 md:px-8 lg:px-16 xl:px-40 font-jakarta">
                        "{{ $data3->data[0]->isi_poin }}"</div>
                </div>
                <div
                    class="container border border-gray-300 flex flex-col py-8 px-10 rounded-xl md:mx-auto items-center space-y-3 bg-[url('/public/img/misi-bg.png')] bg-cover bg-no-repeat bg-left-top">
                    <div class="w-full flex justify-center items-center">
                        <div class="text-4xl font-semibold text-center font-jakarta">Misi</div>
                    </div>
                    <ul class="list-disc pl-5">
                        @for ($i = 2; $i <= count($data3->data); $i++)
                            <li class="text-lg italic text-justify font-jakarta leading-relaxed mt-2 mb-0 text-gray-500">
                                {{ $data3->data[$i - 1]->isi_poin }}
                            </li>
                        @endfor
                    </ul>
                </div>
                <!-- sejarah -->
                <div id="sejarah"></div>
                <x-cardSubjudul jenisJudul="PROFIL DESA" judul="Sejarah Desa Papungan" deskripsi="" />

                <div class="text-lg font-jakarta text-gray-500 markdown-content leading-relaxed"> {!! $data2->data->penjelasan !!}</div>
            </div>
        </div>
    </div>

</body>
<x-footer />

</html>

