<?php 
    // menghubungkan dengan file php lainnya
    require 'php/functions.php';

    // melakukan query
    $buku = query("SELECT * FROM buku");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1 align="center">Buku Kita<img src="assets/img/unch.png"></h3>
        <table cellpadding="10" cellspacing="0" border="1" align="center">
            <tr>
                <th>ID</th>
                <th>DISPLAY</th>
                <th>JUDUL</th>
                <th>PENGARANG</th>
                <th>PENERBIT</th>
                <th>HARGA</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach($buku as $bk) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><img width="100px" src="assets/img/<?= $bk["display"]; ?>"></td>
                <td><?= $bk["judul"] ?></td>
                <td><?= $bk["pengarang"] ?></td>
                <td><?= $bk["penerbit"] ?></td>
                <td><?= $bk["harga"] ?></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>    
        </table>
    </div>
</body>
</html>