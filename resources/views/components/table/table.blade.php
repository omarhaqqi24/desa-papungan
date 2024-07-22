<div class="overflow-x-auto">
  <table class="table table-zebra">
    <!-- head -->
    <thead class="bg-white">
      <tr>
        <td class="bg-primary text-white text-lg rounded-t-lg" colspan="{{ count($headers) + 1 }}">{{ $jenisTabel }}</td>
      </tr>
      <tr class="border-b-2 md:text-lg">
          <th class="px-2 py-3 text-left ">No.</th>
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
