<?php
require_once(dirname(__FILE__) ."/include/function.php");
require_once(dirname(__FILE__) ."/include/User.php");
session_start();

$email = $_SESSION["email"];
$user = new User();
$userData = $user->getEmail($email);

$mitras = $user->getAllMitra();

$error = "contoh error";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump($_POST);
    $data = new stdClass();
    $data->nomorTelepon = $_POST["nomorTelepon"];
    $data->alamat = $_POST["alamat"];
    $data->tanggalPenjemputan = $_POST["tanggalPenjemputan"];
    $data->waktuPenjemputan = $_POST["waktuPenjemputan"];
    $data->catatan = $_POST["catatan"];
    $data->bskertas = $_POST["bskertas"];
    $data->bsplastik = $_POST["bsplastik"];
    $data->bskaca = $_POST["bskaca"];
    $data->mitra = $_POST['mitra'];


    var_dump($_POST);
    $jemputsampah = new JemputSampah();


    $result = $jemputsampah->createJemputSampah($data->nomorTelepon, $data->alamat, $data->tanggalPenjemputan, $data->waktuPenjemputan, $data->mitra, $data->catatan, $data->bskertas, $data->bsplastik, $data->bskaca );
    var_dump ($result);
    if ($result === true) {
        
        header("Location: riwayatjemputSampah.php");
        exit;
    } else {

        $error = $result;
    }
}
?>

<!-- npx tailwindcss -i ./src/input.css -o ./dist/output.css --watch -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Jemput Sampah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        .custom-date, .custom-select {
        color: white;
        }
        .custom-date:focus, .custom-select:focus {
            color: white;
        }
    </style>
</head>
<body class="bg-cyan-950">
<div class="relative">
        <!-- Photo and Overlay -->
        <img src="aset/bg.jpeg" alt="Layered Photo" class="w-full h-auto object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <!-- Navigation Bar -->
        <!-- Navigation Bar -->
        <nav class="relative bg-transparent backdrop-filter">
                <div class="mx-auto max-w-7xl px-4 sm:px-0">
                    <div class="flex h-[100px] items-center justify-between fixed w-full z-20 top-0 start-0 px-28 shadow-lg">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-auto sm:h-[70px]" src="aset/bg rm.png"
                                    alt="Your Company">
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="hidden md:block">
                                <div class="     flex items-baseline space-x-10">
                                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                    <a href="home.php"
                                    class="hover:border-b-2 text-white px-3 py-2 text-md font-semibold">Beranda</a>
                                    <div class="relative">
                                        <button id="artikelDropdown"
                                            class="text-white hover:border-b-2 px-3 py-2 text-md font-semibold focus:outline-none"
                                            aria-haspopup="true">
                                            Artikel
                                        </button>
                                        <div id="dropdownMenu" class="absolute hidden bg-gray-900 text-white py-2 mt-2 rounded-md shadow-lg">
                                            <!-- Konten Dropdown Akan Ditambahkan Disini -->
                                        </div>
                                    </div>
                                    <a href="jemputSampah.php"
                                    class="text-cyan-600 border-cyan-600 border-b-2 px-3 py-2 text-md font-semibold">Jemput
                                    Sampah</a>
                                    <a href="poin.php" class="hover:border-b-2 text-white px-3 py-2 text-md font-semibold"
                                        aria-current="page">Poin</a>
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
                                                    beritaButton.href = 'halaman-berita.php'; // Ganti dengan halaman berita yang sesuai
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
                                                event.target.href !== window.location.href + 'halaman-berita.php') {
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
                                        <ul class="py-2 text-sm text-gray-700"
                                            aria-labelledby="dropdownDefaultButton">
                                            <li>
                                                <a href="edit-profile.php"
                                                    class="block px-4 py-2 hover:bg-gray-100">Profil saya</a>
                                            </li>
                                            <li>
                                                <a href="landing-page.php"
                                                    class="block px-4 py-2 hover:bg-gray-100">Keluar</a>
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
                            class="text-gray-300 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Jemput Sampah</a>
                        <a href="#"
                            class="text-gray-300 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Poin</a>
                    </div>
                    <div class="border-t border-gray-700 pb-3 pt-4">
                        <div class="flex items-center px-5">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                    src="aset/profile.jpeg"
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

        <!-- Overlay Content -->
        <div class="absolute inset-0 flex flex-col justify-center items-center px-4 text-center">
            <h1 class="text-white text-4xl md:text-4xl lg:text-5xl font-bold mb-4">Jemput Sampah</h1>
            <p class="text-white text-lg md:text-xl font-semibold">Gunakan layanan jemput sampah, pengepul sampah akan <br> menjemput sampahmu</p>
            <button class="justify-between mt-5">
                <a class="text-white bg-cyan-700 px-5 md:mx-2 text-center py-1.5 rounded-md hover:bg-cyan-600 font-bold"
                    href="#form">Isi Form</a>
            </button>
        </div>
    </div>
    <!-- Section 2 & 3 Container -->
    <h2 class="mt-20 text-4xl text-center font-bold text-white sm:text-6xl" id="form">Form Jemput Sampah</h2>
    <div class="container mx-auto mt-4 p-8 mb-20 bg-white rounded-3xl shadow-md flex flex-col md:flex-row gap-4">
        
        <!-- Section 3: Form Isi Data Diri -->
        <div class="mx-7 bg-white rounded-3xl p-8 flex-1 max-w-2xl">
            <p class="text-lg font-bold mb-4 text-cyan-950">Form Jemput Sampah</p>
            <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id="formDataDiri">
                    <div class="mb-4">
                        <label class="block text-sm font-bold rounded-full text-cyan-950">Nomor Telepon</label>
                        <input type="text" name="nomorTelepon" class="form-input w-full mt-1 rounded-xl p-2 bg-cyan-950 text-white" placeholder="Masukkan nomor telepon" value="<?= isset($data) ? $data->nomorTelepon : "$userData->no_hp"?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-cyan-950">Alamat</label>
                        <input type="tel" name="alamat" class="form-input w-full mt-1 rounded-xl p-2 bg-cyan-950 text-white" placeholder="Masukkan alamat" value="<?= isset($data) ? $data->alamat : "$userData->alamat"?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-cyan-950">Tanggal Penjemputan</label>
                        <input type="date" name="tanggalPenjemputan" class="form-input w-full mt-1 rounded-xl p-2 bg-cyan-950 text-gray-400" value="<?= isset($data) ? $data->tanggalPenjemputan : ""?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-cyan-950">Waktu Penjemputan</label>
                        <select name="waktuPenjemputan" class="form-select w-full mt-1 rounded-xl p-2 bg-cyan-950 text-gray-400" value="<?= isset($data) ? $data->waktuPenjemputan : ""?>" required>
                            <option value="08:00" class="text-white">08:00 WIB</option>
                            <option value="12:00" class="text-white">12:00 WIB</option>
                            <option value="16:00" class="text-white">16:00 WIB</option>
                            <!-- Add more options if needed -->
                        </select>
                    </div>
                    <div class="mb-4">
                            <label for="">Pilih Mitra</label>
                            <select name="mitra" id="" class="form-select w-full mt-1 rounded-xl p-2 bg-cyan-950 text-gray-400">
                                <?php foreach ($mitras as $mitra) :?>
                                    <option class="text-white" value="<?= $mitra->email ?>"><?= $mitra->nama ?></option>
                                <?php endforeach;?>
    
                            </select>
                        </div>
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-cyan-950">Catatan</label>
                        <textarea name="catatan" class="form-textarea w-full mt-1 rounded-xl p-2 bg-cyan-950 text-white" rows="3" placeholder="Tambahkan catatan" value="<?= isset($data) ? $data->catatan : ""?>"></textarea>
                    </div>
        </div>

        <!-- Section 2: Jenis + Berat Sampah -->
        <div class="bg-white rounded-3xl p-8 flex-1 max-w-md text-cyan-950" id="jenisSampah">
            <div class="mb-6">
                <h3 class="text-lg font-bold mb-2">Jenis Sampah + Berat Sampah</h3>
                    <div class="mb-6">
                        <h3 class="text-md font-bold mb-2">Berat Sampah (Kg)</h3>
                        <span class="ml-2">Kertas</span>
                        <input value="<?= isset($data) ? $data->bskertas : "0"?>" type="text" id="bskertas" name="bskertas" class="bg-cyan-950 text-gray-400 p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mb-2" placeholder="Berat Kertas (Kg)" ><br>
                        <span class="ml-2">Plastik</span>
                        <input value="<?= isset($data) ? $data->bsplastik : "0"?>" type="text" id="bsplastik" name="bsplastik" class="bg-cyan-950 text-gray-400 p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mb-2" placeholder="Berat Plastik (Kg)" ><br>
                        <span class="ml-2">Kaca</span>
                        <input value="<?= isset($data) ? $data->bskaca : "0"?>" type="text" id="bskaca" name="bskaca" class="bg-cyan-950 text-gray-400 p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mb-2" placeholder="Berat Kaca (Kg)" >
                        
                        <div class="flex space-x-4 mt-10">
                            <button type="submit" onclick="" class="bg-cyan-700 text-white px-4 py-2 rounded-md hover:bg-cyan-600 focus:outline-none focus:ring focus:border-blue-300">Kirim</button>
                            <a href="jemputSampah.php" class="bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-cyan-600 focus:outline-none focus:ring focus:border-blue-300">Batalkan</a>
                        </div>
                    </div>
            </form>
            </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
        
</body>
</html>1
<script>
    function riwayatjemputSampah() {
        window.location.href = 'riwayatjemputSampah.php'
    }
</script>