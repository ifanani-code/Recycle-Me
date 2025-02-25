<?php
require_once dirname(__FILE__) . "/include/Post.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = $_GET["id"];

    $berita = new Berita();

    $data = $berita->getBeritaById($id);

    if ($data === false) {
        echo '<h1>Pos tidak ditemukan (404)</h1> <br> <a href="edukasi.php">Beranda</a>';
        exit;
    }
}
if (isset($_GET['id'])) {
    $data->id = $_GET["id"];
}
if (isset($_POST['title'])) {
    $data->title = $_POST['title'];
}
if (isset($_POST['subtitle'])) {
    $data->subtitle = $_POST['subtitle'];
}
if (isset($_POST['content'])) {
    $data->content = $_POST['content'];
}
if (isset($_FILES['image'])) {
    $data->image = $_FILES['image'];
}



    // Bagian HTML untuk menampilkan data artikel
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>     
    <link rel="stylesheet" href="global.css">
    <title>View Berita</title>
</head>
<body>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>nav-bar</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    
    <body class="bg-cyan-950">
        
    <nav class="relative z-10 sticky top-0 bg-cyan-950 shadow-lg">
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
                            <a href="landing-page.php" class=" text-white hover:border-b-2   px-3 py-2 text-md font-semibold"
                                aria-current="page">Beranda</a>
                                <div class="relative">
                                    <a href="#"><button id="artikelDropdown"
                                        class="text-cyan-600 border-b-2 border-cyan-600 px-3 py-2 text-md font-semibold"
                                        aria-haspopup="true">
                                        Artikel
                                    </button></a>
                                    <div id="dropdownMenu" class="absolute hidden bg-gray-900 text-white py-2 mt-2 rounded-md shadow-lg">
                                        <!-- Konten Dropdown Akan Ditambahkan Disini -->
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const artikelDropdown = document.getElementById('artikelDropdown');
                                        const dropdownMenu = document.getElementById('dropdownMenu');
                                        let timeoutId;
            
                                        artikelDropdown.addEventListener('mouseenter', function() {
                                            timeoutId = setTimeout(function() {
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
            
                                        artikelDropdown.addEventListener('mouseleave', function() {
                                            clearTimeout(timeoutId);
                                            setTimeout(function() {
                                                if (!dropdownMenu.matches(':hover')) {
                                                    dropdownMenu.classList.add('hidden');
                                                    dropdownMenu.innerHTML = '';
                                                }
                                            }, 1000);
                                        });
            
                                        dropdownMenu.addEventListener('mouseenter', function() {
                                            clearTimeout(timeoutId);
                                        });
            
                                        dropdownMenu.addEventListener('mouseleave', function() {
                                            setTimeout(function() {
                                                if (!artikelDropdown.matches(':hover')) {
                                                    dropdownMenu.classList.add('hidden');
                                                    dropdownMenu.innerHTML = '';
                                                }
                                            }, 1000);
                                        });
            
                                        // Close dropdown when clicking outside or on Edukasi/Berita buttons
                                        document.addEventListener('click', function(event) {
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
                <a href="landing-page.php" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                    aria-current="page">Beranda</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Artikel</a>
            </div>
        </div>
    </nav>

        <!-- VIEW ARTIKEL -->
    
        <div class="container mx-auto bg-cyan-950 mb-20">
            <div class="mt-20 justify-center items-center">
            <p class=" text-3xl text-white text-center font-bold mb-10"><?= $data->title ?></p>
                <img src= <?= $data->image ?> class=" w-[900px] h-[500px] ml-80 mb-5">
                
                <div class="px-48 pt-10">
                    <p class="text-lg text-white text-center font-semibold mb-2">
                    <?= $data->subtitle ?>
                    </p>
                    <p class="text-base text-white text-center text-justify"><?= $data->content ?>
                    <p class="text-lg text-gray-400 text-center text-justify mt-10 ">Terakhir diedit: <?= $data->updated_at ?>
                </div>
            </div>  
        </div>

<!-- FOOTER -->
<footer class="p-20 bg-gray-900">
    <div class="mx-auto max-w-screen-xl mt-10">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="#" class="flex items-center">
                    <img src="aset/bg rm.png" class="h-[100px]" alt="FlowBite Logo" />
                </a>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase text-white">Resources</h2>
                    <ul class="text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Flowbite</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Tailwind CSS</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase text-white">Follow us</h2>
                    <ul class="text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline ">Github</a>
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
            <span class="text-sm sm:text-center text-gray-400">© 2023 <a
                    href="#" class="hover:underline">Recycle Me</a>. All Rights Reserved.
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
                <a href="#" class="text-gray-500 hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
