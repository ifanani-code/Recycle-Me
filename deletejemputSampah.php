<?php
require_once(dirname(__FILE__) ."/include/function.php");
require_once(dirname(__FILE__) ."/include/notificationManager.php");

session_start();
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $jemputsampah = new JemputSampah();

    $result = $jemputsampah->deleteJemputSampahById($id);

    if (!$result == true) {
        NotificationManager::setAlert(
            'danger',
            'Postingan dengan Kode<b>#' . $id .'</b>, Terjadi Kesalahan: <pre>' . $result . '</pre>'
        );

        header('Location: riwayatjemputSampah.php');
        exit;
        }
        NotificationManager::setAlert(
            'success',
            'Postingan dengan Kode <b>#'. $id .'</b> berhasil dihapus!'
            );
        } else {
        NotificationManager::setAlert(
            'danger',
            'Permintaan Delete tidak valid.'
            );
        }

header ("Location: riwayatjemputSampah.php");
exit;
    
?>
