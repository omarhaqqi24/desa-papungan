<div>
    <!--NAVBAR TOP START-->
    <nav class="w-screen text-lightText flex flex-col fixed bg-base-100 top-0 z-50 shadow-md">
        <div class="w-screen bg-primary flex">
            <div class="container flex mx-auto justify-between py-2 text-center items-center">
                <div class="flex gap-2 px-4">
                    <div class="p-1 justify-start items-center gap-2 flex border-r-2 border-base-100">
                        <img src="img/phoneLogo.svg" alt="phoneLogo" class="w-4 h-4 relative ">
                        <div class="px-2 text-xs font-medium font-jakarta ">(0342) 814031</div>
                    </div>

                    <div class="p-1 justify-start items-center gap-2 flex ">
                        <img src="img/emailLogo.svg" alt="phoneLogo" class="w-4 h-4 relative ">
                        <div class="px-2 text-xs font-medium font-jakarta ">desapapungan@gmail.com</div>
                    </div>
                </div>

                <div class="px-2 text-xs font-medium font-jakarta hidden md:block">Kabupaten Blitar</div>
            </div>

        </div>

        <!--NAVBAR TOP END-->

        <!--NAVBAR BELLOW START-->
        <div class=" pl-4 w-screen flex shadow-lg text-black">
            <div class="container flex mx-auto justify-between py-2 text-center items-center">
                <div class="flex gap-2 text-left">
                    <img src="img/logokab.png" alt="papunganLogo" class="w-14 h-14">
                    <div class="flex flex-col items-start">
                        <div class="text-2xl font-semibold font-jakarta">
                            Papungan
                        </div>
                        <div
                            class="text-xs font-medium font-jakarta whitespace-nowrap overflow-hidden text-ellipsis inline-block">
                            Portal Resmi Desa Papungan
                        </div>
                    </div>

                </div>

                <button id="mobile-menu-button"
                    class="w-10 h-10 relative bg-primary rounded-lg p-2 flex flex-col justify-between mr-5 hover:opacity-70 transition duration-300 lg:hidden">
                    <img src="img/hamburgerLogo.svg" class="w-6 h-6"> 
                </button>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="navbar-menu fixed  hidden z-40 lg:hidden">
                    <div id="close-mobile-menu-outside" class="fixed inset-0 bg-gray-800 opacity-40"></div>
                    <div
                        class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-base-100 border-r overflow-y-auto">
                        <div class="flex items-center mb-8">
                            <div class="text-3xl font-semibold">Menu</div>
                            <a class="mr-auto text-3xl font-bold leading-none" href="#">
                                <svg class="h-12" alt="logo" viewBox="0 0 10240 10240">
                                </svg>
                            </a>

                            <button id="close-mobile-menu" class="navbar-close">
                                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div>
                            <ul class="menu rounded-box w-56 mx-auto">
                                <div class="menu-title font-semibold mr-auto">Profil Desa</div>
                                <li>
                                    <ul>
                                        <li><a class="hover:bg-accent">Tentang Kami</a></li>
                                        <li><a class="hover:bg-accent">Visi dan Misi</a></li>
                                        <li><a class="hover:bg-accent">Sejarah</a></li>
                                    </ul>
                                </li>
                                <div class="menu-title font-semibold mr-auto">Pemerintahan</div>
                                <li>
                                    <ul>
                                        <li><a class="hover:bg-accent">Struktural</a></li>
                                        <li><a class="hover:bg-accent">Perangkat Desa</a></li>
                                        <li><a class="hover:bg-accent">Lembaga Desa</a></li>
                                    </ul>
                                </li>
                                <div class="menu-title font-semibold mr-auto">Informasi</div>
                                <li>
                                    <ul>
                                        <li><a class="hover:bg-accent">Berita</a></li>
                                        <li><a class="hover:bg-accent">Pengumuman</a></li>
                                        <li><a class="hover:bg-accent">Aspirasi</a></li>
                                    </ul>
                                </li>
                                <div class="menu-title font-semibold mr-auto">UMKM Desa</div>
                                <li>
                                    <ul>
                                        <li><a class="hover:bg-accent">Profil UMKM dan IKKM</a></li>
                                        <li><a class="hover:bg-accent">Peta UMKM</a></li>
                                        <li><a class="hover:bg-accent">Daftar UMKM</a></li>
                                    </ul>
                                </li>
                                <div class="menu-title font-semibold mr-auto">Pariwisata Desa</div>
                                <li>
                                    <ul>
                                        <li><a class="hover:bg-accent">Profil Pariwisata</a></li>
                                        <li><a class="hover:bg-accent">Sejarah</a></li>
                                        <li><a class="hover:bg-accent">Lokasi</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="flex-none hidden lg:block">
                    <ul class="menu menu-horizontal text-base lg:space-x-6">

                        <!--PROFIL DESA START-->
                        <li>
                            <details>
                                <summary class="hover:text-primary">Profil Desa</summary>
                                <ul class="bg-base-100 rounded-t-none p-2 self-stretch">
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700"><a>Tentang
                                            Kami</a></li>
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700"><a>Visi
                                            dan
                                            Misi</a></li>
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700">
                                        <a>Sejarah</a>
                                    </li>
                                </ul>

                            </details>
                        </li>
                        <!--PROFIL DESA END-->

                        <!--PEMERINTAH START-->
                        <li>
                            <details>
                                <summary class="hover:text-primary">Pemerintahan</summary>
                                <ul class="bg-base-100 rounded-t-none p-2 self-stretch">
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700">
                                        <a>Struktural</a>
                                    </li>
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700">
                                        <a>Perangkat
                                            Desa</a>
                                    </li>
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700"><a>Lembaga
                                            Desa</a></li>
                                </ul>
                            </details>
                        </li>
                        <!--PEMERINTAH END-->

                        <!--Informasi START-->
                        <li>
                            <details>
                                <summary class="hover:text-primary">Informasi</summary>
                                <ul class="bg-base-100 rounded-t-none p-2 self-stretch">
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700">
                                        <a>Berita</a>
                                    </li>
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700">
                                        <a>Pengumuman</a>
                                    </li>
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700">
                                        <a>Aspirasi</a>
                                    </li>
                                </ul>
                            </details>
                        </li>
                        <!--Informasi END-->

                        <!--UMKM Desa START-->
                        <li>
                            <details>
                                <summary class="hover:text-primary ">UMKM Desa</summary>
                                <ul class="bg-base-100 rounded-t-none p-2 self-stretch text-xs ">
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700"><a>Profil
                                            UMKM dan
                                            IKKM</a></li>
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700"><a>Peta
                                            UMKM</a>
                                    </li>
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700"><a>Daftar
                                            UMKM</a>
                                    </li>
                                </ul>
                            </details>
                        </li>
                        <!--UMKM Desa END-->

                        <!--Pariwisata Desa START-->
                        <li>
                            <details>
                                <summary class="hover:text-primary">Pariwisata Desa</summary>
                                <ul class="bg-base-100 rounded-t-none p-2 self-stretch">
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700"><a>Profil
                                            Pariwisata</a></li>
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700">
                                        <a>Sejarah</a>
                                    </li>
                                    <li class=" rounded-md hover:bg-accent hover:text-gray-700">
                                        <a>Lokasi</a>
                                    </li>
                                </ul>
                            </details>
                        </li>
                        <!--Pariwisata Desa END-->

                    </ul>
                </div>

    </nav>
    <!--NAVBAR BELLOW END-->
    <script>
        document.querySelectorAll('details').forEach((detail) => {
            detail.addEventListener('toggle', function() {
                if (this.open) {
                    document.querySelectorAll('details').forEach((otherDetail) => {
                        if (otherDetail !== detail) {
                            otherDetail.removeAttribute('open');
                        }
                    });
                }
            });
        });

        // JavaScript to toggle the mobile menu
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMobileMenuButton = document.getElementById('close-mobile-menu');
        const closeMobileMenuOutsideButton = document.getElementById('close-mobile-menu-outside');

        // Show mobile menu when the button is clicked
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Close the mobile menu when the close button is clicked
        closeMobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
        });

        closeMobileMenuOutsideButton.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
        });
    </script>
</div>

