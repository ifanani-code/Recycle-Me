<?php
require_once dirname(__FILE__) . "/include/User.php";
require_once dirname(__FILE__) . "/include/Notif.php";
session_start();

$user = new User();
$alert = NotificationManager::getAlert();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'mitra';

    $result = $user->login($email, $password, $role);
    if ($result == true) {
        session_start();
        $_SESSION['email'] = $email;
        header('Location: home-mitra.php');
    } else {
        NotificationManager::setAlert(
            "danger",
            "Login gagal"
        );
        header('Location: login-mitra.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login Mitra</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
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
            <img src="aset/bg-mitraa.webp" alt=""
                class="absolute object-cover object-center -z-10 rounded-lg h-screen w-full">
            <div class="relative w-full h-screen" style="background-color: rgba(0, 0, 0, 0.75);"></div>
        </div>

        <div class="relative flex flex-col items-center justify-center px-6 py-8 mx-2 md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-2xl shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-4xl font-bold text-cyan-700 text-center md:text-3xl">
                        Login Mitra
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="post">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2.5"
                                placeholder="name@company.com" required="" />
                        </div>
                        <div class="grid grid-cols-2">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <div class="text-right">
                                <a href="lupa-pw-mitra.php" class="text-sm font-medium text-cyan-600 hover:underline">Lupa
                                    password?</a>
                            </div>
                            <div class="relative col-span-full">
                                <div class="absolute inset-y-0 end-5 flex items-center ps-3.5 cursor-pointer">
                                    <svg class="w-4 h-4 " viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12" stroke="gray" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 12C1 12 5 20 12 20C19 20 23 12 23 12" stroke="gray" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="12" cy="12" r="3" stroke="gray" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:outline-none focus:ring-cyan-600 block w-full p-2.5"
                                    required="">
                            </div>
                        </div>
                        <!-- <p class="text-sm text-center text-gray-600">atau</p> -->
                        <button type="submit" name="login"
                            class="flex bg-cyan-700 hover:bg-cyan-600 w-full justify-center rounded-md px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">
                            login
                        </button>
                        <div
                            class="col-span-full border-1 hover:bg-gray-50 py-2 shadow text-center rounded-md flex items-center justify-center gap-x-2">
                            <svg class="w-5 h-5" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M30.0014 16.3109C30.0014 15.1598 29.9061 14.3198 29.6998 13.4487H16.2871V18.6442H24.1601C24.0014 19.9354 23.1442 21.8798 21.2394 23.1864L21.2127 23.3604L25.4536 26.58L25.7474 26.6087C28.4458 24.1665 30.0014 20.5731 30.0014 16.3109Z"
                                    fill="#4285F4" />
                                <path
                                    d="M16.2863 29.9998C20.1434 29.9998 23.3814 28.7553 25.7466 26.6086L21.2386 23.1863C20.0323 24.0108 18.4132 24.5863 16.2863 24.5863C12.5086 24.5863 9.30225 22.1441 8.15929 18.7686L7.99176 18.7825L3.58208 22.127L3.52441 22.2841C5.87359 26.8574 10.699 29.9998 16.2863 29.9998Z"
                                    fill="#34A853" />
                                <path
                                    d="M8.15964 18.769C7.85806 17.8979 7.68352 16.9645 7.68352 16.0001C7.68352 15.0356 7.85806 14.1023 8.14377 13.2312L8.13578 13.0456L3.67083 9.64746L3.52475 9.71556C2.55654 11.6134 2.00098 13.7445 2.00098 16.0001C2.00098 18.2556 2.55654 20.3867 3.52475 22.2845L8.15964 18.769Z"
                                    fill="#FBBC05" />
                                <path
                                    d="M16.2864 7.4133C18.9689 7.4133 20.7784 8.54885 21.8102 9.4978L25.8419 5.64C23.3658 3.38445 20.1435 2 16.2864 2C10.699 2 5.8736 5.1422 3.52441 9.71549L8.14345 13.2311C9.30229 9.85555 12.5086 7.4133 16.2864 7.4133Z"
                                    fill="#EB4335" />
                            </svg>
                            <a href="home.php" class="text-sm text-gray-600">login dengan google</a>
                        </div>
                        <p class="text-sm font-light text-gray-500">
                            Belum punya akun?
                            <a href="regist-mitra.php" class="font-medium text-cyan-600 hover:underline">Daftar</a>
                            atau
                            <a href="login.php" class="font-medium text-cyan-600 hover:underline">Masuk sebagai
                                konsumen</a>
                        </p>
                        <p class="text-sm">
                            <a href="landing-page.php"
                                class="text-cyan-700 font-semibold hover:text-cyan-600">Kembali</a>
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