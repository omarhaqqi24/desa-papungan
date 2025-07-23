<div class="carousel w-full h-[260px] md:h-[614.25px]">
  @php $count = 1; @endphp
  @foreach ($fotos as $foto)
  <div id="slide{{ $count }}" class="carousel-item relative w-full">
    <img
      src="{{ $foto }}"
      class="w-full object-cover" />
    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
      <a href="#slide{{ $count - 1 <= 0 ? count($fotos) : $count - 1 }}" onclick="event.preventDefault();document.getElementById('slide{{ $count - 1 <= 0 ? count($fotos) : $count - 1 }}').scrollIntoView({ behavior: 'instant', block: 'nearest' });" class="btn btn-circle w-6 md:w-10 h-2 rounded-full">❮</a>
      <a href="#slide{{ $count + 1 > count($fotos) ? 1 : $count + 1 }}" onclick="event.preventDefault();document.getElementById('slide{{ $count - 1 <= 0 ? count($fotos) : $count - 1 }}').scrollIntoView({ behavior: 'instant', block: 'nearest' });" class="btn btn-circle w-6 md:w-10 h-2 rounded-full">❯</a>
    </div>
  </div>
  @php $count++; @endphp
  @endforeach
</div>
