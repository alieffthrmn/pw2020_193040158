<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

// menghubungkan dengan file php lainnya
require 'functions.php';
$buku = query("SELECT * FROM buku");

if (isset($_POST['cari']))
  $buku = cari($_POST['keyword']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Bookthrmn Admin Panel</title>

  <!-- MY CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/admin.css">

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
      <h3><i class="fas fa-book"></i> All Product</h3>
      <form class="form-inline pt-4" method="POST">
        <input class="form-control mr-sm-2 keyword" name="keyword" size="50px" autocomplete="off" type="search" placeholder="Search product" aria-label="Search">
        <button class="btn btn-warning  my-2 my-sm-0 tombol-cari" type="submit" name="cari">Search</button>
      </form>
      <?php if (empty($buku)) : ?>
        <div class="alert alert-warning text-center font-weight-bold" role="alert">
          Product not found !
        </div>
      <?php else : ?>
        <hr>
        <div class="container-admin">
          <div class="row text-white">
            <?php foreach ($buku as $bk) : ?>
              <div class="col-md-4 pt-2">
                <div class="card">
                  <img class="card-img-top ml-5" src="../assets/img/<?= $bk["display"]; ?>" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text text-center">
                      <h5 style="font-size: 14px; text-align:center; color:black;"><?= $bk["judul"]; ?></h5>
                    </p>
                    <p class="card-text text-center">
                      <a href="ubah.php?id=<?= $bk['id'] ?>" class="btn btn-warning btn-sm">Change product</a>
                      <a href="hapus.php?id=<?= $bk['id'] ?>" class="btn btn-warning btn-sm" onclick="return confirm('Hapus Data ???')">Delete product</a>
                    </p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
      <hr>

    </div>
  </div>
  <!-- container -->


  <script src="../js/script_admin.js"></script>
</body>

</html>