<?php
require_once dirname(__FILE__) . "/include/User.php";
require_once dirname(__FILE__) . "/include/Post-rey.php";
session_start();

$poin = new Post();
$postrewards = $poin->getrewards();
// var_dump($postrewards);

$email = $_SESSION["email"];
$user = new User();

// ambil data user
$data = $user->getEmail($email);

$transaksi = new Post();
$transaksi = $transaksi->showTransaksi($data->user_id);

$nama = new Post();
// $nama = $nama->getNamaRewardsById($reward_id);
// var_dump($transaksi);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Poin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div class="absolute w-full">
        <img src="aset/bg-poinn.png" alt="bg"
            class="absolute -z-10 h-screen w-screen object-cover object-right md:object-center">
        <div class="relative h-screen " style="background-color: rgba(0, 0, 0, 0.75);"></div>
    </div>
    <nav class="relative bg-transparent backdrop-filter shadow-lg">
        <div class="mx-auto max-w-7xl px-4 sm:px-0">
            <div class="flex h-[100px] items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-12 w-auto sm:h-[70px]" src="aset/bg rm.png" alt="Your Company">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-80 flex items-baseline space-x-10">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="home.html"
                                class="hover:border-b-2 text-white px-3 py-2 text-md font-semibold">Beranda</a>
                            <div class="relative">
                                <button id="artikelDropdown"
                                    class="text-white hover:border-b-2 px-3 py-2 text-md font-semibold focus:outline-none"
                                    aria-haspopup="true">
                                    Artikel
                                </button>
                                <div id="dropdownMenu"
                                    class="absolute hidden bg-gray-900 text-white py-2 mt-2 rounded-md shadow-lg">
                                    <!-- Konten Dropdown Akan Ditambahkan Disini -->
                                </div>
                            </div>
                            <a href="jemput-sampah.html"
                                class="hover:border-b-2 text-white px-3 py-2 text-md font-semibold">Jemput
                                Sampah</a>
                            <a href="#" class="text-cyan-600 border-cyan-600 border-b-2 px-3 py-2 text-md font-semibold"
                                aria-current="page">Poin</a>
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
                                            edukasiButton.href = 'edukasi.html'; // Ganti dengan halaman edukasi yang sesuai
                                            edukasiButton.textContent = 'Edukasi';
                                            edukasiButton.classList.add('block', 'px-4', 'py-2', 'hover:bg-gray-700');

                                            const beritaButton = document.createElement('a');
                                            beritaButton.href = 'berita.html'; // Ganti dengan halaman berita yang sesuai
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
                                        event.target.href !== window.location.href + 'edukasi.html' &&
                                        event.target.href !== window.location.href + 'berita.html') {
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
                            <svg width="30" height="30" viewBox="0 0 32 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M30.5159 30.3385L27.8697 27.6923V17.4359C27.8697 11.1385 24.5056 5.86667 18.6389 4.47179V3.07692C18.6389 1.37436 17.2646 0 15.562 0C13.8594 0 12.4851 1.37436 12.4851 3.07692V4.47179C6.5979 5.86667 3.25431 11.1179 3.25431 17.4359V27.6923L0.608158 30.3385C-0.684149 31.6308 0.218415 33.8462 2.04406 33.8462H29.0594C30.9056 33.8462 31.8082 31.6308 30.5159 30.3385ZM23.7671 29.7436H7.35688V17.4359C7.35688 12.3487 10.4543 8.20513 15.562 8.20513C20.6697 8.20513 23.7671 12.3487 23.7671 17.4359V29.7436ZM15.562 40C17.8184 40 19.6646 38.1538 19.6646 35.8974H11.4594C11.4594 38.1538 13.2851 40 15.562 40Z"
                                    fill="white" />
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
                                        <a href="profile.html" class="block px-4 py-2 hover:bg-gray-100">Profil saya</a>
                                    </li>
                                    <li>
                                        <a href="landing-page.html" class="block px-4 py-2 hover:bg-gray-100">Keluar</a>
                                    </li>
                                </ul>
                            </div>
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
                <a href="#"
                    class="text-gray-300 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Artikel</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Jemput
                    Sampah</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Poin</a>
            </div>
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="aset/profile.jpeg" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-gray-800 align-start">User</div>
                        <div class="text-sm font-medium leading-none text-gray-600 align-end">user@example.com</div>
                    </div>
                    <button type="button"
                        class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Profil
                        Saya</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Pengaturan</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Keluar</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="grid justify-center gap-y-4 relative container mx-auto p-12">
        <h1 class="text-3xl font-bold text-center text-white">Riwayat Poin</h1>
        <div class="relative w-fit overflow-auto sm:rounded-lg">
            <table class="max-w-7xl text-sm text-left text-gray-500 shadow-md overflow-auto w-[1044px] text-center">
                <thead class="text-xs text-white uppercase bg-cyan-800">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kegiatan
                        </th>
                        <!-- <th scope="col" class="px-6 py-3">
                            Jumlah Poin
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaksi as $transaksi):?>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <?= $transaksi->tgl_transaksi ?>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <?php $transaksi->reward_id = $nama->getNamaRewardsById($transaksi->reward_id) ?>
                        <?= $transaksi->reward_id->nama ?>
                    </th>
                        <?php endforeach ?> 
                        <!-- <?php foreach ($postrewards as $rewards) : ?>
                        <td class="px-6 py-4">
                        <?= $rewards->poin ?>
                        </td>
                        <?php endforeach ?> -->
                        <!-- <td class="px-6 py-4">
                            + 10.000
                        </td>
                    </tr>
                    
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            2023-10-27
                        </th>
                        <td class="px-6 py-4">
                            Penukaran gopay
                        </td>
                        <td class="px-6 py-4">
                            - 10.000
                        </td>
                    </tr>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            2023-10-27
                        </th>
                        <td class="px-6 py-4">
                            Reward jemput sampah
                        </td>
                        <td class="px-6 py-4">
                            + 40.000
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center justify-self-start">
            <a href="poin.php" class="p-2 rounded-md bg-cyan-700 hover:bg-cyan-600 text-white">Kembali</a>
        </div>
    </div>

</body>

</html>