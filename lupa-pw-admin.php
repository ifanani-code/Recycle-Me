<?php
require_once dirname(__FILE__) . "/include/Admins.php";
require_once dirname(__FILE__) . "/include/Notif.php";
session_start();

$admin = new Admins();
$alert = NotificationManager::getAlert();

if (isset($_POST['change'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $exist = $admin->isEmailAvailable($email);
    if($exist === true) {
        NotificationManager::setAlert(
            "danger",
            "Email tidak ada"
        );
        header('Location: lupa-pw-admin.php');
    } else {
        if ($password === $password2) {
            $result = $admin->ChangePWAdmin($email, $password);
            if ($result == true) {
                NotificationManager::setAlert(
                    "success",
                    "Password berhasil diubah"
                );
                header('Location: login-admin.php');
            } else {
                NotificationManager::setAlert(
                    "danger",
                    "Gagal ubah password"
                );
                header('Location: lupa-pw-admin.php');
            }
        } else {
            NotificationManager::setAlert(
                "danger",
                "Gagal ubah password"
            );
            header('Location: lupa-pw-admin.php');
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>lupa pw</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }

        .alert {
            position: relative;
            padding: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
            font-size: 16px;
            line-height: 1.5;
            text-align: center;
            transition-delay: 2s;
            font-size: 16pt;
        }

        .alert.success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert.danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .alert.info {
            color: #31708f;
            background-color: #d9edf7;
            border-color: #bce8f1;
        }

        /* Gaya untuk tombol "x" (tutup) */
        .close {
            font-size: 20px;
            background: none;
            border: none;
            color: inherit;
            position: absolute;
            top: 0;
            right: 0;
            margin: 10px;
            font-weight: bold;
            line-height: 1;
            cursor: pointer;
            transition: 0.3s;
        }

        .close:hover {
            filter: brightness(70%); 
        }

        /* Gaya untuk notifikasi saat di-close (dengan opasitas 0) */
        .alert.hide {
            opacity: 0;
            transition: opacity 2s; /* Transisi untuk opasitas dengan penundaan 2 detik */
        }
    </style>
</head>

<body>
    <section>
    <?= $alert ? $alert : ''; ?>
        <div class="absolute md:w-full md:absolute">
            <img src="aset/bg-admin.webp" alt="" class="absolute object-cover object-center -z-10 rounded-lg h-screen w-full">
            <div class="relative w-full h-screen" style="background-color: rgba(0, 0, 0, 0.75);"></div>
        </div>

        <div class="relative flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-2xl shadow md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-4xl font-bold text-cyan-700 text-center md:text-3xl">
                        Lupa password
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="" method="post">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2.5"
                                placeholder="name@company.com" required="" />
                        </div>
                        <div class="grid grid-cols-2 gap-x-2">
                            <div class="">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900">Password
                                    baru</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2.5"
                                    required="" />
                            </div>
                            <div class="">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900">Confirm
                                    password</label>
                                <input type="password" name="password2" id="password" placeholder="••••••••"
                                    class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2.5"
                                    required="" />
                            </div>
                        </div>
                        <button type="submit" name="change"
                            class="flex bg-cyan-700 hover:bg-cyan-600 w-full justify-center rounded-md px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">
                            Ubah
                        </button>
                        <p class="text-sm font-light text-gray-500">
                            <a href="login-mitra.php"
                                class="font-medium text-cyan-600 hover:underline">kembali ke halaman login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const closeButtons = document.querySelectorAll('.alert .close');
            closeButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const alert = this.parentNode;
                    alert.classList.add('hide');
                    setTimeout(() => {
                        alert.style.display = 'none'; // Menyembunyikan notifikasi setelah selesai transisi
                    }, 100);
                });
            });
        });
    </script>
</body>

</html>