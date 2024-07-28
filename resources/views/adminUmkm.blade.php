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
            <div class="text-3xl font-semibold text-darkText">Data UMKM</div>

            <form action="" method="get">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Pencarian" name="qUmkm" id="cari-umkm"
                        value="{{ request()->input('qUmkm') }}"
                        class="w-1/2 my-4 py-2 pl-10 pr-5 appearance-none focus:outline-none focus:ring-blue-500 rounded-lg border border-gray-300">
                </div>
            </form>

            <div class="py-2 text-gray-500">Berikut adalah penjelasan dari struktur organisasi yang ditampilkan</div>
            <!-- Table UMKM -->
            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Daftar UMKM
                    </caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama UMKM</th>
                            <th scope="col" class="px-6 py-3">Jenis Produk</th>
                            <th scope="col" class="px-6 py-3">Alamat</th>
                            <th scope="col" class="px-6 py-3">Ijin Label</th>
                            <th scope="col" class="px-6 py-3">Detail UMKM</th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paginatedItems as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $item->nama }}</td>
                                <td class="px-6 py-4">
                                    @foreach ($item->jenis as $jenis)
                                        <span>{{ $jenis->jenis }}, </span>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">{{ $item->alamat }}</td>
                                <td class="px-6 py-4">
                                    @if ($item->no_pirt != '-')
                                        <div class="badge bg-indigo-100 text-indigo-400 font-semibold border-0">P-IRT</div>
                                    @endif
                                    @if ($item->no_nib != '-')
                                        <div class="badge bg-blue-100 text-blue-400 font-semibold border-0">NIB</div>
                                    @endif
                                    @if ($item->no_bpom != '-')
                                        <div class="badge bg-pink-100 text-pink-400 font-semibold border-0">BPOM</div>
                                    @endif
                                    @if ($item->no_halal != '-')
                                        <div class="badge bg-green-100 text-green-400 font-semibold border-0">HALAL</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <button onclick="openModalShowUmkmDesa('{{ $item->id }}', '{{ json_encode($item) }}')"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tekan Disini</button>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-6 justify-center items-center">
                                        <button onclick="openModalDeleteUmkmDesa('{{ $item->id }}')" class="font-medium">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 5.00033H4.66667M4.66667 5.00033H18M4.66667 5.00033V16.667C4.66667 17.109 4.84226 17.5329 5.15482 17.8455C5.46738 18.1581 5.89131 18.3337 6.33333 18.3337H14.6667C15.1087 18.3337 15.5326 18.1581 15.8452 17.8455C16.1577 17.5329 16.3333 17.109 16.3333 16.667V5.00033H4.66667ZM7.16667 5.00033V3.33366C7.16667 2.89163 7.34226 2.46771 7.65482 2.15515C7.96738 1.84259 8.39131 1.66699 8.83333 1.66699H12.1667C12.6087 1.66699 13.0326 1.84259 13.3452 2.15515C13.6577 2.46771 13.8333 2.89163 13.8333 3.33366V5.00033M8.83333 9.16699V14.167M12.1667 9.16699V14.167" stroke="#475467" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                        
                                        
                                        <button onclick="openModalUpdateUmkmDesa('{{ $item->id }}', '{{ json_encode($item) }}')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.6665 2.49993C14.8854 2.28106 15.1452 2.10744 15.4312 1.98899C15.7171 1.87054 16.0236 1.80957 16.3332 1.80957C16.6427 1.80957 16.9492 1.87054 17.2352 1.98899C17.5211 2.10744 17.781 2.28106 17.9998 2.49993C18.2187 2.7188 18.3923 2.97863 18.5108 3.2646C18.6292 3.55057 18.6902 3.85706 18.6902 4.16659C18.6902 4.47612 18.6292 4.78262 18.5108 5.06859C18.3923 5.35455 18.2187 5.61439 17.9998 5.83326L6.74984 17.0833L2.1665 18.3333L3.4165 13.7499L14.6665 2.49993Z" stroke="#475467" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <dialog id="mdumkm_{{ $item->id }}" class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Peringatan!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus?</p>
                                            <div class="modal-action">
                                                <form action="{{ route('admin.umkm-desa.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn bg-red-400 text-white">Iya</button>
                                                </form>
                                                <button onclick="document.getElementById('mdumkm_' + '{{ $item->id }}').close()" class="btn bg-secondary text-white">Tidak</button>
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
                                <input type="text" name="id" id="id_umkm" class="input input-bordered "
                                    hidden>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="alamat_umkm_show" class="label-text font-semibold">Alamat UMKM</label>
                                <input type="text" name="alamat" id="alamat_umkm_show"
                                    class="input input-bordered disabled:bg-slate-100" disabled>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="flex gap-4 w-full">
                                <div class="form-control gap-4 w-full">
                                    <label for="jenis_umkm_show" class="label-text font-semibold">Jenis UMKM</label>
                                    <input type="text" name="jenis" id="jenis_umkm_show"
                                        class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                                        diisi</p>
                                </div>
                                <div class="form-control gap-4 w-full">
                                    <label for="jam_buka_umkm_show" class="label-text font-semibold">Jam Buka</label>
                                    <input type="text" name="jam_buka" id="jam_buka_umkm_show"
                                        class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                                        diisi</p>
                                </div>
                            </div>
                            <div class="form-control gap-4">
                                <label for="kontak_umkm_show" class="label-text font-semibold">Kontak</label>
                                <input type="text" name="kontak" id="kontak_umkm_show"
                                    class="input input-bordered disabled:bg-slate-100" disabled>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="bpom_umkm_show" class="label-text font-semibold">Nomor BPOM</label>
                                <input type="text" name="no_bpom" id="bpom_umkm_show"
                                    class="input input-bordered disabled:bg-slate-100" disabled>
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="halal_umkm_show" class="label-text font-semibold">Nomor Halal</label>
                                <input type="text" name="no_halal" id="halal_umkm_show"
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
                                <label for="pirt_umkm_show" class="label-text font-semibold">Nomor P-IRT</label>
                                <input type="text" name="no_pirt" id="pirt_umkm_show"
                                    class="input input-bordered disabled:bg-slate-100" disabled>
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="flex gap-4 w-full">
                                <div class="form-control gap-4 w-full">
                                    <label for="lat_umkm_show" class="label-text font-semibold">Latitude</label>
                                    <input type="text" name="lat" id="lat_umkm_show"
                                        class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                                        diisi</p>
                                </div>
                                <div class="form-control gap-4 w-full">
                                    <label for="long_umkm_show" class="label-text font-semibold">Longtitude</label>
                                    <input type="text" name="long" id="long_umkm_show"
                                        class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                                        diisi</p>
                                </div>
                            </div>
                            <div class="form-control gap-4">
                                <label for="desc_umkm_show" class="label-text font-semibold">Deskripsi</label>
                                <textarea name="deskripsi" id="desc_umkm_show" disabled
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
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
                                <input type="text" name="id" id="id_umkm_up" class="input input-bordered "
                                    hidden>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="alamat_umkm_up" class="label-text font-semibold">Alamat UMKM</label>
                                <input type="text" name="alamat" id="alamat_umkm_up"
                                    class="input input-bordered ">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="flex gap-4 w-full">
                                <div class="form-control gap-4 w-full">
                                    <label for="jenis_umkm_up" class="label-text font-semibold">Jenis UMKM</label>
                                    <select multiple="" name="jenis[]" id="jenis_umkm_up"
                                        data-hs-select='{
                                        "placeholder": "Pilih jenis umkm...",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-gray-100 border border-gray-300 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-gray-100 border border-gray-300 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                        }'
                                        class="">
                                        <option value="">Choose</option>
                                        @foreach ($umkm->data->list as $item)
                                            <option value="{{ $item->jenis }}">{{ $item->jenis }}</option>
                                        @endforeach
                                    </select>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                                        diisi</p>
                                </div>
                                <div class="form-control gap-4 w-full">
                                    <label for="jam_buka_umkm_up" class="label-text font-semibold">Jam Buka</label>
                                    <input type="text" name="jam_buka" id="jam_buka_umkm_up"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                                        diisi</p>
                                </div>
                            </div>
                            <div class="form-control gap-4">
                                <label for="kontak_umkm_up" class="label-text font-semibold">Kontak</label>
                                <input type="text" name="kontak" id="kontak_umkm_up"
                                    class="input input-bordered">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="bpom_umkm_up" class="label-text font-semibold">Nomor BPOM</label>
                                <input type="text" name="no_bpom" id="bpom_umkm_up" class="input input-bordered">
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="halal_umkm_up" class="label-text font-semibold">Nomor Halal</label>
                                <input type="text" name="no_halal" id="halal_umkm_up"
                                    class="input input-bordered">
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="nib_umkm_up" class="label-text font-semibold">Nomor NIB</label>
                                <input type="text" name="no_nib" id="nib_umkm_up" class="input input-bordered">
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="pirt_umkm_up" class="label-text font-semibold">Nomor P-IRT</label>
                                <input type="text" name="no_pirt" id="pirt_umkm_up" class="input input-bordered">
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="flex gap-4 w-full">
                                <div class="form-control gap-4 w-full">
                                    <label for="lat_umkm_up" class="label-text font-semibold">Latitude</label>
                                    <input type="text" name="lat" id="lat_umkm_up"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                                        diisi</p>
                                </div>
                                <div class="form-control gap-4 w-full">
                                    <label for="long_umkm_up" class="label-text font-semibold">Longtitude</label>
                                    <input type="text" name="long" id="long_umkm_up"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                                        diisi</p>
                                </div>
                            </div>
                            <div class="form-control gap-4">
                                <label for="desc_umkm_up" class="label-text font-semibold">Deskripsi</label>
                                <textarea name="deskripsi" id="desc_umkm_up" class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
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
                                <input type="text" name="nama" id="nama_umkm" class="input input-bordered ">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="alamat_umkm" class="label-text font-semibold">Alamat UMKM</label>
                                <input type="text" name="alamat" id="alamat_umkm" class="input input-bordered ">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="flex gap-4 w-full">
                                <div class="form-control gap-4 w-full">
                                    <label for="jenis_umkm" class="label-text font-semibold">Jenis UMKM</label>
                                    <select multiple="" name="jenis[]"
                                        data-hs-select='{
                                        "placeholder": "Pilih jenis umkm...",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-gray-100 border border-gray-300 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-gray-100 border border-gray-300 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                        }'
                                        class="">
                                        <option value="">Choose</option>
                                        @foreach ($umkm->data->list as $item)
                                            <option value="{{ $item->jenis }}">{{ $item->jenis }}</option>
                                        @endforeach
                                    </select>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                                        diisi</p>
                                </div>
                                <div class="form-control gap-4 w-full">
                                    <label for="jam_buka_umkm" class="label-text font-semibold">Jam Buka</label>
                                    <input type="text" name="jam_buka" id="jam_buka_umkm"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                                        diisi</p>
                                </div>
                            </div>
                            <div class="form-control gap-4">
                                <label for="kontak_umkm" class="label-text font-semibold">Kontak</label>
                                <input type="text" name="kontak" id="kontak_umkm" class="input input-bordered">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="bpom_umkm" class="label-text font-semibold">Nomor BPOM</label>
                                <input type="text" name="no_bpom" id="bpom_umkm" class="input input-bordered">
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="halal_umkm" class="label-text font-semibold">Nomor Halal</label>
                                <input type="text" name="no_halal" id="halal_umkm" class="input input-bordered">
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="nib_umkm" class="label-text font-semibold">Nomor NIB</label>
                                <input type="text" name="no_nib" id="nib_umkm" class="input input-bordered">
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="pirt_umkm" class="label-text font-semibold">Nomor P-IRT</label>
                                <input type="text" name="no_pirt" id="pirt_umkm" class="input input-bordered">
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="flex gap-4 w-full">
                                <div class="form-control gap-4 w-full">
                                    <label for="lat_umkm" class="label-text font-semibold">Latitude</label>
                                    <input type="text" name="lat" id="lat_umkm"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                                        diisi</p>
                                </div>
                                <div class="form-control gap-4 w-full">
                                    <label for="long_umkm" class="label-text font-semibold">Longtitude</label>
                                    <input type="text" name="long" id="long_umkm"
                                        class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                                        diisi</p>
                                </div>
                            </div>
                            <div class="form-control gap-4">
                                <label for="desc_umkm" class="label-text font-semibold">Deskripsi</label>
                                <textarea name="deskripsi" id="desc_umkm" class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi
                                </p>
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
            <iframe src="{{ route('peta-wilayah') }}" frameborder="0"
                class="w-full h-full p-4 rounded-xl border border-gray-300 mt-6"></iframe>
        </div>
    </div>

    <script>
        function openModalUpdateUmkmDesa(id, data) {
            data = JSON.parse(data);
            const selectedValues = data.jenis.map(item => item.jenis);
            const namaIn = document.getElementById('nama_umkm_up');
            namaIn.value = data.nama;
            const alamatIn = document.getElementById('alamat_umkm_up');
            alamatIn.value = data.alamat;

            const jenisIn = document.getElementById('jenis_umkm_up');
            Array.from(jenisIn.options).forEach(option => {
                if (selectedValues.includes(option.value)) {
                    option.selected = true;
                }
            });

            // Trigger event change untuk memberitahu plugin Preline
            const event = new Event('change', {
                bubbles: true
            });
            jenisIn.dispatchEvent(event);

            // Memilih elemen dropdown
            const dropdownOptions = document.querySelectorAll('[data-hs-select-dropdown] > div');

            // Menandai opsi yang dipilih di dropdown
            dropdownOptions.forEach(option => {
                if (selectedValues.includes(option.dataset.value)) {
                    option.classList.add('selected');
                }
            });

            const JamBukaIn = document.getElementById('jam_buka_umkm_up');
            JamBukaIn.value = data.jam_buka;
            const kontakIn = document.getElementById('kontak_umkm_up');
            kontakIn.value = data.kontak;
            const bpomIn = document.getElementById('bpom_umkm_up');
            bpomIn.value = data.no_bpom;
            const halalIn = document.getElementById('halal_umkm_up');
            halalIn.value = data.no_halal;
            const nibIn = document.getElementById('nib_umkm_up');
            nibIn.value = data.no_nib;
            const pirtIn = document.getElementById('pirt_umkm_up');
            pirtIn.value = data.no_pirt;
            const latIn = document.getElementById('lat_umkm_up');
            latIn.value = data.lat;
            const longIn = document.getElementById('long_umkm_up');
            longIn.value = data.long;
            const descIn = document.getElementById('desc_umkm_up');
            descIn.value = data.deskripsi;
            const hiddenInput = document.getElementById('id_umkm_up');
            hiddenInput.value = data.id;

            setTimeout(() => {
                // Coba untuk memperbarui tampilan dengan gaya atau metode lain
                const dropdown = document.querySelector('[data-hs-select-dropdown]');
                if (dropdown) {
                    dropdown.classList.toggle('opened');
                    dropdown.classList.toggle('opened');
                    console.log('oii');
                }
            }, 100);
            document.getElementById('modal_form_umkm_up').showModal();
        }

        function openModalShowUmkmDesa(id, data) {
            data = JSON.parse(data);
            const namaIn = document.getElementById('nama_umkm_show');
            namaIn.value = data.nama;
            const alamatIn = document.getElementById('alamat_umkm_show');
            alamatIn.value = data.alamat;
            const jenisIn = document.getElementById('jenis_umkm_show');
            jenisIn.value = data.jenis.map(item => item.jenis);
            const JamBukaIn = document.getElementById('jam_buka_umkm_show');
            JamBukaIn.value = data.jam_buka;
            const kontakIn = document.getElementById('kontak_umkm_show');
            kontakIn.value = data.kontak;
            const bpomIn = document.getElementById('bpom_umkm_show');
            bpomIn.value = data.no_bpom;
            const halalIn = document.getElementById('halal_umkm_show');
            halalIn.value = data.no_halal;
            const nibIn = document.getElementById('nib_umkm_show');
            nibIn.value = data.no_nib;
            const pirtIn = document.getElementById('pirt_umkm_show');
            pirtIn.value = data.no_pirt;
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
            document.getElementById('mdumkm_'+id).showModal();
        }
    </script>
</body>

</html>

