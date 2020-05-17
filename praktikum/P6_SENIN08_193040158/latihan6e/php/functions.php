<?php
// function untuk melakukan koneksi ke database
function koneksi()
{
	$conn = mysqli_connect("localhost", "root", "") or die("Koneksi ke DB Gagal");
	mysqli_select_db($conn, "tubes_193040158") or die("Database salah!");

	return $conn;
}

// function untuk melakukan query ke database
function query($sql)
{
	$conn = koneksi();
	$result = mysqli_query($conn, "$sql");

	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function tambah($data)
{
	$conn = koneksi();

	$display = htmlspecialchars($data['display']);
	$judul = htmlspecialchars($data['judul']);
	$pengarang = htmlspecialchars($data['pengarang']);
	$penerbit = htmlspecialchars($data['penerbit']);
	$harga = htmlspecialchars($data['harga']);


	$query = "INSERT INTO
              buku
            VALUES
            ('', '$display', '$judul', '$pengarang', '$penerbit', '$harga');
  
  ";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapus($id)
{
	$conn = koneksi();

	mysqli_query($conn, "DELETE FROM buku WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	$conn = koneksi();

	$id = $data['id'];
	$display = htmlspecialchars($data['display']);
	$judul = htmlspecialchars($data['judul']);
	$pengarang = htmlspecialchars($data['pengarang']);
	$penerbit = htmlspecialchars($data['penerbit']);
	$harga = htmlspecialchars($data['harga']);


	$query = "UPDATE
              buku
            SET
            display = '$display',
						judul = '$judul',
						pengarang = '$pengarang',
						penerbit = '$penerbit',
						harga = '$harga'
						
						WHERE id = '$id'
						";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
