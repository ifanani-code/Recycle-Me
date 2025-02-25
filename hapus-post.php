<?php
require_once dirname(__FILE__) . "/include/Post.php";

session_start();
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $edukasi = new Edukasi();

    // Ambil informasi file dari database sebelum menghapus entri
    $postInfo = $edukasi->getEdukasiById($id);

    if ($postInfo) {
        // Simpan path file yang ingin dihapus
        $filePath = $postInfo->image; // Menggunakan notasi panah (->) untuk mengakses properti dari objek

        // Hapus entri dari database
        $result = $edukasi->deletePostById($id);

        if ($result) {
            // Jika entri dihapus dari database, hapus file terkait dari direktori
            if (file_exists($filePath)) {
                unlink($filePath); // Hapus file dari direktori
            }

            header("Location: edukasi.php");
            exit;
        } else {
            echo "Gagal menghapus entri.";
        }
    } else {
        echo "Entri tidak ditemukan.";
    }
}

?>
