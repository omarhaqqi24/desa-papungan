<!-- resources/views/components/editable-form.blade.php -->



    <!-- Form Input TextArea Penjelasan -->
<div class="form-component">
    <label class="form-control w-full px-5 flex flex-col">
        <div class="label mb-1">
            <span class="label-text font-medium">{{$judulPenjelasan}}</span>
            <span class="label-text-alt">Top Right label</span>
        </div>
        <textarea name="{{$nameTextarea}}" id="text-area-{{ $forValue }}" placeholder="Type here" class="input input-bordered w-full h-36 text-lg resize-none disabled:opacity-50" disabled></textarea>
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
        <input name="{{$nameInputPhoto}}" id="file-input-{{ $forValue }}" type="file" class="file-input file-input-bordered w-full mb-2 disabled:opacity-50" disabled />
        <div class="flex-col justify-between w-full">
            <div class="">* file png, jpeg, dan jpg</div>
        </div>    
    </label>



    <!-- Tombol Input TextArea dan foto Penjelasan -->
    <div class="flex justify-end px-5 mt-4">
        <button id="edit-btn-{{ $forValue }}" class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded flex items-center">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                <path d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z" fill="white"/>
            </svg>
            Edit
        </button>
    </div>

    <script>
        document.getElementById('edit-btn-{{ $forValue }}').addEventListener('click', function() {
            const textarea = document.getElementById('text-area-{{ $forValue }}');
            const fileInput = document.getElementById('file-input-{{ $forValue }}');
            const button = document.getElementById('edit-btn-{{ $forValue }}');
            
            if (button.textContent.trim() === 'Edit') {
                textarea.disabled = false;
                fileInput.disabled = false;
                button.textContent = 'Save';
                button.classList.remove('bg-secondary', 'hover:bg-blue-900');
                button.classList.add('bg-green-500', 'hover:bg-green-700');
            } else {
                textarea.disabled = true;
                fileInput.disabled = true;
                button.textContent = 'Edit';
                button.classList.remove('bg-green-500', 'hover:bg-green-700');
                button.classList.add('bg-secondary', 'hover:bg-blue-900');
            }
        });
    </script>
</div>
