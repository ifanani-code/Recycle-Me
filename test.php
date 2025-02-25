<?php
session_start();
require_once dirname(__FILE__) . "/include/post.php";

$berita = new Berita();

if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $searchResult = $berita->searchBerita($keyword); // Ganti dengan metode pencarian yang sesuai
} else {
    // Jika tidak ada kata kunci, tampilkan pesan "Data Tidak Ditemukan"
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
        <!-- Konten Sidebar -->
    </aside>

    <div class="p-4 sm:ml-64">
        <h1 class="text-black font-bold text-4xl pt-10 pl-10">Data Berita</h1>
        <div class="container">
            <!-- Menampilkan error jika ada -->
            <?= isset($error) ? "<h4 id='error'>Error: $error</h4>" : "" ?>
            <div class="container relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="mb-5 flex">
                    <a class="bg-cyan-800 text-white font-semibold p-3 rounded-lg ml-10 shadow-md hover:bg-cyan-700 mb-2 mt-10"
                        href="buat-post.php">Buat Post</a>
                    <a class="bg-cyan-800 text-white font-semibold p-3 rounded-lg ml-3 shadow-md hover:bg-cyan-700 mb-2 mt-10"
                        href="index.php">Lihat Post</a>
                </div>
                <div class="mx-10 relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="md:table-fixed text-sm text-left rtl:text-right text-black rounded-l">
                        <thead class="text-xs text-white uppercase bg-cyan-900 rounded-l">
                            <!-- Kolom Header Tabel -->
                        </thead>
                        <?php foreach ($searchResult as $data): ?>
                        <tbody class="border border-gray-500">
                            <tr class="bg-white text-black">
                                <!-- Kolom Data Tabel -->
                                <td class="px-2 max-w-xs py-4 border border-gray-500">
                                    <?php
                                    // Mendapatkan data dari variabel $data->image
                                    $keyboardResult = $data->image;

                                    // Membagi string menjadi array karakter
                                    $characters = str_split($keyboardResult);

                                    // Menampilkan setiap karakter dengan span berwarna merah
                                    foreach ($characters as $char) {
                                        if ($char === ' ') {
                                            echo ' '; // Jika karakter adalah spasi, tampilkan spasi
                                        } else {
                                            echo "<span style='color: red;'>$char</span>"; // Tampilkan karakter dengan warna merah
                                        }
                                    }
                                    ?>
                                </td>
                                <!-- Bagian lain dari baris tabel -->
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
        </div>
    </div>
</body>

</html>
