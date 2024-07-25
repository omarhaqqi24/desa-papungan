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

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50">
    <x-navbar />
    <div class="mt-28 space-y-20 md:px-0">
        <!-- isi disini-->

        <div class="bg-blue-600 text-lightText w-full py-32 px-10">
            <div class="text-3xl font-semibold">Informasi Seputar Desa Papungan</div>
            <div class="text-sm font-normal">Home / Profil Desa</div>
        </div>

        <div class="flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-6">
            <div class="flex-grow mx-10 space-y-6">
                <x-cardSubjudul class="max-w-sm" jenisJudul="INFORMASI" judul="PENGUMUMAN"
                    deskripsi="Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos." />

                    @foreach($pengumuman->data as $item)
                        <div class="flex flex-col justify-start items-end gap-1.5">
                            <div class="self-stretch flex flex-col justify-start items-start gap-1">
                                <div class="text-xl font-semibold font-jakarta">{{ $item->judul }}</div>
                                <div class="text-gray-700 font-normal font-jakarta">{{$item->createdAt }}</div>
                                <div class="font-normal font-jakarta">{{ $item->isi }}</div>
                            </div>
                            <div class="text-right text-[#2d68f8] mt-2">Selengkapnya</div>
                            <div class="w-full border-b-2 border-gray-400 my-2"></div>
                        </div>
                    @endforeach

                    <div class="flex min-h-screen items-center justify-center">
                        <div class="flex select-none space-x-1 text-gray-700">
                            <a href="#" class="bg-white px-4 py-2 transition duration-300 hover:bg-[#d5e1fe] hover:text-[#2d68f8] rounded-md">sebelumnya</a>
                            <a href="#" class="px-4 py-2 transition duration-300 hover:bg-[#d5e1fe] hover:text-[#2d68f8] rounded-md">1</a>
                            <a href="#" class="px-4 py-2 transition duration-300 hover:bg-[#d5e1fe] hover:text-[#2d68f8] rounded-md">2</a>
                            <a href="#" class="px-4 py-2 transition duration-300 hover:bg-[#d5e1fe] hover:text-[#2d68f8] rounded-md">3</a>
                            <span class="rounded-md px-4 py-2">...</span>
                            <a href="#" class="px-4 py-2 transition duration-300 hover:bg-[#d5e1fe] hover:text-[#2d68f8] rounded-md">10</a>
                            <a href="#" class="bg-white px-4 py-2 transition duration-300 hover:bg-[#d5e1fe] hover:text-[#2d68f8] rounded-md">selanjutnya</a>
                        </div>
                    </div>

                
                
                <x-cardSubjudul class="max-w-sm" jenisJudul="INFORMASI" judul="BERITA"
                    deskripsi="Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos." />

                @foreach($berita->data->resource as $item)
                <div class="flex flex-col justify-start items-end gap-1.5">
                    <div class="self-stretch flex flex-col justify-start items-start gap-1">
                        <div class="text-xl font-semibold font-jakarta">{{ $item->judul }}</div>
                        <div class="text-gray-700 font-normal font-jakarta">{{$item->createdAt }}</div>
                        <div class="flex flex-col lg:flex-row gap-4">
                            <img src="{{ $item->foto }}" alt="fotoberita" class="w-full lg:w-[400px] h-[300px] object-cover">
                            <div>{{ $item->isi }}
                                <div class="text-right text-[#2d68f8] mt-5">Selengkapnya</div>
                            </div>
                        </div>
                        <div class="w-full border-b-2 border-gray-400 my-2"></div>
                    </div>
                </div>
                @endforeach

            
                <div class=" space-y-4">
                    <div class="flex items-center gap-5 text-[#2d68f8]">
                        <div class="text-xl font-medium font-jakarta">FORMULIR</div>
                        <div class="border-b-2 border-blue-600 w-64"></div>
                    </div>
                    <div class="text-2xl font-semibold">Berikan Aspirasi mu!</div>
                    <div class="font-normal font-jakarta max-w-full lg:min-w-2xl">Porem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis. Ut commodo efficitur neque. Ut diam quam, semper iaculis condimentum ac, vestibulum eu nisl.</div>
                    
                    <form method="dialog" class="w-full">
                        <div class="mb-4">
                            <label for="nama" class="block text-xl font-medium font-jakarta mb-2">Nama <span class="text-gray-500 font-jakarta">(Optional)</span></label>
                                <textarea name="nama" id="nama" placeholder="Tuliskan Nama anda"class="w-full h-12 px-4 py-2 text-lg text-gray/700 border border-[#d0d5dd] rounded-md shadow-sm focus:outline-none focus:ring focus:ring-[#2d68f8] focus:border-[#2d68f8] resize-none"rows="1"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="block text-xl font-medium font-jakarta mb-2">Email <span class="text-gray-500 font-jakarta">(Optional)</span></label>
                                <textarea name="email" id="email" placeholder="Tuliskan Email anda"class="w-full h-12 px-4 py-2 text-lg text-gray/700 border border-[#d0d5dd] rounded-md shadow-sm focus:outline-none focus:ring focus:ring-[#2d68f8] focus:border-[#2d68f8] resize-none"rows="1"></textarea>
                        </div>
                        <label for="kategori" class="block text-xl font-medium font-jakarta mb-2">Kategori</label>
                        <select name="kategori" id="kategori"
                                class="w-full h-12 px-4 py-2 text-lg text-[#3d4350] border border-[#d0d5dd] rounded-md shadow-sm focus:outline-none focus:ring focus:ring-[#2d68f8] focus:border-[#2d68f8]">
                            <option value="" disabled selected>Kategori</option>
                            <option value="kategori1">Kategori 1</option>
                            <option value="kategori2">Kategori 2</option>
                            <option value="kategori3">Kategori 3</option>
                        </select>
                        <div class="mb-4">
                            <label for="nama" class="block text-xl font-medium font-jakarta mb-2">Judul</label>
                                <textarea name="judul" id="judul" placeholder="Tuliskan Judul"class="w-full h-12 px-4 py-2 text-lg text-gray-700 border border-[#d0d5dd] rounded-md shadow-sm focus:outline-none focus:ring focus:ring-[#2d68f8] focus:border-[#2d68f8] resize-none"rows="1"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="block text-xl font-medium font-jakarta mb-2">Isi</label>
                                <textarea name="isi" id="isi" placeholder="Tuliskan Isi"class="w-full h-32 px-4 py-2 text-lg text-gray-700 border border-[#d0d5dd] rounded-md shadow-sm focus:outline-none focus:ring focus:ring-[#2d68f8] focus:border-[#2d68f8] resize-none"rows="1"></textarea>
                        </div>
                        
                        <label for="foto" class="block text-xl font-medium font-jakarta mb-2">Foto</label>
                            <input type="file" name="foto" id="foto"class="w-full text-gray/700 border border-[#d0d5dd] rounded-md shadow-sm focus:outline-none focus:ring focus:ring-[#2d68f8] focus:border-[#2d68f8]">
                                <p class="text-gray-700 text-sm mt-1">* file png atau jpg</p>
                        </label>

                        <div class="flex justify-end mt-4 rounded-[32px]">
                            <button type="submit"
                                    class="px-6 py-2 bg-[#2d68f8] text-white text-lg font-medium font-jakarta rounded-md shadow-md hover:bg-[#1a4ebb] focus:outline-none focus:ring-2 focus:ring-[#2d68f8] focus:ring-opacity-50">
                                Kirim
                            </button>
                        </div>
                    </form>

                </div>

            </div>

            <div class="hidden md:block text-xl font-semibold font-jakarta py-8 pr-8 max-h-96">
                Lihat Informasi
                <div class="w-full border-b-2 border-gray-400 my-2"></div>
                <div class="bg-white rounded-lg shadow border border-[#e0e2e7] flex flex-col space-y-2 w-full md:w-64"> 
                    <div class="p-2 flex flex-col">
                        <div class="px-2 text-xl font-medium w-full font-jakarta">Pengumuman
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
</body>

</body>
<x-footer />

</html>
