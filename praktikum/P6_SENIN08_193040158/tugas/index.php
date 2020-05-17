<?php
// menghubungkan dengan file php lainnya
require 'php/functions.php';

if (isset($_GET['cari'])) {
    $keyword = $_GET['keyword'];
    $buku = query("SELECT * FROM buku WHERE
                judul LIKE '%$keyword%' OR
                pengarang LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%' OR
                harga LIKE '%$keyword%' ");
} else {
    $buku = query("SELECT * FROM buku");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1 align="center">Buku Kita<img src="assets/img/unch.png"></h3>
            <form action="" method="get">
                <input type="text" name="keyword" size="30px" placeholder="Masukkan keyword pencarian ..." autocomplete="off" autofocus>
                <button type="submit" name="cari">Cari!</button>
            </form>
            <?php if (empty($buku)) : ?>
                <h1>Data tidak ditemukan</h1>
            <?php else : ?>
                <?php foreach ($buku as $bk) : ?>
                    <p class="judul">
                        <a href="php/detail.php?id=<?= $bk['id'] ?>">
                            <?= $bk['judul'] ?>
                        </a>
                    </p>
                <?php endforeach; ?>
            <?php endif; ?>
    </div>

    <a href="php/admin.php">
        <button type="">
            Masuk ke halaman admin
        </button>
    </a>


</body>

</html>