<?php
session_start();
require_once dirname(__FILE__) . "/include/post.php";
require_once dirname(__FILE__) . "/include/Admins.php";

$email = $_SESSION["email"];
$admin = new Admins();
$data = $admin->getAdmin($email);

$edukasi = new Edukasi();

if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $searchResult = $edukasi->searchEdukasi($keyword); // Ganti dengan metode pencarian yang sesuai
    
} else {
    // Jika tidak ada kata kunci, tampilkan semua data edukasi
    echo "Data Tidak Ditemukan";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-cyan-950 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-cyan-950">
            <a href="https://flowbite.com/" class="flex items-center ps-2.5 mb-5">
                <span class="self-center text-lg font-semibold whitespace-nowrap text-white">Halo,
                    <?= $data->nama ?>
                </span>
            </a>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="home-admin.php"
                        class="flex items-center p-2 text-gray-900 rounded-lg group hover:bg-gray-100">
                        <svg class="w-5 h-5 text-gray-50 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3 text-gray-100 group-hover:text-gray-900">Dashboard</span>
                    </a>
                </li>
                <li id="kelola-admin">
                    <a href="kelola-admin.php"
                        class="flex items-center p-2 text-gray-900 rounded-lg group hover:bg-gray-100">
                        <svg version="1.1" class="w-5 h-5 text-gray-50 transition duration-75 group-hover:text-gray-900"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 474.565 474.565"
                            xml:space="preserve">
                            <g>
                                <path
                                    d="M255.204,102.3c-0.606-11.321-12.176-9.395-23.465-9.395C240.078,95.126,247.967,98.216,255.204,102.3z" />
                                <path d="M134.524,73.928c-43.825,0-63.997,55.471-28.963,83.37c11.943-31.89,35.718-54.788,66.886-63.826
        C163.921,81.685,150.146,73.928,134.524,73.928z" />
                                <path
                                    d="M43.987,148.617c1.786,5.731,4.1,11.229,6.849,16.438L36.44,179.459c-3.866,3.866-3.866,10.141,0,14.015l25.375,25.383
        c1.848,1.848,4.38,2.888,7.019,2.888c2.61,0,5.125-1.04,7.005-2.888l14.38-14.404c2.158,1.142,4.55,1.842,6.785,2.827
        c0-0.164-0.016-0.334-0.016-0.498c0-11.771,1.352-22.875,3.759-33.302c-17.362-11.174-28.947-30.57-28.947-52.715
        c0-34.592,28.139-62.739,62.723-62.739c23.418,0,43.637,13.037,54.43,32.084c11.523-1.429,22.347-1.429,35.376,1.033
        c-1.676-5.07-3.648-10.032-6.118-14.683l14.396-14.411c1.878-1.856,2.918-4.38,2.918-7.004c0-2.625-1.04-5.148-2.918-7.004
        l-25.361-25.367c-1.94-1.941-4.472-2.904-7.003-2.904c-2.532,0-5.063,0.963-6.989,2.904l-14.442,14.411
        c-5.217-2.764-10.699-5.078-16.444-6.825V9.9c0-5.466-4.411-9.9-9.893-9.9h-35.888c-5.451,0-9.909,4.434-9.909,9.9v20.359
        c-5.73,1.747-11.213,4.061-16.446,6.825L75.839,22.689c-1.942-1.941-4.473-2.904-7.005-2.904c-2.531,0-5.077,0.963-7.003,2.896
        L36.44,48.048c-1.848,1.864-2.888,4.379-2.888,7.012c0,2.632,1.04,5.148,2.888,7.004l14.396,14.403
        c-2.75,5.218-5.063,10.708-6.817,16.438H23.675c-5.482,0-9.909,4.441-9.909,9.915v35.889c0,5.458,4.427,9.908,9.909,9.908H43.987z" />
                                <path d="M354.871,340.654c15.872-8.705,26.773-25.367,26.773-44.703c0-28.217-22.967-51.168-51.184-51.168
        c-9.923,0-19.118,2.966-26.975,7.873c-4.705,18.728-12.113,36.642-21.803,52.202C309.152,310.022,334.357,322.531,354.871,340.654z
        " />
                                <path d="M460.782,276.588c0-5.909-4.799-10.693-10.685-10.693H428.14c-1.896-6.189-4.411-12.121-7.393-17.75l15.544-15.544
        c2.02-2.004,3.137-4.721,3.137-7.555c0-2.835-1.118-5.553-3.137-7.563l-27.363-27.371c-2.08-2.09-4.829-3.138-7.561-3.138
        c-2.734,0-5.467,1.048-7.547,3.138l-15.576,15.552c-5.623-2.982-11.539-5.481-17.751-7.369v-21.958
        c0-5.901-4.768-10.685-10.669-10.685H311.11c-2.594,0-4.877,1.04-6.739,2.578c3.26,11.895,5.046,24.793,5.046,38.552
        c0,8.735-0.682,17.604-1.956,26.423c7.205-2.656,14.876-4.324,22.999-4.324c36.99,0,67.086,30.089,67.086,67.07
        c0,23.637-12.345,44.353-30.872,56.303c13.48,14.784,24.195,32.324,31.168,51.976c1.148,0.396,2.344,0.684,3.54,0.684
        c2.733,0,5.467-1.04,7.563-3.13l27.379-27.371c2.004-2.004,3.106-4.721,3.106-7.555s-1.102-5.551-3.106-7.563l-15.576-15.552
        c2.982-5.621,5.497-11.555,7.393-17.75h21.957c2.826,0,5.575-1.118,7.563-3.138c2.004-1.996,3.138-4.72,3.138-7.555
        L460.782,276.588z" />
                                <path d="M376.038,413.906c-16.602-48.848-60.471-82.445-111.113-87.018c-16.958,17.958-37.954,29.351-61.731,29.351
        c-23.759,0-44.771-11.392-61.713-29.351c-50.672,4.573-94.543,38.17-111.145,87.026l-9.177,27.013
        c-2.625,7.773-1.368,16.338,3.416,23.007c4.783,6.671,12.486,10.631,20.685,10.631h315.853c8.215,0,15.918-3.96,20.702-10.631
        c4.767-6.669,6.041-15.234,3.4-23.007L376.038,413.906z" />
                                <path d="M120.842,206.782c0,60.589,36.883,125.603,82.352,125.603c45.487,0,82.368-65.014,82.368-125.603
        C285.563,81.188,120.842,80.939,120.842,206.782z" />
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 text-gray-100 group-hover:text-gray-900">Kelola Admin</span>
                    </a>
                </li>
                <li>
                    <button class="w-full flex items-center p-2 text-gray-900 rounded-lg bg-white group"
                        data-dropdown-toggle="dropdown-artikel">
                        <svg class="flex-shrink-0 w-7 h-7 text-gray-900 transition duration-75 "
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="10 0 100 90"
                            xml:space="preserve">
                            <g>
                                <g>
                                    <path
                                        d="M32,59h13c1.1,0,2-0.9,2-2V27c0-2.2-2-4-4-4H32.3C31,23,30,24,30,25.3V55v2C30,58.1,30.9,59,32,59z" />
                                </g>
                                <g>
                                    <path
                                        d="M76,29v32c0,2.2-1.8,4-4,4H28c-2.2,0-4-1.8-4-4V29c-3.3,0-6,2.7-6,6v30c0,3.3,2.7,6,6,6h19c1.1,0,2,0.9,2,2v c0,1.1,0.9,2,2,2h6c1.1,0,2-0.9,2-2v0c0-1.1,0.9-2,2-2h19c3.3,0,6-2.7,6-6V35C82,31.7,79.3,29,76,29z" />
                                </g>
                                <g>
                                    <path
                                        d="M55,59h12.7c1.3,0,2.3-1,2.3-2.3V55V25c0-1.1-0.9-2-2-2H57c-2,0-4,1.8-4,4v30C53,58.1,53.9,59,55,59z" />
                                </g>
                            </g>
                        </svg>
                        <span class="flex-1 ms-2 text-gray-900 text-left">Kelola
                            Artikel</span>
                        <svg class="flex-shrink-0 w-9 h-9 text-gray-900 transition duration-75 "
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path d="M12 15l-4.243-4.243 1.415-1.414L12 12.172l2.828-2.829 1.415 1.414z"
                                    stroke="currentColor" fill="currentColor" />
                            </g>
                    </button>

                    <!-- isi dropdown -->
                    <div id="dropdown-artikel"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="kelola-edukasi.php" class="block px-4 py-2 hover:bg-gray-100">Edukasi</a>
                            </li>
                            <li>
                                <a href="kelola-berita.php" class="block px-4 py-2 hover:bg-gray-100">Berita</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button class="w-full flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                        data-dropdown-toggle="dropdown">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75 text-gray-50 group-hover:text-gray-900" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-1 text-gray-50 group-hover:text-gray-900">Kelola pengguna</span>
                        <svg class="flex-shrink-0 w-9 h-9 transition duration-75 text-gray-50 group-hover:text-gray-900" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path d="M12 15l-4.243-4.243 1.415-1.414L12 12.172l2.828-2.829 1.415 1.414z"
                                    stroke="currentColor" fill="currentColor" />
                            </g>
                        </svg>
                    </button>

                    <!-- isi dropdown -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="kelola-konsumen.php" class="block px-4 py-2 hover:bg-gray-100">Konsumen</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Mitra</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-50 transition duration-75 group-hover:text-gray-900"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 11.4C8 12.17 8.6 12.8 9.33 12.8H10.83C11.47 12.8 11.99 12.25 11.99 11.58C11.99 10.85 11.67 10.59 11.2 10.42L8.8 9.57995C8.32 9.40995 8 9.14995 8 8.41995C8 7.74995 8.52 7.19995 9.16 7.19995H10.66C11.4 7.20995 12 7.82995 12 8.59995"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10 12.8501V13.5901" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 6.40991V7.18991" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M9.99 17.98C14.4028 17.98 17.98 14.4028 17.98 9.99C17.98 5.57724 14.4028 2 9.99 2C5.57724 2 2 5.57724 2 9.99C2 14.4028 5.57724 17.98 9.99 17.98Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M12.98 19.88C13.88 21.15 15.35 21.98 17.03 21.98C19.76 21.98 21.98 19.76 21.98 17.03C21.98 15.37 21.16 13.9 19.91 13"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span class="flex-1 ms-2 text-gray-100 group-hover:text-gray-900">Kelola penukaran</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-50 transition duration-75 group-hover:text-gray-900"
                            version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: currentColor;
                                }
                            </style>
                            <g>
                                <path class="st0" d="M509.278,109.856c-2.633-6.216-6.981-11.466-12.497-15.179c-2.746-1.86-5.789-3.342-9.043-4.357
        c-3.244-1.006-6.707-1.546-10.258-1.546H166.42c-4.397,0-8.737,0.692-12.844,2.126c-3.076,1.064-6.015,2.545-8.737,4.413
        c-4.082,2.778-7.61,6.409-10.412,10.677c-2.698,4.091-4.711,8.729-6.056,13.786L97.87,203.578l-0.137,0.572
        c-0.386,1.514-0.878,2.81-1.458,3.978c-0.886,1.723-1.972,3.197-3.326,4.582c-1.353,1.377-2.987,2.666-4.888,3.881l-72.118,46.076
        C6.014,269.005,0,279.98,0,291.752v49.998c0,4.735,0.966,9.309,2.714,13.448c2.641,6.208,7.006,11.458,12.506,15.179
        c2.746,1.86,5.789,3.326,9.042,4.341c3.245,1.014,6.708,1.562,10.268,1.562h52.727c-0.024,0.395-0.04,0.797-0.04,1.192
        c0,25.228,20.526,45.754,45.754,45.754c25.228,0,45.746-20.526,45.746-45.754c0-0.395-0.008-0.798-0.032-1.192h202.374
        c-0.016,0.395-0.04,0.797-0.04,1.192c0,25.228,20.526,45.754,45.754,45.754c25.22,0,45.746-20.526,45.746-45.754
        c0-0.395-0.016-0.798-0.024-1.192h4.984c4.735,0,9.309-0.974,13.44-2.722c6.217-2.641,11.458-6.989,15.179-12.497
        c1.868-2.754,3.342-5.789,4.348-9.043c1.015-3.244,1.554-6.715,1.554-10.267V123.287C512,118.552,511.026,113.987,509.278,109.856z
        M295.404,305.708c-9.622-0.016-18.738-2.158-26.903-5.975c-1.691-0.789-3.326-1.651-4.928-2.56
        c-1.602-0.942-3.148-1.933-4.662-2.987c-16.403-11.507-27.145-30.56-27.145-52.124c0-31.743,23.239-58.042,53.63-62.85v-13.344
        l25.268,25.583l-25.268,25.574v-11.217c-6.353,1.747-12.03,5.113-16.596,9.663c-6.828,6.844-11,16.169-11.008,26.589
        c0.008,10.436,4.18,19.744,11.008,26.598c1.562,1.538,3.237,2.947,5.04,4.195c0.878,0.628,1.804,1.224,2.762,1.771
        c0.942,0.548,1.908,1.063,2.898,1.53c4.824,2.239,10.195,3.511,15.904,3.511c10.42,0,19.745-4.187,26.574-11.007
        c6.828-6.853,11.008-16.162,11.032-26.598c-0.024-10.42-4.204-19.745-11.032-26.589c-1.554-1.546-3.212-2.94-5.025-4.204
        l14.93-21.323c16.427,11.515,27.145,30.55,27.145,52.116C359.011,277.21,330.546,305.684,295.404,305.708z" />
                            </g>
                        </svg>
                        <span class="flex-1 ms-2 text-gray-100 group-hover:text-gray-900">Kelola jemput sampah</span>
                    </a>
                </li>
                <li>
                    <a href="login-admin.php"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-50 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ms-3 text-gray-100 group-hover:text-gray-900">Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <h1 class="text-cyan-700 font-bold text-4xl pt-10 pl-10">Data Edukasi</h1>
        <div class="container ">
            <!-- Menampilkan error jika ada -->
            <?=isset($error) ? "<h4 id='error'>Error: $error</h4>" : ""?>
            <div class=" container relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="mb-5 flex">
                        <a class=" bg-cyan-700 text-white font-semibold p-3 rounded-lg ml-10 shadow-md hover:bg-cyan-600 mb-2 mt-10" href="buat-post.php">Buat Edukasi</a>
                        <a class=" bg-cyan-700 text-white font-semibold p-3 rounded-lg ml-3 shadow-md hover:bg-cyan-600 mb-2 mt-10" href="edukasi.php">Lihat Edukasi</a>
                </div>
                <div class="mx-10 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-black rounded-l shadow-lg">
                        <thead class="text-xs text-white uppercase bg-cyan-700">
                            <tr>
                                <th scope="col" class="px-3 py-3 text-center">Id</th>
                                <th scope="col" class="py-3 text-center">Judul</th>
                                <th scope="col" class="px-4 py-3 max-w-sm text-center">Subjudul</th>
                                <th scope="col" class="px-4 py-3 max-w-md text-center">Kontent</th>
                                <th scope="col" class="text-center py-3">Gambar</th>
                                <th scope="col" class="text-center py-3">Aksi</th>
                            </tr>
                        </thead>
                        <?php foreach ($searchResult as $data): ?>
                            <tbody>
                                <tr class="bg-white border-b text-black">
                                    <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        <?= $data->id ?>
                                    </th>
                                    <td class="px-4 py-4 text-left">
                                        <?= $data->title ?>
                                    </td>
                                    <td class="px-4 max-w-sm py-4 text-left">
                                        <?= $data->subtitle ?>
                                    </td>
                                    <td class="px-4 max-w-md py-4 text-left">
                                        <?= substr($data->content, 0, 200) . (strlen($data->content) > 200 ? '...' : '') ?>
                                    </td>
                                    <td class="px-4 py-4">
                                        <?= $data->image ?>
                                    </td>
                                    <td class="flex px-4 py-4">
                                        <a href="edit-post.php?id=<?= $data->id ?>" class="font-medium text-white hover:underline bg-cyan-700 px-3 py-1 rounded-lg">Edit</a>
                                        <a href="hapus-post.php?id=<?= $data->id ?>" class="font-medium text-red-600 dark:text-white hover:underline ms-1 bg-red-700 px-3 py-1 rounded-lg">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
            
    </div>
</body>

</html>