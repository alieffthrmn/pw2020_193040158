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

function registrasi($data)
{
	$conn = koneksi();
	$username = strtolower(stripcslashes($data['username']));
	$password = mysqli_real_escape_string($conn, $data['password']);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
					alert('Username sudah digunakan');
					</script>";
		return false;
	}

	// enskripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambah user baru
	$query_tambah = "INSERT INTO user VALUES('','$username','$password')";
	mysqli_query($conn, $query_tambah);

	return mysqli_affected_rows($conn);
}
