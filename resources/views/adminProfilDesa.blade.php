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

        <!-- Show Profil Desa -->
        <div class="w-full">
            <div class="text-3xl font-semibold text-darkText">Tentang Kami</div>
            <div class="py-2 text-gray-500">Berikut adalah penjelasan dari Profil Desa yang ditampilkan</div>
            
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
                    <form method="POST" action="{{ route('admin.profil-desa.profil.update') }}" enctype="multipart/form-data">
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
                    <form method="POST" action="{{ route('admin.profil-desa.visi.update') }}" enctype="multipart/form-data">
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
                                <td class="px-6 py-4 text-right flex gap-6 justify-center items-center">
                                    <form action="{{ route('admin.profil-desa.misi.destroy', $misi[$i]->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="font-medium" type="submit">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 5.00033H4.66667M4.66667 5.00033H18M4.66667 5.00033V16.667C4.66667 17.109 4.84226 17.5329 5.15482 17.8455C5.46738 18.1581 5.89131 18.3337 6.33333 18.3337H14.6667C15.1087 18.3337 15.5326 18.1581 15.8452 17.8455C16.1577 17.5329 16.3333 17.109 16.3333 16.667V5.00033H4.66667ZM7.16667 5.00033V3.33366C7.16667 2.89163 7.34226 2.46771 7.65482 2.15515C7.96738 1.84259 8.39131 1.66699 8.83333 1.66699H12.1667C12.6087 1.66699 13.0326 1.84259 13.3452 2.15515C13.6577 2.46771 13.8333 2.89163 13.8333 3.33366V5.00033M8.83333 9.16699V14.167M12.1667 9.16699V14.167" stroke="#475467" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <button onclick="openModalUpdateMisi('{{ $misi[$i]->id }}', '{{ $misi[$i]->isi_poin }}')" class="font-medium">
                                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.6665 2.49993C14.8854 2.28106 15.1452 2.10744 15.4312 1.98899C15.7171 1.87054 16.0236 1.80957 16.3332 1.80957C16.6427 1.80957 16.9492 1.87054 17.2352 1.98899C17.5211 2.10744 17.781 2.28106 17.9998 2.49993C18.2187 2.7188 18.3923 2.97863 18.5108 3.2646C18.6292 3.55057 18.6902 3.85706 18.6902 4.16659C18.6902 4.47612 18.6292 4.78262 18.5108 5.06859C18.3923 5.35455 18.2187 5.61439 17.9998 5.83326L6.74984 17.0833L2.1665 18.3333L3.4165 13.7499L14.6665 2.49993Z" stroke="#475467" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <!-- End -->

            <!-- Show Modal Form Update Misi -->
            <dialog id="modal_form_ms_up" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Update Misi Desa</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" enctype="multipart/form-data" id="form_up_misi" action="{{ route('admin.profil-desa.misi.update') }}">
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
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.25 7.875H10.625V2.25C10.625 1.629 10.121 1.125 9.5 1.125C8.879 1.125 8.375 1.629 8.375 2.25V7.875H2.75C2.129 7.875 1.625 8.379 1.625 9C1.625 9.621 2.129 10.125 2.75 10.125H8.375V15.75C8.375 16.371 8.879 16.875 9.5 16.875C10.121 16.875 10.625 16.371 10.625 15.75V10.125H16.25C16.871 10.125 17.375 9.621 17.375 9C17.375 8.379 16.871 7.875 16.25 7.875Z" fill="white"/>
                    </svg>
                    Tambahkan
                </button>
            </div>

            <!-- Show Modal Form Tambah Misi -->
            <dialog id="modal_form_ms" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Tambah Misi Desa</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" action="{{ route('admin.profil-desa.misi.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control gap-6">
                            <div class="form-control gap-4">
                                <label for="penjelasan" class="label-text font-semibold">Penjelasan Misi</label>
                                <textarea name="isi_poin" id="penjelasan"
                                    class="input input-bordered w-full py-4 h-36 disabled:bg-slate-200"></textarea>
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

            <!-- Show Modal Form Update Sejarah Desa -->
            <dialog id="modal_form_sd" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Formulir Update Sejarah Desa</h3>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                    <form method="POST" action="{{ route('admin.profil-desa.sejarah.update') }}" enctype="multipart/form-data">
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
