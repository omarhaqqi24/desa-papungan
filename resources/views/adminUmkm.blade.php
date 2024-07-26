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
        <div class="text-3xl font-bold">UMKM</div>
        <div class="">Home / UMKM</div>
    </div>

    <div class="w-screen pl-32 pr-24 mt-5 space-y-4 mb-10">
        <div class="w-1/2 flex items-center gap-2">
            <div class="font-medium">Informasi</div>
            <div class="flex-grow border-b-2 border-gray-500"></div>
        </div>

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
                    <input type="search" placeholder="Pencarian" name="cari-lembaga" id="cari-lembaga"
                        class="w-1/2 my-4 py-2 pl-10 pr-5 appearance-none focus:outline-none focus:ring-blue-500 rounded-lg border border-gray-300">
                </div>
            </form>

            <div class="py-2 text-gray-500">Berikut adalah penjelasan dari struktur organisasi yang ditampilkan</div>
            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Daftar UMKM</caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama UMKM
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ijin Label
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Detail UMKM
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($umkm->data->resource as $item)                            
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->nama }}
                                </td>
                                <td class="px-6 py-4">
                                    @foreach ($item->jenis as $jenis)
                                        <span>{{ $jenis }}, </span>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->alamat }}
                                </td>
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
                                    <button onclick="openModalShowUmkmDesa('{{ $item->id }}', '{{ json_encode($item) }}')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tekan Disini</button>    
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button onclick="openModalUpdateUmkmDesa('{{ $item->id }}', '{{ json_encode($item) }}')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <section class="px-4 py-6 bg-white border-t">
                    <div class="flex items-center justify-between w-full">
                        <button disabled
                            class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                            </svg>
                            Previous
                        </button>
                        <div class="flex items-center gap-2">
                            <button
                                class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg bg-blue-100 text-center align-middle font-sans text-xs font-semibold uppercase text-darkText transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    1
                                </span>
                            </button>
                            <button
                                class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    2
                                </span>
                            </button>
                            <button
                                class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    3
                                </span>
                            </button>
                            <button
                                class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    4
                                </span>
                            </button>
                            <button
                                class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    5
                                </span>
                            </button>
                        </div>
                        <button
                            class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button">
                            Next
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                            </svg>
                        </button>
                    </div>
                </section>
            </div>

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
                    <form method="POST" action="{{ route('perangkat-desa.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="nama_umkm_show" class="label-text font-semibold">Nama UMKM</label>
                                <input type="text" name="nama" id="nama_umkm_show" class="input input-bordered disabled:bg-slate-100" disabled>
                                <input type="text" name="id" id="id_umkm" class="input input-bordered " hidden>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="alamat_umkm_show" class="label-text font-semibold">Alamat UMKM</label>
                                <input type="text" name="alamat" id="alamat_umkm_show" class="input input-bordered disabled:bg-slate-100" disabled>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="flex gap-4 w-full">
                                <div class="form-control gap-4 w-full">
                                    <label for="jenis_umkm_show" class="label-text font-semibold">Jenis UMKM</label>
                                    <input type="text" name="jenis" id="jenis_umkm_show" class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4 w-full">
                                    <label for="jam_buka_umkm_show" class="label-text font-semibold">Jam Buka</label>
                                    <input type="time" name="jam_buka" id="jam_buka_umkm_show" class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                            </div>
                            <div class="form-control gap-4">
                                <label for="kontak_umkm_show" class="label-text font-semibold">Kontak</label>
                                <input type="text" name="kontak" id="kontak_umkm_show" class="input input-bordered disabled:bg-slate-100" disabled>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="bpom_umkm_show" class="label-text font-semibold">Nomor BPOM</label>
                                <input type="text" name="no_bpom" id="bpom_umkm_show" class="input input-bordered disabled:bg-slate-100" disabled>
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="halal_umkm_show" class="label-text font-semibold">Nomor Halal</label>
                                <input type="text" name="no_halal" id="halal_umkm_show" class="input input-bordered disabled:bg-slate-100" disabled>
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="nib_umkm_show" class="label-text font-semibold">Nomor NIB</label>
                                <input type="text" name="no_nib" id="nib_umkm_show" class="input input-bordered disabled:bg-slate-100" disabled>
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="pirt_umkm_show" class="label-text font-semibold">Nomor P-IRT</label>
                                <input type="text" name="no_pirt" id="pirt_umkm_show" class="input input-bordered disabled:bg-slate-100" disabled>
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="flex gap-4 w-full">
                                <div class="form-control gap-4 w-full">
                                    <label for="lat_umkm_show" class="label-text font-semibold">Latitude</label>
                                    <input type="text" name="lat" id="lat_umkm_show" class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4 w-full">
                                    <label for="long_umkm_show" class="label-text font-semibold">Longtitude</label>
                                    <input type="text" name="long" id="long_umkm_show" class="input input-bordered disabled:bg-slate-100" disabled>
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                            </div>
                            <div class="form-control gap-4">
                                <label for="desc_umkm_show" class="label-text font-semibold">Deskripsi</label>
                                <textarea name="deskripsi" id="desc_umkm_show" disabled
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="foto_umkm_show" class="label-text font-semibold">Foto</label>
                                <input type="file" name="foto" id="foto_umkm_show" class="file-input file-input-bordered disabled:bg-slate-100" disabled>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
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
                    <form method="POST" action="{{ route('perangkat-desa.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="nama_umkm_up" class="label-text font-semibold">Nama UMKM</label>
                                <input type="text" name="nama" id="nama_umkm_up" class="input input-bordered ">
                                <input type="text" name="id" id="id_umkm" class="input input-bordered " hidden>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="alamat_umkm_up" class="label-text font-semibold">Alamat UMKM</label>
                                <input type="text" name="alamat" id="alamat_umkm_up" class="input input-bordered ">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="flex gap-4 w-full">
                                <div class="form-control gap-4 w-full">
                                    <label for="jenis_umkm_up" class="label-text font-semibold">Jenis UMKM</label>
                                    <input type="text" name="jenis" id="jenis_umkm_up" class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4 w-full">
                                    <label for="jam_buka_umkm_up" class="label-text font-semibold">Jam Buka</label>
                                    <input type="time" name="jam_buka" id="jam_buka_umkm_up" class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                            </div>
                            <div class="form-control gap-4">
                                <label for="kontak_umkm_up" class="label-text font-semibold">Kontak</label>
                                <input type="text" name="kontak" id="kontak_umkm_up" class="input input-bordered">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="bpom_umkm_up" class="label-text font-semibold">Nomor BPOM</label>
                                <input type="text" name="no_bpom" id="bpom_umkm_up" class="input input-bordered">
                                <p class="label-text text-gray-500">opsional</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="halal_umkm_up" class="label-text font-semibold">Nomor Halal</label>
                                <input type="text" name="no_halal" id="halal_umkm_up" class="input input-bordered">
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
                                    <input type="text" name="lat" id="lat_umkm_up" class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4 w-full">
                                    <label for="long_umkm_up" class="label-text font-semibold">Longtitude</label>
                                    <input type="text" name="long" id="long_umkm_up" class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                            </div>
                            <div class="form-control gap-4">
                                <label for="desc_umkm_up" class="label-text font-semibold">Deskripsi</label>
                                <textarea name="deskripsi" id="desc_umkm_up"
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="foto_umkm_up" class="label-text font-semibold">Foto</label>
                                <input type="file" name="foto" id="foto_umkm_up" class="file-input file-input-bordered">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
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
                    <form method="POST" action="{{ route('perangkat-desa.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="nama_umkm" class="label-text font-semibold">Nama UMKM</label>
                                <input type="text" name="nama" id="nama_umkm" class="input input-bordered ">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="alamat_umkm" class="label-text font-semibold">Alamat UMKM</label>
                                <input type="text" name="alamat" id="alamat_umkm" class="input input-bordered ">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="flex gap-4 w-full">
                                <div class="form-control gap-4 w-full">
                                    <label for="jenis_umkm" class="label-text font-semibold">Jenis UMKM</label>
                                    <input type="text" name="jenis" id="jenis_umkm" class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4 w-full">
                                    <label for="jam_buka_umkm" class="label-text font-semibold">Jam Buka</label>
                                    <input type="time" name="jam_buka" id="jam_buka_umkm" class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                            </div>
                            <div class="form-control gap-4">
                                <label for="kontak_umkm" class="label-text font-semibold">Kontak</label>
                                <input type="text" name="kontak" id="kontak_umkm" class="input input-bordered">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
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
                                    <input type="text" name="lat" id="lat_umkm" class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                                <div class="form-control gap-4 w-full">
                                    <label for="long_umkm" class="label-text font-semibold">Longtitude</label>
                                    <input type="text" name="long" id="long_umkm" class="input input-bordered">
                                    <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                            </div>
                            <div class="form-control gap-4">
                                <label for="desc_umkm" class="label-text font-semibold">Deskripsi</label>
                                <textarea name="deskripsi" id="desc_umkm"
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="foto_umkm" class="label-text font-semibold">Foto</label>
                                <input type="file" name="foto" id="foto_umkm" class="file-input file-input-bordered">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
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
            <iframe src="{{ route('peta-wilayah') }}" frameborder="0" class="w-full h-full p-4 rounded-xl border border-gray-300 mt-6"></iframe>
        </div>
    </div>

    <script>
        function openModalUpdateUmkmDesa(id, data) {
            data = JSON.parse(data);
            const namaIn = document.getElementById('nama_umkm_up');
            namaIn.value = data.nama;
            const alamatIn = document.getElementById('alamat_umkm_up');
            alamatIn.value = data.alamat;
            const jenisIn = document.getElementById('jenis_umkm_up');
            jenisIn.value = data.jenis;
            // const JamBukaIn = document.getElementById('jam_buka_umkm_up');
            // JamBukaIn.value = data.jam_buka;
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
            const hiddenInput = document.getElementById('id_umkm');
            hiddenInput.value = data.id;

            document.getElementById('modal_form_umkm_up').showModal();
        }

        function openModalShowUmkmDesa(id, data) {
            data = JSON.parse(data);
            const namaIn = document.getElementById('nama_umkm_show');
            namaIn.value = data.nama;
            const alamatIn = document.getElementById('alamat_umkm_show');
            alamatIn.value = data.alamat;
            const jenisIn = document.getElementById('jenis_umkm_show');
            jenisIn.value = data.jenis;
            // const JamBukaIn = document.getElementById('jam_buka_umkm_show');
            // JamBukaIn.value = data.jam_buka;
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
    </script>
</body>

</html>
