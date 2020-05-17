<?php
require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'admin.php';
          </script>";
  } else {
    echo "<script>
            alert('Data gagal ditambahkan');
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
  <h3>Form Tambah Data Barang</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label for="display">Display</label><br>
        <input type="text" name="display" id="display" required><br><br>
      </li>
      <li>
        <label for="judul">Judul</label><br>
        <input type="text" name="judul" id="judul" required><br><br>
      </li>
      <li>
        <label for="pengarang">Pengarang</label><br>
        <input type="text" name="pengarang" id="pengarang" required><br><br>
      </li>
      <li>
        <label for="penerbit">Penerbit</label><br>
        <input type="text" name="penerbit" id="penerbit" required><br><br>
      </li>
      <li>
        <label for="harga">Harga</label><br>
        <input type="text" name="harga" id="harga" required><br><br>
      </li>
      <br>
      <button type="submit" name="tambah">Tambah Data!</button>
      <button type="submit">
        <a href="index.php" style="text-decoration: none; color: black;">Kembali</a>
      </button>
    </ul>
  </form>
</body>

</html>