<?php

// session_start();
require_once dirname(__FILE__) . "/include/post.php";

$berita = new Berita();

$dataBerita = $berita->getAllBerita();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>     
    <link rel="stylesheet" href="global.css">
    <title>Berita</title>
</head>
<body>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>nav-bar</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    </head>
    
    <body class="bg-cyan-950">
        
    <nav class="relative bg-transparent backdrop-filter pt-24 ">
            <div class="mx-auto max-w-7xl px-4 sm:px-0">
                <div class="flex h-[100px] items-center justify-between fixed w-full z-20 top-0 start-0 px-28 bg-cyan-950 shadow-lg">
                    <div class="flex items-center ">
                        <div class="flex-shrink-0">
                            <img class="h-21 w-auto sm:h-[70px]" src="aset/bg rm.png"
                                alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-80 flex items-baseline space-x-10 relative">
                                <a href="home.php" class=" text-white hover:border-b-2 hover:text-cyan-700 hover:border-cyan-700 px-3 py-2 text-md font-semibold" aria-current="page">Beranda</a>
                                <div class="relative">
                                    <div class="relative">
                                        <button id="artikelDropdown"
                                            class="text-cyan-700 border-b-2 border-cyan-700 hover:border-b-2 px-3 py-2 text-md font-semibold focus:outline-none"
                                            aria-haspopup="true">
                                            Artikel
                                        </button>
                                        <div id="dropdownMenu" class="absolute hidden bg-gray-900 text-white py-2 mt-2 rounded-md shadow-lg">
                                            <!-- Konten Dropdown Akan Ditambahkan Disini -->
                                        </div>
                                    </div>
                                </div>
                                <a href="jemputSampah.php" class="text-white hover:border-b-2 hover:text-cyan-700 hover:border-cyan-700 px-3 py-2 text-md font-semibold">Jemput Sampah</a>
                                <a href="poin.html" class="text-white hover:border-b-2 hover:text-cyan-700 hover:border-cyan-700 px-3 py-2 text-md font-semibold">Poin</a>
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
                                                edukasiButton.href = 'edukasi.php'; // Ganti dengan halaman edukasi yang sesuai
                                                edukasiButton.textContent = 'Edukasi';
                                                edukasiButton.classList.add('block', 'px-4', 'py-2', 'hover:bg-gray-700');

                                                const beritaButton = document.createElement('a');
                                                beritaButton.href = 'berita.php'; // Ganti dengan halaman berita yang sesuai
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
                                            event.target.href !== window.location.href + 'edukasi.php' &&
                                            event.target.href !== window.location.href + 'berita.php') {
                                            dropdownMenu.classList.add('hidden');
                                            dropdownMenu.innerHTML = '';
                                        }
                                    });
                                });
                            </script>                             
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button type="button"
                                class="relative rounded-full p-2 text-white hover:text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg width="30" height="30" viewBox="0 0 32 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30.5159 30.3385L27.8697 27.6923V17.4359C27.8697 11.1385 24.5056 5.86667 18.6389 4.47179V3.07692C18.6389 1.37436 17.2646 0 15.562 0C13.8594 0 12.4851 1.37436 12.4851 3.07692V4.47179C6.5979 5.86667 3.25431 11.1179 3.25431 17.4359V27.6923L0.608158 30.3385C-0.684149 31.6308 0.218415 33.8462 2.04406 33.8462H29.0594C30.9056 33.8462 31.8082 31.6308 30.5159 30.3385ZM23.7671 29.7436H7.35688V17.4359C7.35688 12.3487 10.4543 8.20513 15.562 8.20513C20.6697 8.20513 23.7671 12.3487 23.7671 17.4359V29.7436ZM15.562 40C17.8184 40 19.6646 38.1538 19.6646 35.8974H11.4594C11.4594 38.1538 13.2851 40 15.562 40Z" fill="white"/>
                                </svg>
                            </button>
    
                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button"
                                class="relative flex p-2 max-w-xs items-center rounded-full hover:bg-cyan-700 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                aria-expanded="false" aria-haspopup="true" role="menu" aria-orientation="vertical"
                                aria-labelledby="user-menu-button" tabindex="-1">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <svg width="30" height="30" viewBox="0 0 40 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M33.1263 36H6.87633C5.46433 36 4.42031 34.606 4.95431 33.324C7.42632 27.396 13.2343 24 20.0003 24C26.7683 24 32.5763 27.396 35.0483 33.324C35.5823 34.606 34.5383 36 33.1263 36ZM11.8343 12C11.8343 7.58797 15.4983 3.99997 20.0003 3.99997C24.5043 3.99997 28.1663 7.58797 28.1663 12C28.1663 16.412 24.5043 20 20.0003 20C15.4983 20 11.8343 16.412 11.8343 12ZM39.9123 35.272C38.4283 28.554 33.7843 23.5959 27.6743 21.3459C30.9123 18.7919 32.8003 14.6619 32.1063 10.1399C31.3023 4.89387 26.8463 0.695954 21.4703 0.0839538C14.0463 -0.762047 7.75032 4.89797 7.75032 12C7.75032 15.78 9.53833 19.1479 12.3283 21.3459C6.21432 23.5959 1.57431 28.554 0.0883138 35.272C-0.451687 37.714 1.55832 40 4.10832 40H35.8923C38.4443 40 40.4523 37.714 39.9123 35.272Z"
                                        fill="white" />
                                </svg>
                            </button>
                            <!-- isi dropdown -->
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="edit-profile.php" class="block px-4 py-2 hover:bg-gray-100">Profil
                                            saya</a>
                                    </li>
                                    <li>
                                        <a href="landing-page.php" class="block px-4 py-2 hover:bg-gray-100">Keluar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-200 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
    
            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                        aria-current="page">Beranda</a>
                    <div class="dropdown">
                        <button class="dropbtn text-gray-300 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Artikel</button>
                        <div class="dropdown-content">
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                      </div>
                    <a href="#"
                        class="text-gray-300 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Jemput Sampah</a>
                    <a href="#"
                        class="text-gray-300 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Poin</a>
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                src="aset/bg rm.png"
                                alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-gray-800 align-start">User</div>
                            <div class="text-sm font-medium leading-none text-gray-600 align-end">user@example.com</div>
                        </div>
                        <button type="button"
                            class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Profil Saya</a>
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Pengaturan</a>
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Keluar</a>
                    </div>
                </div>
            </div>
        </nav>

    
    <!-- BERITA -->

        <div class="container mx-auto justify-center items-center bg-cyan-950 mb-20">
            <h1 class="font-extrabold text-4xl mb-2 ml-32  pt-8 text-white">Berita</h1>
            <h1 class="font-semibold text-lg mb-10 text-gray-400 px-32">Mari jelajahi lanskap yang tidak terlihat dari sampah kita. Bagaimana benda yang diabaikan bisa menjadi sumber inspirasi bagi perubahan besar. </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 px-32 mt-10 bg-cyan-950">
                <?php foreach ($dataBerita as $data): ?>
                    <div class="relative border-gray-200 rounded-lg shadow-lg bg-cyan-700 dark:border-gray-200 w-7xl mb-4">
                        <a href="">
                        <img class="w-96 static rounded-t-lg" src=<?= $data->image ?> alt="">
                        <!-- <img class="rounded-full w-20 absolute top-20 mt-20 ml-24 shadow-md " src="aset/profile.jpeg" alt=""/> -->
                        </a>
                        <div class="px-6">
                            <!-- <p class="pl-20 ml-1 text-sm pt-8 pb-3 text-white">By Firman</p> -->
                            <a class="" href="view-berita.html">
                                <h5 class="mb-3 mt-5 text-lg font-bold tracking-tight text-white text-left hover:text-cyan-900"><?= $data->title ?></h5>
                            </a>
                            <p class="mb-6 text-sm text-white text-left"><?= $data->subtitle ?></p>
                            <a href="view-berita.php?id=<?= $data->id_berita ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-cyan-800 rounded-lg hover:bg-cyan-600 focus:ring-4 focus:outline-none mb-4">
                                Baca selengkapnya
                            </a>
                            <!-- <div class="item-end pb-3">
                                    <div class="flex space-x-20 mt-2 justify-center bottom-2">
                                        <div class="flex space-x-1 ">
                                            <img src="aset/like.png" class="w-5 space-x-7">
                                        
                                        </div>
                                        <div class="flex space-x-1">
                                            <img src="aset/comment.png" class="w-5">
                                            
                                        </div>
                                    
                                        <img src="aset/share.png" class="w-5">
                                    </div>
                            </div> -->
                        </div>
                    </div>
                    <?php endforeach; ?> 
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</footer>
</body>
</html>
