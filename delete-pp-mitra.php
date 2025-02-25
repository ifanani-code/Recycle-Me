<?php
require_once dirname(__FILE__) . "/include/User.php";
require_once dirname(__FILE__) . "/include/Notif.php";
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $user = new User;
    $result = $user->deleteFoto($email);
    if ($result === true) {
        NotificationManager::setAlert(
            "success",
            "foto berhasil dihapus!"
        );
        header("Location: profile-mitra.php");
        exit;
    } else {
        NotificationManager::setAlert(
            "danger",
            "gagal hapus foto"
        );
        header("Location: profile-mitra.php");
        exit;
    }
}
?>