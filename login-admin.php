<?php
require_once dirname(__FILE__) . "/include/Admins.php";
require_once dirname(__FILE__) . "/include/Notif.php";
session_start();


$admin = new Admins();
$alert = NotificationManager::getAlert();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $admin->loginA($email, $password);
    if ($result == true) {
        session_start();
        $_SESSION['email'] = $email;
        header('Location: home-admin.php');
    } else {
        NotificationManager::setAlert(
            "danger",
            "Login gagal"
        );
        header('Location: login-admin.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login admin</title>
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
            transition: opacity 2s;
            /* Transisi untuk opasitas dengan penundaan 2 detik */
        }
    </style>
</head>

<body>
    <section>
        <?= $alert ? $alert : ''; ?>
        <div class="absolute md:w-full md:absolute">
            <img src="aset/bg-admin.webp" alt=""
                class="absolute object-cover object-center -z-10 rounded-lg h-screen w-full">
            <div class="relative w-full h-screen" style="background-color: rgba(0, 0, 0, 0.75);"></div>
        </div>

        <div class="relative flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <!-- <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                    alt="logo" />
                Flowbite
            </a> -->
            <div class="w-full bg-white rounded-2xl shadow  md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold text-cyan-700 text-center md:text-2xl ">
                        Admin
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="" method="post">
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2.5"
                                placeholder="name@company.com" required="" />
                        </div>
                        <div class="grid grid-cols-2">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <div class="text-right">
                                <a href="lupa-pw-admin.php"
                                    class="text-sm font-medium text-cyan-600 hover:underline">Lupa password?</a>
                            </div>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2.5"
                                required="" />
                        </div>
                        <button type="submit" name="login"
                            class="w-full text-white bg-cyan-700 hover:bg-cyan-600 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Masuk
                        </button>
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