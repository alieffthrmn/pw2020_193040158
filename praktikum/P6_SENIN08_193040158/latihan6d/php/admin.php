<?php
// menghubungkan dengan file php lainnya
require 'functions.php';

// melakukan query
$buku = query("SELECT * FROM buku");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
    .add {
      margin-bottom: 10px;
    }

    .add a {
      color: #212121;
      text-decoration: none;
      font-size: 25px;
      font-family: arial;
    }

    .add a:hover {
      color: red;
    }
  </style>
</head>

<body>
  <div class="add">
    <a href="tambah.php">Tambah Data</a>
  </div>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>DISPLAY</th>
      <th>JUDUL</th>
      <th>PENGARANG</th>
      <th>PENERBIT</th>
      <th>HARGA</th>
    </tr>

    <?php $i = 1;
    foreach ($buku as $bk) :
    ?>
      <tr>
        <td><?= $i; ?></td>
        <td>
          <a href="ubah.php?id=<?= $bk['id']; ?>"><button>Ubah</button></a>
          <a href="hapus.php?id=<?= $bk['id']; ?>" onclick="return confirm('Hapus Data ???')"><button>Hapus</button></a>
        </td>
        <td><img width="100px" src="../assets/img/<?= $bk["display"]; ?>"></td>
        <td><?= $bk["judul"] ?></td>
        <td><?= $bk["pengarang"] ?></td>
        <td><?= $bk["penerbit"] ?></td>
        <td><?= $bk["harga"] ?></td>
      </tr>
      <?php $i++ ?>
    <?php endforeach; ?>
  </table>
</body>

</html>