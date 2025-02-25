<?php
require_once dirname("__FILE__") . "/include/function.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// var_dump($_POST);
    $jemputsampah = new JemputSampah();

    $data = new stdClass();
    $data->id = $_GET['id'];
    $data->poin = $_POST['poin'];

    $result = $jemputsampah->updatePoinById($data->id, $data->poin);

    if ($result === true) {

        header("Location: kelolaAdmin.php");
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
<body class=" flex items-center justify-center h-screen bg-cover bg-center bg-fixed" style="background-image: url('aset/bg.jpeg');" >
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Input Poin</h2>
        <form action="" method="POST" class="space-y-4">
            <!-- Input Poin -->
            <div>
                <label for="poin" class="block text-sm font-bold text-gray-700">Poin:</label>
                <input type="number" id="poin" name="poin" required
                    class="mt-1 p-2 block w-full rounded-md border border-cyan-950 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <!-- Tombol Submit -->
            <div class="text-center">
                <button type="submit" class="text-white bg-cyan-700 px-5 md:mx-2 text-center py-1.5 rounded-md hover:bg-cyan-600 font-bold">
                    Kirim
                </button>
            </div>
        </form>
    </div>
</body>
</html>
