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
            <?php foreach ($buku as $bk) : ?>
                <p class="judul">
                    <a href="php/detail.php?id=<?= $bk['id'] ?>">
                        <?= $bk['judul'] ?>
                    </a>
                </p>
            <?php endforeach; ?>
    </div>

    <a href="php/admin.php">
        <button type="">
            Masuk ke halaman admin
        </button>
    </a>


</body>

</html>