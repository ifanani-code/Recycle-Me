<?php
    require_once(dirname(__FILE__) ."../include/post-rey.php");
   

  

    $post = new Post();
    $post = $post->showTransaksi();
    $max_content_char = 100;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Transaksi</title>
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
            <h1>Log Transaksi</h1>
            <a class="button create-btn" href="index.php">Back</a>
            <table>
            <tr>
                <th>User Id</th>
                <th>Reward Id</th>
                <th>Tanggal</th>
                
                </tr>
                <?php foreach ($post as $post) : ?>
                <tr>
                    <td><?= $post->user_id?></td>
                    <td><?= $post->reward_id?></td>
                    <td><?= $post->tgl_transaksi?></td>
                   
                </tr>
            <?php endforeach ?>
            </table>
        </div>

    </body>
</html>