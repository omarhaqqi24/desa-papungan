<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') . ' | Admin Informasi Desa' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')

</head>

<body class="mytheme font-jakarta antialiased dark:text-white/50">
    <x-admin-navbar />

    <div class="w-screen pl-32 py-3 h-20 bg-secondary text-lightText">
        <div class="text-3xl font-bold">Informasi</div>
        <div class="">Home / Informasi</div>
    </div>

    <div class="w-screen pl-32 pr-24 mt-5 space-y-4 mb-10">
        <div class="w-1/2 flex items-center gap-2">
            <div class="font-medium">Informasi</div>
            <div class="flex-grow border-b-2 border-gray-500"></div>
        </div>

        @if ($success = Session::get('success'))
            <div role="alert" class="alert alert-success bg-green-200 text-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $success }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div role="alert" class="alert alert-error bg-red-200 text-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        @endif

        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Daftar Berita dan Pengumuman</div>

            <form action="#cari-berita" method="get">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Pencarian" name="qBerita" id="cari-berita"
                        value="{{ request()->input('qBerita') }}"
                        class="w-1/2 my-4 py-2 pl-10 pr-5 appearance-none focus:outline-none focus:ring-blue-500 rounded-lg border border-gray-300">
                </div>
            </form>
            <div class="py-2 text-gray-500">Berikut adalah daftar berita ditampilkan</div>

            <!-- Table Berita Desa -->
            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Daftar Berita</caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Judul
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Isi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penulis
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Foto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Terakhir Diupdate
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita->data as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $item->judul }}
                                </td>
                                <td class="px-6 py-4">
                                    <button
                                        onclick='openModalShowBerita("{{ $item->id }}", @json($item))'
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                        Isi</a>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->penulis }}
                                </td>
                                <td class="px-6 py-4">
                                    <img onclick="openModalPreviewImageBerita('{{ $item->id }}')"
                                        src="{{ $item->foto[0] }}" alt="berita-desa"
                                        class="w-12 h-12 object-cover rounded-xl">
                                    <dialog id="preview_brt_{{ $item->id }}" class="modal">
                                        <div class="modal-box">
                                            @foreach ($item->foto as $poto)
                                            <img src="{{ $poto }}" alt="foto-sejarah-desa"
                                                class="object-cover rounded-lg w-full mb-4">
                                            @endforeach
                                        </div>
                                        <form method="dialog" class="modal-backdrop">
                                            <button>close</button>
                                        </form>
                                    </dialog>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->updatedAt }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-6 justify-center items-center">
                                        <button onclick="openModalDeleteBerita('{{ $item->id }}')"
                                            class="font-medium">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3 5.00033H4.66667M4.66667 5.00033H18M4.66667 5.00033V16.667C4.66667 17.109 4.84226 17.5329 5.15482 17.8455C5.46738 18.1581 5.89131 18.3337 6.33333 18.3337H14.6667C15.1087 18.3337 15.5326 18.1581 15.8452 17.8455C16.1577 17.5329 16.3333 17.109 16.3333 16.667V5.00033H4.66667ZM7.16667 5.00033V3.33366C7.16667 2.89163 7.34226 2.46771 7.65482 2.15515C7.96738 1.84259 8.39131 1.66699 8.83333 1.66699H12.1667C12.6087 1.66699 13.0326 1.84259 13.3452 2.15515C13.6577 2.46771 13.8333 2.89163 13.8333 3.33366V5.00033M8.83333 9.16699V14.167M12.1667 9.16699V14.167"
                                                    stroke="#475467" stroke-width="1.66667" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>

                                        <button
                                            onclick='openModalUpdateBerita("{{ $item->id }}", @json($item))'
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6665 2.49993C14.8854 2.28106 15.1452 2.10744 15.4312 1.98899C15.7171 1.87054 16.0236 1.80957 16.3332 1.80957C16.6427 1.80957 16.9492 1.87054 17.2352 1.98899C17.5211 2.10744 17.781 2.28106 17.9998 2.49993C18.2187 2.7188 18.3923 2.97863 18.5108 3.2646C18.6292 3.55057 18.6902 3.85706 18.6902 4.16659C18.6902 4.47612 18.6292 4.78262 18.5108 5.06859C18.3923 5.35455 18.2187 5.61439 17.9998 5.83326L6.74984 17.0833L2.1665 18.3333L3.4165 13.7499L14.6665 2.49993Z"
                                                    stroke="#475467" stroke-width="1.66667" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>

                                    <dialog id="mdbr_{{ $item->id }}" class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Peringatan!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus?</p>
                                            <div class="modal-action">
                                                <form
                                                    action="{{ route('admin.informasi.berita.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn bg-red-400 text-white">Iya</button>
                                                </form>
                                                <button
                                                    onclick="document.getElementById('mdbr_' + '{{ $item->id }}').close()"
                                                    class="btn bg-secondary text-white">Tidak</button>
                                            </div>
                                        </div>
                                    </dialog>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End -->

            <!-- Modal Form Update Berita -->
            <dialog id="modal_form_berita_up" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Update Berita</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" enctype="multipart/form-data" id="form_up_brt"
                        action="{{ route('admin.informasi.berita.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="judul_brt_up" class="label-text font-semibold">Judul</label>
                                <input type="text" name="judul" id="judul_brt_up" class="input input-bordered"
                                    placeholder="(Tuliskan Nama)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                                <input hidden type="text" name="id" id="id_brt">
                            </div>
                            <div class="form-control gap-4">
                                <label for="isi_brt_up" class="label-text font-semibold">Isi</label>
                                <textarea name="isi" id="isi_brt_up" class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="nama_brt_up" class="label-text font-semibold">Penulis</label>
                                <input type="text" name="nama" id="nama_brt_up" class="input input-bordered"
                                    placeholder="(Tuliskan Nama)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="hidden form-control gap-4">
                                <label hidden for="isacc_brt_up" class="label-text font-semibold">isAccepted</label>
                                <input hidden type="text" name="isAccepted" id="isacc_brt_up"
                                    class="input input-bordered" />
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="foto_brt_up" class="label-text font-semibold">Foto</label>
                                <input type="file" name="foto[]" id="foto_brt_up"
                                    class="file-input file-input-bordered" multiple>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> file .png atau
                                    .jpg</p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button"
                                        class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_berita_up.close()">Tutup</button>
                                    <button id="edit-btn-test" type="submit"
                                        class="btn rounded-xl text-lightText bg-green-500 hover:bg-green-900 hover:text-lightText px-4 py-2 flex items-center">
                                        <img src="/img/saveLogo.svg" alt="">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </dialog>
            <!-- End -->

            <!-- Modal Form Tambah Berita -->
            <dialog id="modal_form_berita" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Tambah Berita</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" enctype="multipart/form-data" id="form_brt"
                        action="{{ route('admin.informasi.berita.create') }}">
                        @csrf
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="judul_brt" class="label-text font-semibold">Judul</label>
                                <input type="text" name="judul" id="judul_brt" class="input input-bordered"
                                    placeholder="Tuliskan judul">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                                <input hidden type="text" name="id" id="id_brt">
                            </div>
                            <div class="form-control gap-4">
                                <label for="nama_brt" class="label-text font-semibold">Penulis</label>
                                <input type="text" name="nama" id="nama_brt" class="input input-bordered"
                                    placeholder="Tuliskan Nama">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="isi_brt" class="label-text font-semibold">Isi</label>
                                <textarea name="isi" id="isi_brt" class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="foto_brt" class="label-text font-semibold">Foto</label>
                                <input type="file" name="foto[]" id="foto_brt"
                                    class="file-input file-input-bordered" multiple>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> file .png atau
                                    .jpg</p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button"
                                        class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_berita.close()">Tutup</button>
                                    <button id="edit-btn-test" type="submit"
                                        class="btn rounded-xl text-lightText bg-green-500 hover:bg-green-900 hover:text-lightText px-4 py-2 flex items-center">
                                        <img src="/img/saveLogo.svg" alt="">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </dialog>
            <!-- End -->

            <!-- Modal Form Show Berita -->
            <dialog id="modal_form_berita_sh" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Detail Berita</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" enctype="multipart/form-data" id="form_brt_sh"
                        action="{{ route('admin.pemerintahan.perangkat-desa.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="judul_brt_sh" class="label-text font-semibold">Judul</label>
                                <input disabled type="text" name="judul" id="judul_brt_sh"
                                    class="input input-bordered disabled:bg-slate-100" placeholder="(Tuliskan Nama)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                                <input hidden type="text" name="id" id="id_brt_sh">
                            </div>
                            <div class="form-control gap-4">
                                <label for="isi_brt_sh" class="label-text font-semibold">Isi</label>
                                <textarea disabled name="isi" id="isi_brt_sh"
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="nama_brt_sh" class="label-text font-semibold">Penulis</label>
                                <input disabled type="text" name="nama" id="nama_brt_sh"
                                    class="input input-bordered disabled:bg-slate-100">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button"
                                        class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_berita_sh.close()">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </dialog>
            <!-- End -->

            <div class="flex justify-end mt-4">
                <button
                    class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center"
                    onclick="modal_form_berita.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Tambahkan
                </button>
            </div>

            <form action="#cari-pengumuman" method="get">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Pencarian" name="qPengumuman" id="cari-pengumuman"
                        value="{{ request()->input('qPengumuman') }}"
                        class="w-1/2 my-4 py-2 pl-10 pr-5 appearance-none focus:outline-none focus:ring-blue-500 rounded-lg border border-gray-300">
                </div>
            </form>
            <div class="py-2 text-gray-500">Berikut adalah daftar pengumuman ditampilkan</div>

            <!-- Table Pengumuman Desa -->
            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6" >
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Daftar Pengumuman</caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Judul
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Isi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penulis
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Terakhir Diupdate
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengumuman->data as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $item->judul }}
                                </td>
                                <td class="px-6 py-4">
                                    <button
                                        onclick='openModalShowPengumuman("{{ $item->id }}", @json($item))'
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                        Isi</button>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->penulis }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->updatedAt }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-6 justify-center items-center">
                                        <button onclick="openModalDeletePengumuman('{{ $item->id }}')"
                                            class="font-medium">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3 5.00033H4.66667M4.66667 5.00033H18M4.66667 5.00033V16.667C4.66667 17.109 4.84226 17.5329 5.15482 17.8455C5.46738 18.1581 5.89131 18.3337 6.33333 18.3337H14.6667C15.1087 18.3337 15.5326 18.1581 15.8452 17.8455C16.1577 17.5329 16.3333 17.109 16.3333 16.667V5.00033H4.66667ZM7.16667 5.00033V3.33366C7.16667 2.89163 7.34226 2.46771 7.65482 2.15515C7.96738 1.84259 8.39131 1.66699 8.83333 1.66699H12.1667C12.6087 1.66699 13.0326 1.84259 13.3452 2.15515C13.6577 2.46771 13.8333 2.89163 13.8333 3.33366V5.00033M8.83333 9.16699V14.167M12.1667 9.16699V14.167"
                                                    stroke="#475467" stroke-width="1.66667" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>

                                        <button
                                            onclick='openModalUpdatePengumuman("{{ $item->id }}", @json($item))'
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6665 2.49993C14.8854 2.28106 15.1452 2.10744 15.4312 1.98899C15.7171 1.87054 16.0236 1.80957 16.3332 1.80957C16.6427 1.80957 16.9492 1.87054 17.2352 1.98899C17.5211 2.10744 17.781 2.28106 17.9998 2.49993C18.2187 2.7188 18.3923 2.97863 18.5108 3.2646C18.6292 3.55057 18.6902 3.85706 18.6902 4.16659C18.6902 4.47612 18.6292 4.78262 18.5108 5.06859C18.3923 5.35455 18.2187 5.61439 17.9998 5.83326L6.74984 17.0833L2.1665 18.3333L3.4165 13.7499L14.6665 2.49993Z"
                                                    stroke="#475467" stroke-width="1.66667" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>

                                    <dialog id="mdpg_{{ $item->id }}" class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Peringatan!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus?</p>
                                            <div class="modal-action">
                                                <form
                                                    action="{{ route('admin.informasi.pengumuman.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn bg-red-400 text-white">Iya</button>
                                                </form>
                                                <button
                                                    onclick="document.getElementById('mdpg_' + '{{ $item->id }}').close()"
                                                    class="btn bg-secondary text-white">Tidak</button>
                                            </div>
                                        </div>
                                    </dialog>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End -->

            <!-- Modal Form Update Pengumuman -->
            <dialog id="modal_form_pengumuman_up" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Update Pengumuman</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" enctype="multipart/form-data" id="form_up_png"
                        action="{{ route('admin.informasi.pengumuman.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="judul_png_up" class="label-text font-semibold">Judul</label>
                                <input type="text" name="judul" id="judul_png_up" class="input input-bordered"
                                    placeholder="(Tuliskan Nama)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                                <input hidden type="text" name="id" id="id_png">
                            </div>
                            <div class="form-control gap-4">
                                <label for="isi_png_up" class="label-text font-semibold">Isi</label>
                                <textarea name="isi" id="isi_png_up" class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="nama_png_up" class="label-text font-semibold">Penulis</label>
                                <input type="text" name="nama" id="nama_png_up" class="input input-bordered"
                                    placeholder="(Tuliskan Nama)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="hidden form-control gap-4">
                                <label for="isacc_png_up" class="label-text font-semibold">isAccepted</label>
                                <input type="text" name="isAccepted" id="isacc_png_up"
                                    class="input input-bordered" placeholder="(Tuliskan Nama)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button"
                                        class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_pengumuman_up.close()">Tutup</button>
                                    <button id="edit-btn-test" type="submit"
                                        class="btn rounded-xl text-lightText bg-green-500 hover:bg-green-900 hover:text-lightText px-4 py-2 flex items-center">
                                        <img src="/img/saveLogo.svg" alt="">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </dialog>
            <!-- End -->

            <!-- Modal Form Show Pengumuman -->
            <dialog id="modal_form_pengumuman_sh" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Detail Pengumuman</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" enctype="multipart/form-data" id="form_png_sh"
                        action="{{ route('admin.pemerintahan.perangkat-desa.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="judul_png_sh" class="label-text font-semibold">Judul</label>
                                <input disabled type="text" name="judul" id="judul_png_sh"
                                    class="input input-bordered disabled:bg-slate-100" placeholder="(Tuliskan Nama)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                                <input hidden type="text" name="id" id="id_png_sh">
                            </div>
                            <div class="form-control gap-4">
                                <label for="isi_png_sh" class="label-text font-semibold">Isi</label>
                                <textarea disabled name="isi" id="isi_png_sh"
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="nama_png_sh" class="label-text font-semibold">Penulis</label>
                                <input disabled type="text" name="nama" id="nama_png_sh"
                                    class="input input-bordered disabled:bg-gray-100">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button"
                                        class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_pengumuman_sh.close()">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </dialog>
            <!-- End -->

            <!-- Modal Form Tambah Pengumuman -->
            <dialog id="modal_form_pengumuman" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Tambah Pengumuman</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" enctype="multipart/form-data" id="form_png"
                        action="{{ route('admin.informasi.pengumuman.create') }}">
                        @csrf
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="judul_png" class="label-text font-semibold">Judul</label>
                                <input type="text" name="judul" id="judul_png" class="input input-bordered"
                                    placeholder="Tuliskan judul">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                                <input hidden type="text" name="id" id="id_png">
                            </div>
                            <div class="form-control gap-4">
                                <label for="isi_png" class="label-text font-semibold">Isi</label>
                                <textarea name="isi" id="isi_png" class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="nama_png" class="label-text font-semibold">Penulis</label>
                                <input type="text" name="nama" id="nama_png" class="input input-bordered"
                                    placeholder="Tuliskan nama">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button"
                                        class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_pengumuman.close()">Tutup</button>
                                    <button id="edit-btn-test" type="submit"
                                        class="btn rounded-xl text-lightText bg-green-500 hover:bg-green-900 hover:text-lightText px-4 py-2 flex items-center">
                                        <img src="/img/saveLogo.svg" alt="">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </dialog>
            <!-- End -->

            <div class="flex justify-end mt-4">
                <button
                    class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center"
                    onclick="modal_form_pengumuman.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Tambahkan
                </button>
            </div>

            <hr class="h-px my-8 bg-gray-300 border-0">
        </div>

        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Daftar Permintaan</div>
            <form action="#cari-berita-req" method="get">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Pencarian" name="qBeritaReq" id="cari-berita-req"
                        value="{{ request()->input('qBeritaReq') }}"
                        class="w-1/2 my-4 py-2 pl-10 pr-5 appearance-none focus:outline-none focus:ring-blue-500 rounded-lg border border-gray-300">
                </div>
            </form>
            <div class="py-2 text-gray-500">Berikut adalah daftar permintaan berita yang akan ditampilkan</div>
            <!-- Table Permintaan Berita -->
            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6" >
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Daftar Permintaan Berita</caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Isi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penulis
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Foto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paginatedItemsBerita as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $item->createdAt }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->judul }}
                                </td>
                                <td class="px-6 py-4">
                                    <button
                                        onclick="openModalShowBerita('{{ $item->id }}', '{{ json_encode($item) }}')"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                        Isi</button>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->penulis }}
                                </td>
                                <td class="px-6 py-4">
                                    <img onclick="openModalPreviewImageBerita('{{ $item->id }}')"
                                        src="{{ $item->foto[0] }}" alt="berita-desa"
                                        class="w-12 h-12 object-cover rounded-xl">
                                    <dialog id="preview_brt_{{ $item->id }}" class="modal">
                                        <div class="modal-box">
                                            @foreach ($item->foto as $poto)
                                            <img src="{{ $poto }}" alt="foto-sejarah-desa"
                                                class="object-cover rounded-lg w-full mb-4">
                                            @endforeach
                                        </div>
                                        <form method="dialog" class="modal-backdrop">
                                            <button>close</button>
                                        </form>
                                    </dialog>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-4 justify-end">
                                        <button onclick="openModalDeleteBerita('{{ $item->id }}')"
                                            class="btn btn-warning btn-sm bg-red-400 text-white border-0">Hapus</button>

                                        <form action="{{ route('admin.informasi.berita.getAccepted', $item->id) }}"
                                            method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="btn btn-success btn-sm bg-green-400 text-white border-0">Publikasi</button>
                                        </form>
                                    </div>

                                    <dialog id="mdbr_{{ $item->id }}" class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Peringatan!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus?</p>
                                            <div class="modal-action">
                                                <form
                                                    action="{{ route('admin.informasi.berita.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn bg-red-400 text-white">Iya</button>
                                                </form>
                                                <button
                                                    onclick="document.getElementById('mdbr_' + '{{ $item->id }}').close()"
                                                    class="btn bg-secondary text-white">Tidak</button>
                                            </div>
                                        </div>
                                    </dialog>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Section -->
                <section class="px-4 py-6 bg-white border-t">
                    @if ($paginatedItemsBerita->hasPages())
                        <div class="flex items-center justify-between w-full">
                            @if ($paginatedItemsBerita->onFirstPage())
                                <button disabled
                                    class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                    </svg>
                                    Previous
                                </button>
                            @else
                                <a href="{{ $paginatedItemsBerita->appends(request()->query())->previousPageUrl() }}"
                                    class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                    </svg>
                                    Previous
                                </a>
                            @endif

                            <div class="flex items-center gap-2">
                                @foreach ($paginatedItemsBerita->appends(request()->query())->getUrlRange(1, $paginatedItemsBerita->lastPage()) as $page => $url)
                                    @if ($page == $paginatedItemsBerita->currentPage())
                                        <button
                                            class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg bg-blue-100 text-center align-middle font-sans text-xs font-semibold uppercase text-darkText transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <span
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                {{ $page }}
                                            </span>
                                        </button>
                                    @else
                                        <a href="{{ $url }}"
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

                            @if ($paginatedItemsBerita->hasMorePages())
                                <a href="{{ $paginatedItemsBerita->appends(request()->query())->nextPageUrl() }}"
                                    class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20"
                                    type="button">
                                    Next
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
                                    Next
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
            <!-- End -->

            <form action="#cari-pengumuman-req" method="get" class="mt-6">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Pencarian" name="qPengumumanReq" id="cari-pengumuman-req"
                        value="{{ request()->input('qPengumumanReq') }}"
                        class="w-1/2 my-4 py-2 pl-10 pr-5 appearance-none focus:outline-none focus:ring-blue-500 rounded-lg border border-gray-300">
                </div>
            </form>
            <div class="py-2 text-gray-500">Berikut adalah daftar permintaan pengumuman yang akan ditampilkan</div>
            <!-- Table Permintaan Pengumuman -->
            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Daftar Permintaan Pengumuman</caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Isi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penulis
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paginatedItemsPengumuman as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $item->createdAt }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->judul }}
                                </td>
                                <td class="px-6 py-4">
                                    <button
                                        onclick='openModalShowPengumuman("{{ $item->id }}", @json($item))'
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                        Isi</button>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->penulis }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-4 justify-end">
                                        <button onclick="openModalDeletePengumuman('{{ $item->id }}')"
                                            class="btn btn-warning btn-sm bg-red-400 text-white border-0">Hapus</button>

                                        <form
                                            action="{{ route('admin.informasi.pengumuman.getAccepted', $item->id) }}"
                                            method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="btn btn-success btn-sm bg-green-400 text-white border-0">Publikasi</button>
                                        </form>
                                    </div>

                                    <dialog id="mdpg_{{ $item->id }}" class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Peringatan!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus?</p>
                                            <div class="modal-action">
                                                <form
                                                    action="{{ route('admin.informasi.pengumuman.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn bg-red-400 text-white">Iya</button>
                                                </form>
                                                <button
                                                    onclick="document.getElementById('mdpg_' + '{{ $item->id }}').close()"
                                                    class="btn bg-secondary text-white">Tidak</button>
                                            </div>
                                        </div>
                                    </dialog>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Section -->
                <section class="px-4 py-6 bg-white border-t">
                    @if ($paginatedItemsPengumuman->hasPages())
                        <div class="flex items-center justify-between w-full">
                            @if ($paginatedItemsPengumuman->onFirstPage())
                                <button disabled
                                    class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                    </svg>
                                    Previous
                                </button>
                            @else
                                <a href="{{ $paginatedItemsPengumuman->appends(request()->query())->previousPageUrl() }}"
                                    class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                    </svg>
                                    Previous
                                </a>
                            @endif

                            <div class="flex items-center gap-2">
                                @foreach ($paginatedItemsPengumuman->appends(request()->query())->getUrlRange(1, $paginatedItemsPengumuman->lastPage()) as $page => $url)
                                    @if ($page == $paginatedItemsPengumuman->currentPage())
                                        <button
                                            class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg bg-blue-100 text-center align-middle font-sans text-xs font-semibold uppercase text-darkText transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <span
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                {{ $page }}
                                            </span>
                                        </button>
                                    @else
                                        <a href="{{ $url }}"
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

                            @if ($paginatedItemsPengumuman->hasMorePages())
                                <a href="{{ $paginatedItemsPengumuman->appends(request()->query())->nextPageUrl() }}"
                                    class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20"
                                    type="button">
                                    Next
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
                                    Next
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
            <!-- End -->
            <hr class="h-px my-8 bg-gray-300 border-0">
        </div>

        <div class="w-full" >
            <div class="text-3xl font-semibold text-darkText">Daftar Aspirasi</div>
            <form action="#cari-aspirasi" method="get">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Pencarian" name="qAspirasi" id="cari-aspirasi"
                        value="{{ request()->input('qAspirasi') }}"
                        class="w-1/2 my-4 py-2 pl-10 pr-5 appearance-none focus:outline-none focus:ring-blue-500 rounded-lg border border-gray-300">
                </div>
            </form>
            <div class="py-2 text-gray-500">Berikut adalah daftar aspirasi</div>
            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    id="table-aspirasi">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Daftar Aspirasi</caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Isi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penulis
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paginatedItemsAspirasi as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $item->createdAt }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->judul }}
                                </td>
                                <td class="px-6 py-4">
                                    <button
                                        onclick="openModalShowAspirasi('{{ $item->id }}', '{{ json_encode($item) }}')"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                        Isi</button>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->penulis }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end items-center gap-4">
                                        <input type="checkbox"
                                            class="checkbox border-gray-400 [--chkbg:theme(colors.green.300)] [--chkfg:white] checked:border-green-300" />
                                        <button onclick="openModalDeleteAspirasi('{{ $item->id }}')"
                                            class="btn btn-warning btn-sm bg-red-400 text-white border-0">Hapus</button>
                                    </div>

                                    <dialog id="mdas_{{ $item->id }}" class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Peringatan!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus?</p>
                                            <div class="modal-action">
                                                <form
                                                    action="{{ route('admin.informasi.aspirasi.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn bg-red-400 text-white">Iya</button>
                                                </form>
                                                <button
                                                    onclick="document.getElementById('mdas_' + '{{ $item->id }}').close()"
                                                    class="btn bg-secondary text-white">Tidak</button>
                                            </div>
                                        </div>
                                    </dialog>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Section -->
                <section class="px-4 py-6 bg-white border-t">
                    @if ($paginatedItemsAspirasi->hasPages())
                        <div class="flex items-center justify-between w-full">
                            @if ($paginatedItemsAspirasi->onFirstPage())
                                <button disabled
                                    class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                    </svg>
                                    Previous
                                </button>
                            @else
                                <a href="{{ $paginatedItemsAspirasi->appends(request()->query())->previousPageUrl() }}"
                                    class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                    </svg>
                                    Previous
                                </a>
                            @endif

                            <div class="flex items-center gap-2">
                                @foreach ($paginatedItemsAspirasi->appends(request()->query())->getUrlRange(1, $paginatedItemsAspirasi->lastPage()) as $page => $url)
                                    @if ($page == $paginatedItemsAspirasi->currentPage())
                                        <button
                                            class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg bg-blue-100 text-center align-middle font-sans text-xs font-semibold uppercase text-darkText transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <span
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                {{ $page }}
                                            </span>
                                        </button>
                                    @else
                                        <a href="{{ $url }}"
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

                            @if ($paginatedItemsAspirasi->hasMorePages())
                                <a href="{{ $paginatedItemsAspirasi->appends(request()->query())->nextPageUrl() }}"
                                    class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20"
                                    type="button">
                                    Next
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
                                    Next
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

            <!-- Modal Form Show Aspirasi -->
            <dialog id="modal_form_aspirasi_sh" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Detail Aspirasi</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" enctype="multipart/form-data" id="form_asr_sh"
                        action="{{ route('admin.pemerintahan.perangkat-desa.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="judul_asr_sh" class="label-text font-semibold">Judul</label>
                                <input disabled type="text" name="judul" id="judul_asr_sh"
                                    class="input input-bordered disabled:bg-slate-100" placeholder="(Tuliskan Nama)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                                <input hidden type="text" name="id" id="id_asr_sh">
                            </div>
                            <div class="form-control gap-4">
                                <label for="isi_asr_sh" class="label-text font-semibold">Isi</label>
                                <textarea disabled name="isi" id="isi_asr_sh"
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="nama_asr_sh" class="label-text font-semibold">Penulis</label>
                                <input disabled type="text" name="nama" id="nama_asr_sh"
                                    class="input input-bordered disabled:bg-slate-100">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button"
                                        class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_aspirasi_sh.close()">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </dialog>
            <!-- End -->
        </div>
    </div>
    <script>
        function openModalUpdateBerita(id, data) {
            const judulIn = document.getElementById('judul_brt_up');
            judulIn.value = data.judul;
            const isiIn = document.getElementById('isi_brt_up');
            isiIn.value = data.isi;
            const namaIn = document.getElementById('nama_brt_up');
            namaIn.value = data.penulis;
            const isaccIn = document.getElementById('isacc_brt_up');
            isaccIn.value = data.isAccepted;
            const hiddenInput = document.getElementById('id_brt');
            hiddenInput.value = data.id;

            document.getElementById('modal_form_berita_up').showModal();
        }

        function openModalShowBerita(id, data) {
            const judulIn = document.getElementById('judul_brt_sh');
            judulIn.value = data.judul;
            const isiIn = document.getElementById('isi_brt_sh');
            isiIn.value = data.isi;
            const namaIn = document.getElementById('nama_brt_sh');
            namaIn.value = data.penulis;
            const hiddenInput = document.getElementById('id_brt_sh');
            hiddenInput.value = data.id;

            document.getElementById('modal_form_berita_sh').showModal();
        }

        function openModalShowPengumuman(id, data) {
            const judulIn = document.getElementById('judul_png_sh');
            judulIn.value = data.judul;
            const isiIn = document.getElementById('isi_png_sh');
            isiIn.value = data.isi;
            const namaIn = document.getElementById('nama_png_sh');
            namaIn.value = data.penulis;
            const hiddenInput = document.getElementById('id_png_sh');
            hiddenInput.value = data.id;

            document.getElementById('modal_form_pengumuman_sh').showModal();
        }

        function openModalUpdatePengumuman(id, data) {
            const judulIn = document.getElementById('judul_png_up');
            judulIn.value = data.judul;
            const isiIn = document.getElementById('isi_png_up');
            isiIn.value = data.isi;
            const namaIn = document.getElementById('nama_png_up');
            namaIn.value = data.penulis;
            const isaccIn = document.getElementById('isacc_png_up');
            isaccIn.value = data.isAccepted;
            const hiddenInput = document.getElementById('id_png');
            hiddenInput.value = data.id;

            document.getElementById('modal_form_pengumuman_up').showModal();
        }

        function openModalShowAspirasi(id, data) {
            data = JSON.parse(data);
            const judulIn = document.getElementById('judul_asr_sh');
            judulIn.value = data.judul;
            const isiIn = document.getElementById('isi_asr_sh');
            isiIn.value = data.isi;
            const namaIn = document.getElementById('nama_asr_sh');
            namaIn.value = data.penulis;
            const hiddenInput = document.getElementById('id_asr_sh');
            hiddenInput.value = data.id;

            document.getElementById('modal_form_aspirasi_sh').showModal();
        }

        function openModalDeleteBerita(id) {
            document.getElementById('mdbr_' + id).showModal();
        }

        function openModalDeletePengumuman(id) {
            document.getElementById('mdpg_' + id).showModal();
        }

        function openModalDeleteAspirasi(id) {
            document.getElementById('mdas_' + id).showModal();
        }

        function openModalPreviewImageBerita(id) {
            document.getElementById('preview_brt_' + id).showModal();
        }
    </script>
</body>

</html>
