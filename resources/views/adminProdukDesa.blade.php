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
    @vite('resources/js/app.js')
</head>

<body class="mytheme font-jakarta antialiased dark:text-white/50 overflow-x-hidden">
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
            <form action="#cari-produk" method="get" class="flex flex-row gap-[10px] items-center w-[80%]">
                <label class="block w-[500px]">
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
                            class="w-full my-4 py-2 pl-10 pr-5 appearance-none focus:outline-none focus:ring-blue-500 rounded-lg border border-gray-300">
                    </div>
                    
                </label>
      
                <label class="hs-select block w-[200px]">
                    <select name="jenisFilter" id="jenis_produk_filter"
                        data-hs-select='{
                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-gray-100 border border-gray-300 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                        "dropdownClasses": "block mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-gray-100 border border-gray-300 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                        "optionClasses": "block py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                        }'
                        class="">
                        @if (request()->input('jenisFilter')!=null)
                            <option value="{{ request()->input('jenisFilter') }}" hidden>{{ request()->input('jenisFilter') }}</option>
                        @endif
                        @foreach ($jenises as $item)
                            <option value="{{ $item }} {{ request('jenisFilter')==$item?'selected':'' }}">{{ $item }}</option>
                        @endforeach
                    </select> 
                </label>
                
                <label class="hs-select block w-[200px]">
                    <select
                        name="tokoFilter"
                        id="toko_produk_filter"
                        data-hs-select='{
                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                        "toggleClasses": "block w-full flex-shrink-0 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap bg-gray-100 border border-gray-300 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:ring-1 dark:focus:ring-neutral-600",
                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-gray-100 border border-gray-300 rounded-lg overflow-y-auto dark:bg-neutral-900 dark:border-neutral-700",
                        "optionClasses": "py-2 px-4 text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg dark:bg-neutral-900 dark:text-neutral-200 dark:hover:bg-neutral-800",
                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"></span></div>",
                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                        }'
                        class="">
                        @if (request()->input('tokoFilter')!=null)
                            <option value="{{ request()->input('tokoFilter') }}" hidden>{{ request()->input('tokoFilter') }}</option>
                        @endif                        
                        @foreach ($tokos as $item)
                            <option value="{{ $item }} {{ request('tokoFilter')==$item?'selected':'' }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </label>

                <button
                    type="submit"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">apply</button>
                
                <a
                    href="{{ route('admin.produk.index')}}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">reset</a>
            </form>

                
              
            </div>
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
                        @php
                          $i=1 + ($items->currentPage()-1) * ($items->perPage());  
                        @endphp
                        @foreach ($items as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $i++ }}</td>
                                <td class="px-6 py-4">{{ $item['nama'] }}</td>
                                <td class="px-6 py-4">{{ $item['jenis'] }}</td>
                                <td class="px-6 py-4">{{ $item['toko'] }}</td>
                                <td class="px-6 py-4">{{ $item['alamat'] }}</td>
                                <td class="px-6 py-4">
                                    <button
                                        onclick="openModalShowProdukDesa('{{$item['id']}}', '{{ json_encode($item) }}')"
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
                                            onclick="openModalUpdateProdukDesa('{{ $item['id'] }}', '{{ json_encode($item)}}')"
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Section -->
                    <section class="px-4 py-6 bg-white border-t">
                        @if ($items->hasPages())
                            <div class="flex items-center justify-between w-full">
                                @if ($items->onFirstPage())
                                    <button disabled
                                        class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" aria-hidden="true"
                                            class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                        </svg>
                                        Previous
                                    </button>
                                @else
                                    <a href="{{ $items->previousPageUrl() }} #daftar-produk"
                                        class="flex border border-gray-300 items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" aria-hidden="true"
                                            class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                        </svg>
                                        Previous
                                    </a>
                                @endif

                                <div class="flex items-center gap-2">
                                    @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                                        @if ($page == $items->currentPage())
                                            <button
                                                class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg bg-blue-100 text-center align-middle font-sans text-xs font-semibold uppercase text-darkText transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                type="button">
                                                <span
                                                    class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                    {{ $page }}
                                                </span>
                                            </button>
                                        @else
                                            <a href="{{ $url }} #daftar-produk"
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

                                @if ($items->hasMorePages())
                                    <a href="{{ $items->nextPageUrl() }} #daftar-produk"
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
                    {{-- tambah produk --}}
                    <button
                        class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center"
                        onclick="modal_tambah_produk.showModal()">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="mr-2">
                            <path
                                d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                                fill="white" />
                        </svg>
                        Tambahkan
                    </button>
                </div>
            </div>
        </div>
    </div>


{{-- modal --}}
    {{-- popup detail produk --}}
    <dialog id="modal_show_produk" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold">Formulir Detail Produk</h3>
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

                        <div class="lg:max-w-[60%] flex flex-col">
                            <div class="flex">
                                <label for="harga_rendah_produk_show" class="px-4 py-2 border border-r-0 border-gray-300 bg-slate-100 rounded-l-lg text-[#15141466]">RP</label>
                                <input type="text" name="harga_rendah" id="harga_rendah_produk_show"
                                    class="input input-bordered disabled:bg-slate-100 rounded-l-none w-full" disabled>
                            </div>
                            <label for="harga_rendah_produk_show" class="label-text text-end">* harga terendah</label>
                        </div>

                        <div class="lg:max-w-[60%] flex flex-col">
                            <div class="flex">
                                <label for="harga_tinggi_produk_show" class="px-4 py-2 border border-r-0 border-gray-300 bg-slate-100 rounded-l-lg text-[#15141466]">RP</label>
                                <input type="text" name="harga_tinggi" id="harga_tinggi_produk_show"
                                    class="input input-bordered disabled:bg-slate-100 rounded-l-none w-full" disabled>
                            </div>
                            <label for="harga_tinggi_produk_show" class="label-text text-end">* harga tertinggi</label>
                        </div>
                    </div>
                    

                    <div class="form-control gap-4 w-full">
                        <label for="toko_produk_show" class="label-text font-semibold">Nama Toko</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                        <input type="text" name="toko" id="toko_produk_show"
                            class="input input-bordered disabled:bg-slate-100" disabled>
                        
                    </div>

                    <div class="form-control gap-4 w-full">
                        <label for="alamat_produk_show" class="label-text font-semibold">Alamat Toko</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                        <input type="text" name="alamat" id="alamat_produk_show"
                            class="input input-bordered disabled:bg-slate-100" disabled>
                        
                    </div>

                    <div class="form-control gap-4 w-full">
                        <label for="kontak_produk_show" class="label-text font-semibold">Link Whatsapp Toko</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                        <input type="text" name="kontak" id="kontak_produk_show"
                            class="input input-bordered disabled:bg-slate-100" disabled>
                        
                    </div>

                    <div class="form-control gap-4 w-full">
                        <p  class="label-text font-semibold">Perizinan Label</p>

                        <label for="halal_produk_show" class="label-text text-gray-500">
                            no halal (optional)
                        </label>
                        <input type="text" name="kontak" id="halal_produk_show"
                            class="input input-bordered disabled:bg-slate-100 lg:max-w-[60%]" disabled>

                        <label for="nib_produk_show" class="label-text text-gray-500">
                            no NIB (optional)
                        </label>
                        <input type="text" name="kontak" id="nib_produk_show"
                            class="input input-bordered disabled:bg-slate-100 lg:max-w-[60%]" disabled>

                        <label for="pirt_produk_show" class="label-text text-gray-500">
                            no P-IRT (optional)
                        </label>
                        <input type="text" name="kontak" id="pirt_produk_show"
                            class="input input-bordered disabled:bg-slate-100 lg:max-w-[60%]" disabled>
                        
                    </div>
                    
                    <div class="form-control gap-4">
                        <label for="desc_produk_show" class="label-text font-semibold">Deskripsi</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p>
                        <textarea name="deskripsi" id="desc_produk_show" disabled
                            class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                        
                    </div>
                    
                    <div class="form-control gap-4">
                        <label for="foto_produk_show" class="label-text font-semibold">Foto Produk/Toko</label>
                        <input type="file" name="foto" id="foto_produk_show" accept=".png, .jpg"
                            class="input align-center block w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-gray-500 file:text-white  bg-gray-100 rounded-lg disabled:bg-[#f3f4f6]" disabled>
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
        <div class="modal-box min-w-[80%] flex flex-col gap-[10px]">
            <p class="text-[35px]">Konfirmasi Penghapusan Produk</p>
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

    {{-- EDIT --}}
    <dialog id="modal_edit_produk" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold">Formulir Edit Produk</h3>
            <hr class="h-px my-8 bg-gray-300 border-0">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-control gap-6">
                    <div class="form-control gap-4">
                        <label for="nama_produk_edit" class="label-text font-semibold">Nama produk</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p>
                        <input type="text" name="nama" id="nama_produk_edit"
                            class="input input-bordered">
                        <input type="text" name="id" id="id_produk"
                            class="input input-bordered " hidden>
                        
                    </div>

                    
                    <div class="form-control gap-4 w-full">
                        <label for="jenis_produk_edit" class="label-text font-semibold">Jenis produk</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                        <select multiple="" name="jenis[]" id="jenis_produk_edit"
                            data-hs-select='{
                        "placeholder": "Pilih jenis produk...",
                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\" id=\"jenis_produk_edit\"></button>",
                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-gray-100 border border-gray-300 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-gray-100 border border-gray-300 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                        }'
                            class="">
                            <option value="">Choose</option>
                            @foreach ($jenises as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select> 
                    </div>
                    

                    <div class="form-control gap-4">
                        <p class="label-text font-semibold">Harga Produk</p>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p> 

                        <div class="lg:max-w-[60%] flex flex-col">
                            <div class="flex">
                                <label for="harga_rendah_produk_edit" class="px-4 py-2 border border-r-0 border-gray-300 rounded-l-lg">RP</label>
                                <input type="text" name="harga_rendah" id="harga_rendah_produk_edit"
                                    class="input input-bordered rounded-l-none w-full">
                            </div>
                            <label for="harga_rendah_produk_edit" class="label-text text-end">* harga terendah</label>
                        </div>

                        <div class="lg:max-w-[60%] flex flex-col">
                            <div class="flex">
                                <label for="harga_tinggi_produk_edit" class="px-4 py-2 border border-r-0 border-gray-300 rounded-l-lg">RP</label>
                                <input type="text" name="harga_tinggi" id="harga_tinggi_produk_edit"
                                    class="input input-bordered rounded-l-none w-full">
                            </div>
                            <label for="harga_tinggi_produk_edit" class="label-text text-end">* harga tertinggi</label>
                        </div>
                    </div>

                    <div class="form-control gap-4 w-full">
                        <label for="toko_produk_edit" class="label-text font-semibold">Nama Toko</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                        <input type="text" name="toko" id="toko_produk_edit"
                            class="input input-bordered">
                        
                    </div>

                    <div class="form-control gap-4 w-full">
                        <label for="alamat_produk_edit" class="label-text font-semibold">Alamat Toko</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                        <input type="text" name="toko" id="alamat_produk_edit"
                            class="input input-bordered">
                        
                    </div>


                    <div class="form-control gap-4 w-full">
                        <label for="kontak_produk_edit" class="label-text font-semibold">Link Whatsapp Toko</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                        <input type="text" name="kontak" id="kontak_produk_edit"
                            class="input input-bordered">
                        
                    </div>

                    <div class="form-control gap-4 w-full">
                        <p  class="label-text font-semibold">Perizinan Label</p>

                        <label for="halal_produk_edit" class="label-text text-gray-500">
                            no halal (optional)
                        </label>
                        <input type="text" name="kontak" id="halal_produk_edit"
                            class="input input-bordered lg:max-w-[60%]">

                        <label for="nib_produk_edit" class="label-text text-gray-500">
                            no NIB (optional)
                        </label>
                        <input type="text" name="kontak" id="nib_produk_edit"
                            class="input input-bordered lg:max-w-[60%]">

                        <label for="pirt_produk_edit" class="label-text text-gray-500">
                            no P-IRT (optional)
                        </label>
                        <input type="text" name="kontak" id="pirt_produk_edit"
                            class="input input-bordered lg:max-w-[60%]">
                    </div>
                    
                    <div class="form-control gap-4">
                        <label for="desc_produk_edit" class="label-text font-semibold">Deskripsi</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p>
                        <textarea name="deskripsi" id="desc_produk_edit"
                            class="input input-bordered w-full py-4 h-36"></textarea>
                        
                    </div>
                    
                    <div class="form-control gap-4">
                        <label for="foto_produk_edit" class="label-text font-semibold">Foto Produk/Toko</label>
                        <input type="file" accept=".png, .jpg" name="foto" id="foto_produk_edit"
                            class="input align-center block w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 bg-gray-100 rounded-lg">
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span>file png atau jpg</p>
                    </div>
                                                    
                    <div class="relative w-full">
                        <div class="flex gap-4 justify-end">
                            <button type="button"
                                class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                onclick="modal_edit_produk.close()">Tutup</button>

                            {{-- button simpan edit --}}
                            <button id="edit-btn-test" type="submit"
                                class="btn rounded-xl text-lightText bg-[#2D68F8] hover:bg-green-500 hover:text-lightText px-4 py-2 flex items-center">
                                Simpan perubahan
                            </button>
                            {{--  --}}

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </dialog>
    {{-- END EDIT --}}

    {{-- TAMBAH PRODUK --}}
    <dialog id="modal_tambah_produk" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold">Formulir Pendataan Produk</h3>
            <hr class="h-px my-8 bg-gray-300 border-0">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-control gap-6">
                    <div class="form-control gap-4">
                        <label for="nama_produk_add" class="label-text font-semibold">Nama produk</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p>
                        <input type="text" name="nama" id="nama_produk_add"
                            class="input input-bordered" placeholder="(Tuliskan Nama)">
                        <input type="text" name="id" id="id_produk"
                            class="input input-bordered " hidden>
                        
                    </div>

                    <div class="form-control gap-4 w-full">
                        <label for="jenis_produk_edit" class="label-text font-semibold">Jenis produk</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                        <select multiple="" name="jenis[]" class="jenis_produk_edit"
                            data-hs-select='{
                        "placeholder": "Pilih jenis produk...",
                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-gray-100 border border-gray-300 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-gray-100 border border-gray-300 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                        }'
                            class="">
                            <option value="" hidden>Jenis Produk</option>
                            @foreach ($jenises as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="form-control gap-4">
                        <p class="label-text font-semibold">Harga Produk</p>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p> 

                        <div class="lg:max-w-[60%] flex flex-col">
                            <div class="flex">
                                <label for="harga_rendah_produk_add" class="px-4 py-2 border border-r-0 border-gray-300 rounded-l-lg">RP</label>
                                <input type="text" name="harga_rendah" id="harga_rendah_produk_add"
                                    class="input input-bordered rounded-l-none w-full" placeholder="(Cantumkan harga cont. 30000)">
                            </div>
                            <label for="harga_rendah_produk_add" class="label-text text-end">* harga terendah</label>
                        </div>

                        <div class="lg:max-w-[60%] flex flex-col">
                            <div class="flex">
                                <label for="harga_tinggi_produk_add" class="px-4 py-2 border border-r-0 border-gray-300 rounded-l-lg">RP</label>
                                <input type="text" name="harga_tinggi" id="harga_tinggi_produk_add"
                                    class="input input-bordered rounded-l-none w-full" placeholder="(Cantumkan harga cont. 30000)">
                            </div>
                            <label for="harga_tinggi_produk_add" class="label-text text-end">* harga tertinggi</label>
                        </div>
                    </div>

                    <div class="form-control gap-4 w-full">
                        <label for="toko_produk_add" class="label-text font-semibold">Nama Toko</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                        <input type="text" name="jenis" id="toko_produk_add"
                            class="input input-bordered" placeholder="(Tuliskan Nama)">
                        
                    </div>

                    <div class="form-control gap-4 w-full">
                        <label for="maps_produk_add" class="label-text font-semibold">Google Maps</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                        <input type="text" name="maps" id="maps_produk_add"
                            class="input input-bordered" placeholder="(Salinkan Link)">
                        
                    </div>

                    <div class="form-control gap-4 w-full">
                        <label for="kontak_produk_add" class="label-text font-semibold">Link Whatsapp Toko</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi</p>
                        <input type="text" name="kontak" id="kontak_produk_add"
                            class="input input-bordered" placeholder="(Salinkan Link)">
                        
                    </div>

                    <div class="form-control gap-4 w-full">
                        <p  class="label-text font-semibold">Perizinan Label</p>

                        <label for="halal_produk_add" class="label-text text-gray-500">
                            no halal (optional)
                        </label>
                        <input type="text" name="kontak" id="halal_produk_add"
                            class="input input-bordered lg:max-w-[60%]">

                        <label for="nib_produk_add" class="label-text text-gray-500">
                            no NIB (optional)
                        </label>
                        <input type="text" name="kontak" id="nib_produk_add"
                            class="input input-bordered lg:max-w-[60%]">

                        <label for="pirt_produk_add" class="label-text text-gray-500">
                            no P-IRT (optional)
                        </label>
                        <input type="text" name="kontak" id="pirt_produk_add"
                            class="input input-bordered lg:max-w-[60%]">
                    </div>
                    
                    <div class="form-control gap-4">
                        <label for="desc_produk_add" class="label-text font-semibold">Deskripsi</label>
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib
                            diisi
                        </p>
                        <textarea name="deskripsi" id="desc_produk_add"
                            class="input input-bordered w-full py-4 h-36" placeholder="(Tuliskan Deskripsi Produk)"></textarea>
                        
                    </div>
                    
                    <div class="form-control gap-4">
                        <label for="foto_produk_add" class="label-text font-semibold">Foto Produk/Toko</label>
                        <input type="file" accept=".png, .jpg" name="no_pirt" id="foto_produk_add"
                            class="input align-center block w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 bg-gray-100 rounded-lg">
                        <p class="label-text text-gray-500"><span class="text-red-500">*</span>file png atau jpg</p>
                    </div>
                                                    
                    <div class="relative w-full">
                        <div class="flex gap-4 justify-end">
                            <button type="button"
                                class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                onclick="modal_tambah_produk.close()">Tutup</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </dialog>
    {{-- END TAMBAH --}}

{{-- modal END --}}

    <script>
        function openModalShowProdukDesa(id, data){
            data = JSON.parse(data);
            const namaIn = document.getElementById('nama_produk_show');
            namaIn.value = data.nama;
            const jenisIn = document.getElementById('jenis_produk_show');
            jenisIn.value = data.jenis;
            const hargaRIn = document.getElementById('harga_rendah_produk_show');
            hargaRIn.value = data.hargaRendah;
            const hargaTIn = document.getElementById('harga_tinggi_produk_show');
            hargaTIn.value = data.hargaTinggi;
            const tokoIn = document.getElementById('toko_produk_show');
            tokoIn.value = data.toko;
            const alamatIn = document.getElementById('alamat_produk_show');
            alamatIn.value = data.alamat;
            const kontakIn = document.getElementById('kontak_produk_show');
            kontakIn.value = data.kontak;
            const descIn = document.getElementById('desc_produk_show');
            descIn.value = data.desc;
            const hiddenInput = document.getElementById('id_produk');
            hiddenInput.value = id;

            if (data.halal == null) {
                document.getElementById('halal_produk_show').placeholder = '(tuliskan nomor halal)'
            }
            if (data.nib == null) {
                document.getElementById('nib_produk_show').placeholder = '(tuliskan nomor NIB)'
            }
            if (data.pirt == null) {
                document.getElementById('pirt_produk_show').placeholder = '(tuliskan nomor P-IRT)'
            }

            document.getElementById('modal_show_produk').showModal();
        }

        function openModalDeleteProdukDesa(){
            document.getElementById('modal_delete_produk').showModal();
        }

        function openModalUpdateProdukDesa(id, data){
            data = JSON.parse(data);

            const namaIn = document.getElementById('nama_produk_edit');
            namaIn.value = data.nama;
            const hargaRIn = document.getElementById('harga_rendah_produk_edit');
            hargaRIn.value = data.hargaRendah;
            const hargaTIn = document.getElementById('harga_tinggi_produk_edit');
            hargaTIn.value = data.hargaTinggi;
            const tokoIn = document.getElementById('toko_produk_edit');
            tokoIn.value = data.toko;
            const alamatIn = document.getElementById('alamat_produk_edit');
            alamatIn.value = data.alamat;
            const kontakIn = document.getElementById('kontak_produk_edit');
            kontakIn.value = data.kontak;
            const descIn = document.getElementById('desc_produk_edit');
            descIn.value = data.desc;
            const hiddenInput = document.getElementById('id_produk');
            hiddenInput.value = id;

            if (data.halal == null) {
                document.getElementById('halal_produk_edit').placeholder = '(tuliskan nomor halal)'
            }
            if (data.nib == null) {
                document.getElementById('nib_produk_edit').placeholder = '(tuliskan nomor NIB)'
            }
            if (data.pirt == null) {
                document.getElementById('pirt_produk_edit').placeholder = '(tuliskan nomor P-IRT)'
            }

            document.getElementById('modal_edit_produk').showModal();
        }

    </script>    
</body>

</html>
