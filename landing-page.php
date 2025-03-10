<?php
require_once dirname(__FILE__) . "/include/L-Page.php";
$konten = new LPage();
$isi = $konten->ShowL();
// var_dump($isi);
$tim = $konten->getAllTeam();
// var_dump($tim);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>landing page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-cyan-950">
    <!-- layouting -->
    <div class="absolute w-full ">
        <!-- <video width="320" height="240" autoplay>
            <source src=".mp4" type="video/mp4">
        </video> -->
        <video class="absolute object-cover object-center -z-10 rounded-lg h-screen w-full" autoplay>
            <source src="aset/bg-vid.mp4" type="video/mp4">
            <!-- tidak support video -->
        </video>
        <div class="relative h-screen " style="background-color: rgba(0, 0, 0, 0.5);"></div>
    </div>

    <!-- nav-bar -->
    <nav class="relative z-10 sticky top-0 backdrop-filter shadow-lg">
        <div class="mx-auto max-w-7xl">
            <div class="relative flex h-[100px] items-center justify-between ">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex align-center flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-[70px] w-auto sm:mr-20" src="aset/bg rm.png" alt="Your Company">
                    </div>
                    <div class="hidden sm:ml-96 sm:block mt-4">
                        <div class="flex space-x-10 ">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="landing-page.html"
                                class="text-cyan-600 border-cyan-600 border-b-2 px-3 py-2 text-md font-semibold"
                                aria-current="page">Beranda</a>
                            <div class="relative">
                                <a href="#"><button id="artikelDropdown"
                                        class="text-white hover:border-b-2 px-3 py-2 text-md font-semibold"
                                        aria-haspopup="true">
                                        Artikel
                                    </button></a>
                                <div id="dropdownMenu"
                                    class="absolute hidden bg-gray-900 text-white py-2 mt-2 rounded-md shadow-lg">
                                    <!-- Konten Dropdown Akan Ditambahkan Disini -->
                                </div>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const artikelDropdown = document.getElementById('artikelDropdown');
                                    const dropdownMenu = document.getElementById('dropdownMenu');
                                    let timeoutId;

                                    artikelDropdown.addEventListener('mouseenter', function () {
                                        timeoutId = setTimeout(function () {
                                            if (dropdownMenu.innerHTML === '') {
                                                const edukasiButton = document.createElement('a');
                                                edukasiButton.href = 'edukasi-before.php'; // Ganti dengan halaman edukasi yang sesuai
                                                edukasiButton.textContent = 'Edukasi';
                                                edukasiButton.classList.add('block', 'px-4', 'py-2', 'hover:bg-gray-700');

                                                const beritaButton = document.createElement('a');
                                                beritaButton.href = 'berita-before.php'; // Ganti dengan halaman berita yang sesuai
                                                beritaButton.textContent = 'Berita';
                                                beritaButton.classList.add('block', 'px-4', 'py-2', 'hover:bg-gray-700');

                                                dropdownMenu.appendChild(edukasiButton);
                                                dropdownMenu.appendChild(beritaButton);
                                            }

                                            dropdownMenu.classList.remove('hidden');
                                        }, 1000); // Waktu tunda dalam milidetik (100ms)
                                    });

                                    artikelDropdown.addEventListener('mouseleave', function () {
                                        clearTimeout(timeoutId);
                                        setTimeout(function () {
                                            if (!dropdownMenu.matches(':hover')) {
                                                dropdownMenu.classList.add('hidden');
                                                dropdownMenu.innerHTML = '';
                                            }
                                        }, 1000);
                                    });

                                    dropdownMenu.addEventListener('mouseenter', function () {
                                        clearTimeout(timeoutId);
                                    });

                                    dropdownMenu.addEventListener('mouseleave', function () {
                                        setTimeout(function () {
                                            if (!artikelDropdown.matches(':hover')) {
                                                dropdownMenu.classList.add('hidden');
                                                dropdownMenu.innerHTML = '';
                                            }
                                        }, 1000);
                                    });

                                    // Close dropdown when clicking outside or on Edukasi/Berita buttons
                                    document.addEventListener('click', function (event) {
                                        if (!artikelDropdown.contains(event.target) &&
                                            event.target.href !== window.location.href + 'edukasi-before.php' &&
                                            event.target.href !== window.location.href + 'berita-before.php') {
                                            dropdownMenu.classList.add('hidden');
                                            dropdownMenu.innerHTML = '';
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto ml-6 sm:pr-0">
                    <a class="bg-cyan-700 text-md font-medium px-3 py-2 rounded-md text-white hover:bg-cyan-600 focus:ring-2 focus:ring-cyan-500"
                        href="login.php">Login</a>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto ml-6 sm:pr-0">
                    <a class="bg-cyan-700 text-md font-medium px-3 py-2 rounded-md text-white hover:bg-cyan-600 focus:ring-2 focus:ring-cyan-500"
                        href="regist.php">Daftar</a>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                    aria-current="page">Beranda</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Artikel</a>
            </div>
        </div>
    </nav>
    <!-- end of nav-bar -->

    <div class="flex relative mx-auto justify-center items-center max-w-7xl h-fit px-6 py-2 lg:py-24 lg:px-8 lg:mt-20">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-4xl text-center font-bold text-white sm:text-6xl animate__animated animate__fadeInDown">
                <?= $isi->title ?>
            </h2>
            <p class="my-6 text-lg leading-8 text-gray-100 text-justify animate__animated animate__fadeInDown">
                <?= $isi->deskripsi ?>
            </p>
            <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2">
                <svg class="h-8 w-8 text-white animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 14l-7 7m0 0l-7-7m7 7V3">
                    </path>
                </svg>
            </div>
        </div>
    </div>

    <!-- our team -->
    <div class="relative bg-cyan-950 py-14 lg:mt-[150px] sm:py-20 reveal">
        <div class="mx-auto max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3">
            <div class="max-w-2xl">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Tim Kami</h2>
            </div>
            <ul role="list" class="grid py-10 gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
                <?php foreach ($tim as $tim): ?>
                    <li>
                        <div class="flex items-center gap-x-6">
                            <img class="h-20 w-20 rounded-full" src="aset/<?= $tim->foto ?>" alt="">
                            <div>
                                <h3 class="text-base font-semibold leading-7 tracking-tight text-white">
                                    <?= $tim->nama ?>
                                </h3>
                                <p class="text-sm font-semibold leading-6 text-cyan-300">
                                    <?= $tim->nim ?>
                                </p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- footer -->
    <footer class="p-20 bg-gray-900">
        <div class="mx-auto max-w-screen-xl">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="#" class="flex items-center">
                        <img src="aset/bg rm.png" class="h-[100px]" alt="FlowBite Logo" />
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold uppercase text-white">Kontak</h2>
                        <ul class="text-gray-400">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">E-mail</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">WhatsApp</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold uppercase text-white">Follow us</h2>
                        <ul class="text-gray-400">
                            <li class="mb-4">
                                <a href="#" class="hover:underline ">Tiktok</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Instagram</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold uppercase text-white">Legal</h2>
                        <ul class="text-gray-400">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 sm:mx-auto border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm sm:text-center text-gray-400">© 2023 <a href="#" class="hover:underline">Recycle
                        Me</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', reveal);

        function reveal() {
            var reveals = document.querySelectorAll('.reveal');

            for (var i = 0; i < reveals.length; i++) {

                var windowheight = window.innerHeight;
                var revealtop = reveals[i].getBoundingClientRect().top;
                var revealpoint = 150;

                if (revealtop < windowheight - revealpoint) {
                    reveals[i].classList.add('animate__animated')
                    reveals[i].classList.add('animate__fadeInLeft')
                } else {
                    reveals[i].classList.remove('animate__animated')
                    reveals[i].classList.remove('animate__fadeInLeft')
                }
            }
        }
    </script>
</body>

</html>