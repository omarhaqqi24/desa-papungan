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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('foto');
            const fileLabel = document.getElementById('file-label');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    fileLabel.textContent = fileInput.files[0].name;
                } else {
                    fileLabel.textContent = "Tidak ada file yang terunggah";
                }
            });
        });
    </script>

</head>

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50 overflow-x-hidden">
    <x-navbar />
    <div class="mt-28 space-y-20 md:px-0">
        <!-- isi disini-->


         <!-- pengumuman-->
        <div id="pengumuman"></div>
        <div class="bg-blue-600 text-lightText w-full py-32 px-10">
            <div class="text-3xl font-semibold">Informasi Seputar Desa Papungan</div>
            <div class="text-sm font-normal">Home / Profil Desa</div>
        </div>

        <div class="container mx-auto flex flex-col md:flex-row space-y-10 md:space-y-0 md:space-x-6">
            <div class="flex-grow p-10 mx-auto space-y-6">
                <x-cardSubjudul class="max-w-sm" jenisJudul="INFORMASI" judul="PENGUMUMAN"
                    deskripsi="Berikut pengumuman penting bagi seluruh warga Desa Papungan. Jangan lupa untuk selalu membaca pengumuman dan menandai kalender Anda agar tidak melewatkan informasi penting di hari-hari mendatang!" />

                @foreach($pengumuman->data as $item)
                    <div class="flex flex-col justify-start items-end gap-1.5">
                        <div class="self-stretch flex flex-col justify-start items-start gap-1">
                            <div class="text-xl font-semibold font-jakarta">{{ $item->judul }}</div>
                            <div class="text-gray-700 font-normal font-jakarta">{{ $item->createdAt }}</div>
                            <div class="font-normal font-jakarta">{{ $item->isi }}</div>
                        </div>
                        <a href="#" class="px-4 py-2"><img src="img/selengkapnya.svg" alt=""></a>
                        <div class="w-full border-b-2 border-gray-400 my-2"></div>
                    </div>
                @endforeach
                <!-- berita-->
            <div id="berita"></div>
                <x-cardSubjudul class="max-w-sm" jenisJudul="INFORMASI" judul="BERITA"
                    deskripsi="Berikut adalah Berita Terkini dari Desa Papungan. Simak informasi terbaru dan penting berikut untuk tetap terhubung dengan perkembangan desa kita!" />

                @foreach ($berita->data as $item)
                    <div class="flex flex-col justify-start items-end gap-1.5">
                        <div class="self-stretch flex flex-col justify-start items-start gap-1">
                            <div class="text-xl font-semibold font-jakarta">{{ $item->judul }}</div>
                            <div class="text-gray-700 font-normal font-jakarta">{{ $item->createdAt }}</div>
                            <div class="flex flex-col lg:flex-row gap-4">
                                <img src="{{ $item->foto }}" alt="fotoberita"
                                    class="w-full lg:w-[400px] h-[300px] object-cover">
                                <div>{{ $item->isi }}
                                    <div class="text-right text-[#2d68f8] mt-5">Selengkapnya</div>
                                </div>
                            </div>
                            <div class="w-full border-b-2 border-gray-400 my-2"></div>
                        </div>
                    </div>
                @endforeach

                    <!-- aspirasi-->
                <div id="aspirasi"></div>
                <div class=" space-y-2">
                    <div class="flex items-center gap-2 text-blue-600 w- md:w-1/2 lg:w-1/4">
                        <div class="text-xl font-medium font-jakarta">FORMULIR</div>
                        <div class="border-b-2 border-blue-600 w-full"></div>
                    </div>
                    <div class="text-2xl font-semibold">Berikan Aspirasi mu!</div>
                    <div class="font-normal font-jakarta max-w-full lg:min-w-2xl">Kami sangat ingin mendengar pendapat
                        dan saran Anda untuk membuat desa kita lebih baik. Apapun yang ingin Anda sampaikan seperti
                        saran, ide, atau masukan semuanya sangat berarti. Yuk, isi formulir di bawah ini dan mari kita
                        bersama-sama membangun desa yang lebih nyaman dan bahagia. Terima kasih banyak atas
                        partisipasinya!</div>

                    <form method="POST" class="w-full" enctype="multipart/form-data"
                        action="{{ route('informasi.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="nama" class="block text-xl font-medium font-jakarta mb-2">Nama <span
                                    class="text-gray-500 font-jakarta">(Optional)</span></label>
                            <textarea name="nama" id="nama" placeholder="Tuliskan Nama anda"
                                class="w-full h-12 px-4 py-2 font-normal text-gray/700 border border-[#d0d5dd] rounded-md shadow-sm focus:outline-none focus:ring focus:ring-[#2d68f8] focus:border-[#2d68f8] resize-none"
                                rows="1"></textarea>
                        </div>
                        <label for="kategori" class="block text-xl font-medium font-jakarta mb-2">Kategori</label>
                        <select name="kategori" id="kategori"
                            class="w-full h-12 px-4 py-2 font-normal text-[#3d4350] border border-[#d0d5dd] rounded-md shadow-sm focus:outline-none focus:ring focus:ring-[#2d68f8] focus:border-[#2d68f8]">
                            <option value="" disabled selected>Kategori</option>
                            <option value="Berita">Berita</option>
                            <option value="Pengumuman">Pengumuman</option>
                            <option value="Aspirasi">Aspirasi</option>
                        </select>
                        <div class="mb-4 mt-4">
                            <label for="judul" class="block text-xl font-medium font-jakarta mb-2">Judul</label>
                            <textarea name="judul" id="judul" placeholder="Tuliskan Judul"
                                class="w-full h-12 px-4 py-2 font-normal text-gray-700 border border-[#d0d5dd] rounded-md shadow-sm focus:outline-none focus:ring focus:ring-[#2d68f8] focus:border-[#2d68f8] resize-none"
                                rows="1"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="isi" class="block text-xl font-medium font-jakarta mb-2">Isi</label>
                            <textarea name="isi" id="isi" placeholder="Tuliskan Isi"
                                class="w-full h-32 px-4 py-2 font-normal text-gray-700 border border-[#d0d5dd] rounded-md shadow-sm focus:outline-none focus:ring focus:ring-[#2d68f8] focus:border-[#2d68f8] resize-none"
                                rows="1"></textarea>
                        </div>

                        <label for="foto" class="block text-xl font-medium font-jakarta mb-2">Foto</label>
                        <div class="flex items-center border border-[#d0d5dd] rounded-md px-4 py-2">
                            <p id="file-label" class="text-gray-700 flex-grow">Tidak ada file yang terunggah</p>
                            <label for="foto"
                                class="bg-blue-600 text-white flex items-center gap-2 px-4 py-2 rounded-md cursor-pointer">
                                <img src="img/unggah.svg" alt="Unggah" class="w-5 h-5">
                                Unggah File
                            </label>
                            <input type="file" name="foto" id="foto" class="hidden">
                        </div>
                        <p class="text-gray-700 text-sm mt-1">* file png atau jpg</p>

                        <div class="flex justify-end mt-4 rounded-[32px]">
                            <button type="submit"
                                class="flex items-center px-6 py-2 bg-[#2d68f8] text-white text-lg font-medium font-jakarta rounded-lg shadow-md hover:bg-[#1a4ebb] focus:outline-none focus:ring-2 focus:ring-[#2d68f8] focus:ring-opacity-50">
                                Kirim
                                <img src="img/arrow-right.svg" alt="" class="ml-2 inline-block">
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Side content -->
            <div class="basis-1/4">
                <div class="hidden md:block text-xl font-semibold font-jakarta py-8 pr-8 max-h-80 sticky top-14">
                    <div class="text-xl font-semibold font-jakarta py-8 pr-8 max-h-80">Lihat Informasi
                        <div class="w-full border-b-2 border-gray-400 my-2"></div>
                        <div class="bg-white rounded-lg shadow border border-[#e0e2e7] flex flex-col space-y-2 w-full md:w-64">
                            <div class="p-2 flex flex-col">
                                <div class="px-2 text-xl font-medium w-full font-jakarta">pengumuman
                                    <div class="w-full border-b-2 border-[#e0e2e7] my-2"></div>
                                </div>
                            </div>
                            <div class="p-2 flex flex-col">
                                <div class="px-2 text-xl font-medium w-full font-jakarta">Berita
                                    <div class="w-full border-b-2 border-[#e0e2e7] my-2"></div>
                                </div>
                            </div>
                            <div class="p-2 flex">
                                <div class="px-2 text-xl font-medium w-full font-jakarta">Aspirasi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<x-footer />

</html>
