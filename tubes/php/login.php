<?php
session_start();

require 'functions.php';

if (isset($_SESSION['username'])) {
  header("Location: admin.php");
  exit;
}

if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  // ambil username berdasarkan id
  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username' ");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($hash === hash('sha256', $row['id'], false)) {
    $_SESSION['username'] = $row['username'];
    header("Location: admin.php");
    exit;
  }
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($cek_user) > 0) {
    $row = mysqli_fetch_assoc($cek_user);

    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['hash'] = hash('sha256', $row['id'], false);
    }

    // jika remember dicentang
    if (isset($_POST['remember'])) {
      setcookie('username', $row['username'], time() + 60 * 60 * 24);
      $hash = hash('sha256', $row['id']);
      setcookie('hash', $hash, time() + 60 * 60 * 24);
    }


    if (hash('sha256', $row['id']) == $_SESSION['hash']) {
      header("Location: admin.php");
      die;
    }
    header("Location: ../index.php");
    die;
  }
  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookthrmn Digital Login</title>
  <link rel="icon" type="image/png" href="../assets/img/aset/icon.png">

  <!-- MY CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login.css">

  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="../css/all.min.css">

  <!-- SCRIPT -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="../index.php">
        Bookthrmn
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="../index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="all_product.php">Product</a>
          <a class="nav-item nav-link btn btn-warning" href="login.php">Login <i class="fas fa-sign-in-alt"></i></a>
        </div>
      </div>
    </div>
  </nav>
  <!-- NAVBAR:END -->

  <!-- login -->
  <section id="login">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="row">
            <div class="col-sm-6">
              <h4>
                Read books wherever and whenever</h4>
              <img src="../assets/img/aset/photo.png" alt="">
            </div>
            <div class="col-sm-6">
              <div class="card card-login">
                <form class="login-form text-center" action="" method="POST">
                  <h1 class="mb-5 font-weight-normal text-uppercase">Login</h1>
                  <?php if (isset($error)) : ?>
                    <div class="alert alert-danger font-italic" role="alert">
                      Username / Password Wrong !
                    </div>
                  <?php endif; ?>
                  <div class="form-group">
                    <input type="text" name="username" for="username" class="form-control form-control-lg" autofocus autocomplete="off" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" for="password" class="form-control form-control-lg" placeholder="Password" required>
                  </div>
                  <div class="forgot-link d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="remember" name="remember">
                      <label for="remember">Remember me</label>
                    </div>
                  </div>
                  <button type="submit" name="submit" class="btn mt-5 btn-warning btn-custom btn-block text-uppercase rounded-pill btn-lg">
                    Login
                  </button>
                  <p class="mt-3 font-weight-normal">Don't have an account <a href="registrasi.php" class="font-weight-bold">Register Now</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- login -->

  <!-- footer -->
  <section>
    <div class="footer-top bg-light">
      <div class="container">
        <hr class="mt-5">
        <div class="row pt-5">
          <div class="col-6 col-md-3">
            <h5 class="pb-3">SHOPPING</h5>
            <p>Shop</p>
            <p>Payment</p>
            <p>Delivery</p>
          </div>
          <div class="col-6 col-md-3">
            <h5 class="pb-3">ABOUT ME</h5>
            <p>About Me</p>
            <p>Our store</p>
            <p>Cooperation</p>
          </div>
          <div class="col-6 col-md-3">
            <h5 class="pb-3">DELIVERY</h5>
            <p>Pick up in store</p>
            <p>Grab send</p>
            <p>Go-ojek send</p>
          </div>
          <div class="col-6 col-md-3">
            <h5 class="pb-3">PAYMENT</h5>
            <p>Mandiri</p>
            <p>BRI</p>
            <p>BNI</p>
            <p>Dana</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- footer -->

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

</body>

</html>