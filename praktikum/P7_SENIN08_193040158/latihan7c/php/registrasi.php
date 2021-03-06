<?php
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookthrmn Digital Register</title>

  <!-- MY CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/registrasi.css">


  <!-- SCRIPT -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Bookthrmn
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="../index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#produk">Product</a>
          <a class="nav-item nav-link btn btn-warning" href="login.php">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- NAVBAR:END -->

  <!-- registrasi -->
  <section id="register">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3>Register</h3>
            </div>
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
                    <input type="password" class="form-control" name="password" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-warning" name="register">Register</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- registrasi -->


  <!-- footer -->
  <section id="footer">
    <div class="footer-top bg-light">
      <div class="container">
        <hr>
        <div class="row pt-5">
          <div class="col-md-3">
            <h5 class="pb-3">FEATURED</h5>
            <p>Lorem.</p>
            <p>Lorem.</p>
            <p>Lorem.</p>
            <p>Lorem.</p>
          </div>
          <div class="col-md-3">
            <h5 class="pb-3">ACCOUNT</h5>
            <p>Lorem.</p>
            <p>Lorem.</p>
            <p>Lorem.</p>
            <p>Lorem.</p>
          </div>
          <div class="col-md-3">
            <h5 class="pb-3">ABOUT</h5>
            <p>Lorem.</p>
            <p>Lorem.</p>
            <p>Lorem.</p>
            <p>Lorem.</p>
          </div>
          <div class="col-md-3">
            <h5 class="pb-3">PAYMENT</h5>
            <p>Lorem.</p>
            <p>Lorem.</p>
            <p>Lorem.</p>
            <p>Lorem.</p>
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