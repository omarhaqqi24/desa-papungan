{{-- resources/views/components/table/paginated-table.blade.php --}}
<div class="">
<table class="table table-zebra ">
    <!-- head -->
    <thead class="bg-white">
        <tr>
            <td class="bg-primary text-white text-lg rounded-t-lg" colspan="{{ count($headers) + 1 }}">
                {{ $jenisTabel }}
            </td>
        </tr>
        <tr class="border-b-2 md:text-lg">
            <th class="px-2 py-3 text-left">No.</th>
            @foreach ($headers as $header)
                <th class="px-2 py-3 text-left">{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody class="">
        <!-- Data Rows -->
        @foreach ($data as $index => $item)
            <tr>
                <td class="px-2 py-3 text-left">{{ $index + 1 }}</td>
                @foreach ($headers as $field)
                    <td class="px-2 py-3 text-left">
                        @if ($field === 'foto')
                            <img src="{{ $item[$field] }}" alt=" Image" class="max-w-[100px] max-h-[100px]">
                        @else
                            {{ $item[$field] }}
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Custom Pagination -->
<div class="flex justify-center mt-4">
    @if ($data->hasPages())
        <div class="join justify-between w-full">
            @if ($data->onFirstPage())
                <button class="btn rounded-lg min-w-20 " disabled>Previous</button>
            @else
                <a href="{{ $data->previousPageUrl() }}" class="btn rounded-lg min-w-20 justify-between text-right pl-8 flex items-center relative group hover:bg-primary hover:text-white transition duration-300">
                    <img src="img/leftArrowLogo.svg" alt="leftArrowLogo" class="absolute left-2 group-hover:hidden  ">
        <img src="img/leftArrowHoverLogo.svg" alt="leftArrowHoverLogo" class="absolute left-2 opacity-0 group-hover:opacity-100 transition duration-300">
        Previous
                </a>
            @endif

            <div class="flex space-x-2 justify-center flex-grow overflow-x-auto">
                @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                @if ($page <= 10 || $page >= $data->lastPage() - 9)
                    @if ($page == $data->currentPage())
                        <button class="btn btn-square bg-primary text-lightText hover:bg-primary transition duration-300 hover:text-lightText active:bg-blue-900 active:text-lightText">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="btn btn-square bg-transparent hover:bg-primary transition duration-300 hover:text-lightText active:bg-blue-900 active:text-lightText">{{ $page }}</a>
                    @endif
                @elseif ($page == 11 || $page == $data->lastPage() - 10)
                    <button class="btn btn-square bg-transparent hover:bg-primary transition duration-300 hover:text-lightText active:bg-blue-900 active:text-lightText btn-disabled">...</button>
                @endif
            @endforeach
            </div>


            @if ($data->hasMorePages())
                <a href="{{ $data->nextPageUrl() }}" class="btn rounded-lg min-w-20 justify-between flex items-center relative group hover:bg-primary hover:text-white transition duration-300">
                    Next
                    <img src="img/rightArrowLogo.svg" alt="rightArrowLogo" class="absolute right-2 group-hover:hidden ">
                    <img src="img/rightArrowHoverLogo.svg" alt="rightArrowHoverLogo" class=" absolute right-2 opacity-0 group-hover:opacity-100 transition duration-300">
               
                </a>
            @else
                <button class="btn rounded-lg min-w-20" disabled>Next</button>
            @endif
        </div>
    @endif
</div>
</div>