<div class="overflow-x-auto">
    <table class="table table-zebra">
      <!-- head -->
      <thead class="bg-primary text-white text-lg">
        <tr class="border-b-2">
            <th class="px-2 py-3 text-left">No.</th>
@foreach ($headers as $header)
    <th class="px-2 py-3 text-left">{{ $header }}</th>
@endforeach
        </tr>
      </thead>
      <tbody>
        <!-- row 1 -->
        {{$slot}}

      
      </tbody>
    </table>
  </div>

</div>  