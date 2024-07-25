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

<body class="mytheme font-jakarta antialiased dark:text-white/50">
    <x-admin-navbar />

    <div class="w-screen pl-32 py-3 h-20 bg-secondary text-lightText">
        <div class="text-3xl font-bold">Profil Desa Papungan</div>
        <div class="">Home / Profil Desa</div>
    </div>

    <div class="w-screen pl-32 pr-24 mt-5 space-y-4 mb-10">
        <div class="w-1/2 flex items-center gap-2">
            <div class="font-medium">Kenali Desa Papungan</div>
            <div class="flex-grow border-b-2 border-gray-500"></div>
        </div>

        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Tentang Kami</div>
            <div class="py-2 text-gray-500">Berikut adalah penjelasan dari Profil desa yang ditampilkan</div>
            @if ($success = Session::get('success'))
                <h1>{{ $success }}</h1>
            @endif
            @if ($errors->any())
                <h1>{{ $errors }}</h1>
            @endif
            <!-- Tombol Edit-->
            <x-admin-show
                forValue="PD-01" 
                judulPenjelasan="Penjelasan" 
                subPenjelasan="(Penjelasan profil organisasi desa)"
                nameTextarea="penjelasan" 
                nameInputPhoto="foto" 
                valueTextarea="{{ $profilDesa->data->penjelasan }}"
                valueFoto="{{ $profilDesa->data->foto }}" />

            <div class="flex justify-end mt-4">
                <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center" onclick="g.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Edit
                </button>
            </div>

            <x-modalpf 
                judul="Formulir Update Profil Desa" 
                idModal="g" 
                judulPenjelasan="Penjelasan" 
                namaInputTextarea="penjelasan"
                subJudulPenjelasan="Penjelasan profil organisasi desa" 
                namaInputFoto="foto" 
                valueTextarea="{{$profilDesa->data->penjelasan}}"
                valueFoto="{{$profilDesa->data->foto}}" 
                actionUrl="{{route('profil-desa.update')}}" 
                formMethod="PUT"/>

                <hr class="h-px my-8 bg-gray-300 border-0">
        </div>

        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Visi dan Misi</div>
            <div class="py-2 text-gray-500">Berikut adalah Visi dan Misi yang ditampilkan</div>
            @if ($success = Session::get('success'))
                <h1>{{ $success }}</h1>
            @endif
            @if ($errors->any())
                <h1>{{ $errors }}</h1>
            @endif
            <!-- Tombol Edit-->
            <x-admin-show 
                forValue="PD-02" 
                judulPenjelasan="Penjelasan Visi" 
                subPenjelasan="(Penjelasan visi organisasi desa)"
                nameTextarea="isi_poin" 
                valueTextarea="{{ $visi->isi_poin }}" 
                nameInputPhoto="" 
                valueFoto="" />

            <div class="flex justify-end mt-4">
                <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center" onclick="h.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Edit
                </button>
            </div>

            <x-modalpf 
                judul="Formulir Update Visi Desa" 
                idModal="h" 
                judulPenjelasan="Penjelasan Visi" 
                namaInputTextarea="penjelasan"
                subJudulPenjelasan="(Penjelasan visi organisasi desa)" 
                namaInputFoto="" 
                valueTextarea="{{$visi->isi_poin}}"
                valueFoto="" 
                actionUrl="{{route('profil-desa.update')}}" 
                formMethod="PUT"/>

            <p class="label-text font-semibold text-lg">Penjelasan Misi</p>
            <p class="label-text text-gray-500">Berikut adalah daftar misi yang ditampilkan</p>

            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">Daftar Misi</caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penjelasan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                1
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                2
                            </td>
                            <td class="px-6 py-4">
                                Laptop PC
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="px-6 py-4">
                                3
                            </td>
                            <td class="px-6 py-4">
                                Accessories
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end mt-4">
                <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center" onclick="i.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Tambahkan
                </button>
            </div>

            <x-modalpf 
                judul="Formulir Tambah Misi Desa" 
                idModal="i" 
                judulPenjelasan="Penjelasan Misi" 
                namaInputTextarea="isi_poin"
                subJudulPenjelasan="(Penjelasan misi organisasi desa)" 
                namaInputFoto="" 
                valueTextarea=""
                valueFoto="" 
                actionUrl="{{route('profil-desa.update')}}" 
                formMethod="PUT"/>
            
            <hr class="h-px my-8 bg-gray-300 border-0">
        </div>

        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Sejarah Desa Papungan</div>
            <div class="py-2 text-gray-500">Berikut adalah penjelasan dari Profil desa yang ditampilkan</div>
            @if ($success = Session::get('success'))
                <h1>{{ $success }}</h1>
            @endif
            @if ($errors->any())
                <h1>{{ $errors }}</h1>
            @endif
            <!-- Tombol Edit-->
            <x-admin-show
                forValue="PD-01" 
                judulPenjelasan="Penjelasan" 
                subPenjelasan="(Penjelasan profil organisasi desa)"
                nameTextarea="penjelasan" 
                nameInputPhoto="foto" 
                valueTextarea="{{ $profilDesa->data->penjelasan }}"
                valueFoto="{{ $profilDesa->data->foto }}" />
    
            <div class="flex justify-end mt-4">
                <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center" onclick="g.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Edit
                </button>
            </div>
    
            <x-modalpf 
                judul="Formulir Update Profil Desa" 
                idModal="g" 
                judulPenjelasan="Penjelasan" 
                namaInputTextarea="penjelasan"
                subJudulPenjelasan="Penjelasan profil organisasi desa" 
                namaInputFoto="foto" 
                valueTextarea="{{$profilDesa->data->penjelasan}}"
                valueFoto="{{$profilDesa->data->foto}}" 
                actionUrl="{{route('profil-desa.update')}}" 
                formMethod="PUT"/>
        </div>
    </div>

</body>

</html>
