<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') . ' | Admin Profil Desa' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<style>
    .custom-dropdown-wrapper {
        position: relative;
    }

    .custom-dropdown-input {
        cursor: pointer;
    }

    /* Wadah dropdown list */
    .custom-dropdown-list {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 10;
        margin-top: 4px;
        background-color: white;
        border: 1px solid #d1d5db;
        /* Border abu-abu */
        border-radius: 0.5rem;
        /* Sudut tumpul */
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        overflow: hidden;
    }

    /* Membuat list bisa di-scroll setelah 6 item */
    .custom-dropdown-list ul {
        list-style: none;
        margin: 0;
        padding: 0;
        max-height: 216px;
        /* Perkiraan tinggi 6 item (6 * 36px) */
        overflow-y: auto;
        /* Aktifkan scroll jika lebih tinggi */
    }

    .custom-dropdown-list li {
        padding: 8px 12px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .custom-dropdown-list li:hover {
        background-color: #f3f4f6;
        /* Warna hover */
    }
</style>

<body class="mytheme font-jakarta antialiased dark:text-white/50 overflow-x-hidden">
    <x-admin-navbar />

    <div class="w-screen pl-32 py-3 h-20 bg-secondary text-lightText">
        <div class="text-3xl font-bold">Katalog Produk</div>
        <div class="">Home / Katalog Produk</div>
    </div>

    <div class="pl-32 pr-24 mt-5 space-y-4 mb-10">
        <div class="w-1/2 flex items-center gap-2">
            <div class="font-medium">Katalog Produk</div>
            <div class="flex-grow border-b-2 border-gray-500"></div>
        </div>

        <div class="w-full" id="Kategori">
            <div class="text-3xl font-semibold text-darkText">Kategori Produk</div>

            {{-- Form pencarian: action diubah agar mengarah ke route yang benar --}}
            <form action="{{ route('admin.produk.index') }}" method="get"
                class="flex flex-row gap-[10px] items-center w-[80%]">
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

                <div class="custom-dropdown-wrapper w-full max-w-xs">
                    <input type="hidden" name="jenisFilter" id="jenisFilter_hidden"
                        value="{{ request('jenisFilter') }}">
                    <input type="text" id="jenisFilter_input"
                        class="input input-bordered w-full custom-dropdown-input" placeholder="Semua Jenis Produk"
                        onfocus="showDropdown(this)" onblur="setTimeout(() => hideDropdown(this), 200)"
                        autocomplete="off" readonly>
                    <div class="custom-dropdown-list hidden">
                        <ul onmousedown="event.preventDefault()"> {{-- Prevents blur when clicking inside list --}}
                            <li onmousedown="selectFilterItem(this, '')">Semua Jenis Produk</li>
                            @foreach ($jenises as $item)
                                <li onmousedown="selectFilterItem(this, '{{ $item }}')">{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Filter Dropdown Kustom untuk "Toko" --}}
                <div class="custom-dropdown-wrapper w-full max-w-xs">
                    <input type="hidden" name="tokoFilter" id="tokoFilter_hidden" value="{{ request('tokoFilter') }}">
                    <input type="text" id="tokoFilter_input"
                        class="input input-bordered w-full custom-dropdown-input" placeholder="Semua Toko"
                        onfocus="showDropdown(this)" onblur="setTimeout(() => hideDropdown(this), 200)"
                        autocomplete="off" readonly>
                    <div class="custom-dropdown-list hidden">
                        <ul onmousedown="event.preventDefault()"> {{-- Prevents blur when clicking inside list --}}
                            <li onmousedown="selectFilterItem(this, '')">Semua Toko</li>
                            @foreach ($tokos as $toko)
                                <li onmousedown="selectFilterItem(this, '{{ $toko->nama }}')">{{ $toko->nama }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <button type="submit"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Apply</button>
                <a href="{{ route('admin.produk.index') }}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Reset</a>
            </form>
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
                        <th scope="col" class="px-6 py-3">Harga</th>
                        <th scope="col" class="px-6 py-3">Nama Toko</th>
                        <th scope="col" class="px-6 py-3">Detail Produk</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1 + ($items->currentPage() - 1) * $items->perPage();
                    @endphp

                    @forelse ($items as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $i++ }}</td>
                            <td class="px-6 py-4">{{ $item->nama_produk }}</td>
                            <td class="px-6 py-4">{{ $item->jenis_produk }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $parts = explode(' - ', $item->harga);
                                    $formattedPrices = [];
                                    foreach ($parts as $price) {
                                        $formattedPrices[] =
                                            'Rp ' .
                                            number_format((int) preg_replace('/\D/', '', $price ?? '0'), 0, ',', '.');
                                    }
                                    echo implode(' - ', $formattedPrices);
                                @endphp
                            </td>
                            <td class="px-6 py-4">{{ $item->umkm->nama ?? '-' }}</td>
                            <td class="px-6 py-4">
                                {{-- Penjelasan: `json_encode` sudah cukup, tidak perlu `JSON.parse` di JS. Data UMKM juga di-pass. --}}
                                <button onclick="openModalShowProdukDesa({!! htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8') !!})"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Lihat Detail
                                </button>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-4 justify-center items-center">
                                    <button onclick="openModalDeleteProdukDesa('{{ $item->id }}')"
                                        class="font-medium">
                                        <svg width="21" height="20" viewBox="0 0 21 20"
                                            class="stroke-[#475467] hover:stroke-[#ff0000]" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3 5.00033H4.66667M4.66667 5.00033H18M4.66667 5.00033V16.667C4.66667 17.109 4.84226 17.5329 5.15482 17.8455C5.46738 18.1581 5.89131 18.3337 6.33333 18.3337H14.6667C15.1087 18.3337 15.5326 18.1581 15.8452 17.8455C16.1577 17.5329 16.3333 17.109 16.3333 16.667V5.00033H4.66667ZM7.16667 5.00033V3.33366C7.16667 2.89163 7.34226 2.46771 7.65482 2.15515C7.96738 1.84259 8.39131 1.66699 8.83333 1.66699H12.1667C12.6087 1.66699 13.0326 1.84259 13.3452 2.15515C13.6577 2.46771 13.8333 2.89163 13.8333 3.33366V5.00033M8.83333 9.16699V14.167M12.1667 9.16699V14.167"
                                                stroke-width="1.66667" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <button onclick="openModalEditProdukDesa({!! htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8') !!})"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <svg width="21" height="20" viewBox="0 0 21 20"
                                            class="stroke-[#475467] hover:stroke-[#2D68F8]" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.6665 2.49993C14.8854 2.28106 15.1452 2.10744 15.4312 1.98899C15.7171 1.87054 16.0236 1.80957 16.3332 1.80957C16.6427 1.80957 16.9492 1.87054 17.2352 1.98899C17.5211 2.10744 17.781 2.28106 17.9998 2.49993C18.2187 2.7188 18.3923 2.97863 18.5108 3.2646C18.6292 3.55057 18.6902 3.85706 18.6902 4.16659C18.6902 4.47612 18.6292 4.78262 18.5108 5.06859C18.3923 5.35455 18.2187 5.61439 17.9998 5.83326L6.74984 17.0833L2.1665 18.3333L3.4165 13.7499L14.6665 2.49993Z"
                                                stroke-width="1.66667" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                Data produk tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <section class="px-4 py-6 bg-white border-t">
                @if ($items->hasPages())
                    {{ $items->links() }} {{-- Penjelasan: Cara lebih simpel untuk render pagination --}}
                @endif
            </section>
        </div>

        <div class="flex justify-end mt-4">
            <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center"
                onclick="modal_tambah_produk.showModal()">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="mr-2">
                    <path
                        d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                        fill="white" />
                </svg>
                Tambahkan Produk
            </button>
        </div>
    </div>

    {{-- MODALS --}}
    <dialog id="modal_show_produk" class="modal">
        {{-- Mengatur lebar maksimal dan menghapus padding default --}}
        <div class="modal-box w-11/12 max-w-4xl p-0">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
                <div class="bg-gray-50 flex items-center justify-center p-6 md:rounded-l-2xl">
                    <div class="text-center">
                        <img id="foto_produk_show" src="" alt="Foto Produk"
                            class="max-h-96 w-auto object-contain rounded-lg shadow-md">

                        {{-- Placeholder saat tidak ada gambar --}}
                        <div id="image_placeholder_show"
                            class="hidden text-gray-400 flex-col items-center justify-center h-96">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="mt-2 text-sm">Gambar tidak tersedia</p>
                        </div>
                    </div>
                </div>

                <!-- Kolom Detail Teks -->
                <div class="p-8 flex flex-col">
                    {{-- Nama Produk & Toko --}}
                    <h3 id="nama_produk_show" class="text-3xl font-bold text-gray-800"></h3>
                    <p class="mt-2 text-gray-500">Oleh: <span id="toko_produk_show"
                            class="font-medium text-gray-700"></span></p>

                    <div class="divider my-6"></div>

                    {{-- Detail Harga & Jenis --}}
                    <div class="space-y-4 text-gray-700">
                        <div>
                            <p class="text-sm text-gray-500">Harga Mulai Dari</p>
                            <p id="harga_show" class="text-2xl font-semibold text-primary"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Jenis Produk</p>
                            <p id="jenis_produk_show" class="text-lg font-medium"></p>
                        </div>
                    </div>

                    <div class="divider my-6"></div>

                    {{-- Sertifikasi --}}
                    <div class="space-y-3">
                        <h4 class="font-semibold text-gray-600">Sertifikasi</h4>
                        <div class="flex items-center gap-3">
                            <p class="text-sm font-medium text-gray-500 w-16">P-IRT:</p>
                            <p id="pirt_produk_show" class="badge badge-outline"></p>
                        </div>
                        <div class="flex items-center gap-3">
                            <p class="text-sm font-medium text-gray-500 w-16">Halal:</p>
                            <p id="halal_produk_show" class="badge badge-outline"></p>
                        </div>
                    </div>

                    {{-- Tombol Aksi di bagian bawah --}}
                    <div class="mt-auto pt-8 text-right">
                        <button class="btn" onclick="modal_show_produk.close()">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </dialog>

    <dialog id="modal_delete_produk" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Konfirmasi Penghapusan</h3>
            <p class="py-4">Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="modal-action">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn" onclick="modal_delete_produk.close()">Batal</button>
                    <button type="submit" class="btn btn-error text-white">Hapus</button>
                </form>
            </div>
        </div>
    </dialog>

    <dialog id="modal_edit_produk" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold">Formulir Edit Produk</h3>
            <hr class="h-px my-4 bg-gray-300 border-0">
            {{-- Penjelasan: Action form akan diisi oleh JS, method POST, dan ada @method('PUT') --}}
            <form id="editForm" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-control gap-4">
                    <div>
                        <label class="label"><span class="label-text">Nama produk</span></label>
                        <input type="text" name="nama_produk" id="nama_produk_edit"
                            class="input input-bordered w-full" required>
                    </div>
                    <div>
                        <label class="label"><span class="label-text">Jenis Produk</span></label>
                        <div class="custom-dropdown-wrapper">
                            <input type="text" id="jenis_produk_input_edit" {{-- Beri ID unik untuk setiap form --}}
                                name="jenis_produk" class="input input-bordered w-full custom-dropdown-input"
                                placeholder="Pilih atau ketik jenis baru" onfocus="showDropdown(this)"
                                onkeyup="filterDropdown(this)" onblur="setTimeout(() => hideDropdown(this), 200)"
                                autocomplete="off">
                            <div class="custom-dropdown-list hidden">
                                <ul onmousedown="event.preventDefault()"> {{-- Prevents blur when clicking inside list --}}
                                    @foreach ($jenises as $item)
                                        <li onmousedown="selectDropdownItem(this)">{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="label"><span class="label-text">Harga</span></label>
                        {{-- Penjelasan: Disatukan menjadi satu input 'harga' sesuai model dan controller --}}
                        <input type="text" name="harga" id="harga_edit" placeholder="Contoh: 15000 - 20000"
                            class="input input-bordered w-full" required>
                    </div>
                    <div>
                        <label class="label"><span class="label-text">Nama Toko</span></label>
                        <div class="custom-dropdown-wrapper">
                            <input type="text" id="toko_input_edit" {{-- Beri ID unik untuk setiap form --}}
                                class="input input-bordered w-full custom-dropdown-input" placeholder="Pilih Toko"
                                onfocus="showDropdown(this)" onkeyup="filterDropdown(this)"
                                onblur="setTimeout(() => hideDropdown(this), 200)" autocomplete="off" readonly
                                {{-- Dibuat readonly agar pengguna hanya bisa memilih --}}>
                            <input type="hidden" name="umkm_id" id="umkm_id_hidden_edit">

                            <div class="custom-dropdown-list hidden">
                                <ul onmousedown="event.preventDefault()"> {{-- Prevents blur when clicking inside list --}}
                                    @foreach ($tokos as $toko)
                                        {{-- Simpan ID di data-value --}}
                                        <li data-value="{{ $toko->id }}" onmousedown="selectDropdownItem(this)">
                                            {{ $toko->nama }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <label class="label"><span class="label-text">No. PIRT (opsional)</span></label>
                            <input type="text" name="no_pirt" id="no_pirt_edit"
                                class="input input-bordered w-full">
                        </div>
                        <div class="w-1/2">
                            <label class="label"><span class="label-text">No. Halal (opsional)</span></label>
                            <input type="text" name="no_halal" id="no_halal_edit"
                                class="input input-bordered w-full">
                        </div>
                    </div>
                    <div>
                        <label class="label"><span class="label-text">Foto Produk (opsional)</span></label>
                        {{-- Penjelasan: Nama input diubah menjadi 'image' --}}
                        <input type="file" name="image" class="file-input file-input-bordered w-full">
                        <label class="label"><span class="label-text-alt">Kosongkan jika tidak ingin mengubah
                                gambar.</span></label>
                    </div>
                    <div class="modal-action">
                        <button type="button" class="btn" onclick="modal_edit_produk.close()">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="modal_tambah_produk" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold">Formulir Pendataan Produk</h3>
            <hr class="h-px my-4 bg-gray-300 border-0">
            <form method="POST" action="{{ route('admin.produk.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-control gap-4">
                    <div>
                        <label class="label"><span class="label-text">Nama produk</span></label>
                        <input type="text" name="nama_produk" placeholder="Nama produk baru"
                            class="input input-bordered w-full" required>
                    </div>
                    <div>
                        <label class="label"><span class="label-text">Jenis Produk</span></label>
                        <div class="custom-dropdown-wrapper">
                            <input type="text" id="jenis_produk_input_add" {{-- BENAR: Menggunakan ID add --}}
                                name="jenis_produk" class="input input-bordered w-full custom-dropdown-input"
                                placeholder="Pilih atau ketik jenis baru" onfocus="showDropdown(this)"
                                onkeyup="filterDropdown(this)" onblur="setTimeout(() => hideDropdown(this), 200)"
                                autocomplete="off">
                            <div class="custom-dropdown-list hidden">
                                <ul onmousedown="event.preventDefault()"> {{-- Prevents blur when clicking inside list --}}
                                    @foreach ($jenises as $item)
                                        <li onmousedown="selectDropdownItem(this)">{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="label"><span class="label-text">Harga</span></label>
                        <input type="text" name="harga" placeholder="Contoh: 15000 atau 15000 - 20000"
                            class="input input-bordered w-full" required>
                    </div>
                    <div>
                        <label class="label"><span class="label-text">Nama Toko</span></label>
                        <div class="custom-dropdown-wrapper">
                            <input type="text" id="toko_input_add" {{-- BENAR: Menggunakan ID add --}}
                                class="input input-bordered w-full custom-dropdown-input" placeholder="Pilih Toko"
                                onfocus="showDropdown(this)" onkeyup="filterDropdown(this)"
                                onblur="setTimeout(() => hideDropdown(this), 200)" autocomplete="off" readonly
                                {{-- Dibuat readonly agar pengguna hanya bisa memilih --}}>
                            <input type="hidden" name="umkm_id" id="umkm_id_hidden_add"> {{-- BENAR --}}

                            <div class="custom-dropdown-list hidden">
                                <ul onmousedown="event.preventDefault()"> {{-- Prevents blur when clicking inside list --}}
                                    @foreach ($tokos as $toko)
                                        {{-- Simpan ID di data-value --}}
                                        <li data-value="{{ $toko->id }}" onmousedown="selectDropdownItem(this)">
                                            {{ $toko->nama }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <label class="label"><span class="label-text">No. PIRT (opsional)</span></label>
                            <input type="text" name="no_pirt" class="input input-bordered w-full">
                        </div>
                        <div class="w-1/2">
                            <label class="label"><span class="label-text">No. Halal (opsional)</span></label>
                            <input type="text" name="no_halal" class="input input-bordered w-full">
                        </div>
                    </div>
                    <div>
                        <label class="label"><span class="label-text">Foto Produk</span></label>
                        <input type="file" name="image" class="file-input file-input-bordered w-full" required>
                    </div>
                    <div class="modal-action">
                        <button type="button" class="btn" onclick="modal_tambah_produk.close()">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </dialog>

    <script>
        function openModalShowProdukDesa(data) {
            // Mengisi Detail Teks
            document.getElementById('nama_produk_show').textContent = data.nama_produk || 'Nama Produk Tidak Tersedia';
            document.getElementById('jenis_produk_show').textContent = data.jenis_produk || '-';

            // Format harga dengan pemisah ribuan
            const hargaAwal = data.harga ? parseInt(data.harga.split(' - ')[0].replace(/\D/g, '')) : 0;
            document.getElementById('harga_show').textContent = `Rp ${hargaAwal.toLocaleString('id-ID')}`;

            document.getElementById('toko_produk_show').textContent = data.umkm ? data.umkm.nama : 'Toko tidak tersedia';
            document.getElementById('pirt_produk_show').textContent = data.no_pirt && data.no_pirt !== '-' ? data.no_pirt :
                'Tidak Ada';
            document.getElementById('halal_produk_show').textContent = data.no_halal && data.no_halal !== '-' ? data
                .no_halal : 'Tidak Ada';

            const fotoElement = document.getElementById('foto_produk_show');
            const placeholderElement = document.getElementById('image_placeholder_show');

            if (data.image && data.image !== '-') {
                fotoElement.src = '/storage/produk/' + data.image;
                fotoElement.classList.remove('hidden');
                placeholderElement.classList.add('hidden');
            } else {
                fotoElement.classList.add('hidden');
                placeholderElement.classList.remove('hidden');
            }

            document.getElementById('modal_show_produk').showModal();
        }

        // Fungsi untuk mengatur action form delete
        function openModalDeleteProdukDesa(id) {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/produk/${id}`;
            document.getElementById('modal_delete_produk').showModal();
        }

        function showDropdown(inputElement) {
            const wrapper = inputElement.closest('.custom-dropdown-wrapper');
            wrapper.querySelector('.custom-dropdown-list').classList.remove('hidden');
        }

        function hideDropdown(inputElement) {
            const wrapper = inputElement.closest('.custom-dropdown-wrapper');
            wrapper.querySelector('.custom-dropdown-list').classList.add('hidden');
        }

        function filterDropdown(inputElement) {
            const filter = inputElement.value.toLowerCase();
            const wrapper = inputElement.closest('.custom-dropdown-wrapper');
            const items = wrapper.querySelectorAll('.custom-dropdown-list li');

            items.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(filter)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        function selectFilterItem(itemElement, value) {
            const wrapper = itemElement.closest('.custom-dropdown-wrapper');
            const visibleInput = wrapper.querySelector('.custom-dropdown-input');
            const hiddenInput = wrapper.querySelector('input[type="hidden"]');

            // Mengisi input yang terlihat dengan teks pilihan
            visibleInput.value = itemElement.textContent;
            // Mengisi input tersembunyi dengan nilai yang akan dikirim ke controller
            hiddenInput.value = value;

            hideDropdown(visibleInput);
        }


        // Ganti fungsi lama dengan yang ini
        function selectDropdownItem(itemElement) {
            const wrapper = itemElement.closest('.custom-dropdown-wrapper');
            if (!wrapper) return;

            const visibleInput = wrapper.querySelector('.custom-dropdown-input');
            const hiddenInput = wrapper.querySelector('input[type="hidden"]'); // Cari input tersembunyi

            // Selalu isi input yang terlihat dengan teks dari item yang diklik
            visibleInput.value = itemElement.textContent;

            // KHUSUS untuk dropdown Nama Toko (yang punya input tersembunyi)
            if (hiddenInput && itemElement.hasAttribute('data-value')) {
                // Isi input tersembunyi dengan ID dari atribut data-value
                hiddenInput.value = itemElement.getAttribute('data-value');
            }
            // Untuk Jenis Produk, nilainya diambil dari visibleInput yang sudah punya name="jenis_produk"

            hideDropdown(visibleInput);
        }

        function openModalEditProdukDesa(data) {
            try {
                // Atur action form
                const form = document.getElementById('editForm');
                form.action = `/admin/produk/${data.id}`; // Sesuaikan dengan route Anda

                // Isi input standar
                document.getElementById('nama_produk_edit').value = data.nama_produk || '';
                document.getElementById('harga_edit').value = data.harga || '';
                document.getElementById('no_pirt_edit').value = data.no_pirt !== '-' ? data.no_pirt : '';
                document.getElementById('no_halal_edit').value = data.no_halal !== '-' ? data.no_halal : '';

                // Mengisi dropdown kustom "Jenis Produk" menggunakan ID unik
                document.getElementById('jenis_produk_input_edit').value = data.jenis_produk || '';

                // Mengisi dropdown kustom "Nama Toko" menggunakan ID unik
                const tokoVisibleInput = document.getElementById('toko_input_edit');
                const tokoHiddenInput = document.getElementById('umkm_id_hidden_edit');

                if (data.umkm) {
                    tokoVisibleInput.value = data.umkm.nama;
                    tokoHiddenInput.value = data.umkm.id;
                } else {
                    tokoVisibleInput.value = '';
                    tokoHiddenInput.value = '';
                }

                // Tampilkan modal SETELAH semua data terisi
                document.getElementById('modal_edit_produk').showModal();

            } catch (error) {
                console.error("Gagal membuka modal edit:", error);
                // Alert ini akan muncul jika ada error, membantu debugging
                alert("Terjadi kesalahan saat mencoba membuka form edit. Periksa console untuk detail.");
            }
        }
    </script>
</body>

</html>
