<?php
require 'functions.php';

$id = $_GET['id'];
$bk = query("SELECT * FROM buku WHERE id = $id")[0];

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('Data berhasil diubah');
            document.location.href = 'admin.php';
          </script>";
  } else {
    echo "<script>
            alert('Data gagal diubah');
            document.location.href = 'admin.php';
          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>Form Update Data Barang</h3>
  <form action="" method="POST">
    <input type="hidden" name="id" id="id" value="<?= $bk['id']; ?>">
    <ul>
      <li>
        <label for="display">Display</label><br>
        <input type="text" name="display" id="display" required value="<?= $bk['display']; ?>"><br><br>
      </li>
      <li>
        <label for="judul">Judul</label><br>
        <input type="text" name="judul" id="judul" required value="<?= $bk['judul']; ?>"><br><br>
      </li>
      <li>
        <label for=" pengarang">Pengarang</label><br>
        <input type="text" name="pengarang" id="pengarang" required value="<?= $bk['pengarang']; ?>"><br><br>
      </li>
      <li>
        <label for="penerbit">Penerbit</label><br>
        <input type="text" name="penerbit" id="penerbit" required value="<?= $bk['penerbit']; ?>"><br><br>
      </li>
      <li>
        <label for="harga">Harga</label><br>
        <input type="text" name="harga" id="harga" required value="<?= $bk['harga']; ?>"><br><br>
      </li>
      <br>
      <button type="submit" name="ubah">Ubah Data!</button>
      <button type="submit">
        <a href="../index.php" style="text-decoration: none; color: black;">Kembali</a>
      </button>
    </ul>
  </form>
</body>

</html>