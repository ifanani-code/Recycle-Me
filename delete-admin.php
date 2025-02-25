<?php
require_once dirname(__FILE__) . "/include/Admins.php";
require_once dirname(__FILE__) . "/include/Notif.php";
session_start();
$email = $_SESSION["email"];
$admin = new Admins();
$data = $admin->getAdmin($email);

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["admin_id"])) {
    $id = $_GET["admin_id"];
    
    // Check if the admin is trying to delete their own account
    if ($id == $data->admin_id) {
        NotificationManager::setAlert(
            "danger",
            "Anda tidak dapat menghapus akun Anda sendiri."
        );
        header("Location: kelola-admin.php");
        exit;
    }

    $admin = new Admins();
    $result = $admin->DeleteAdmin($id);
    if ($result === true) {
        NotificationManager::setAlert(
            "success",
            "Admin dengan id <b>#" . $id . "</b> berhasil dihapus!" 
        );
        header("Location: kelola-admin.php");
    } else {
        NotificationManager::setAlert(
            "danger",
            "Id Admin <b>#" . $id . "</b>, terjadi kesalahan: <pre>" . $result . "</pre>" 
        );
        header("Location: kelola-admin.php");
        exit;
    }
}
?>
