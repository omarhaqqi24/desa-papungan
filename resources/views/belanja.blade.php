<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') . ' | Belanja Desa' }}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50">
        <x-navbar />
        <div class="mt-28 space-y-20 md:px-0">
            <!-- profil umkm-->
            <div class="bg-blue-600 text-white w-full px-10 h-44 flex flex-col items-start justify-center">
                <div class="text-3xl font-semibold">Belanja Desa</div>
                <div class="text-sm font-normal">Belanja Produk UMKM Khas Papungan disini!</div>
            </div>
        </div>

        <div class="px-5 md:px-10 mt-10 flex flex-wrap justify-around items-center w-full">
            <!-- <div class="h-96 w-80 rounded-2xl bg-blue-500">

            </div> -->
                <div class="h-96 w-80 rounded-2xl my-8 bg-white shadow-md overflow-hidden">
                    <img src="{{ asset('/img/produk/og-naseka.JPG') }}" alt="" class="h-1/2 w-full object-cover scale-[1.3] z-30 relative">
                    <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-white h-1/2 relative">
                        <h3 class="font-semibold text-lg text-gray-900 mb-1">Opak Gambir</h3>
                        <div class="text-blue-700 font-bold text-xl mb-1">
                            17.000
                        </div>
                        <p class="text-gray-700 text-sm mb-2 line-clamp-2">ini asli dah enak banget</p>
                        <div class="mt-auto">
                            <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-semibold">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                <div class="h-96 w-80 rounded-2xl my-8 bg-white shadow-md overflow-hidden">
                    <img src="{{ asset('/img/produk/og-naseka.JPG') }}" alt="" class="h-1/2 w-full object-cover scale-[1.3] z-30 relative">
                    <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-white h-1/2 relative">
                        <h3 class="font-semibold text-lg text-gray-900 mb-1">Opak Gambir</h3>
                        <div class="text-blue-700 font-bold text-xl mb-1">
                            17.000
                        </div>
                        <p class="text-gray-700 text-sm mb-2 line-clamp-2">ini asli dah enak banget</p>
                        <div class="mt-auto">
                            <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-semibold">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                <div class="h-96 w-80 rounded-2xl my-8 bg-white shadow-md overflow-hidden">
                    <img src="{{ asset('/img/produk/og-naseka.JPG') }}" alt="" class="h-1/2 w-full object-cover scale-[1.3] z-30 relative">
                    <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-white h-1/2 relative">
                        <h3 class="font-semibold text-lg text-gray-900 mb-1">Opak Gambir</h3>
                        <div class="text-blue-700 font-bold text-xl mb-1">
                            17.000
                        </div>
                        <p class="text-gray-700 text-sm mb-2 line-clamp-2">ini asli dah enak banget</p>
                        <div class="mt-auto">
                            <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-semibold">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                <div class="h-96 w-80 rounded-2xl my-8 bg-white shadow-md overflow-hidden">
                    <img src="{{ asset('/img/produk/og-naseka.JPG') }}" alt="" class="h-1/2 w-full object-cover scale-[1.3] z-30 relative">
                    <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-white h-1/2 relative">
                        <h3 class="font-semibold text-lg text-gray-900 mb-1">Opak Gambir</h3>
                        <div class="text-blue-700 font-bold text-xl mb-1">
                            17.000
                        </div>
                        <p class="text-gray-700 text-sm mb-2 line-clamp-2">ini asli dah enak banget</p>
                        <div class="mt-auto">
                            <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-semibold">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                <div class="h-96 w-80 rounded-2xl my-8 bg-white shadow-md overflow-hidden">
                    <img src="{{ asset('/img/produk/og-naseka.JPG') }}" alt="" class="h-1/2 w-full object-cover scale-[1.3] z-30 relative">
                    <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-white h-1/2 relative">
                        <h3 class="font-semibold text-lg text-gray-900 mb-1">Opak Gambir</h3>
                        <div class="text-blue-700 font-bold text-xl mb-1">
                            17.000
                        </div>
                        <p class="text-gray-700 text-sm mb-2 line-clamp-2">ini asli dah enak banget</p>
                        <div class="mt-auto">
                            <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-semibold">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                <div class="h-96 w-80 rounded-2xl my-8 bg-white shadow-md overflow-hidden">
                    <img src="{{ asset('/img/produk/og-naseka.JPG') }}" alt="" class="h-1/2 w-full object-cover scale-[1.3] z-30 relative">
                    <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-white h-1/2 relative">
                        <h3 class="font-semibold text-lg text-gray-900 mb-1">Opak Gambir</h3>
                        <div class="text-blue-700 font-bold text-xl mb-1">
                            17.000
                        </div>
                        <p class="text-gray-700 text-sm mb-2 line-clamp-2">ini asli dah enak banget</p>
                        <div class="mt-auto">
                            <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-semibold">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                <div class="h-96 w-80 rounded-2xl my-8 bg-white shadow-md overflow-hidden">
                    <img src="{{ asset('/img/produk/og-naseka.JPG') }}" alt="" class="h-1/2 w-full object-cover scale-[1.3] z-30 relative">
                    <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-white h-1/2 relative">
                        <h3 class="font-semibold text-lg text-gray-900 mb-1">Opak Gambir</h3>
                        <div class="text-blue-700 font-bold text-xl mb-1">
                            17.000
                        </div>
                        <p class="text-gray-700 text-sm mb-2 line-clamp-2">ini asli dah enak banget</p>
                        <div class="mt-auto">
                            <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-semibold">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                <div class="h-96 w-80 rounded-2xl my-8 bg-white shadow-md overflow-hidden">
                    <img src="{{ asset('/img/produk/og-naseka.JPG') }}" alt="" class="h-1/2 w-full object-cover scale-[1.3] z-30 relative">
                    <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-white h-1/2 relative">
                        <h3 class="font-semibold text-lg text-gray-900 mb-1">Opak Gambir</h3>
                        <div class="text-blue-700 font-bold text-xl mb-1">
                            17.000
                        </div>
                        <p class="text-gray-700 text-sm mb-2 line-clamp-2">ini asli dah enak banget</p>
                        <div class="mt-auto">
                            <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-semibold">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                <div class="h-96 w-80 rounded-2xl my-8 bg-white shadow-md overflow-hidden">
                    <img src="{{ asset('/img/produk/og-naseka.JPG') }}" alt="" class="h-1/2 w-full object-cover scale-[1.3] z-30 relative">
                    <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-white h-1/2 relative">
                        <h3 class="font-semibold text-lg text-gray-900 mb-1">Opak Gambir</h3>
                        <div class="text-blue-700 font-bold text-xl mb-1">
                            17.000
                        </div>
                        <p class="text-gray-700 text-sm mb-2 line-clamp-2">ini asli dah enak banget</p>
                        <div class="mt-auto">
                            <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-semibold">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    </body>
    <x-footer />
</html>