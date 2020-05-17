<?php
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
  <title>Bookthrmn Digital</title>
  <link rel="icon" type="image/png" href="../assets/img/aset/icon.png">

  <!-- MY CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/index.css">

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

  <!-- Carousel -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="../assets/img/aset/slide1.png" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h3>Recommended Product</h3>
          <p>Lorem ipsum dolor sit amet.</p>
          <a href="#produk" class="btn btn-outline-dark">Show Product</a>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../assets/img/aset/slide2.png" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h3>With Family</h3>
          <p>Lorem ipsum dolor sit amet.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../assets/img/aset/slide3.png" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h3>Learning</h3>
          <p>Lorem ipsum dolor sit amet.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Carousel:1 -->

  <!-- container -->
  <section id="produk">
    <div class="container">
      <div class="row mb-4 pt-4">
        <div class="col text-center">
          <h3>All Product</h3>
        </div>
      </div>
      <form class="form-inline justify-content-center" method="POST">
        <input class="form-control mr-sm-2 keyword" name="keyword" size="50px" autocomplete="off" type="search" placeholder="Search product" aria-label="Search">
        <button class="btn btn-warning  my-2 my-sm-0 tombol-cari" type="submit" name="cari">Search</button>
      </form>
      <hr>
      <?php if (empty($buku)) : ?>
        <div class="alert alert-danger text-center font-weight-bold" role="alert">
          Product not found !
        </div>
      <?php else : ?>
        <div class="container-produk">
          <div class="row pt-4">
            <?php foreach ($buku as $bk) : ?>
              <div class="col-6 col-md-3 pt-2">
                <div class="card">
                  <a href="detail.php?id=<?= $bk['id'] ?>"><img class="card-img-top ml-3" src="../assets/img/<?= $bk["display"]; ?>" alt="Card image cap"></a>
                  <div class="card-body">
                    <p class="card-text text-center">
                      <h5 style="font-size: 12px; text-align:center;"><?= $bk["judul"]; ?></h5>
                    </p>
                    <p class="card-text text-center"><a href="detail.php?id=<?= $bk['id'] ?>" class="btn btn-warning btn-sm">View details</a></p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <!-- container:produk -->

  <!-- services -->
  <section id="services" class="pb-2 mb-5">
    <div class="row mr-2 pt-4 text-center pb-2">
      <div class="col-md-3"><img src="../assets/img/services/padlock.png" alt="">
        <h6 class="text-white pt-2">SECURED PAYMENT</h6>
      </div>
      <div class="col-md-3"><img src="../assets/img/services/truck.png" alt="">
        <h6 class="text-white pt-2">EASY RETURN & EXCHANGE</h6>
      </div>
      <div class="col-md-3"><img src="../assets/img/services/24-hours.png" alt="">
        <h6 class="text-white pt-2">SHOP 24/7</h6>
      </div>
      <div class="col-md-3"><img src="../assets/img/services/shopping-bag.png" alt="">
        <h6 class="text-white pt-2">FREE PACKAGING BOX</h6>
      </div>
    </div>
  </section>
  <!-- services -->

  <!-- footer -->
  <section>
    <div class="footer-top bg-light">
      <div class="container">
        <hr>
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

  <!-- button -->
  <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

  <script src="../js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
  <script>
    var scroll = new SmoothScroll('a[href*="#"]');
  </script>
</body>

</html>