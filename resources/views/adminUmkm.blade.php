<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env("APP_NAME") . " | Admin Umkm Desa" }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body class="mytheme font-jakarta antialiased dark:text-white/50">
    <x-admin-navbar />

    <div class="w-screen pl-32 py-3 h-20 bg-secondary text-lightText">
        <div class="text-3xl font-bold">UMKM</div>
        <div class="">Home / UMKM</div>
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
            <div class="text-3xl font-semibold text-darkText">Video Profil UMKM</div>
            <div class="py-2 text-gray-500">Berikut adalah tautan dari Video Profil UMKM Desa Papungan</div>

            <!-- Form Show Profil Desa -->
            <div class="form-control gap-6">
                <div class="form-control gap-4">
                    <label for="penjelasan_lk" class="label-text font-semibold">Link Video Youtube</label>
                    <input disabled name="penjelasan" id="penjelasan_lk"
                        class="input input-bordered w-full disabled:bg-slate-100" />
                </div>
                <!-- End -->

                <div class="flex justify-end mt-4">
                    <button
                        class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center"
                        onclick="modal_form_lv.showModal()">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="mr-2">
                            <path
                                d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                                fill="white" />
                        </svg>
                        Edit
                    </button>
                </div>

                <!-- Modal Form Update Link Video -->
                <dialog id="modal_form_lv" class="modal">
                    <div class="modal-box w-11/12 max-w-5xl">
                        <h3 class="text-lg font-bold">Formulir Update Link Video</h3>
                        <hr class="h-px my-8 bg-gray-300 border-0">
                        <form method="POST" action="{{ route('admin.umkm-desa.video.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-control gap-6">
                                <div class="form-control gap-4">
                                    <label for="penjelasan_lk" class="label-text font-semibold">Link Video
                                        Youtube</label>
                                    <textarea name="penjelasan" id="penjelasan_lk"
                                        class="input input-bordered w-full disabled:bg-slate-100">{{ $dataVideo->data->penjelasan }}</textarea>
                                </div>
                                <div class="relative w-full">
                                    <div class="flex gap-4 justify-end">
                                        <button type="button"
                                            class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                            onclick="modal_form_lv.close()">Tutup</button>
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

            <div class="w-full" id="cari-umkm">
                <div class="text-3xl font-semibold text-darkText">Data UMKM</div>

                <form action="#cari-umkm" method="get">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" placeholder="Pencarian" name="qUmkm"
                            value="{{ request()->input('qUmkm') }}"
                            class="w-1/2 my-4 py-2 pl-10 pr-5 appearance-none focus:outline-none focus:ring-blue-500 rounded-lg border border-gray-300">
                    </div>
                </form>

                <div class="py-2 text-gray-500" id="daftar-umkm">Berikut adalah data UMKM yang ditampilkan
                </div>
                <!-- Table UMKM -->
                <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <caption
                            class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Daftar UMKM
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama UMKM</th>
                                <th scope="col" class="px-6 py-3">Alamat</th>
                                <th scope="col" class="px-6 py-3">Ijin Label</th>
                                <th scope="col" class="px-6 py-3">Detail UMKM</th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1 + ($paginatedItems->currentPage() - 1) * $paginatedItems->perPage();
                            @endphp
                            @foreach ($paginatedItems as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $i++ }}</td>
                                <td class="px-6 py-4">{{ $item->nama }}</td>
                                <td class="px-6 py-4">{{ $item->alamat }}</td>
                                <td class="px-6 py-4">
                                    @if ($item->no_nib != '-')
                                    <div class="badge bg-blue-100 text-blue-400 font-semibold border-0">NIB
                                    </div>
                                    @endif
                                    @if ($item->no_bpom != '-')
                                    <div class="badge bg-pink-100 text-pink-400 font-semibold border-0">BPOM
                                    </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <button
                                        onclick="openModalShowUmkmDesa('{{ $item->id }}', '{{ json_encode($item) }}')"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tekan
                                        Disini</button>
                                </td>
                                <td class="px-6 py-4">

                                    <div class="flex gap-6 justify-center items-center">
                                        <button
                                            onclick="openModalTambahFotoUmkm('{{ $item->id }}', '{{ json_encode($item) }}')"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tambah
                                            Foto</button>

                                        <button onclick="openModalDeleteUmkmDesa('{{ $item->id }}')"
                                            class="font-medium">
                                            <svg width="21" height="20" viewBox="0 0 21 20"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3 5.00033H4.66667M4.66667 5.00033H18M4.66667 5.00033V16.667C4.66667 17.109 4.84226 17.5329 5.15482 17.8455C5.46738 18.1581 5.89131 18.3337 6.33333 18.3337H14.6667C15.1087 18.3337 15.5326 18.1581 15.8452 17.8455C16.1577 17.5329 16.3333 17.109 16.3333 16.667V5.00033H4.66667ZM7.16667 5.00033V3.33366C7.16667 2.89163 7.34226 2.46771 7.65482 2.15515C7.96738 1.84259 8.39131 1.66699 8.83333 1.66699H12.1667C12.6087 1.66699 13.0326 1.84259 13.3452 2.15515C13.6577 2.46771 13.8333 2.89163 13.8333 3.33366V5.00033M8.83333 9.16699V14.167M12.1667 9.16699V14.167"
                                                    stroke="#475467" stroke-width="1.66667"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>

                                        <button
                                            onclick="openModalUpdateUmkmDesa('{{ $item->id }}', '{{ json_encode($item) }}')"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <svg width="21" height="20" viewBox="0 0 21 20"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6665 2.49993C14.8854 2.28106 15.1452 2.10744 15.4312 1.98899C15.7171 1.87054 16.0236 1.80957 16.3332 1.80957C16.6427 1.80957 16.9492 1.87054 17.2352 1.98899C17.5211 2.10744 17.781 2.28106 17.9998 2.49993C18.2187 2.7188 18.3923 2.97863 18.5108 3.2646C18.6292 3.55057 18.6902 3.85706 18.6902 4.16659C18.6902 4.47612 18.6292 4.78262 18.5108 5.06859C18.3923 5.35455 18.2187 5.61439 17.9998 5.83326L6.74984 17.0833L2.1665 18.3333L3.4165 13.7499L14.6665 2.49993Z"
                                                    stroke="#475467" stroke-width="1.66667"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>

                                    </div>

                                    <dialog id="mdumkm_{{ $item->id }}" class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Peringatan!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus?</p>
                                            <div class="modal-action">
                                                <form action="{{ route('admin.umkm-desa.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn bg-red-400 text-white">Iya</button>
                                                </form>
                                                <button
                                                    onclick="document.getElementById('mdumkm_' + '{{ $item->id }}').close()"
                                                    class="btn bg-secondary text-white">Tidak</button>
                                            </div>
                                        </div>
                                    </dialog>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <dialog id="modal_form_upfoto" class="modal">
                        <div class="modal-box w-11/12 max-w-5xl">
                            <h3 class="text-lg font-bold">Formulir Tambah Foto Umkm</h3>
                            <hr class="h-px my-8 bg-gray-300 border-0">
                            <form method="POST" action="{{ route('admin.umkm-desa.foto.create') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-control gap-6">
                                    <div class="form-control gap-4">
                                        <label for="umkm_upfoto" class="label-text font-semibold">Foto</label>
                                        <input type="file" name="foto" id="umkm_upfoto"
                                            class="file-input file-input-bordered w-full disabled:bg-slate-200" />
                                        <input type="text" name="id" id="id_umkm_upfoto"
                                            class="input input-bordered " hidden>
                                    </div>
                                    <div class="relative w-full">
                                        <div class="flex gap-4 justify-end">
                                            <button type="button"
                                                class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                                onclick="modal_form_upfoto.close()">Tutup</button>
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

                
                    <!-- Pagination Section -->
                    <section class="px-4 py-6 bg-white border-t">
                        @if ($paginatedItems->hasPages())
                        <div class="flex flex-wrap items-center justify-center md:justify-between w-full gap-4">
                            {{-- Previous --}}
                            @if ($paginatedItems->onFirstPage())
                            <button disabled
                                class="flex border border-gray-300 items-center gap-2 px-4 py-2 text-sm font-medium text-gray-500 uppercase rounded-lg disabled:opacity-50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                </svg>
                                Previous
                            </button>
                            @else
                            <a href="{{ $paginatedItems->previousPageUrl() }}#daftar-umkm"
                                class="flex border border-gray-300 items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 uppercase rounded-lg hover:bg-gray-100">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                </svg>
                                Previous
                            </a>
                            @endif

                            {{-- Page Numbers --}}
                            <div class="flex flex-wrap justify-center gap-2">
                                @foreach ($paginatedItems->getUrlRange(1, $paginatedItems->lastPage()) as $page => $url)
                                @if ($page == $paginatedItems->currentPage())
                                <button
                                    class="relative h-10 w-10 text-sm font-semibold bg-blue-500 text-white rounded-lg">
                                    {{ $page }}
                                </button>
                                @else
                                <a href="{{ $url }}#daftar-umkm"
                                    class="relative h-10 w-10 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-200 flex items-center justify-center">
                                    {{ $page }}
                                </a>
                                @endif
                                @endforeach
                            </div>

                            {{-- Next --}}
                            @if ($paginatedItems->hasMorePages())
                            <a href="{{ $paginatedItems->nextPageUrl() }}#daftar-umkm"
                                class="flex border border-gray-300 items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 uppercase rounded-lg hover:bg-gray-100">
                                Next
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                                </svg>
                            </a>
                            @else
                            <button disabled
                                class="flex border border-gray-300 items-center gap-2 px-4 py-2 text-sm font-medium text-gray-500 uppercase rounded-lg disabled:opacity-50">
                                Next
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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

                <div class="flex justify-end mt-4">
                    <button
                        class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center"
                        onclick="modal_form_umkm.showModal()">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="mr-2">
                            <path
                                d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                                fill="white" />
                        </svg>
                        Tambahkan
                    </button>
                </div>

                <!-- Form Show UMKM Desa -->
                <dialog id="modal_form_umkm_show" class="modal">
                    <div class="modal-box w-11/12 max-w-5xl">
                        <h3 class="text-lg font-bold">Detail UMKM Desa</h3>
                        <hr class="h-px my-8 bg-gray-300 border-0">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-control gap-6">
                                <div class="form-control gap-4">
                                    <label for="nama_umkm_show" class="label-text font-semibold">Nama UMKM</label>
                                    <input type="text" name="nama" id="nama_umkm_show"
                                        class="input input-bordered disabled:bg-slate-100" disabled>
                                    <input type="text" name="id" id="id_umkm"
                                        class="input input-bordered " hidden>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="alamat_umkm_show" class="label-text font-semibold">Alamat UMKM</label>
                                    <input type="text" name="alamat" id="alamat_umkm_show"
                                        class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="jam_buka_umkm_show" class="label-text font-semibold">Jam Buka</label>
                                    <input type="text" name="jam_buka" id="jam_buka_umkm_show"
                                        class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="kontak_umkm_show" class="label-text font-semibold">Kontak</label>
                                    <input type="text" name="kontak" id="kontak_umkm_show"
                                        class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="bpom_umkm_show" class="label-text font-semibold">Nomor BPOM</label>
                                    <input type="text" name="no_bpom" id="bpom_umkm_show"
                                        class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500">opsional</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="nib_umkm_show" class="label-text font-semibold">Nomor NIB</label>
                                    <input type="text" name="no_nib" id="nib_umkm_show"
                                        class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500">opsional</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="url_map_umkm_show" class="label-text font-semibold">URL Map</label>
                                    <input type="text" name="url_map" id="url_map_umkm_show"
                                        class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500">opsional</p>
                                </div>
                                <div class="flex gap-4 w-full">
                                    <div class="form-control gap-4 w-full">
                                        <label for="lat_umkm_show" class="label-text font-semibold">Latitude</label>
                                        <input type="text" name="lat" id="lat_umkm_show"
                                            class="input input-bordered disabled:bg-slate-100" disabled>
                                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                    </div>
                                    <div class="form-control gap-4 w-full">
                                        <label for="long_umkm_show" class="label-text font-semibold">Longitude</label>
                                        <input type="text" name="long" id="long_umkm_show"
                                            class="input input-bordered disabled:bg-slate-100" disabled>
                                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                    </div>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="desc_umkm_show" class="label-text font-semibold">Deskripsi</label>
                                    <textarea name="deskripsi" id="desc_umkm_show" disabled
                                        class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="relative w-full">
                                    <div class="flex gap-4 justify-end">
                                        <button type="button"
                                            class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                            onclick="modal_form_umkm_show.close()">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </dialog>
                <!-- End -->

                <!-- Form Update UMKM Desa -->
                <dialog id="modal_form_umkm_up" class="modal">
                    <div class="modal-box w-11/12 max-w-5xl">
                        <h3 class="text-lg font-bold">Formulir Update UMKM Desa</h3>
                        <hr class="h-px my-8 bg-gray-300 border-0">
                        <form method="POST" action="{{ route('admin.umkm-desa.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-control gap-6">
                                <div class="form-control gap-4">
                                    <label for="nama_umkm_up" class="label-text font-semibold">Nama UMKM</label>
                                    <input type="text" name="nama" id="nama_umkm_up"
                                        class="input input-bordered ">
                                    <input type="text" name="id" id="id_umkm_up"
                                        class="input input-bordered " hidden>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="alamat_umkm_up" class="label-text font-semibold">Alamat UMKM</label>
                                    <input type="text" name="alamat" id="alamat_umkm_up"
                                        class="input input-bordered ">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="jam_buka_umkm_up" class="label-text font-semibold">Jam Buka</label>
                                    <input type="text" name="jam_buka" id="jam_buka_umkm_up"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="kontak_umkm_up" class="label-text font-semibold">Kontak</label>
                                    <input type="text" name="kontak" id="kontak_umkm_up"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="bpom_umkm_up" class="label-text font-semibold">Nomor BPOM</label>
                                    <input type="text" name="no_bpom" id="bpom_umkm_up"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500">opsional</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="nib_umkm_up" class="label-text font-semibold">Nomor NIB</label>
                                    <input type="text" name="no_nib" id="nib_umkm_up"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500">opsional</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="url_map_umkm_up" class="label-text font-semibold">URL Map</label>
                                    <input type="text" name="url_map" id="url_map_umkm_up"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500">opsional</p>
                                </div>
                                <div class="flex gap-4 w-full">
                                    <div class="form-control gap-4 w-full">
                                        <label for="lat_umkm_up" class="label-text font-semibold">Latitude</label>
                                        <input type="text" name="lat" id="lat_umkm_up"
                                            class="input input-bordered">
                                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                    </div>
                                    <div class="form-control gap-4 w-full">
                                        <label for="long_umkm_up" class="label-text font-semibold">Longitude</label>
                                        <input type="text" name="long" id="long_umkm_up"
                                            class="input input-bordered">
                                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                    </div>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="desc_umkm_up" class="label-text font-semibold">Deskripsi</label>
                                    <textarea name="deskripsi" id="desc_umkm_up" class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="relative w-full">
                                    <div class="flex gap-4 justify-end">
                                        <button type="button"
                                            class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                            onclick="modal_form_umkm_up.close()">Tutup</button>
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

                <!-- Form Tambah UMKM Desa -->
                <dialog id="modal_form_umkm" class="modal">
                    <div class="modal-box w-11/12 max-w-5xl">
                        <h3 class="text-lg font-bold">Formulir Tambah UMKM Desa</h3>
                        <hr class="h-px my-8 bg-gray-300 border-0">
                        <form method="POST" action="{{ route('admin.umkm-desa.create') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-control gap-6">
                                <div class="form-control gap-4">
                                    <label for="nama_umkm" class="label-text font-semibold">Nama UMKM</label>
                                    <input type="text" name="nama" id="nama_umkm" value="{{ old('nama') }}"
                                        class="input input-bordered ">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="alamat_umkm" class="label-text font-semibold">Alamat UMKM</label>
                                    <input type="text" name="alamat" id="alamat_umkm" value="{{ old('alamat') }}"
                                        class="input input-bordered ">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="jam_buka_umkm" class="label-text font-semibold">Jam Buka</label>
                                    <input type="text" name="jam_buka" id="jam_buka_umkm" value="{{ old('jam_buka') }}"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="kontak_umkm" class="label-text font-semibold">Kontak</label>
                                    <input type="text" name="kontak" id="kontak_umkm" value="{{ old('kontak') }}"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="bpom_umkm" class="label-text font-semibold">Nomor BPOM</label>
                                    <input type="text" name="no_bpom" id="bpom_umkm" value="{{ old('no_bpom') }}"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500">opsional</p>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="nib_umkm" class="label-text font-semibold">Nomor NIB</label>
                                    <input type="text" name="no_nib" id="nib_umkm" value="{{ old('no_nib') }}"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500">opsional</p>
                                </div>
                                <input type="hidden" name="no_pirt" value="-">
                                <input type="hidden" name="no_halal" value="-">
                                <div class="form-control gap-4">
                                    <label for="url_map_umkm" class="label-text font-semibold">URL Map</label>
                                    <input type="text" name="url_map" id="url_map_umkm" value="{{ old('url_map') }}"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500">opsional</p>
                                </div>
                                <div class="flex gap-4 w-full">
                                    <div class="form-control gap-4 w-full">
                                        <label for="lat_umkm" class="label-text font-semibold">Latitude</label>
                                        <input type="text" name="lat" id="lat_umkm" value="{{ old('lat') }}"
                                            class="input input-bordered">
                                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                    </div>
                                    <div class="form-control gap-4 w-full">
                                        <label for="long_umkm" class="label-text font-semibold">Longitude</label>
                                        <input type="text" name="long" id="long_umkm" value="{{ old('long') }}"
                                            class="input input-bordered">
                                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                    </div>
                                </div>
                                <div class="form-control gap-4">
                                    <label for="desc_umkm" class="label-text font-semibold">Deskripsi</label>
                                    <textarea name="deskripsi" id="desc_umkm" value="{{ old('deskripsi') }}" class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="relative w-full">
                                    <div class="flex gap-4 justify-end">
                                        <button type="button"
                                            class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                            onclick="modal_form_umkm.close()">Tutup</button>
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

            <div class="w-full h-screen">
                <div class="text-3xl font-semibold text-darkText">Peta UMKM</div>
                <div class="py-2 text-gray-500">Berikut adalah peta umkm terbaru</div>
                <iframe src="{{ url('/peta-umkm') }}" frameborder="0"
                    class="w-full h-full p-4 rounded-xl border border-gray-300 mt-6"></iframe>
            </div>
        </div>

        <script>
            function openModalUpdateUmkmDesa(id, data) {
                data = JSON.parse(data);
                const namaIn = document.getElementById('nama_umkm_up');
                namaIn.value = data.nama;
                const alamatIn = document.getElementById('alamat_umkm_up');
                alamatIn.value = data.alamat;
                const JamBukaIn = document.getElementById('jam_buka_umkm_up');
                JamBukaIn.value = data.jam_buka;
                const kontakIn = document.getElementById('kontak_umkm_up');
                kontakIn.value = data.kontak;
                const bpomIn = document.getElementById('bpom_umkm_up');
                bpomIn.value = data.no_bpom;
                const nibIn = document.getElementById('nib_umkm_up');
                nibIn.value = data.no_nib;
                const urlMapIn = document.getElementById('url_map_umkm_up');
                urlMapIn.value = data.url_map;
                const latIn = document.getElementById('lat_umkm_up');
                latIn.value = data.lat;
                const longIn = document.getElementById('long_umkm_up');
                longIn.value = data.long;
                const descIn = document.getElementById('desc_umkm_up');
                descIn.value = data.deskripsi;
                const hiddenInput = document.getElementById('id_umkm_up');
                hiddenInput.value = data.id;

                document.getElementById('modal_form_umkm_up').showModal();
            }

            function openModalShowUmkmDesa(id, data) {
                data = JSON.parse(data);
                const namaIn = document.getElementById('nama_umkm_show');
                namaIn.value = data.nama;
                const alamatIn = document.getElementById('alamat_umkm_show');
                alamatIn.value = data.alamat;
                const JamBukaIn = document.getElementById('jam_buka_umkm_show');
                JamBukaIn.value = data.jam_buka;
                const kontakIn = document.getElementById('kontak_umkm_show');
                kontakIn.value = data.kontak;
                const bpomIn = document.getElementById('bpom_umkm_show');
                bpomIn.value = data.no_bpom;
                const nibIn = document.getElementById('nib_umkm_show');
                nibIn.value = data.no_nib;
                const urlMapIn = document.getElementById('url_map_umkm_show');
                urlMapIn.value = data.url_map;
                const latIn = document.getElementById('lat_umkm_show');
                latIn.value = data.lat;
                const longIn = document.getElementById('long_umkm_show');
                longIn.value = data.long;
                const descIn = document.getElementById('desc_umkm_show');
                descIn.value = data.deskripsi;
                const hiddenInput = document.getElementById('id_umkm');
                hiddenInput.value = data.id;

                document.getElementById('modal_form_umkm_show').showModal();
            }

            function openModalDeleteUmkmDesa(id) {
                document.getElementById('mdumkm_' + id).showModal();
            }

            function openModalTambahFotoUmkm(id, data) {
                data = JSON.parse(data);
                const hiddenInput = document.getElementById('id_umkm_upfoto');
                hiddenInput.value = data.id;

                document.getElementById('modal_form_upfoto').showModal();
            }
        </script>
</body>

</html>