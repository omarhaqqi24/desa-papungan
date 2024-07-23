
    <dialog id="{{$idModal}}" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold py-4">{{ $judul }}</h3>

            <form method="dialog">
                <div class="form-component w-full mx-auto">
                    <label class="form-control w-full px-5 flex flex-col">
                        <div class="label mb-1">
                            <span class="label-text font-semibold">{{ $judulPenjelasan }}</span>
                        </div>
                        <textarea name="{{ $namaInputTextarea }}" id="text-area-test" placeholder="Type here"
                            class="input input-bordered w-full h-36 text-lg resize-none disabled:opacity-50"></textarea>
                        <div class="flex-col justify-between w-full">
                            <div class="">{{ $subJudulPenjelasan }} </div>
                        </div>
                    </label>

                    <!-- Form Input foto  -->
                    <label class="form-control w-full px-5 flex flex-col">
                        <div class="label mb-1">
                            <span class="label-text font-semibold">Foto</span>
                        </div>
                        <input name="{{ $namaInputFoto }}" id="file-input-test" type="file"
                            class="file-input file-input-bordered w-full mb-2 disabled:opacity-50" />
                        <div class="flex-col justify-between w-full">
                            <div class="">* file png, jpeg, dan jpg</div>
                        </div>
                    </label>

                    <!-- Tombol Input TextArea dan foto Penjelasan -->
                    <div class="flex justify-end px-5 mt-4">
                        <button class="btn bg-red-600 text-lightText hover:bg-red-900">Close</button>
                        <button id="edit-btn-test"
                            class="btn text-lightText bg-green-700 hover:bg-green-900  hover:text-lightText px-4 py-2 rounded flex items-center">
                            <img src="img/saveLogo.svg" alt="">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </dialog>

