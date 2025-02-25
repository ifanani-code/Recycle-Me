<?php
require_once dirname(__FILE__) . "/include/User.php";
require_once dirname(__FILE__) . "/include/Notif.php";
session_start();

$user = new User();
$alert = NotificationManager::getAlert();

if (isset($_POST['regist'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $role = 'mitra';

    $cek = $user->isEmailAvailable($email);
    if ($cek === true) {
        if ($password === $password2) {
            $result = $user->register($name, $email, $password, $address, $phone, $role);
            if ($result === true) {
                NotificationManager::setAlert(
                    "success",
                    "Akun berhasil didaftarkan"
                );
                header('Location: login-mitra.php');
            } else {
                echo $result;
            }
        } else {
            NotificationManager::setAlert(
                "danger",
                "Confirm password salah"
            );
            header('Location: regist-mitra.php');
        }
    } else {
        NotificationManager::setAlert(
            "danger",
            "Email telah digunakan"
        );
        header('Location: regist-mitra.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Mitra</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .alert {
            position: relative;
            padding: 15px;
            /* margin-bottom: 20px; */
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
    <?= $alert ? $alert : ''; ?>
    <div class="md:flex h-screen flex items-center justify-center">
        <div class="absolute md:w-full">
            <img src="aset/bg-mitraa.webp" alt=""
            class="absolute object-cover object-center -z-10 rounded-lg h-screen w-full">
            <div class="relative w-full h-screen" style="background-color: rgba(0, 0, 0, 0.75);"></div>
        </div>

        <div class="relative rounded-3xl bg-white lg:w-2/5 md:h-fit px-16 md:my-10 md:mx-96 sm:px-16 sm:py-0">
            <form action="" method="post">
                <div class=" border-b border-gray-900/10 pb-3">
                    <h2 class="mt-9 text-center text-3xl font-bold text-cyan-700">Daftar Sebagai Mitra</h2>
                    <div class=" grid grid-cols-1 gap-x-3 gap-y-3 sm:grid-cols-6">
                        <div class="sm:col-span-full">
                            <label for="name"
                                class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                            <div class="mt-2">
                                <input type="text" name="name" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2.5">
                            </div>
                        </div>

                        <div class="sm:col-span-full">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input name="email" type="email" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2.5">
                            </div>
                        </div>

                        <div class="relative sm:col-span-3">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="absolute inset-y-12 end-3 flex items-center ps-3.5 cursor-pointer">
                                <svg class="w-4 h-4 " viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12" stroke="gray" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1 12C1 12 5 20 12 20C19 20 23 12 23 12" stroke="gray" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="12" cy="12" r="3" stroke="gray" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" autocomplete="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2">
                            </div>
                        </div>
                        <div class="relative sm:col-span-3">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Confirm
                                Password</label>
                            <div class="absolute inset-y-12 end-3 flex items-center ps-3.5 cursor-pointer">
                                <svg class="w-4 h-4 " viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12" stroke="gray" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1 12C1 12 5 20 12 20C19 20 23 12 23 12" stroke="gray" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="12" cy="12" r="3" stroke="gray" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="mt-2">
                                <input id="password" name="password2" type="password" autocomplete="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2">
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="address"
                                class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                            <div class="mt-2">
                                <input type="text" name="address" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2.5">
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="phone"
                                class="block text-sm font-medium leading-6 text-gray-900">No. HP</label>
                            <div class="mt-2">
                                <input type="text" name="phone" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2.5">
                            </div>
                        </div>

                        <div class="col-span-full pt-2">
                            <button type="submit" name="regist"
                                class="flex bg-cyan-700 hover:bg-cyan-600 w-full justify-center rounded-md px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">
                                Daftar
                            </button>
                        </div>
                        <p class="col-span-full text-sm font-light text-gray-500">
                            Sudah punya akun?
                            <a href="login-mitra.php" class="font-medium text-cyan-600 hover:underline">Masuk</a>
                            atau <a href="regist.php" class="font-medium text-cyan-600 hover:underline">Daftar sebagai konsumen</a>
                        </p>
                    </div>
            </form>
        </div>

    </div>

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