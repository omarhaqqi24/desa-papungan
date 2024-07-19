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
            <div class="text-3xl font-semibold">Pemerintahan Desa Papungan</div>
            <div class="text-sm font-normal">Home / Pemerintahan</div>
        </div>
    </div>  

    <div class=" px-5 md:px-0 mt-10">
    <div class="container items-center mx-auto space-y-10 text-justify">
        <x-headerArtikel
        subJudul="PEMERINTAHAN "
        judul="Struktur Organisasi" />
    <div class="text-sm font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore reiciendis omnis, inventore accusantium cum quod maiores sint impedit asperiores veritatis similique modi corrupti ducimus, vitae dolorem? Cum ut repudiandae quis!</div>
     <img src="img/unkown.png" alt="unknown" class="rounded-lg w-full">

    <div class="text-sm font-normal">Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis. Ut commodo efficitur neque. Ut diam quam, semper iaculis condimentum ac, vestibulum eu nisl.</div>

    <x-cardSubjudul
            jenisJudul="PEMERINTAHAN"
            judul="Perangkat Desa"
            deskripsi="Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. "
        />

        <div class=" my-10 mx-auto font-bold text-3xl">BLOM FIX</div>
        <x-cardSubjudul
            jenisJudul="PEMERINTAHAN"
            judul="Lembaga Desa"
            deskripsi="Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. "
        />

        <div class=" my-10 mx-auto font-bold text-3xl">BLOM FIX</div>
       
    </div>
</div>
    </body>
    <x-footer/>
</html>