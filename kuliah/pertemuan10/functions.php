<?php

function koneksi()
{
  return mysqli_connect('localhost', 'pw19158', '#Akun#193040158#', 'pw19158_pw_193040158');
}


function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
  }

  return $rows;
}


function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);


  $query = "INSERT INTO
              mahasiswa
            VALUES
            (null, '$nama', '$nrp', '$email', '$jurusan', '$gambar');
  
  ";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
