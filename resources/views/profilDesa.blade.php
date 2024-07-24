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

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50">
    <x-navbar />

    <div class="mt-28 space-y-20 md:px-0">
        <!-- isi disini-->

        <div class="bg-blue-600 text-lightText w-full py-32 px-10">
            <div class="text-3xl font-semibold">Profil Desa Papungan</div>
            <div class="text-sm font-normal">Home / Profil Desa</div>
        </div>
    </div>

    <div class=" px-5 md:px-0 mt-10">
        <div class="container items-center mx-auto space-y-10 text-justify">
            <x-headerArtikel subJudul="Kenali Desa Papungan " judul="Tentang Kami" />
            <div class="text-sm font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore reiciendis
                omnis, inventore accusantium cum quod maiores sint impedit asperiores veritatis similique modi corrupti
                ducimus, vitae dolorem? Cum ut repudiandae quis!</div>

            <img src="{{ $data1->data->foto }}" alt="balai desa Papungan" class="rounded-lg w-full">

            <div class="text-sm font-jakarta">{{ $data1->data->penjelasan }}</div>

            <x-cardSubjudul jenisJudul="PROFIL DESA" judul="Visi dan Misi"
                deskripsi="Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. " />

            <div class="container flex flex-col bg-white py-5 px-10 rounded-lg shadow-md md:mx-auto items-center space-y-3">
                <div class="w-full flex justify-center items-center">
                    <div class="text-4xl font-semibold text-center font-jakarta">VISI</div>
                </div>
                <div class="text-base font-normal text-center px-4 md:px-8 lg:px-16 xl:px-80 pb-10 font-jakarta">"{{$data3->data[0]->isi_poin}}"</div>
            </div>

            <div class="container flex flex-col bg-white py-5 px-10 rounded-lg shadow-md md:mx-auto items-center space-y-3">
                <div class="w-full flex justify-center items-center">
                    <div class="text-4xl font-semibold text-center font-jakarta">MISI</div>
                </div>
                
                <ul class="list-disc pl-5">
                    @for($i = 2; $i <= count($data3->data); $i++)
                        <li class="text-base font-normal px-4 md:px-8 lg:px-16 xl:px-80 pb-10 text-justify font-jakarta">
                            {{ $data3->data[$i - 1]->isi_poin }}
                        </li>
                    @endfor
                </ul>
            </div>

            <x-cardSubjudul jenisJudul="PROFIL DESA" judul="Sejarah Desa Papungan"
                deskripsi="Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. " />

            <div class="text-sm font-normal"> {{ $data2->data->penjelasan }}</div>

        </div>
    </div>

            


    </div>
</body>
<x-footer />

</html>
