<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

// menghubungkan dengan file php lainnya
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
  <title>Bookthrmn Admin Panel</title>
  <link rel="icon" type="image/png" href="../assets/img/aset/icon.png">

  <!-- MY CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/produk.css">

  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="../css/all.min.css">

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
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link btn btn-warning mb-3" href="../index.php">Index page <i class="fas fa-home"></i></a>
          <a class="nav-item nav-link btn btn-warning mb-3" href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
        </div>
      </div>
    </div>
  </nav>
  <!-- NAVBAR:END -->

  <!-- container -->
  <div class="row no-gutters">
    <div class="col-md-2 bg-dark pr-3 pt-4 nav-side">
      <nav class="nav flex-column ml-3 mb-5">
        <img src="../assets/img/aset/profile.jpg" class="rounded-circle profile" width="125">
        <p class="text-white text-center mt-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.5); font-weight: bold; padding-bottom: 25px;">Admin</p>
        <a class="nav-link side active text-white" href="admin.php"><i class="fas fa-book"></i> Products</a>
        <hr class="bg-secondary">
        <a class="nav-link side text-white" href="add_product.php"><i class="fas fa-plus-square"></i> Add Products</a>
        <hr class="bg-secondary">
        <a class="nav-link side text-white" href="add_user.php"><i class="fas fa-users"></i> User</a>
      </nav>
    </div>
    <div class="col-md-10 p-5 pt-2">
      <h3><i class="fas fa-plus-square"></i> Add product</h3>
      <hr>

      <div class="card-body">
        <form method="POST" class="justify-content-center text-center" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="judul" class="col-md-4 col-form-label">Title</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="judul" autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="pengarang" class="col-md-4 col-form-label">Author</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="pengarang" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="penerbit" class="col-md-4 col-form-label">Publisher</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="penerbit" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="harga" class="col-md-4 col-form-label">Price</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="harga" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="harga" class="col-md-4 col-form-label">Display</label>
            <div class="col-md-6">
              <div class="custom-file">
                <input type="file" name="display" class="custom-file-input gambar" id="customFile display" onchange="previewImage()">
                <label class=" custom-file-label" for="customFile">Choose file</label>
              </div>
              <img src="../assets/img/default.png" width="100" class="img-preview img-thumbnail">
            </div>
          </div>
          <button type="submit" class="btn btn-warning" name="tambah">Add Data</button>
        </form>
      </div>

      <hr>
    </div>
  </div>
  <!-- container -->


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