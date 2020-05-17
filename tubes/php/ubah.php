<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

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
  <title>Change data</title>
  <!-- MY CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/tambah.css">

  <!-- SCRIPT -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <p class="navbar-brand" href="../index.php">
        Bookthrmn Admin Panel
      </p>
    </div>
  </nav>
  <!-- NAVBAR:END -->


  <!-- tambah -->
  <section id="tambah">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3>Change data panel bookthrmn</h3>
            </div>

            <div class="card-body">
              <form method="POST" class="justify-content-center text-center" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $bk['id']; ?>">
                <div class="form-group row">
                  <label for="judul" class="col-md-4 col-form-label">Title</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="judul" autofocus autocomplete="off" required value="<?= $bk['judul']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pengarang" class="col-md-4 col-form-label">Author</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="pengarang" autocomplete="off" required value="<?= $bk['pengarang']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="penerbit" class="col-md-4 col-form-label">Publisher</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="penerbit" autocomplete="off" required value="<?= $bk['penerbit']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="harga" class="col-md-4 col-form-label">Price</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="harga" autocomplete="off" required value="<?= $bk['harga']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="harga" class="col-md-4 col-form-label">Display</label>
                  <div class="col-md-6">
                    <input type="hidden" name="gambar_lama" value="<?= $bk['display']; ?>">
                    <div class="custom-file">
                      <input type="file" name="display" class="custom-file-input gambar" id="customFile display" onchange="previewImage()">
                      <label class=" custom-file-label" for="customFile"><?= $bk['display']; ?></label>
                    </div>
                    <img src="../assets/img/<?= $bk['display']; ?>" width="100" class="img-preview img-thumbnail">
                  </div>
                </div>
                <button type="submit" class="btn btn-warning" name="ubah">Change Data</button>
                <button class="btn btn-warning back">
                  <a href="admin.php" style="text-decoration: none; color: black;">Back to admin panel</a>
                </button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- tambah -->

  <!-- footer;bottom -->
  <footer class="bg-dark text-white mt-5">
    <div class="container">
      <div class="row pt-3">
        <div class="col text-center">
          <p> &copy; 2020 Bookthrmn Digital.</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer;bottom -->

  <script src="../js/script.js"></script>
  <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>
</body>

</html>