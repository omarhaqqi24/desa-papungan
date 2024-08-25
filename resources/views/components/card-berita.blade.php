<div class="mt-4 hover:bg-gray-300 transition duration-200 card flex flex-col justify-start space-y-5 h-auto bg-white shadow-sm">
    <figure class="h-52">
        <img src="{{ $foto }}" alt="" class="rounded-xl h-full w-full object-cover" />
    </figure>
    <div class="card-body">
        <p class="text-black font-bold text-2xl font-jakarta line-clamp-1">{{ $judul }}</p>
        <p class="text-neutral font-medium text-xl font-jakarta">{{ $createdAt }}</p>
        <p class="text-black font-normal text-xl font-jakarta line-clamp-2">{{ $isi }}</p>
    </div>
</div>

