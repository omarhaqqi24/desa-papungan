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

<body class="mytheme font-jakarta antialiased  dark:text-white/50">
    <x-navbar />
    <div class=" container mx-auto mt-36 space-y-10 px-5 md:px-0 min-h-screen">

        <x-table.table :headers="['judul', 'isi', 'createdAt']" jenisTabel="Template Tabel">
            @php
                $i = 1;
            @endphp
            @foreach ($data->data as $berita)
                <tr class="border-b">
                    <td class="p-2 text-left">{{ $i++ }}</td>
                    <td class="p-2 text-left">{{ $berita->judul }}</td>
                    <td class="p-2 text-left">{{ $berita->isi }}</td>
                    <td class="p-2 text-left">{{ $berita->createdAt }}</td>
                </tr>
            @endforeach
        </x-table.table>

</body>

<x-footer />

</html>

<!-- (bagian) Start -->
<!-- (bagian) End -->
