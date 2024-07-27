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
                berikut untuk mengetahui bagaimana masyarakat Desa Papungan mengembangkan potensi usaha mereka!</div>

            <x-cardSubjudul jenisJudul="Kenali UMKM" judul="Peta Digital UMKM Desa Papungan"
                deskripsi="Berikut adalah Peta UMKM dari Desa Papungan. Simak informasi berikut untuk mengetahui lokasi dan jenis usaha yang ada di desa  kita, serta bagaimana UMKM ini berkontribusi dalam perekonomian lokal!" />

        </div>

        <!-- peta umkm-->
        <div id="peta"></div>
        <div class="my-5 mb-5">
            <iframe src="/peta-umkm" title="" class="w-full h-screen md:h-96 py-20 md:p-0"
                id="petaumkm"></iframe>
        </div>

        <!-- daftar umkm-->
        <div id="daftarumkm"></div>

        <x-table.table :headers="['Nama UMKM', 'Jenis Produk', 'Alamat', 'Ijin Label', 'Detail UMKM']" jenisTabel="Daftar UMKM">
            @php
                $i = 1;
            @endphp
            @foreach ($data->data->resource as $umkm)
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
                    <td class="p-2 "> <a class="btn btn-link" href="#peta" data-umkm-id="{{ $umkm->id }}">Detail
                            UMKM</a>
                    </td>

                </tr>
            @endforeach
        </x-table.table>

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

