<dialog id="{{ $idModal }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <h1 class="text-lg font-bold py-4">{{ $judul }}</h1>
        <hr class="h-px my-4 bg-gray-300 border-0 dark:bg-gray-700">

        <form id="form-{{ $idModal }}" method="POST" action="{{ $actionUrl }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-component w-full mx-auto">
                <label class="form-control w-full px-5 flex flex-col">
                    <div class="label mb-1">
                        <span class="label-text font-semibold">{{ $judulPenjelasan }}</span>
                    </div>
                    <textarea name="{{ $namaInputTextarea }}" id="text-area-test" placeholder="Type here"
                        class="input input-bordered w-full h-36 py-4 resize-none disabled:opacity-50 text-gray-500">{{ $valueTextarea }}</textarea>
                    <div class="flex-col justify-between w-full">
                        <p class="py-2 text-gray-500 label-text">{{ $subJudulPenjelasan }}</p>
                    </div>
                </label>

                <!-- Form Input foto  -->
                <label class="form-control w-full px-5 flex flex-col {{ $namaInputFoto ? '' : 'hidden' }}">
                    <div class="label mb-1">
                        <span class="label-text font-semibold">Foto</span>
                    </div>
                    <input name="{{ $namaInputFoto }}" id="file-input-test" type="file"
                        class="file-input file-input-bordered w-full disabled:opacity-50" value="{{ $valueFoto }}" />
                    <div class="flex-col justify-between w-full">
                        <p class="label-text py-2 text-gray-500"><span class="text-red-500">*</span> file png, jpeg, dan jpg</p>
                    </div>
                </label>

                <!-- Tombol Input TextArea dan foto Penjelasan -->
                <div class="flex justify-end px-5 mt-4 gap-2">
                    <button type="button" class="btn rounded-xl bg-red-500 text-lightText hover:bg-red-900" onclick="closeModal('{{ $idModal }}')">Close</button>
                    <button id="edit-btn-test" type="submit" class="btn rounded-xl text-lightText bg-green-500 hover:bg-green-900 hover:text-lightText px-4 py-2 flex items-center">
                        <img src="/img/saveLogo.svg" alt="">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</dialog>

<script>
    function closeModal(modalId) {
        document.getElementById(modalId).close();
    }

    function setFormMethod(modalId, method, actionUrl) {
        document.getElementById('form-method-' + modalId).value = method;
        document.getElementById('form-' + modalId).action = actionUrl;
    }

    // Example usage: setFormMethod('modalId', 'PUT', '/update-url');
</script>
