<?php
    require_once dirname(__FILE__) . "/include/User.php";
    require_once dirname(__FILE__) . "/include/Notif.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["user_id"])) {
        $id = $_GET["user_id"];
        $user = new User();
        $result = $user->DeletebyID($id);
        if ($result === true) {
            NotificationManager::setAlert(
                "success",
                "User dengan id <b>#" . $id . "</b> berhasil dihapus!" 
            );
            header("Location: kelola-konsumen.php");
        } else {
            NotificationManager::setAlert(
                "danger",
                "Id konsumen <b>#" . $id . "</b>, terjadi kesalahan: <pre>" . $result . "</pre>" 
            );
            // debugging
            
            header("Location: kelola-konsumen.php");
            exit;
        }
        // echo "<pre>" . var_dump($result) . "</pre>";
        // echo "<pre>" . var_dump($_SESSION) . "</pre>";
    } else {
        session_start();
        $email = $_SESSION['email'];
        $user = new User;
        $result = $user->deleteProfile($email);
        if ($result === true) {
            NotificationManager::setAlert(
                "success",
                "Akun berhasil dihapus!" 
            );
            header("Location: login.php");
        } else {
            echo "gagal hapus akun";
        }
    }
?>