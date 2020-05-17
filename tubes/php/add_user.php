<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

// menghubungkan dengan file php lainnya
require 'functions.php';

if (isset($_POST['register'])) {

  if (registrasi($_POST) > 0) {
    echo "<script>
          alert('Registrasi berhasil!')
          document.location.href = 'login.php';
          </script>";
  } else {
    echo "<script>
          alert('Registrasi gagal')
          document.location.href = 'login.php';
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
  <link rel="stylesheet" href="../css/add_user.css">

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
      <h3><i class="fas fa-users"></i> Add user</h3>
      <hr>


      <div class="card-body">
        <form method="POST" action="" class="justify-content-center text-center">
          <div class="form-group row">
            <label for="username" class="col-md-4 col-form-label">Username</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="username" autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label">Password</label>
            <div class="col-md-6">
              <input type="password" class="form-control" name="password1" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label">Confirm Password</label>
            <div class="col-md-6">
              <input type="password" class="form-control" name="password2" required>
            </div>
          </div>
          <button type="submit" class="btn btn-warning" name="register">Add user</button>
        </form>
      </div>

      <hr>
    </div>
  </div>
  <!-- container -->


  </script>
</body>

</html>