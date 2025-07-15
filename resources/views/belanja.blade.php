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
                <label class="input input-bordered flex items-center gap-2 border-gray-400 bg-white">
                    <input class="w-96 inline-block" name="nama" type="search" class="grow" placeholder="Search"/>
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
        <div class="px-5 md:px-10 mt-10 flex flex-wrap justify-around items-center w-full gap-2">
            @foreach ($produk as $itemn)
            <x-CardBelanja :item="$itemn" />
            @endforeach
        </div>
    </div>

    </div>
    <x-footer />
</body>
</html>