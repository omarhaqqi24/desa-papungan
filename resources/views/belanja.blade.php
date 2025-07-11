<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env("APP_NAME") . " | Belanja Desa" }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

</head>

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50">
    <x-navbar />
    <div class="mt-28 space-y-20 md:px-0">
        <!-- isi disini-->

        <!-- struktural-->
        <div id="struktural"></div>
        <div class="bg-secondary text-base-100 w-full py-32 px-10">
            <div class="text-3xl font-semibold">Belanja Desa Papungan</div>
            <div class="text-sm font-normal">Home / Belanja Desa</div>
        </div>
    </div>

</body>
<x-footer />


</html>
