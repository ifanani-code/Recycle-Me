<?php
require_once(dirname(__FILE__) ."/include/function.php");
$id=$_GET['id'];
$jemputsampah = new JemputSampah();

$jemputsampah = $jemputsampah->getJemputSampahByID($id);

$max_content_char = 50;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian Jemput Sampah</title>
    <!-- Tambahkan link ke file CSS Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.5); 
        }
        body {
            background-image: url('aset/bg.jpeg'); 
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    
    <!-- Container untuk menengahkan konten -->
    <div class="min-h-screen flex items-center justify-center">
        <!-- Card dengan lapisan transparan hitam -->
        <div class="w-96 h-85 p-4 rounded-lg overflow-hidden shadow-lg overlay">
            <!-- Konten Rincian Jemput Sampah -->
            <div class="text-white">
                <h2 class="text-2xl font-semibold">Rincian Jemput Sampah</h2>
                <p class="mt-4"><?= $jemputsampah->id ?></p>
                <!-- Informasi Jemput Sampah -->
                <div class="mt-5">
                    <table>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>: <?= $jemputsampah->nomorTelepon ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?= $jemputsampah->alamat ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Penjemputan</td>
                            <td>: <?= $jemputsampah->tanggalPenjemputan ?></td>
                        </tr>
                        <tr>
                            <td>Waktu Penjemputan</td>
                            <td>: <?= $jemputsampah->waktuPenjemputan ?></td>
                        </tr>
                        <tr>
                            <td>Mitra</td>
                            <td>: <?= $jemputsampah->mitra ?></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>: <?= $jemputsampah->catatan ?></td>
                        </tr>
                    </table>
                </div>
                <!-- Informasi Jenis Sampah -->
                <div class="mt-5 mb-6">
                    <table>
                        <tr>
                            <td>Kertas</td>
                            <td>: <?= $jemputsampah->bskertas ?></td>
                        </tr>
                        <tr>
                            <td>Plastik</td>
                            <td>: <?= $jemputsampah->bsplastik ?></td>
                        </tr>
                        <tr>
                            <td>Kaca</td>
                            <td>: <?= $jemputsampah->bskaca ?></td>
                        </tr>
                    </table>
                </div>
                <p>Ingin membatalkan atau mengedit pesanan? batalkan dan edit di riwayat!</p>
                <!-- Tombol Tutup atau Aksi lainnya -->
                <div class="mt-4">
                    <a href="riwayatjemputSampah.php"><button class="mr-2 bg-gray-400 hover:bg-cyan-600 text-white py-2 px-4 rounded-md">Riwayat</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
