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
        <div class="text-3xl font-bold">Pemerintahan</div>
        <div class="">Home / Pemerintahan</div>
    </div>

    <div class="w-screen pl-32 pr-24 mt-5 space-y-4 mb-10">
        <div class="w-1/2 flex items-center gap-2">
            <div class="font-medium">Pemerintahan</div>
            <div class="flex-grow border-b-2 border-gray-500"></div>
        </div>

        @if ($success = Session::get('success'))
            <div role="alert" class="alert alert-success bg-green-200 text-green-800">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 shrink-0 stroke-current"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $success }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div role="alert" class="alert alert-error bg-red-200 text-red-800">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 shrink-0 stroke-current"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        @endif

        <!-- Show Struktur Organisasi -->
        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Struktur Organisasi</div>
            <div class="py-2 text-gray-500">Berikut adalah penjelasan dari struktur organisasi yang ditampilkan</div>

            <!-- Form Show Struktur Organisasi -->
            <div class="form-control gap-6">
                <div class="form-control gap-4">
                    <label for="penjelasan_st" class="label-text font-semibold">Penjelasan</label>
                    <textarea disabled name="penjelasan" id="penjelasan_st"
                        class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100">{{ $strukturOrg->data->penjelasan_raw }}</textarea>
                </div>
                <div class="form-control gap-4">
                    <div tabindex="0" class="collapse collapse-arrow bg-slate-100 border border-gray-200 rounded-xl">
                        <div class="collapse-title text-sm font-semibold font-jakarta">Lihat foto</div>
                        <div class="collapse-content flex rounded-xl max-h-96">
                            <img onclick="preview_struktur_image.showModal()" src="{{ $strukturOrg->data->foto }}" alt="foto-struktur-desa" class="object-cover rounded-lg w-full">
                        </div>
                    </div>
                </div>
                <dialog id="preview_struktur_image" class="modal">
                    <div class="modal-box">
                        <img src="{{ $strukturOrg->data->foto }}" alt="foto-struktur-desa" class="object-cover rounded-lg">
                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>
            </div>
            <!-- End -->

            <div class="flex justify-end mt-4">
                <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center"
                    onclick="modal_form_st.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Edit
                </button>
            </div>

            <!-- Modal Form Update Struktur Organisasi -->
            <dialog id="modal_form_st" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Update Struktur Organisasi</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" action="{{ route('admin.pemerintahan.struktur.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="penjelasan" class="label-text font-semibold">Penjelasan</label>
                                <textarea name="penjelasan" id="penjelasan"
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100">{{ $strukturOrg->data->penjelasan_raw }}</textarea>
                                <p class="label-text text-gray-500">(penjelasan struktur organisasi desa)</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="foto" class="label-text font-semibold">Foto</label>
                                <input type="file" name="foto" id="foto"
                                    class="file-input file-input-bordered disabled:bg-slate-100">
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_st.close()">Tutup</button>
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
            <hr class="h-px my-8 bg-gray-300 border-0">
        </div>

        <!-- Show Perangkat Desa -->
        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Perangkat Desa</div>
            <div class="py-2 text-gray-500">Berikut adalah daftar informasi perangkat desa yang ditampilkan</div>

            <!-- Table Perangkat Desa -->
            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Daftar Perangkat Desa</caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Jabatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Kontak
                            </th>
                            <th scope="col" class="px-6 py-3">
                                File Foto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perangkatDesa->data->resource as $item)    
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $item->jabatan }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->nama }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->kontak }}
                                </td>
                                <td class="px-6 py-4">
                                    <img onclick="openModalPreviewImageJabatan('{{ $item->id }}')" src="{{ $item->foto }}" alt="perangkat-desa" class="w-12 h-12 object-cover rounded-xl">
                                    <dialog id="preview_jbt_{{ $item->id }}" class="modal">
                                        <div class="modal-box">
                                            <img src="{{ $item->foto }}" alt="foto-sejarah-desa" class="object-cover rounded-lg">
                                        </div>
                                        <form method="dialog" class="modal-backdrop">
                                            <button>close</button>
                                        </form>
                                    </dialog>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-6 justify-center items-center">
                                        <button onclick="openModalDeletePerangkatDesa('{{ $item->id }}')" class="font-medium">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 5.00033H4.66667M4.66667 5.00033H18M4.66667 5.00033V16.667C4.66667 17.109 4.84226 17.5329 5.15482 17.8455C5.46738 18.1581 5.89131 18.3337 6.33333 18.3337H14.6667C15.1087 18.3337 15.5326 18.1581 15.8452 17.8455C16.1577 17.5329 16.3333 17.109 16.3333 16.667V5.00033H4.66667ZM7.16667 5.00033V3.33366C7.16667 2.89163 7.34226 2.46771 7.65482 2.15515C7.96738 1.84259 8.39131 1.66699 8.83333 1.66699H12.1667C12.6087 1.66699 13.0326 1.84259 13.3452 2.15515C13.6577 2.46771 13.8333 2.89163 13.8333 3.33366V5.00033M8.83333 9.16699V14.167M12.1667 9.16699V14.167" stroke="#475467" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                        
                                        
                                        <button onclick="openModalUpdatePerangkatDesa('{{ $item->id }}', '{{ json_encode($item) }}')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.6665 2.49993C14.8854 2.28106 15.1452 2.10744 15.4312 1.98899C15.7171 1.87054 16.0236 1.80957 16.3332 1.80957C16.6427 1.80957 16.9492 1.87054 17.2352 1.98899C17.5211 2.10744 17.781 2.28106 17.9998 2.49993C18.2187 2.7188 18.3923 2.97863 18.5108 3.2646C18.6292 3.55057 18.6902 3.85706 18.6902 4.16659C18.6902 4.47612 18.6292 4.78262 18.5108 5.06859C18.3923 5.35455 18.2187 5.61439 17.9998 5.83326L6.74984 17.0833L2.1665 18.3333L3.4165 13.7499L14.6665 2.49993Z" stroke="#475467" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <dialog id="mdpd_{{ $item->id }}" class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Peringatan!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus?</p>
                                            <div class="modal-action">
                                                <form action="{{ route('admin.pemerintahan.perangkat-desa.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn bg-red-400 text-white">Iya</button>
                                                </form>
                                                <button onclick="document.getElementById('mdpd_' + '{{ $item->id }}').close()" class="btn bg-secondary text-white">Tidak</button>
                                            </div>
                                        </div>
                                    </dialog>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <dialog id="modal_form_pkd_up" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Update Perangkat Desa</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" enctype="multipart/form-data" id="form_up_pkd" action="{{ route('admin.pemerintahan.perangkat-desa.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="nama_pkd_up" class="label-text font-semibold">Nama</label>
                                <input type="text" name="nama" id="nama_pkd_up" class="input input-bordered" placeholder="(Tuliskan Nama)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                <input hidden type="text" name="id" id="id_pkd">
                            </div>
                            <div class="form-control gap-4">
                                <label for="jabatan_pkd_up" class="label-text font-semibold">Jabatan</label>
                                <select name="jabatan" id="jabatan_pkd_up" class="select select-bordered">
                                    <option disabled selected>Pilihan Jabatan</option>
                                    @foreach ($perangkatDesa->data->list as $item)
                                <option value="{{ ($item->id . '|' . $item->nama) }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="kontak_pkd_up" class="label-text font-semibold">Kontak</label>
                                <input type="text" name="kontak" id="kontak_pkd_up" class="input input-bordered" placeholder="000000000000">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="foto_pkd_up" class="label-text font-semibold">Foto</label>
                                <input type="file" name="foto" id="foto_pkd_up" class="file-input file-input-bordered">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> file .png atau .jpg</p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_pkd_up.close()">Tutup</button>
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

            <!-- Form Tambah Perangkat Desa -->
            <dialog id="modal_form_pkd" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Tambah Perangkat Desa</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" action="{{ route('admin.pemerintahan.perangkat-desa.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="nama_pkd" class="label-text font-semibold">Nama</label>
                                <input type="text" name="nama" id="nama_pkd" class="input input-bordered ">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="jabatan_pkd" class="label-text font-semibold">Jabatan</label>
                                <select name="jabatan" id="jabatan_pkd" class="select select-bordered">
                                    <option disabled selected>Pilihan Jabatan</option>
                                    @foreach ($perangkatDesa->data->list as $item)
                                        <option value="{{ ($item->id . '|' . $item->nama) }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="kontak_pkd" class="label-text font-semibold">Kontak</label>
                                <input type="text" name="kontak" id="kontak_pkd" class="input input-bordered" placeholder="000000000000">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="foto_pkd" class="label-text font-semibold">Foto</label>
                                <input type="file" name="foto" id="foto_pkd" class="file-input file-input-bordered">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> file .png atau .jpg</p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_pkd.close()">Tutup</button>
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
                <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center"
                    onclick="modal_form_pkd.showModal()">
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

        <!-- Show Lembaga Desa -->
        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Lembaga Desa</div>
            <form action="#cari-lembaga" method="get">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Pencarian" name="nama" id="cari-lembaga" value="{{ request()->input('nama') }}"
                        class="w-1/2 my-4 py-2 pl-10 pr-5 appearance-none focus:outline-none focus:ring-blue-500 rounded-lg border border-gray-300">
                </div>
            </form>
            <div class="py-2 text-gray-500">Berikut adalah daftar informasi lembaga desa yang ditampilkan</div>

            <!-- Table Lembaga Desa -->
            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Daftar Lembaga</caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Kontak
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paginatedItems as $item)    
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $item->nama }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->alamat }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->kontak }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-6 justify-center items-center">
                                        <button onclick="openModalDeleteLembagaDesa('{{ $item->id }}')" class="font-medium">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 5.00033H4.66667M4.66667 5.00033H18M4.66667 5.00033V16.667C4.66667 17.109 4.84226 17.5329 5.15482 17.8455C5.46738 18.1581 5.89131 18.3337 6.33333 18.3337H14.6667C15.1087 18.3337 15.5326 18.1581 15.8452 17.8455C16.1577 17.5329 16.3333 17.109 16.3333 16.667V5.00033H4.66667ZM7.16667 5.00033V3.33366C7.16667 2.89163 7.34226 2.46771 7.65482 2.15515C7.96738 1.84259 8.39131 1.66699 8.83333 1.66699H12.1667C12.6087 1.66699 13.0326 1.84259 13.3452 2.15515C13.6577 2.46771 13.8333 2.89163 13.8333 3.33366V5.00033M8.83333 9.16699V14.167M12.1667 9.16699V14.167" stroke="#475467" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                        
                                        
                                        <button onclick="openModalUpdateLembaga('{{ $item->id }}', '{{ json_encode($item) }}')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.6665 2.49993C14.8854 2.28106 15.1452 2.10744 15.4312 1.98899C15.7171 1.87054 16.0236 1.80957 16.3332 1.80957C16.6427 1.80957 16.9492 1.87054 17.2352 1.98899C17.5211 2.10744 17.781 2.28106 17.9998 2.49993C18.2187 2.7188 18.3923 2.97863 18.5108 3.2646C18.6292 3.55057 18.6902 3.85706 18.6902 4.16659C18.6902 4.47612 18.6292 4.78262 18.5108 5.06859C18.3923 5.35455 18.2187 5.61439 17.9998 5.83326L6.74984 17.0833L2.1665 18.3333L3.4165 13.7499L14.6665 2.49993Z" stroke="#475467" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <dialog id="mdld_{{ $item->id }}" class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Peringatan!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus?</p>
                                            <div class="modal-action">
                                                <form action="{{ route('admin.pemerintahan.lembaga.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn bg-red-400 text-white">Iya</button>
                                                </form>
                                                <button onclick="document.getElementById('mdld_' + '{{ $item->id }}').close()" class="btn bg-secondary text-white">Tidak</button>
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
    @if ($paginatedItems->hasPages())
        <div class="flex items-center justify-between w-full">
            @if ($paginatedItems->onFirstPage())
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
                <a href="{{ $paginatedItems->previousPageUrl() }}"
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
                @foreach ($paginatedItems->getUrlRange(1, $paginatedItems->lastPage()) as $page => $url)
                    @if ($page == $paginatedItems->currentPage())
                        <button
                            class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg bg-blue-100 text-center align-middle font-sans text-xs font-semibold uppercase text-darkText transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button">
                            <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                {{ $page }}
                            </span>
                        </button>
                    @else
                        <a href="{{ $url }}"
                            class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20"
                            type="button">
                            <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                {{ $page }}
                            </span>
                        </a>
                    @endif
                @endforeach
            </div>

            @if ($paginatedItems->hasMorePages())
                <a href="{{ $paginatedItems->nextPageUrl() }}"
                    class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20"
                    type="button">
                    Next
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true"
                        class="w-4 h-4">
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
                        stroke-width="2" stroke="currentColor" aria-hidden="true"
                        class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                    </svg>
                </button>
            @endif
        </div>
    @endif
</section>
</div>



            <dialog id="modal_form_lbd_up" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Update Lembaga Desa</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" enctype="multipart/form-data" id="form_up_lembaga" action="{{ route('admin.pemerintahan.lembaga.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="nama_lbd_up" class="label-text font-semibold">Nama</label>
                                <input type="text" name="nama" id="nama_lbd_up" class="input input-bordered" placeholder="(Tuliskan Nama)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                <input hidden type="text" name="id" id="id_lbd">
                            </div>
                            <div class="form-control gap-4">
                                <label for="alamat_lbd_up" class="label-text font-semibold">Alamat</label>
                                <input type="text" name="alamat" id="alamat_lbd_up" class="input input-bordered" placeholder="(Tuliskan Alamat)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="kontak_lbd_up" class="label-text font-semibold">Kontak</label>
                                <input type="text" name="kontak" id="kontak_lbd_up" class="input input-bordered" placeholder="000000000000">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_lbd_up.close()">Tutup</button>
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
                    onclick="modal_form_lbd.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Tambahkan
                </button>
            </div>

            <!-- Form Tambah Lembaga Desa -->
            <dialog id="modal_form_lbd" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Tambah Lembaga Desa</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" action="{{ route('admin.pemerintahan.lembaga.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="nama_lbd" class="label-text font-semibold">Nama</label>
                                <input type="text" name="nama" id="nama_lbd" class="input input-bordered" placeholder="(Tuliskan Nama)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="alamat_lbd" class="label-text font-semibold">Alamat</label>
                                <input type="text" name="alamat" id="alamat_lbd" class="input input-bordered" placeholder="(Tuliskan Alamat)">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="kontak_lbd" class="label-text font-semibold">Kontak</label>
                                <input type="text" name="kontak" id="kontak_lbd" class="input input-bordered" placeholder="000000000000">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_lbd.close()">Tutup</button>
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
        </div>
    </div>

    <script>
        function openModalUpdateLembaga(id, data) {
            data = JSON.parse(data);
            const namaIn = document.getElementById('nama_lbd_up');
            namaIn.value = data.nama;
            const alamatIn = document.getElementById('alamat_lbd_up');
            alamatIn.value = data.alamat;
            const kontakIn = document.getElementById('kontak_lbd_up');
            kontakIn.value = data.kontak;
            const hiddenInput = document.getElementById('id_lbd');
            hiddenInput.value = data.id;

            document.getElementById('modal_form_lbd_up').showModal();
        }

        function openModalUpdatePerangkatDesa(id, data) {
            data = JSON.parse(data);
            const namaIn = document.getElementById('nama_pkd_up');
            namaIn.value = data.nama;
            const jabatanIn = document.getElementById('jabatan_pkd_up');
            jabatanIn.value = data.jabatan_id + "|" + data.jabatan;
            const kontakIn = document.getElementById('kontak_pkd_up');
            kontakIn.value = data.kontak;
            const hiddenInput = document.getElementById('id_pkd');
            hiddenInput.value = data.id;

            document.getElementById('modal_form_pkd_up').showModal();
        }

        function openModalDeletePerangkatDesa(id) {
            document.getElementById('mdpd_' + id).showModal();
        }

        function openModalDeleteLembagaDesa(id) {
            document.getElementById('mdld_' + id).showModal();
        }

        function openModalPreviewImageJabatan(id) {
            document.getElementById('preview_jbt_'+id).showModal();
        }
    </script>

</body>

</html>
