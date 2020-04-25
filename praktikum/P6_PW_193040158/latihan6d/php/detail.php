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
 	<title>Document</title>
 	<link rel="stylesheet" href="../css/style.css">
 </head>
 <body>
 	<div class="container">
 		<h1 align="center">PROFILE BUKU</h1>
 		<div class="display">
 			<img width="100px" src="../assets/img/<?= $buku['display'] ?>" alt="">
 		</div>
 		<div class="keterangan">
 			<p><?= $buku['judul'] ?></p>
 			<p><?= $buku["pengarang"] ?></p>
 			<p><?= $buku["penerbit"] ?></p>
 			<p><?= $buku["harga"] ?></p>
 		</div>
		
		<div class="clear"></div>

 		<button class="back"><a href="../index.php">Kembali</a></button>
 	</div>
 </body>
 </html>

