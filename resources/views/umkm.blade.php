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
        <!-- profil umkm-->
        <div id="profilumkm"></div>
        <div class="bg-blue-600 text-white w-full py-32 px-10">
            <div class="text-3xl font-semibold">UMKM Desa Papungan</div>
            <div class="text-sm font-normal">Home / UMKM</div>
        </div>
    </div>

    <div class=" px-5 md:px-10 mt-10">
        <div class="container items-center mx-auto space-y-10 text-justify">
            <x-headerArtikel subJudul="Kenali UMKM " judul="Profil UMKM Desa Papungan" />
            <div class="text-sm font-normal ">Berikut adalah video singkat mengenai UMKM di Desa Papungan. Simak video
                berikut untuk mengetahui bagaimana masyarakat Desa Papungan mengembangkan potensi usaha mereka!/div>

                <x-cardSubjudul jenisJudul="Kenali UMKM" judul="Peta Digital UMKM Desa Papungan"
                    deskripsi="Berikut adalah Peta UMKM dari Desa Papungan. Simak informasi berikut untuk mengetahui lokasi dan jenis usaha yang ada di desa  kita, serta bagaimana UMKM ini berkontribusi dalam perekonomian lokal!" />

            </div>

        <!-- peta umkm-->
        <div id="peta"></div>
        <div class="my-5 mb-5">
            <iframe src="/peta-umkm" title="" class="w-full h-screen md:h-96 py-20 md:p-0"
                id="petaumkm"></iframe>
        </div>


            <!-- peta umkm-->
            <div id="petaumkm"></div>



        <!-- daftar umkm-->
        <div id="daftarumkm"></div>


            <!-- Search -->
            <form action="{{ route('umkm.index') }}" method="GET">
                <div class="flex items-center space-x-2 md:w-1/2 lg:w-1/4 hover:border-gray-400">
                    <label class="input input-bordered flex items-center gap-2 border-gray-400 bg-white">
                        <input name="nama" type="search" class="grow" placeholder="Search" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path fill-rule="evenodd"
                                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </label>

                    <div>
                        <select name="jenis" id="jenis" class=" h-12 w-auto px-2 rounded-lg">
                            <option disabled selected>Jenis UMKM</option>
                            @foreach ($data->data->list as $item)
                                <option value="{{$item->jenis}}">{{ $item->jenis }}</option>
                            @endforeach
                            <option value="">-</option>
                        </select>
                    </div>
                    </details>

                    <button type="submit" class="btn bg-secondary text-lightText hover:bg-blue-800">Search</button>
                </div>
            </form>









            <!-- Tabel umkm -->
            <x-table.table :headers="['Nama UMKM', 'Jenis Produk', 'Alamat', 'Ijin Label', 'Detail UMKM']" jenisTabel="Daftar UMKM">
                @php
                    $i = 1 + ($paginatedItems->currentPage() - 1) * $paginatedItems->perPage();
                @endphp
                @foreach ($paginatedItems as $umkm)
                    <tr class="border-b">
                        <td class="p-2 text-center">{{ $i++ }}</td>
                        <td class="p-2 text-left">{{ $umkm->nama }}</td>
                        <td class="p-2 text-left">
                            @php
                                $jenisCollection = collect($umkm->jenis);
                                $jenisString = $jenisCollection->pluck('jenis')->unique()->implode(', ');
                            @endphp
                            {{ $jenisString }}
                        </td>
                        <td class="p-2 text-left">{{ $umkm->alamat }}</td>
                        <td class="p-2 text-center lg:text-left ">
                            @if ($umkm->no_pirt != '-')
                                <div class="badge bg-indigo-100 text-indigo-400 font-semibold border-0 text-xs ">P-IRT
                                </div>
                            @endif
                            @if ($umkm->no_nib != '-')
                                <div class="badge bg-blue-100 text-blue-400 font-semibold border-0 text-xs ">NIB</div>
                            @endif
                            @if ($umkm->no_bpom != '-')
                                <div class="badge bg-pink-100 text-pink-400 font-semibold border-0 text-xs ">BPOM</div>
                            @endif
                            @if ($umkm->no_halal != '-')
                                <div class="badge bg-green-100 text-green-400 font-semibold border-0 text-xs ">HALAL
                                </div>
                            @endif
                        </td>
                        <td class="p-2 "><a class="btn btn-link" href="">Detail UMKM</a></td>
                    </tr>
                @endforeach
            </x-table.table>

        <!-- Pagination Links -->
        <div class="flex justify-center mt-4">
                @if ($paginatedItems->hasPages())
                    <div class="join justify-between w-full">
                        @if ($paginatedItems->onFirstPage())
                            <button class="btn rounded-lg min-w-20" disabled>Previous</button>
                        @else
                            <a href="{{ $paginatedItems->previousPageUrl() }}"
                                class="btn rounded-lg min-w-20 justify-between text-right pl-8 flex items-center relative group hover:bg-primary hover:text-white transition duration-300">
                                <img src="img/leftArrowLogo.svg" alt="leftArrowLogo"
                                    class="absolute left-2 group-hover:hidden">
                                <img src="img/leftArrowHoverLogo.svg" alt="leftArrowHoverLogo"
                                    class="absolute left-2 opacity-0 group-hover:opacity-100 transition duration-300">
                                Previous
                            </a>
                        @endif

                        <div class="flex space-x-2 justify-center flex-grow overflow-x-auto">
                            @foreach ($paginatedItems->getUrlRange(1, $paginatedItems->lastPage()) as $page => $url)
                                @if ($page <= 10 || $page >= $paginatedItems->lastPage() - 9)
                                    @if ($page == $paginatedItems->currentPage())
                                        <button
                                            class="btn btn-square bg-primary text-lightText hover:bg-primary transition duration-300 hover:text-lightText active:bg-blue-900 active:text-lightText">{{ $page }}</button>
                                    @else
                                        <a href="{{ $url }}"
                                            class="btn btn-square bg-transparent hover:bg-primary transition duration-300 hover:text-lightText active:bg-blue-900 active:text-lightText">{{ $page }}</a>
                                    @endif
                                @elseif ($page == 11 || $page == $paginatedItems->lastPage() - 10)
                                    <button
                                        class="btn btn-square bg-transparent hover:bg-primary transition duration-300 hover:text-lightText active:bg-blue-900 active:text-lightText btn-disabled">...</button>
                                @endif
                            @endforeach
                        </div>

                        @if ($paginatedItems->hasMorePages())
                            <a href="{{ $paginatedItems->nextPageUrl() }}"
                                class="btn rounded-lg min-w-20 justify-between flex items-center relative group hover:bg-primary hover:text-white transition duration-300">
                                Next
                                <img src="img/rightArrowLogo.svg" alt="rightArrowLogo"
                                    class="absolute right-2 group-hover:hidden">
                                <img src="img/rightArrowHoverLogo.svg" alt="rightArrowHoverLogo"
                                    class="absolute right-2 opacity-0 group-hover:opacity-100 transition duration-300">
                            </a>
                        @else
                            <button class="btn rounded-lg min-w-20" disabled>Next</button>
                        @endif
                    </div>
                @endif
            </div>
</div>

</body>
<x-footer />
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const detailLinks = document.querySelectorAll('.btn-link');

        detailLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior
                const umkmId = this.dataset.umkmId;
                lihatDetail(umkmId);

                scrollToElement('peta');
            });
        });
    });

    function scrollToElement(elementId, offset = 30) {
        if (window.innerWidth >= 768) {
            offset = 120;
        }
        const targetElement = document.getElementById(elementId);
        if (targetElement) {
            const elementPosition = targetElement.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - offset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    }

    function lihatDetail(id) {
        document.getElementById('petaumkm').contentWindow.clickMarker(id);
    }
</script>

</html>

