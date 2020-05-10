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


	<!-- SCRIPT -->
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

</head>

<body>
	<!-- NAVBAR -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="../index.php">
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
						<p class="pt-4">Bagikan : </p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card  border-primary card-details card-right">
						<h3>Soft cover</h3>
						<p>Price :</p>
						<p style="color: red">Rp. <?= $buku["harga"]; ?>,-</p>
					</div>
					<div class="buy pt-2 text-center">
						<a href="login.php" class="btn btn-primary">Login to buy</a>
					</div>
					<div class="buy pt-2 text-center">
						<a href="" class="btn btn-primary">Add to wishlist</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- details -->


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