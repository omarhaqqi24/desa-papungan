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
            <div class="text-3xl font-semibold">Informasi Seputar Desa Papungan</div>
            <div class="text-sm font-normal">Home / Profil Desa</div>
        </div>

        <div class="flex space-x-6">
            <div class="flex-grow mx-10 space-y-6">
                <x-cardSubjudul class="max-w-sm" jenisJudul="INFORMASI" judul="PENGUMUMAN"
                    deskripsi="Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos." />

                <div class="h-[187px] flex flex-col justify-start items-end gap-1.5">
                    <div class="self-stretch flex flex-col justify-start items-start gap-1">
                        <div class="text-xl font-semibold font-jakarta">Judul Pengumuman</div>
                        <div class="text-gray-700 font-normal font-jakarta">July 14, 2024</div>
                        <div class="font-normal font-jakarta">Corem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos ....</div>
                    </div>
                    <div class="text-right text-[#2d68f8]">Selengkapnya</div>
                    <div class="w-full border-b-2 border-gray-400 my-2"></div>
                </div>
                
                <x-cardSubjudul class="max-w-sm" jenisJudul="INFORMASI" judul="BERITA"
                    deskripsi="Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos." />

                <div class="flex flex-col justify-start items-end gap-1.5">
                    <div class="self-stretch flex flex-col justify-start items-start gap-1">
                        <div class="text-xl font-semibold font-jakarta">Judul Pengumuman</div>
                        <div class="text-gray-700 font-normal font-jakarta">July 14, 2024</div>
                        <div class="flex gap-8">
                            <img src="img/logokab.png" alt="fotoberita" class="w-[400px] h-[300px]">
                            <div>Jorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum tellus orbi convallis convallis diam sidokad...
                                <div class="text-right text-[#2d68f8] mt-5">Selengkapnya</div>
                            </div>
                        </div>
                    <div class="w-full border-b-2 border-gray-400 my-2"></div>

                    </div>
                </div>
            </div>

            <div class="text-xl font-semibold font-jakarta py-8 pr-8 items-center">Lihat Informasi
                <div class="w-full border-b-2 border-gray-400 my-2"></div>
                <div class="bg-white rounded-lg shadow border border-[#e0e2e7] flex flex-col space-y-2 w-64"> 
                    <div class="p-2 flex">
                        <div class="px-2 text-xl font-medium w-full font-jakarta">Pengumuman
                            <div class="w-62 border-b-2 border-[#e0e2e7] my-2"></div>
                        </div>
                    </div>
                    <div class="p-2 flex">
                        <div class="px-2 text-xl font-medium w-full font-jakarta">Berita
                            <div class="w-62 border-b-2 border-[#e0e2e7] my-2"></div>
                        </div>
                    </div>
                    <div class="p-2 flex">
                        <div class="px-2 text-xl font-medium w-full font-jakarta">Aspirasi</div>
                    </div>
                </div>     
            </div>
        </div>
</body>
<x-footer />

</html>
