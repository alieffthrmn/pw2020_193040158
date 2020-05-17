<!-- LOH EH 193040158 -->

<?php 
    // Melakukan koneksi ke database
    $conn = mysqli_connect("localhost", "root", "") or die("Koneksi ke DB Gagal");

    // Memilih databese
    mysqli_select_db($conn, "tubes_193040158") or die("Database salah!");

    // query mengambil objek dari tabel didalam database
    $result = mysqli_query($conn, "SELECT * FROM buku");
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
            <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><img width="100px" src="assets/img/<?= $bk["display"]; ?>"></td>
                <td><?= $row["judul"] ?></td>
                <td><?= $row["pengarang"] ?></td>
                <td><?= $row["penerbit"] ?></td>
                <td><?= $row["harga"] ?></td>
            </tr>
            <?php $i++ ?>
            <?php endwhile; ?>    
        </table>
    </div>
</body>
</html>