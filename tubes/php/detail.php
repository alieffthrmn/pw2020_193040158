<?php

// Mengecek apakah ada id yang dikirimkan
// jika tidak ada maka akan dikembalikan ke index.php
if (!isset($_GET['id'])) {
	header("location: ../index.php");
}

require 'functions.php';

// Mengambil id dari url
$id = $_GET['id'];

// Melakukan query dengan parameter id yang diambil dari url
$buku = query("SELECT * FROM buku WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Detail Product</title> <!-- MY CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/detail.css">

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
					<a class="nav-item nav-link" href="#produk">Product</a>
					<a class="nav-item nav-link btn btn-warning" href="login.php">Login <i class="fas fa-sign-in-alt"></i></a>
				</div>
			</div>
		</div>
	</nav>
	<!-- NAVBAR:END -->

	<!-- container -->
	<div class="container">
		<div class="row pt-3">
			<div class="col p-6">
				<p>Home / <?= $buku["judul"]; ?> / <b>Details</b></p>
			</div>
		</div>
	</div>
	<!-- container -->

	<!-- details -->
	<section id="details">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 pl-lg-0">
					<div class="card card-details">
						<h1><?= $buku['judul'] ?></h1>
						<p><?= $buku["pengarang"] ?></p>
						<div class="display">
							<img class="img-fluid imb-thumbnail" src="../assets/img/<?= $buku['display'] ?>" alt="">
							<div class="float-right">
								<h5><b>Publisher : </b><?= $buku["penerbit"] ?></h5>
							</div>
						</div>
						<p class="pt-4">Bagikan :
							<a href="#" style="color: #212121; font-size: 20px;"><i class="fab fa-facebook-square ml-1"></i></a>
							<a href="#" style="color: #212121; font-size: 20px;"><i class="fab fa-instagram-square ml-1"></i></a>
							<a href="#" style="color: #212121; font-size: 20px;"><i class="fab fa-whatsapp-square ml-1"></i></a>
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card  border-warning card-details card-right">
						<h3>Soft cover</h3>
						<p>Price :</p>
						<p style="color: red">IDR <?= $buku["harga"]; ?>,-</p>
					</div>
					<div class="buy pt-3 text-center">
						<a href="#" class="btn btn-warning font-weight-bold">Buy</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- details -->


	<!-- footer -->
	<section>
		<div class="footer-top bg-light">
			<div class="container">
				<hr class="mt-5">
				<div class="row pt-5">
					<div class="col-md-3">
						<h5 class="pb-3">SHOPPING</h5>
						<p>Shop</p>
						<p>Payment</p>
						<p>Delivery</p>
					</div>
					<div class="col-md-3">
						<h5 class="pb-3">ABOUT ME</h5>
						<p>About me</p>
						<p>Our store</p>
						<p>Cooperation</p>
					</div>
					<div class="col-md-3">
						<h5 class="pb-3">DELIVERY</h5>
						<p>Pick up in store</p>
						<p>Grab send</p>
						<p>Go-ojek send</p>
					</div>
					<div class="col-md-3">
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