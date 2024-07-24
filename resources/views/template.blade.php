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
    <div class="mt-36 space-y-10 px-5 md:px-0">
        <!-- isi disini-->

        <!--Template cardSubJudul Lokasi Desa, ex: Pariwisata Desa -->
        <x-cardSubjudul jenisJudul="LOKASI" judul="Peta Digital Makam Mbah Moedjair Desa Papungan"
            deskripsi="Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. " />

        <!--Template component header Artikel, ex: Pariwisata Desa -->
        <x-headerArtikel subJudul="Kenali Pariwisata Desa Papungan  " judul="Profil Makam Mbah Moedjair" />

        <!-- Template component Tabel, ex: berita-->
        <x-table.table :headers="['judul', 'isi', 'createdAt']">
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

        <!--Template Tombol Edit-->
        <x-admin-edit-button forValue="PD-TK" judulPenjelasan="Penjelasan"
            subPenjelasan="(Penjelasan profil organisasi desa)" nameTextarea="namaInput" nameInputPhoto="namaInput" />


        <!--Template modal -->
        <div class="flex justify-end px-5 mt-4">
            <!-- You can open the modal using ID.showModal() method -->
            <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded flex items-center"
                onclick="EDITDLU.showModal()">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="mr-2">
                    <path
                        d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                        fill="white" />
                </svg>
                Edit
            </button>
        </div>

        <x-modalpf judul="test" idModal="EDITDLU" judulPenjelasan="test" namaInputTextarea="test1"
            subJudulPenjelasan="test2" namaInputFoto='test3' />
    </div>

</body>

</html>

<!-- (bagian) Start -->
<!-- (bagian) End -->
