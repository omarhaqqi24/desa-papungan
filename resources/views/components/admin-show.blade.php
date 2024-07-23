<!-- resources/views/components/editable-form.blade.php -->



    <!-- Form Input TextArea Penjelasan -->
<div class="form-component">
    <label class="form-control w-full px-5 flex flex-col">
        <div class="label mb-1">
            <span class="label-text font-medium">{{$judulPenjelasan}}</span>
            <span class="label-text-alt">Top Right label</span>
        </div>
        <textarea name="{{$nameTextarea}}" id="text-area-{{ $forValue }}" placeholder="Type here" class="input input-bordered w-full h-36 text-lg resize-none disabled:opacity-50" disabled >{{ $valueTextarea}}</textarea>
        <div class="flex-col justify-between w-full">
            <div class="">{{ $subPenjelasan }}</div>
        </div>    
    </label>



    <!-- Form Input foto  -->
    <label class="form-control w-full px-5 flex flex-col">
        <div class="label mb-1">
            <span class="label-text font-medium">Foto</span>
            <span class="label-text-alt">Top Right label</span>
        </div>
        <input name="{{$nameInputPhoto}}" id="file-input-{{ $forValue }}" type="file" class="file-input file-input-bordered w-full mb-2 disabled:opacity-50" value="{{$valueFoto}}" disabled />
        <div class="flex-col justify-between w-full">
            <div class="">* file png, jpeg, dan jpg</div>
        </div>    
    </label>



    
</div>
