<?php
require_once dirname("__FILE__") . "/include/function.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
var_dump($_POST);
    $jemputsampah = new JemputSampah();

    $data = new stdClass();
    $data->id = $_GET['id'];
    $data->namakurir = $_POST['namakurir'];
    $data->gambar = $_FILES['gambar']['name'];
    var_dump($data ->gambar);
    // Periksa apakah file yang diunggah adalah file gambar yang valid
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $file_size = $_FILES['gambar']['size'];
        $file_type = $_FILES['gambar']['type'];

        // Tentukan lokasi penyimpanan file di server
        $folderFile = "upload/foto-bukti/";
        $saveFile = $folderFile . $data->gambar;

        // Pindahkan file ke folder yang ditentukan
        if (move_uploaded_file($file_tmp, $saveFile)) {
            // Ubah nama file yang disimpan di database
            $extension = pathinfo($saveFile, PATHINFO_EXTENSION); // Dapatkan ekstensi file
            $newFileName = 'gambar' . uniqid () . '.' . $extension; // Buat nama file baru
            $newFilePath = $folderFile . $newFileName; // Path file baru

            // Ubah nama file sesuai dengan nama yang baru
            if (rename($saveFile, $newFilePath)) {
                $data->gambar = $newFilePath; // Gunakan nama file yang baru untuk disimpan di database

                $jemputsampah = new jemputsampah();
                $result = $jemputsampah->updateBuktiById($data->id, $data->gambar, $data->namakurir);

                if ($result === true) {
                    header("Location: mitrajemputSampah.php");
                    exit;
                } else {
                    $error = $result;
                }
            } else {
                $error = "Gagal mengubah nama file.";
            }
        } else {
            $error = "Gagal menyimpan file.";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Penjemputan</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-3xl">
            <h2 class="text-2xl font-bold mb-6 text-center">Bukti Penjemputan Sampah</h2>

            <form method="post" action="" enctype="multipart/form-data">
                <!-- Unggah Gambar -->
                <input type="hidden" name="id" value="<?php echo isset($data->id) ? $data->id : ''; ?>">
                <div class="mb-4">
                    <label for="gambar" class="block text-sm font-bold text-gray-700">Gambar Bukti</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Nama Kurir -->
                <div class="mb-4">
                    <label for="namakurir" class="block text-sm font-bold text-gray-700">Nama Kurir</label>
                    <input value="<?= isset($data) ? $data->namakurir : "" ?>" type="text" name="namakurir" id="namakurir" placeholder="Masukkan nama kurir" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Tombol Kirim -->
                <div class="mt-6">
                    <button type="submit" class="bg-cyan-700 text-white px-4 py-2 rounded-md hover:bg-cyan-600 focus:outline-none focus:ring focus:border-blue-300">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
