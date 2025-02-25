<?php
    require_once(dirname(__FILE__) ."../include/post-rey.php");
   

  

    $postrewards = new Post();
    $postrewards = $postrewards->getrewards();

    $max_content_char = 100;

    if($_SERVER["REQUEST_METHOD"]=== "GET"){
        $id_post=$_GET["id"];

        $post = new Post() ;

        $data = $post->getPoinUserById($id_post) ;

        if($data === false){
            echo '<h1>Pos tidak ditemukan (404)</h1><br> <a href="index-rey.php">Beranda</a>';
            exit;
        }  
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tabel Hadiah</title>
        <style>
        table {
            border-collapse: collapse; 
            margin: 20px auto; 
        }
        th, td {
            border: 1px solid #ccc; 
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .container {
            max-width: 1536px;
            margin: 0 auto;
            padding: 20px;
        }

        .button {
            color: white;
            padding: 4px 10px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            margin: 2px 4px;
        }

        .button:hover {
            filter: brightness(120%);
            cursor: pointer;
        }

        .create-btn {
            background-color: #008CBA; 
            padding: 8px 20px;
        }

        .action-buttons {
            display: flex;
            text-align: center;
            margin: 5px;
        }

        .edit-btn {
            background-color: #008CBA;
        }

        .no-padding {
            padding: 0px;
        }

        .delete-btn {

         background-color: #f44336; /* Warna latar belakang merah */
   
         height: 28px; /* Tinggi tombol, disesuaikan dengan preferensi desain Anda */

        }


   
        .alert {

        position: relative;

        padding: 15px;

        margin-bottom: 20px;

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
        <div class="container">
            <h1>Hadiah</h1>
            <h1>Poin Anda: <?= $data->poin ?> </h1>
            
            <table>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Poin yang dibutuhkan</th>
                <th>Action</th>
                </tr>
                <?php foreach ($postrewards as $show) : ?>
                <tr>
                    <td><?= $show->id?></td>
                    <td><?= $show->nama?></td>
                    <td><?= $show->deskripsi?></td>
                    <td><?= $show->poin?></td>
        
                    <td class="no-padding"> 
                        <div class="action-buttons">
                        <?php if ($data->poin >= $show->poin) : ?>
                            <a class="button edit-btn" href="tukar-poin.php?id=<?= $show->id?>">Tukar</a>
                        <?php else : ?>
                            <a class="button edit-btn" onclick="displayNotification()">Tukar</a>
                        <?php endif; ?> 
                            
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </table>
        </div>
        <script>
    function displayNotification() {
        alert('Poin tidak mencukupi untuk menukar hadiah ini.');
    }
  // Script untuk konfirmasi delete

  function confirmDelete(postId) {

    const result = confirm("Apakah Anda yakin ingin menghapus postingan ini?");

    if (result) {

      // Redirect ke delete-post.php

      window.location.href = `delete-post.php?id=${postId}`;

    }

  }



  // Menutup notifikasi ketika tombol "x" diklik

  document.addEventListener('DOMContentLoaded', function () {

    const closeButtons = document.querySelectorAll('.alert .close');

    closeButtons.forEach(function (button) {

      button.addEventListener('click', function () {

        const alert = this.parentNode;

        alert.classList.add('hide');

        setTimeout(() => {

          alert.style.display = 'none'; // Menyembunyikan notifikasi setelah selesai transisi

        }, 1700);

      });

    });

  });

  </script>
    </body>
</html>