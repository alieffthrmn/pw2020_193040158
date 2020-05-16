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

function upload()
{
	$nama_file = $_FILES['display']['name'];
	$tipe_file = $_FILES['display']['type'];
	$ukuran_file = $_FILES['display']['size'];
	$error = $_FILES['display']['error'];
	$tmp_file = $_FILES['display']['tmp_name'];

	// ketika tidak ada gambar yang dipilih 
	if ($error == 4) {
		// echo "<script>
		//       alert('pilih gambar terlebih dahulu');
		//       </script>";
		return 'default.png';
	}

	// cek ekstensi file
	$daftar_gambar = ['jpg', 'jpeg', 'png'];
	$ekstensi_file = explode('.', $nama_file);
	$ekstensi_file = strtolower(end($ekstensi_file));
	if (!in_array($ekstensi_file, $daftar_gambar)) {
		echo "<script>
          alert('yang anda pilih bukan gambar!');
          </script>";
		return false;
	}

	// cek tipe file
	if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
		echo "<script>
          alert('yang anda pilih bukan gambar!');
          </script>";
		return false;
	}

	// cek ukuran file
	// maksimal 5mb
	if ($ukuran_file > 5000000) {
		echo "<script>
          alert('ukuran terlalu besar !');
          </script>";
		return false;
	}

	// lolos pengecekan
	// siap upload file
	// generate nama file baru
	$nama_file_baru = uniqid();
	$nama_file_baru .= '.';
	$nama_file_baru .= $ekstensi_file;
	move_uploaded_file($tmp_file, '../assets/img/' . $nama_file_baru);

	return $nama_file_baru;
}

function tambah($data)
{
	$conn = koneksi();

	// $display = htmlspecialchars($data['display']);
	$judul = htmlspecialchars($data['judul']);
	$pengarang = htmlspecialchars($data['pengarang']);
	$penerbit = htmlspecialchars($data['penerbit']);
	$harga = htmlspecialchars($data['harga']);

	$display = upload();
	if (!$display) {
		return false;
	}

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

	// menghapus gambar difolder img
	$buku = query("SELECT * FROM buku WHERE id = $id")[0];
	if ($buku['display'] != 'default.png') {
		unlink('../assets/img/' . $buku['display']);
	}

	mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	$conn = koneksi();

	$id = $data['id'];
	$gambar_lama = htmlspecialchars($data['gambar_lama']);
	$judul = htmlspecialchars($data['judul']);
	$pengarang = htmlspecialchars($data['pengarang']);
	$penerbit = htmlspecialchars($data['penerbit']);
	$harga = htmlspecialchars($data['harga']);

	$display = upload();
	if (!$display) {
		return false;
	}

	if ($display == 'default.png') {
		$display = $gambar_lama;
	}


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
	$password1 = mysqli_real_escape_string($conn, $data['password1']);
	$password2 = mysqli_real_escape_string($conn, $data['password2']);

	// jika username / pw kosong
	if (empty($username) || empty($password1) || empty($password2)) {
		echo "<script>
          alert('username / password tidak boleh kosong!');
          document.location.href = 'registrasi.php';
          </script>";
		return false;
	}

	// jika username sudah ada
	if (query("SELECT * FROM user WHERE username = '$username'")) {
		echo "<script>
    alert('username sudah terdaftar');
    document.location.href = 'registrasi.php';
    </script>";
		return false;
	}

	// jika konfirmasi password tidak sesuai
	if ($password1 !== $password2) {
		echo "<script>
          alert('konfirmasi password tidak sesuai!');
          document.location.href = 'registrasi.php';
          </script>";
		return false;
	}

	// jika password < 5 digit
	if (strlen($password1) < 5) {
		echo "<script>
        alert('password terlalu pendek!');
        document.location.href = 'registrasi.php';
        </script>";
		return false;
	}

	// jika username & password sudah sesuai
	// enkripsi password
	$password_baru = password_hash($password1, PASSWORD_DEFAULT);
	// insert ke tabel user
	$query = "INSERT INTO user
            VALUES
            (null, '$username', '$password_baru')";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

function cari($keyword)
{
	$conn = koneksi();

	$query = "SELECT * FROM buku WHERE
                judul LIKE '%$keyword%' OR
                pengarang LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%' OR
                harga LIKE '%$keyword%' ";

	$result = mysqli_query($conn, $query);

	$rows = [];
	while ($row = mysqli_fetch_array($result)) {
		$rows[] = $row;
	}

	return $rows;
}
