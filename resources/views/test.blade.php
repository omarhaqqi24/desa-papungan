<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

</head>

<body class="mytheme font-jakarta antialiased  dark:text-white/50">
    <div class=" w-12 h-screen bg-primary container">


        <div class="drawer">
            <input id="my-drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                <!-- Page content here -->
                <label for="my-drawer" class="btn btn-primary drawer-button p-3">
                    <img src="img/hamburgerLogo.svg" class="w-5 h-5">
                </label>
            </div>
            <div class="drawer-side flex flex-col min-h-screen">
                <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu bg-primary font-medium text-lightText w-80 p-6 pt-10 flex-grow">
                    <!-- Sidebar content here -->
                    <li class="text-lg font-semibold pt-3">DASHBOARD</li>
                    <li class="pt-3"><a>Profil Desa</a></li>
                    <li class="pt-3"><a>Pemerintahan</a></li>
                    <li class="pt-3"><a>Informasi</a></li>
                    <li class="pt-3"><a>UMKM Desa</a></li>
                    <li class="pt-3"><a>Pariwisata Desa</a></li>
                </ul>
                <div class="flex items-center  p-4 bg-primary">
                    <img src="img/logoLogoutAdmin.svg" alt="logoutButton" class="mr-2">
                    <div >Keluar</div>
                </div>
            </div>
                  
        </div>



    </div>
</body>


</html>

<!-- (bagian) Start -->
<!-- (bagian) End -->
