<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')

</head>

<body class="mytheme font-jakarta antialiased dark:text-white/50">

    <div class="flex justify-end px-5 mt-4">
        <!-- You can open the modal using ID.showModal() method -->
        <button class="btn text-lightText bg-secondary hover:bg-blue-900 px-4 py-2 rounded flex items-center"
            onclick="mtest.showModal()">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="mr-2">
                <path
                    d="M13.375 4.625C13.875 4.125 13.875 3.375 13.375 2.875L11.125 0.625C10.625 0.125 9.875 0.125 9.375 0.625L0 10V14H4L13.375 4.625ZM10.25 1.5L12.5 3.75L10.625 5.625L8.375 3.375L10.25 1.5ZM1.25 12.75V10.5L7.5 4.25L9.75 6.5L3.5 12.75H1.25Z"
                    fill="white" />
            </svg>
            Edit
        </button>
    </div>
    <x-modalpf judul="test" idModal="mtest" judulPenjelasan="test" namaInputTextarea="test1"
        subJudulPenjelasan="test2" namaInputFoto='test3' />

    </div>
    </div>
</body>

</html>

<!-- (bagian) Start -->
<!-- (bagian) End -->
