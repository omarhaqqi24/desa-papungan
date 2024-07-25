<!-- resources/views/components/editable-form.blade.php -->

    <!-- Form Input TextArea Penjelasan -->
<div class="form-component">
    <label class="form-control w-full flex flex-col">
        <div class="label mb-1">
            <span class="label-text font-semibold">{{$judulPenjelasan}}</span>
            <span class="label-text-alt font-medium">Top Right label</span>
        </div>
        <textarea name="{{$nameTextarea}}" id="text-area-{{ $forValue }}" placeholder="Type here" class="input input-bordered w-full h-36 text-lg resize-none disabled:opacity-80 mb-2 py-4 disabled:border disabled:border-gray-300 disabled:bg-slate-100" disabled >{{ $valueTextarea}}</textarea>
        <div class="flex-col justify-between w-full">
            <p class="label-text font-medium text-gray-500">{{ $subPenjelasan }}</p>
        </div>    
    </label>

    <!-- Form Input foto  -->
    <label class="form-control w-full flex flex-col mt-6 {{ $nameInputPhoto ? '' : 'hidden' }}">
        <div class="label mb-1">
            <span class="label-text font-semibold">Foto</span>
            <span class="label-text-alt">Top Right label</span>
        </div>
        <input name="{{$nameInputPhoto}}" id="file-input-{{ $forValue }}" type="file" class="file-input file-input-bordered w-full mb-2 disabled:opacity-80 disabled:border disabled:border-gray-300 disabled:bg-slate-100" value="{{$valueFoto}}" disabled />
        <div class="flex-col justify-between w-full">
            <p class="label-text font-medium text-gray-500"><span class="text-red-500">*</span> file png, jpeg, dan jpg</p>
        </div>    
    </label>
    
</div>
