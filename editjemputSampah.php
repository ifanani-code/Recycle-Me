<?php
require_once(dirname(__FILE__) ."/include/function.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $jemputsampah = new JemputSampah();

    $data = $jemputsampah->getJemputSampahByID($id);

    if ($data === false) {
        echo '<h1>Pesanan tidak ditemukan (404)</h1> <br> <a href="jemputSampah.php">Beranda</a>';
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $jemputsampah = new JemputSampah();

    $data = new stdClass();
    $data->id = $_POST['id'];
    $data->nomorTelepon = $_POST['nomorTelepon'];
    $data->alamat = $_POST['alamat'];
    $data->tanggalPenjemputan = $_POST['tanggalPenjemputan'];
    $data->waktuPenjemputan = $_POST['waktuPenjemputan'];
    $data->catatan = $_POST['catatan'];
    $data->bskertas = $_POST['bskertas'];
    $data->bsplastik = $_POST['bsplastik'];
    $data->bskaca = $_POST['bskaca'];

    $result = $jemputsampah->updateJemputSampahById($data->id, $data->nomorTelepon, $data->alamat, $data->tanggalPenjemputan, $data->waktuPenjemputan, $data->catatan, $data->bskertas, $data->bsplastik, $data->bskaca);
    var_dump($result);

    if ($result === true) {

        header("Location: riwayatjemputSampah.php");
        exit;
    } else {
        $error = $result;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
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
<body class="bg-cyan-950">
<div class="relative">
                <!-- Section 2 & 3 Container -->
                <h2 class="mt-20 text-4xl text-center font-bold text-white sm:text-6xl" id="form">Edit Form ID <?= $data->id ?></h2>
                <?= isset($error) ? "<h4 id='error'>Error: $error</h4>" : "" ?>
                <div class="container mx-auto mt-2 p-5 mb-10 bg-white rounded-3xl shadow-md flex flex-col md:flex-row gap-4">
                    
                    <!-- Section 3: Form Isi Data Diri -->
                    <div class="mx-7 bg-white rounded-3xl p-8 flex-1 max-w-2xl">
                        <p class="text-lg font-bold mb-4 text-cyan-950">Form Jemput Sampah</p>
                        <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id="formDataDiri">
                        <input type="hidden" name="id" value="<?= $data->id ?>">
                                <div class="mb-4">
                                    <label class="block text-sm font-bold rounded-full text-cyan-950">Nomor Telepon</label>
                                    <input type="text" name="nomorTelepon" class="form-input w-full mt-1 rounded-xl p-2 bg-cyan-950 text-white" placeholder="Masukkan nomor telepon" value="<?= $data->nomorTelepon ?>" required>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-bold text-cyan-950">Alamat</label>
                                    <input type="tel" name="alamat" class="form-input w-full mt-1 rounded-xl p-2 bg-cyan-950 text-white" placeholder="Masukkan alamat" value="<?= $data->alamat ?>" required>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-bold text-cyan-950">Tanggal Penjemputan</label>
                                    <input type="date" name="tanggalPenjemputan" class="form-input w-full mt-1 rounded-xl p-2 bg-cyan-950 text-gray-400" value="<?= $data->tanggalPenjemputan ?>" required>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-bold text-cyan-950">Waktu Penjemputan</label>
                                    <select name="waktuPenjemputan" class="form-select w-full mt-1 rounded-xl p-2 bg-cyan-950 text-gray-400" value="<?= $data->waktuPenjemputan ?>" required>
                                        <option value="08:00" class="text-white">08:00 WIB</option>
                                        <option value="12:00" class="text-white">12:00 WIB</option>
                                        <option value="16:00" class="text-white">16:00 WIB</option>
                                        <!-- Add more options if needed -->
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-bold text-cyan-950">Catatan</label>
                                    <textarea name="catatan" class="form-textarea w-full mt-1 rounded-xl p-2 bg-cyan-950 text-white" rows="3" placeholder="Tambahkan catatan" value="<?= $data->catatan ?>>"></textarea>
                                </div>
                    </div>

                    <!-- Section 2: Jenis + Berat Sampah -->
                    <div class="bg-white rounded-3xl p-8 flex-1 max-w-md text-cyan-950" id="jenisSampah">
                        <div class="mb-6">
                            <h3 class="text-lg font-bold mb-2">Jenis Sampah + Berat Sampah</h3>
                            <p class="text-lg font-semibold mb-6">Kosongkan berat jika tidak ada sampahnya</p>
                                <div class="mb-6">
                                    <h3 class="text-md font-bold mb-2">Berat Sampah (Kg)</h3>
                                    <span class="ml-2">Kertas</span>
                                    <input value="<?= $data->bskertas ?>" type="text" id="bskertas" name="bskertas" class="bg-cyan-950 text-gray-400 p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mb-2" placeholder="Berat Kertas (Kg)" ><br>
                                    <span class="ml-2">Plastik</span>
                                    <input value="<?= $data->bsplastik ?>" type="text" id="bsplastik" name="bsplastik" class="bg-cyan-950 text-gray-400 p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mb-2" placeholder="Berat Plastik (Kg)" ><br>
                                    <span class="ml-2">Kaca</span>
                                    <input value="<?= $data->bskaca ?>" type="text" id="bskaca" name="bskaca" class="bg-cyan-950 text-gray-400 p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mb-2" placeholder="Berat Kaca (Kg)" >
                                    <div class="flex space-x-4 mt-10">
                                        <button type="submit" class="bg-cyan-700 text-white px-4 py-2 rounded-md hover:bg-cyan-600 focus:outline-none focus:ring focus:border-blue-300">Edit</button>
                                        <a href="riwayatjemputSampah.php" class="bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-cyan-600 focus:outline-none focus:ring focus:border-blue-300">Batalkan</a>
                                    </div>
                                </div>
                        </form>
                        </div>
                    </div>

</body>
</html>
