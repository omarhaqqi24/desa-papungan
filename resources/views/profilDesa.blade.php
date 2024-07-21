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
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <x-navbar/>

    <div class="mt-28 space-y-20 md:px-0">
    <!-- isi disini-->

<div class="bg-blue-600 text-white w-full py-32 px-10">
            <div class="text-3xl font-semibold">Profil Desa Papungan</div>
            <div class="text-sm font-normal">Home / Profil Desa</div>
        </div>
    </div>  

    <div class=" px-5 md:px-0 mt-10">
    <div class="container items-center mx-auto space-y-10 text-justify">
        <x-headerArtikel
        subJudul="Kenali Desa Papungan "
        judul="Tentang Kami" />
    <div class="text-sm font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore reiciendis omnis, inventore accusantium cum quod maiores sint impedit asperiores veritatis similique modi corrupti ducimus, vitae dolorem? Cum ut repudiandae quis!</div>

     <img src="{{$data1 -> data -> foto}}" alt="balai desa Papungan" class="rounded-lg w-full">

    <div class="text-sm font-normal">{{$data1 -> data -> penjelasan}}</div>

    <x-cardSubjudul
            jenisJudul="PROFIL DESA"
            judul="Visi dan Misi"
            deskripsi="Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. "
        />

        <div class="text-sm font-normal">               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum non erat sed sollicitudin. Nunc id nibh vel risus luctus eleifend. Sed lobortis, massa quis iaculis viverra, erat velit tincidunt lacus, vitae maximus massa risus ac odio. Nulla ornare varius interdum. Integer in erat enim. Morbi ultrices iaculis lobortis. Suspendisse gravida finibus odio, id varius magna cursus vitae. Curabitur in diam id nulla gravida tristique vel et enim. Etiam non sodales augue. Integer quam tellus, suscipit nec pulvinar in, euismod eu mauris. Fusce tristique quis eros et cursus. Vestibulum sit amet neque porttitor lectus elementum euismod quis at leo. Praesent a mollis ante. Ut ac sem aliquet, fermentum neque id, convallis sapien. Mauris luctus consectetur diam quis elementum. Nulla in laoreet eros, vel tristique risus.</div>
        <x-cardSubjudul
            jenisJudul="PROFIL DESA"
            judul="Sejarah Desa Papungan"
            deskripsi="Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. "
        />

        <div class="text-sm font-normal">               {{$data2 -> data -> penjelasan}}</div>

    </div>
</div>
    </body>
    <x-footer/>
</html>