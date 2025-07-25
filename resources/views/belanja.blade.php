<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="Belanja produk UMKM khas Desa Papungan.">
    <meta name="keywords" content="Belanja, UMKM, Papungan, Desa, Produk, Khas">
    <meta name="author" content="Desa Papungan">

    <title>{{ env('APP_NAME') . ' | Belanja Produk' }}</title>
    @vite('resources/css/app.css')

    <style>
        .font-jakarta {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50">
    <x-navbar />
    <div class="mt-28 space-y-20 md:px-0">
        <div id="belanja"></div>
        <div class="bg-blue-600 text-lightText w-full py-32 px-10">
            <div class="text-4xl font-semibold">Belanja Produk Desa Papungan</div>
            <div class="text-lg mt-4">Belanja Produk UMKM Khas Desa Papungan disini!</div>
        </div>
    </div>
    <div class="container items-center mx-auto space-y-10 text-justify">
        <form class="flex justify-center items-center mt-10 w-full" action="{{ route('belanja.index') }}" method="GET">
            <div class="flex flex-wrap md:flex-nowrap space-y-2 md:space-y-0 items-center space-x-2 w-fit hover:border-gray-400">
                <label class="ml-2 input input-bordered flex items-center gap-2 border-gray-400 bg-white">
                    <input class="w-auto md:w-96 inline-block" name="nama" type="search" class="grow" placeholder="Search"/>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>

                <button type="submit" class="btn bg-secondary text-lightText hover:bg-blue-800">Search</button>
            </div>
        </form>
        <div id="produk" class="px-5 md:px-10 mt-10 flex flex-wrap justify-around items-center w-full gap-2">
            @foreach ($items as $itemn)
                <x-CardBelanja :item="$itemn" />
            @endforeach
        </div>
        <!-- Pagination Section -->
        <section class="px-4 py-6 border-t">
            @if ($items->hasPages())
                <div class="flex items-center justify-between w-full">
                    {{-- Tombol Sebelumnya --}}
                    @if ($items->onFirstPage())
                        <button disabled
                            class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                            </svg>
                            <div class="hidden md:block">Sebelumnya</div>
                        </button>
                    @else
                        <a href="{{ $items->previousPageUrl() }}#produk"
                            class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                            </svg>
                            <div class="hidden md:block">Sebelumnya</div>
                        </a>
                    @endif

                    {{-- Nomor Halaman --}}
                    <div class="hidden lg:flex items-center gap-2">
                        @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                            @if ($page == $items->currentPage())
                            <button
                                class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg bg-blue-100 text-center align-middle font-sans text-xs font-semibold uppercase text-darkText transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                <span
                                    class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    {{ $page }}
                                </span>
                            </button>
                            @else
                            <a href="{{ $url }} #berita"
                                class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20"
                                type="button">
                                <span
                                    class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    {{ $page }}
                                </span>
                            </a>
                            @endif
                        @endforeach
                    </div>

                    {{-- Info Halaman di Mobile --}}
                    <div class="flex-col text-center items-center gap-2 lg:hidden">
                        <div class="">{{ $items->currentPage() }} dari {{ $items->lastPage() }}</div>
                    </div>

                    {{-- Tombol Berikutnya --}}
                    @if ($items->hasMorePages())
                        <a href="{{ $items->nextPageUrl() }}#produk" 
                            class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20"
                            type="button">
                            <div class="hidden md:block">Berikutnya</div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                            </svg>
                        </a>
                    @else
                        <button disabled
                            class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button">
                            <div class="hidden md:block">Berikutnya</div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                            </svg>
                        </button>
                    @endif
                </div>
            @endif
        </section>

    </div>

    </div>
    <x-footer />
</body>
</html>