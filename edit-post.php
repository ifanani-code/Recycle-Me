<?php
require_once dirname(__FILE__) . "/include/Post.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = $_GET["id"];

    $Edukasi = new Edukasi();

    $data = $Edukasi->getEdukasiById($id);

    if ($data === false) {
        echo '<h1>Post tidak ditemukan (404)</h1> <br> <a href="edukasi.php">Beranda</a>';
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edukasi = new Edukasi();
    $data = new stdClass();
    $data->id = $_GET["id"];
    $data->title = $_POST['title'];
    $data->subtitle = $_POST['subtitle'];
    $data->content = $_POST['content'];

    $existingImage = $_POST['existing_image']; // Image lama yang telah tersimpan

    // Jika ada file foto yang diunggah
    if ($_FILES['image']['size'] > 0) {
        $folderFile = "upload/edukasi/";
        $fileExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $newFileName = 'image' . uniqid() . '.' . $fileExtension; // Buat nama file baru yang unik

        $saveFile = $folderFile . $newFileName; // Path file yang akan disimpan

        // Simpan file gambar yang diunggah ke direktori
        if (move_uploaded_file($_FILES['image']['tmp_name'], $saveFile)) {
            // Memperbarui data termasuk foto baru di database
            $result = $edukasi->updateEdukasiById($data->id, $data->title, $data->subtitle, $data->content, $saveFile);
            if ($result === true) {
                unlink($existingImage); // Menghapus file gambar lama dari direktori
                header("Location: edukasi.php");
                exit;
            } else {
                $error = $result;
            }
        } else {
            $error = "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    } else {
        // Jika tidak ada file gambar yang diunggah, hanya perbarui data tanpa foto
        // Perbarui data tanpa mengubah file foto di database
        $result = $edukasi->updateEdukasiById($data->id, $data->title, $data->subtitle, $data->content, $existingImage);
        if ($result === true) {
            header("Location: edukasi.php");
            exit;
        } else {
            $error = $result;
        }
    }
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>     
    <link rel="stylesheet" href="global.css">
    <title>Page Edukasi</title>
</head>
<body>




        <?=isset($error) ? "<h4 id='error'>Error: $error</h4>" : ""?>

        <div class="ml-44 mr-36 ">
        <form method="post" action="<?php htmlentities($_SERVER['PHP_SELF'])?> " enctype="multipart/form-data">
        <input type="hidden" name="existing_image" value="<?= isset($data->image) ? $data->image : '' ?>">
            <div class="space-y-12 ">
                <div class="pb-12 ">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="judul" class="block text-base font-semibold leading-6 text-gray-900">Judul</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 w-full">
                                    <input type="text" name="title" id="title" value="<?= isset($data->title) ? $data->title : ''?>" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Masukkan Judul"></div>
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="subjudul" class="block text-base font-semibold leading-6 text-gray-900">Sub Judul</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 w-full">
                                    <input type="text" name="subtitle" id="subtitle" value="<?= isset($data->subtitle) ? $data->subtitle : '' ?>" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6  " placeholder="Masukkan SubJudul"></div>
                            </div>
                        </div>
                        <div class="col-span-5">
                <label for="konten" class="block text-base font-semibold leading-6 text-gray-900">Konten Edukasi</label>
                <div class="mt-2">
                    <!-- Ubah value textarea dengan sintaks PHP -->
                    <textarea id="content" name="content" rows="10" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= isset($data->content) ? $data->content : '' ?></textarea>
                </div>
                <p class="mt-3 text-sm leading-6 text-gray-600">Masukkan konten edukasi disini.</p>
                </div>
                        <div class="col-span-full max-w-5xl">
                            <label for="foto" class="block text-base font-semibold leading-6 text-gray-900">Foto Edukasi</label>
                            <div class="mt-2 flex justify-center rounded-lg border border border-gray-900/25 px-6 py-10 w-[700px]">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewbox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"/>
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-cyan-700 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="image" name="image" type="file" value="<?= isset($data->image) ? $data->image : '' ?>" ></label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <?php if(isset($data->image) && !empty($data->image)) : ?>
                                    <img src="<?= $data->image ?>" alt="Uploaded Image" class="max-w-xs">
                                <?php endif; ?>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG, GIF</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="mb-10">
            <button type="submit" class=" bg-cyan-800 text-white font-semibold p-3 rounded-lg  shadow-md hover:bg-cyan-600" href="edukasi.php">Edit Post</button>
        </div>
    </div>
    </div>
    <script>
        var simplemde = new SimpleMDE({ element: document.getElementById("content") });
    </script>
</body>
</html>