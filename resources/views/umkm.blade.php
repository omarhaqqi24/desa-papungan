<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') . ' | UMKM Desa' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
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

    <div class=" px-5 md:px-10 mt-10 space-y-5 md:space-y-10">
        <div class="container items-center mx-auto space-y-10 text-justify">
            <x-headerArtikel subJudul="Kenali UMKM " judul="Profil UMKM Desa Papungan" />
            <div class="text-sm font-normal ">Berikut adalah video singkat mengenai UMKM di Desa Papungan. Simak video
                berikut untuk mengetahui bagaimana masyarakat Desa Papungan mengembangkan potensi usaha mereka!</div>

            {{-- Video --}}
            <iframe width="560" height="315" src="{{ $videoUmkm->data->penjelasan }}" title="YouTube video player"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                class="mx-auto w-full md:w-[560px] aspect-video rounded-lg "></iframe>

            <x-cardSubjudul jenisJudul="Kenali UMKM" judul="Peta Digital UMKM Desa Papungan"
                deskripsi="Berikut adalah Peta UMKM dari Desa Papungan. Simak informasi berikut untuk mengetahui lokasi dan jenis usaha yang ada di desa  kita, serta bagaimana UMKM ini berkontribusi dalam perekonomian lokal!" />

        </div>

        <!-- peta umkm-->
        <div id="peta"></div>
        <div class="my-5 mb-5">
            <iframe src="/peta-umkm" title="" class="w-full h-screen md:h-[490px] py-20 md:p-0 px-5 md:px-0"
                id="petaumkm"></iframe>
        </div>

        <!-- peta umkm-->
        <div id="petaumkm"></div>

        <!-- daftar umkm-->
        <div id="daftarumkm"></div>

        <!-- Search -->
        <form action="{{ route('umkm.index') }}" method="GET">
            <div
                class="flex flex-wrap md:flex-nowrap space-y-2 md:space-y-0 items-center space-x-2 md:w-1/2 lg:w-1/4 hover:border-gray-400">
                <label class="input input-bordered flex items-center gap-2 border-gray-400 bg-white">
                    <input name="nama" type="search" class="grow" placeholder="Search" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>
                <button type="submit" class="btn bg-secondary text-lightText hover:bg-blue-800">Search</button>
            </div>
        </form>

        <!-- Tabel umkm -->
        <div class=" md:hidden">
            <x-table.table :headers="['Nama UMKM', 'Detail UMKM']" jenisTabel="Daftar UMKM">
                @php
                $i = 1 + ($paginatedItems->currentPage() - 1) * $paginatedItems->perPage();
                @endphp
                @foreach ($paginatedItems as $umkm)
                <tr class="border-b">
                    <td class="p-2 text-center">{{ $i++ }}</td>
                    <td class="p-2 text-left">{{ $umkm->nama }}</td>


                    <td class="p-2 "> <a class="btn btn-link" href="#petaumkm"
                            data-umkm-id="{{ $umkm->id }}">Detail UMKM</a></td>
                </tr>
                @endforeach
            </x-table.table>
        </div>

        <div class="hidden md:block">
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
                        @if ($umkm->no_nib != '-')
                        <div class="badge bg-blue-100 text-blue-400 font-semibold border-0 text-xs ">NIB</div>
                        @endif
                        @if ($umkm->no_bpom != '-')
                        <div class="badge bg-pink-100 text-pink-400 font-semibold border-0 text-xs ">BPOM</div>
                        @endif
                    </td>
                    <td class="p-2 "> <a class="btn btn-link" href="#petaumkm"
                            data-umkm-id="{{ $umkm->id }}">Detail UMKM</a></td>
                </tr>
                @endforeach
            </x-table.table>
        </div>

        <!-- Pagination Links -->
        <section class="px-4 py-6 bg-white border-t">
            @if ($paginatedItems->hasPages())
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 w-full">
                {{-- Tombol Sebelumnya --}}
                @if ($paginatedItems->onFirstPage())
                <button disabled
                    class="flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-900 text-xs font-bold uppercase rounded-lg hover:bg-gray-100 disabled:opacity-50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    <span class="hidden sm:block">Sebelumnya</span>
                </button>
                @else
                <a href="{{ $paginatedItems->previousPageUrl() }}#daftarumkm"
                    class="flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-900 text-xs font-bold uppercase rounded-lg hover:bg-gray-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    <span class="hidden sm:block">Sebelumnya</span>
                </a>
                @endif

                {{-- Nomor Halaman --}}
                <div class="flex flex-wrap justify-center gap-2">
                    @foreach ($paginatedItems->getUrlRange(1, $paginatedItems->lastPage()) as $page => $url)
                    @if ($page == $paginatedItems->currentPage())
                    <button
                        class="w-10 h-10 rounded-lg bg-blue-500 text-white text-sm font-semibold flex items-center justify-center">
                        {{ $page }}
                    </button>
                    @else
                    <a href="{{ $url }}#daftarumkm"
                        class="w-10 h-10 rounded-lg text-gray-900 text-sm font-medium flex items-center justify-center hover:bg-gray-200">
                        {{ $page }}
                    </a>
                    @endif
                    @endforeach
                </div>

                {{-- Tombol Berikutnya --}}
                @if ($paginatedItems->hasMorePages())
                <a href="{{ $paginatedItems->nextPageUrl() }}#daftarumkm"
                    class="flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-900 text-xs font-bold uppercase rounded-lg hover:bg-gray-100">
                    <span class="hidden sm:block">Berikutnya</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
                @else
                <button disabled
                    class="flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-900 text-xs font-bold uppercase rounded-lg hover:bg-gray-100 disabled:opacity-50">
                    <span class="hidden sm:block">Berikutnya</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </button>
                @endif
            </div>
            @endif
        </section>

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

    function scrollToElement(elementId, offset = 60) {
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