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
        <div class="text-3xl font-bold">Pariwisata Desa Papungan</div>
        <div class="">Home / Pariwisata Desa</div>
    </div>

    <div class="w-screen pl-32 pr-24 mt-5 space-y-4 mb-10">
        <div class="w-1/2 flex items-center gap-2">
            <div class="font-medium">Pariwisata</div>
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

        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Daftar Foto Pariwisata</div>
            <div class="py-2 text-gray-500">Berikut adalah penjelasan dari struktur organisasi yang ditampilkan</div>
            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Daftar Foto</caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Foto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Keterangan
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
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ $item->foto }}" alt="pariwisata-desa" class="w-12 h-12 object-cover rounded-xl">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->penjelasan }}
                                </td>
                                <td class="px-6 py-4 text-right flex gap-4">
                                    <form action="{{ route('admin.pariwisata.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="font-medium" type="submit">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 5.00033H4.66667M4.66667 5.00033H18M4.66667 5.00033V16.667C4.66667 17.109 4.84226 17.5329 5.15482 17.8455C5.46738 18.1581 5.89131 18.3337 6.33333 18.3337H14.6667C15.1087 18.3337 15.5326 18.1581 15.8452 17.8455C16.1577 17.5329 16.3333 17.109 16.3333 16.667V5.00033H4.66667ZM7.16667 5.00033V3.33366C7.16667 2.89163 7.34226 2.46771 7.65482 2.15515C7.96738 1.84259 8.39131 1.66699 8.83333 1.66699H12.1667C12.6087 1.66699 13.0326 1.84259 13.3452 2.15515C13.6577 2.46771 13.8333 2.89163 13.8333 3.33366V5.00033M8.83333 9.16699V14.167M12.1667 9.16699V14.167" stroke="#475467" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <button onclick="openModalUpdatePariwisata('{{ $item->id }}', '{{ json_encode($item) }}')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.6665 2.49993C14.8854 2.28106 15.1452 2.10744 15.4312 1.98899C15.7171 1.87054 16.0236 1.80957 16.3332 1.80957C16.6427 1.80957 16.9492 1.87054 17.2352 1.98899C17.5211 2.10744 17.781 2.28106 17.9998 2.49993C18.2187 2.7188 18.3923 2.97863 18.5108 3.2646C18.6292 3.55057 18.6902 3.85706 18.6902 4.16659C18.6902 4.47612 18.6292 4.78262 18.5108 5.06859C18.3923 5.35455 18.2187 5.61439 17.9998 5.83326L6.74984 17.0833L2.1665 18.3333L3.4165 13.7499L14.6665 2.49993Z" stroke="#475467" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
            <div class="flex justify-end mt-4">
                <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center"
                    onclick="modal_form_pariwisata.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Tambahkan
                </button>
            </div>

            <!-- Form Tambah Pariwisata Desa -->
            <dialog id="modal_form_pariwisata" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Unggah Foto`</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" action="{{ route('admin.pariwisata.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="foto_pr" class="label-text font-semibold">Foto</label>
                                <input type="file" name="foto" id="foto_pr" class="file-input file-input-bordered">
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> file .png atau .jpg</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="desc_pr" class="label-text font-semibold">Keterangan</label>
                                <textarea name="penjelasan" id="desc_pr"
                                     class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_pariwisata.close()">Tutup</button>
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

             <!-- Form Update Pariwisata Desa -->
             <dialog id="modal_form_pariwisata_up" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Update Foto`</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" action="{{ route('admin.pariwisata.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="foto_pr_up" class="label-text font-semibold">Foto</label>
                                <input type="file" name="foto" id="foto_pr_up" class="file-input file-input-bordered">
                                <input type="text" name="id" id="id_pr_up" hidden>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> file .png atau .jpg</p>
                            </div>
                            <div class="form-control gap-4">
                                <label for="penjelasan_pr_up" class="label-text font-semibold">Keterangan</label>
                                <textarea name="penjelasan" id="penjelasan_pr_up"
                                     class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100"></textarea>
                                <p class="label-text text-gray-500"><span class="text-red-500">*</span> wajib diisi</p>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_pariwisata_up.close()">Tutup</button>
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
    </div>
    <script>
        function openModalUpdatePariwisata(id, data) {
            data = JSON.parse(data);
            const penjelasanIn = document.getElementById('penjelasan_pr_up');
            penjelasanIn.value = data.penjelasan;
            const hiddenInput = document.getElementById('id_pr_up');
            hiddenInput.value = data.id;

            document.getElementById('modal_form_pariwisata_up').showModal();
        }
    </script>
</body>

</html>
