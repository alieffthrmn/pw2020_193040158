<?php
// menghubungkan dengan file php lainnya
require 'functions.php';

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
  <form action="" method="get">
    <input type="text" name="keyword" size="30px" placeholder="Masukkan keyword pencarian ..." autocomplete="off" autofocus>
    <button type="submit" name="cari">Cari!</button>
  </form>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>DISPLAY</th>
      <th>JUDUL</th>
      <th>PENGARANG</th>
      <th>PENERBIT</th>
      <th>HARGA</th>
    </tr>
    <?php if (empty($buku)) : ?>
      <tr>
        <td colspan="7">
          <h1>Data Tidak Ditemukan</h1>
        </td>
      </tr>
    <?php else : ?>
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
    <?php endif; ?>
  </table>
</body>

</html>