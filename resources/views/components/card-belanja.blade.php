<div class="h-[416px] w-[360px] rounded-2xl my-8 bg-white shadow-md overflow-hidden">
    <img src="{{ asset('/img/produk/'.$item->image) }}" alt="" class="h-1/2 w-full object-cover scale-[1.3] z-30 relative">
    <div class="p-4 flex-1 flex flex-col rounded-xl z-40 bg-[#F0F5fe] h-1/2 relative border-2 border-[#D5E1FE]">
        <h3 class="text-xl text-gray-900 mb-1 font-bold">{{ $item->nama_produk }}</h3>
        <p class="text-gray-500 mb-2 line-clamp-2 flex items-center text-xs font-medium font-inter">
            <img src="{{  asset('/img/icon-toko.png')  }}" alt="" class="inline mr-2">
            {{ $item->umkm->nama ?? 'UMKM tidak ditemukan' }}
        </p>
        <div class="text-[#2453C6] font-bold font-jakarta text-base mb-1">
            {{ $item->harga }}
        </div>
        <div class="w-[316px] h-10 text-sm overflow-hidden text-[#858D9D]">
            {{  $item->umkm->deskripsi  }}
        </div>
        <div class="mt-auto absolute bottom-0 right-0">
            <a href="#" class="inline-block mt-2 px-4 py-2 bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-tl-2xl rounded-br-xl hover:bg-blue-700 text-base font-semibold">
                Lihat Detail
            </a>
        </div>
        <div class="absolute bottom-4 left-0 w-[180px] flex gap-1 pl-4">
            @if($item->umkm->no_nib!="-")
                <span class="inline-block px-4 py-1 text-[#9785FE] bg-[#DDD7FF] rounded-full text-xs mr-0.5">NIB</span>
            @endif
            @if($item->umkm->no_halal!="-")
                <span class="inline-block px-4 py-1 text-[#54B17D] bg-[#BFF5D7] rounded-full text-xs mr-0.5">HALAL</span>
            @endif
            @if($item->no_pirt!="-")
                <span class="inline-block px-4 py-1 text-[#5786F9] bg-[#D5E1FE] rounded-full text-xs mr-0.5">PIRT</span>
            @endif
        </div>
    </div>
</div>