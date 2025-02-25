<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>     
    <link rel="stylesheet" href="global.css">
    <title>Berita</title>
    <style>
        /* Tambahkan gaya untuk animasi */
        @keyframes moveTrash {
            0% { transform: translateY(0); }
            100% { transform: translateY(-300px); }
        }
        .trash {
            position: relative;
            cursor: pointer;
        }
        .moveTrashAnimation {
            animation: moveTrash 1.5s ease forwards;
        }
        .trash-can {
            position: absolute;
            top: 100px; /* Sesuaikan dengan posisi tempat sampah */
            left: 50%; /* Sesuaikan dengan posisi tempat sampah */
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        /* Style untuk div yang memuat gambar sampah di bawah */
        .trash-container {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Sesuaikan dengan jarak antara tempat sampah dan gambar sampah di bawah */
        }
        .trash-container img {
            margin: 0 10px; /* Sesuaikan dengan jarak antara setiap gambar sampah */
        }
    </style>
</head>
<body class="bg-gradient-to-r from-cyan-950 to-cyan-700">
    <div class="flex justify-center space-x-40 pb-20 mt-16">
        <div>
            <img class="w-40" src="aset/Waste Sorting.png">
            <span class="text-2xl  font-semibold ml-14 text-white">Organik</span>
        </div>
        <div>
            <img class="w-40" src="aset/Trash.png">
            <span class="text-2xl font-semibold ml-12 text-white">Anorganik</span>
        </div>
    </div>
    <div class="ml-96 pl-72 mt-44">
        <div class="mb-8 ml-4">
            <!-- Tambahkan kelas "trash" untuk animasi -->
            <img src="aset/Paper Waste.png" class="trash">
            <img src="aset/Marine Pollution 1.png" class="trash">
            <img src="aset/Marine Pollution 2.png" class="trash">
        </div>
    </div>
    <!-- Container untuk gambar sampah di bawah -->
    <div class="trash-container">
        <!-- Tambahkan kelas "trash" untuk setiap gambar sampah di bawah -->
        <img src="aset/Marine Pollution 1.png" class="trash">
        <img src="aset/Marine Pollution 2.png" class="trash">
        <img src="aset/Paper Waste.png" class="trash">
        <img src="aset/Trash Pile.png" class="trash">
        <!-- Tambahkan gambar sampah tambahan di sini -->
        <img src="aset/Marine Pollution 2.png" class="trash">
        <img src="aset/Paper Waste.png" class="trash">
        <img src="aset/Trash Pile.png" class="trash">
        <img src="aset/Marine Pollution 1.png" class="trash">
    </div>
    <!-- Tambahkan kelas "trash-can" untuk tempat sampah -->
    <div class="trash-can">
        <!-- Isi tempat sampah di sini jika diperlukan -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const trashImages = document.querySelectorAll('.trash');
            const trashCan = document.querySelector('.trash-can');
            let currentTrash = 0;

            // Sembunyikan semua gambar sampah kecuali yang pertama
            trashImages.forEach((image, index) => {
                if (index !== 0) {
                    image.style.display = 'none';
                }
            });

            function showNextTrash() {
                trashImages[currentTrash].classList.add('moveTrashAnimation');
                currentTrash++;

                if (currentTrash < trashImages.length) {
                    setTimeout(() => {
                        trashImages[currentTrash - 1].style.display = 'none';
                        trashImages[currentTrash].style.display = 'block';
                    }, 1000); // Atur waktu antara munculnya setiap gambar (dalam milidetik)
                } else {
                    // Tampilkan tempat sampah setelah semua gambar sampah muncul
                    trashCan.style.opacity = 1;
                }
            }

            trashImages.forEach(function(trashImage) {
                trashImage.addEventListener('click', function() {
                    trashImage.style.pointerEvents = 'none'; // Agar tidak dapat diklik lagi saat sedang animasi
                    showNextTrash();
                });

                trashImage.addEventListener('animationend', function() {
                    trashImage.remove();
                });
            });
        });
    </script>
</body>
</html>
