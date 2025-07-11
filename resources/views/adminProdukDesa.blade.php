<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env("APP_NAME") . " | Admin Profil Desa" }}</title>

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
    <x-admin-navbar/>

    <div class="w-screen pl-32 py-3 h-20 bg-secondary text-lightText">
        <div class="text-3xl font-bold">Katalog Produk</div>
        <div class="">Home / Katalog Produk</div>
    </div>
    
    <div class="w-screen pl-32 pr-24 mt-5 space-y-4 mb-10">
        <div class="w-1/2 flex items-center gap-2">
            <div class="font-medium">Katalog Produk</div>
            <div class="flex-grow border-b-2 border-gray-500"></div>
        </div>

        <div class="w-full" id="Kategori">
            <div class="text-3xl font-semibold text-darkText">Kategori Produk</div>

            {{-- form pencarian --}}
            <form action="#cari-produk" method="get">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Pencarian" name="qProduk" 
                        value="{{ request()->input('qProduk') }}"
                        class="w-1/2 my-4 py-2 pl-10 pr-5 appearance-none focus:outline-none focus:ring-blue-500 rounded-lg border border-gray-300">
                </div>
            </form>
            {{--  --}}

            {{-- daftar produk --}}
            <div class="py-2 text-gray-500" id="daftar-produk">Berikut adalah daftar katalog produk yang ditampilkan
            </div>

            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Daftar Produk
                    </caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Produk</th>
                            <th scope="col" class="px-6 py-3">Jenis Produk</th>
                            <th scope="col" class="px-6 py-3">Nama Toko</th>
                            <th scope="col" class="px-6 py-3">Alamat</th>
                            <th scope="col" class="px-6 py-3">Detail Produk</th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">keripik</td>
                            <td class="px-6 py-4">air</td>
                            <td class="px-6 py-4">foo</td>
                            <td class="px-6 py-4">bumi</td>
                            <td class="px-6 py-4">
                                <button
                                    onclick="openModalShowProdukDesa()"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tekan
                                    Disini</button>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-6 justify-center items-center">
                                    
                                    <button onclick="openModalDeleteProdukDesa()"
                                        class="font-medium">
                                        <svg width="21" height="20" viewBox="0 0 21 20"  class="stroke-[#475467] hover:stroke-[#ff0000]"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3 5.00033H4.66667M4.66667 5.00033H18M4.66667 5.00033V16.667C4.66667 17.109 4.84226 17.5329 5.15482 17.8455C5.46738 18.1581 5.89131 18.3337 6.33333 18.3337H14.6667C15.1087 18.3337 15.5326 18.1581 15.8452 17.8455C16.1577 17.5329 16.3333 17.109 16.3333 16.667V5.00033H4.66667ZM7.16667 5.00033V3.33366C7.16667 2.89163 7.34226 2.46771 7.65482 2.15515C7.96738 1.84259 8.39131 1.66699 8.83333 1.66699H12.1667C12.6087 1.66699 13.0326 1.84259 13.3452 2.15515C13.6577 2.46771 13.8333 2.89163 13.8333 3.33366V5.00033M8.83333 9.16699V14.167M12.1667 9.16699V14.167"
                                                stroke-width="1.66667"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>

                                    <button
                                        onclick="openModalUpdateProdukDesa()"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <svg width="21" height="20" viewBox="0 0 21 20" class="stroke-[#475467] hover:stroke-[#2D68F8]"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.6665 2.49993C14.8854 2.28106 15.1452 2.10744 15.4312 1.98899C15.7171 1.87054 16.0236 1.80957 16.3332 1.80957C16.6427 1.80957 16.9492 1.87054 17.2352 1.98899C17.5211 2.10744 17.781 2.28106 17.9998 2.49993C18.2187 2.7188 18.3923 2.97863 18.5108 3.2646C18.6292 3.55057 18.6902 3.85706 18.6902 4.16659C18.6902 4.47612 18.6292 4.78262 18.5108 5.06859C18.3923 5.35455 18.2187 5.61439 17.9998 5.83326L6.74984 17.0833L2.1665 18.3333L3.4165 13.7499L14.6665 2.49993Z"
                                                stroke-width="1.66667"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>

                                </div>
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


{{-- modal --}}
    {{-- popup detail produk --}}
    <dialog id="modal_show_produk" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold">Detail Produk Desa</h3>
            <hr class="h-px my-8 bg-gray-300 border-0">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-control gap-6">
                    <div class="form-control gap-4">
                        <label for="nama_produk_show" class="label-text font-semibold">Nama produk</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p>
                        <input type="text" name="nama" id="nama_produk_show"
                            class="input input-bordered disabled:bg-slate-100" disabled>
                        <input type="text" name="id" id="id_produk"
                            class="input input-bordered " hidden>
                        
                    </div>

                    <div class="form-control gap-4">
                        <label for="jenis_produk_show" class="label-text font-semibold">Jenis Produk</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p>
                        <input type="text" name="jenis" id="jenis_produk_show"
                            class="input input-bordered disabled:bg-slate-100" disabled>
                        
                    </div>

                    
                    <div class="form-control gap-4">
                        <p class="label-text font-semibold">Harga Produk</p>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p> 
                        <div class="max-w-[50%] flex flex-col">
                            <input type="text" name="jenis" id="jenis_produk_show"
                                class="input input-bordered disabled:bg-slate-100" disabled>
                            <label for="harga_rendah_produk_show" class="label-text text-end">* harga terendah</label>
                        </div>
                        <div class="max-w-[50%] flex flex-col">
                            <input type="text" name="jenis" id="jenis_produk_show"
                                class="input input-bordered disabled:bg-slate-100" disabled>
                            <label for="harga_tinggi_produk_show" class="label-text text-end">* harga tertinggi</label>
                        </div>
                    </div>
                    

                    <div class="form-control gap-4 w-full">
                        <label for="toko_produk_show" class="label-text font-semibold">Nama Toko</label>
                        <input type="text" name="toko" id="toko_produk_show"
                            class="input input-bordered disabled:bg-slate-100" disabled>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                    </div>

                    <div class="form-control gap-4 w-full">
                        <label for="kontak_produk_show" class="label-text font-semibold">Link Whatsapp Toko</label>
                        <input type="text" name="jam_buka" id="kontak_produk_show"
                            class="input input-bordered disabled:bg-slate-100" disabled>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                    </div>
                    
                    <div class="form-control gap-4">
                        <label for="desc_produk_show" class="label-text font-semibold">Deskripsi</label>
                        <textarea name="deskripsi" id="desc_produk_show" disabled
                            class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p>
                    </div>
                    
                    <div class="form-control gap-4">
                        <label for="foto_produk_show" class="label-text font-semibold">Foto Produk/Toko</label>
                        <input type="file" name="no_pirt" id="foto_produk_show" accept=".png, .jpg"
                            class="input input-bordered disabled:bg-slate-100" disabled>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span>file png atau jpg</p>
                    </div>
                                                    
                    <div class="relative w-full">
                        <div class="flex gap-4 justify-end">
                            <button type="button"
                                class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                onclick="modal_show_produk.close()">Tutup</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </dialog>
    {{-- END SHOW --}}

    {{-- DELETE --}}
    <dialog id="modal_delete_produk" class="modal">
        <div class="modal-box w-[50%]">
            <h2 class="text-xl">Konfirmasi Penghapusan Produk</h2>
            <div class="flex-grow border-b-2 border-black"></div>
            <div class="text-[16px]">⚠️ Penghapusan bersifat permanen.</div>
            <div class="text-[14px]">Produk yang dihapus tidak bisa dipulihkan. Jika Anda ingin menampilkan produk ini lagi, Anda harus menginput ulang semua detailnya.</div>
            <div class="modal-action justify-center">
                <button class="btn bg-secondary text-white" onclick="document.getElementById('modal_delete_produk').close()">
                    Kembali</button>
                <button class="btn bg-red-400 text-white">Hapus Produk</button>
            </div>
        </div>
    </dialog>
    {{-- END DELETE --}}

    {{-- UPDATE --}}
    <dialog id="modal_edit_produk" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold">Ed Produk Desa</h3>
            <hr class="h-px my-8 bg-gray-300 border-0">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-control gap-6">
                    <div class="form-control gap-4">
                        <label for="nama_produk_show" class="label-text font-semibold">Nama produk</label>
                        <input type="text" name="nama" id="nama_produk_show"
                            class="input input-bordered disabled:bg-slate-100">
                        <input type="text" name="id" id="id_umkm"
                            class="input input-bordered " hidden>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p>
                    </div>

                    <div class="form-control gap-4">
                        <label for="alamat_umkm_show" class="label-text font-semibold">Jenis Produk</label>
                        <input type="text" name="alamat" id="alamat_umkm_show"
                            class="input input-bordered disabled:bg-slate-100">
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p>
                    </div>

                    <div class="form-control gap-4 w-full">
                        <label for="jenis_umkm_show" class="label-text font-semibold">Nama Toko</label>
                        <input type="text" name="jenis" id="jenis_umkm_show"
                            class="input input-bordered disabled:bg-slate-100">
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                    </div>

                    <div class="form-control gap-4 w-full">
                        <label for="jam_buka_umkm_show" class="label-text font-semibold">Link Whatsapp Toko</label>
                        <input type="text" name="jam_buka" id="jam_buka_umkm_show"
                            class="input input-bordered disabled:bg-slate-100">
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                    </div>
                    
                    <div class="form-control gap-4">
                        <label for="desc_umkm_show" class="label-text font-semibold">Deskripsi</label>
                        <textarea name="deskripsi" id="desc_umkm_show"
                            class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p>
                    </div>
                    
                    <div class="form-control gap-4">
                        <label for="pirt_umkm_show" class="label-text font-semibold">Foto Produk/Toko</label>
                        <input type="file" accept=".png, .jpg" name="no_pirt" id="pirt_umkm_show"
                            class="input input-bordered disabled:bg-slate-100 align-center">
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span>file png atau jpg</p>
                    </div>
                                                    
                    <div class="relative w-full">
                        <div class="flex gap-4 justify-end">
                            <button type="button"
                                class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                onclick="modal_edit_produk.close()">Tutup</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </dialog>
    {{-- END UPDATE --}}

{{-- modal END --}}

    <script>
        function openModalShowProdukDesa(){
            document.getElementById('modal_show_produk').showModal();
        }

        function openModalDeleteProdukDesa(){
            document.getElementById('modal_delete_produk').showModal();
        }

        function openModalUpdateProdukDesa(){
            document.getElementById('modal_edit_produk').showModal();
        }
    </script>    
</body>

</html>
