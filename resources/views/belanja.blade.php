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
        <div class="mt-28"></div>
        <br>
        <a href="{{  route('landingPage.index')  }}">pencet ini :) mwehehe</a>
    </body>
    <x-footer />
</html>