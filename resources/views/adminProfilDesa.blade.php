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

        <!-- Show Profil Desa -->
        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Tentang Kami</div>
            <div class="py-2 text-gray-500">Berikut adalah penjelasan dari Profil Desa yang ditampilkan</div>
            @if ($success = Session::get('success'))
                <h1>{{ $success }}</h1>
            @endif
            @if ($errors->any())
                <h1>{{ $errors }}</h1>
            @endif
            <!-- Form Show Profil Desa -->
            <div class="form-control gap-6">
                <div class="form-control gap-4">
                    <label for="penjelasan" class="label-text font-semibold">Penjelasan</label>
                    <textarea disabled name="penjelasan" id="penjelasan"
                        class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100">{{ $profilDesa->data->penjelasan }}</textarea>
                </div>
                <div class="form-control gap-4">
                    <label for="foto" class="label-text font-semibold">Foto</label>
                    <input disabled type="file" name="foto" id="foto"
                        class="file-input file-input-bordered disabled:bg-slate-100">
                </div>
            </div>
            <!-- End -->

            <div class="flex justify-end mt-4">
                <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center"
                    onclick="modal_form_pd.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Edit
                </button>
            </div>

            <!-- Modal Form Update Profil Desa -->
            <dialog id="modal_form_pd" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Update Profil Desa</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" action="{{ route('profil-desa.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="penjelasan" class="label-text font-semibold">Penjelasan</label>
                                <textarea name="penjelasan" id="penjelasan"
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100">{{ $profilDesa->data->penjelasan }}</textarea>
                            </div>
                            <div class="form-control gap-4">
                                <label for="foto" class="label-text font-semibold">Foto</label>
                                <input type="file" name="foto" id="foto"
                                    class="file-input file-input-bordered disabled:bg-slate-100">
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_pd.close()">Tutup</button>
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
        <!-- End -->

        <!-- Show Visi Misi -->
        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Visi dan Misi</div>
            <div class="py-2 text-gray-500">Berikut adalah Visi dan Misi yang ditampilkan</div>
            @if ($success = Session::get('success'))
                <h1>{{ $success }}</h1>
            @endif
            @if ($errors->any())
                <h1>{{ $errors }}</h1>
            @endif
            <!-- Form Show Visi Desa -->
            <div class="form-control gap-6">
                <div class="form-control gap-4">
                    <label for="penjelasan" class="label-text font-semibold">Penjelasan Visi</label>
                    <textarea disabled name="isi_poin" id="penjelasan"
                        class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100">{{ $visi->isi_poin }}</textarea>
                </div>
            </div>
            <!-- End -->

            <div class="flex justify-end mt-4">
                <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center"
                    onclick="modal_form_vs.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Edit
                </button>
            </div>

            <!-- Modal Form Update Visi Desa -->
            <dialog id="modal_form_vs" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Update Visi Desa</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" action="{{ route('visi.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="penjelasan" class="label-text font-semibold">Penjelasan Visi</label>
                                <textarea name="isi_poin" id="penjelasan"
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-200">{{ $visi->isi_poin }}</textarea>
                                <input hidden type="text" name="id" value="{{ $visi->id }}">
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_vs.close()">Tutup</button>
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

            <p class="label-text font-semibold text-lg">Penjelasan Misi</p>
            <p class="label-text text-gray-500">Berikut adalah daftar misi yang ditampilkan</p>

            <!-- Show Table Misi -->
            <div class="relative overflow-x-auto border border-gray-300 rounded-2xl mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Daftar Misi</caption>
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
                        @for ($i=1; $i < sizeof($misi); $i++)                            
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $i }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $misi[$i]->isi_poin }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button onclick="openModalUpdateMisi('{{ $misi[$i]->id }}', '{{ $misi[$i]->isi_poin }}')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <dialog id="modal_form_ms_up" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Update Misi Desa</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" enctype="multipart/form-data" id="form_up_misi" action="{{ route('misi.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="penjelasan" class="label-text font-semibold">Penjelasan Misi</label>
                                <textarea name="isi_poin" id="isi_poin_misi"
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-200"></textarea>
                                <input hidden type="text" name="id" id="id_misi">
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_ms_up.close()">Tutup</button>
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
                    onclick="modal_form_ms.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Tambahkan
                </button>
            </div>

            <!-- Show Modal Form Tambah Misi -->
            <dialog id="modal_form_ms" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Tambah Misi Desa</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="">
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="penjelasan" class="label-text font-semibold">Penjelasan Misi</label>
                                <textarea name="penjelasan" id="penjelasan"
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-200">{{ $profilDesa->data->penjelasan }}</textarea>
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_ms.close()">Tutup</button>
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
        <!-- End -->

        <!-- Show Sejarah Desa -->
        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Sejarah Desa Papungan</div>
            <div class="py-2 text-gray-500">Berikut adalah penjelasan dari Profil desa yang ditampilkan</div>
            @if ($success = Session::get('success'))
                <h1>{{ $success }}</h1>
            @endif
            @if ($errors->any())
                <h1>{{ $errors }}</h1>
            @endif
            <!-- Form Show Sejarah Desa -->
            <div class="form-control gap-6">
                <div class="form-control gap-4">
                    <label for="penjelasan" class="label-text font-semibold">Penjelasan</label>
                    <textarea disabled name="penjelasan" id="penjelasan"
                        class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100">{{ $sejarahDesa->data->penjelasan }}</textarea>
                </div>
                <div class="form-control gap-4">
                    <label for="foto" class="label-text font-semibold">Foto</label>
                    <input disabled type="file" name="foto" id="foto"
                        class="file-input file-input-bordered disabled:bg-slate-100">
                </div>
            </div>
            <!-- End -->

            <div class="flex justify-end mt-4">
                <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded-xl flex items-center"
                    onclick="modal_form_sd.showModal()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path
                            d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                            fill="white" />
                    </svg>
                    Edit
                </button>
            </div>

            <!-- Modal Form Update Sejarah Desa -->
            <dialog id="modal_form_sd" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Update Sejarah Desa</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" action="{{ route('sejarah.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="penjelasan" class="label-text font-semibold">Penjelasan</label>
                                <textarea name="penjelasan" id="penjelasan_sd"
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-100">{{ $sejarahDesa->data->penjelasan }}</textarea>
                            </div>
                            <div class="form-control gap-4">
                                <label for="foto" class="label-text font-semibold">Foto</label>
                                <input type="file" name="foto" id="foto"
                                    class="file-input file-input-bordered disabled:bg-slate-100">
                            </div>
                            <div class="relative w-full">
                                <div class="flex gap-4 justify-end">
                                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900"
                                        onclick="modal_form_sd.close()">Tutup</button>
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
        <!-- End -->
    </div>

    <script>
        function openModalUpdateMisi(id, isi_poin) {
            const textarea = document.getElementById('isi_poin_misi');
            textarea.value = isi_poin;
            const hiddenInput = document.getElementById('id_misi');
            hiddenInput.value = id;

            document.getElementById('modal_form_ms_up').showModal();
        }
    </script>

</body>

</html>
