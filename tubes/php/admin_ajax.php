<?php
require 'functions.php';
$buku = cari($_GET['keyword']);
?>
<?php if (empty($buku)) : ?>
  <div class="alert alert-warning text-center font-weight-bold" role="alert">
    Product not found !
  </div>
<?php else : ?>
  <div class="row text-white">
    <?php foreach ($buku as $bk) : ?>
      <div class="col-md-4 pt-2">
        <div class="card">
          <img class="card-img-top ml-5" src="../assets/img/<?= $bk["display"]; ?>" alt="Card image cap">
          <div class="card-body">
            <p class="card-text text-center">
              <h5 style="font-size: 14px; text-align:center; color:black;"><?= $bk["judul"]; ?></h5>
            </p>
            <p class="card-text text-center">
              <a href="ubah.php?id=<?= $bk['id'] ?>" class="btn btn-warning btn-sm">Change product</a>
              <a href="hapus.php?id=<?= $bk['id'] ?>" class="btn btn-warning btn-sm" onclick="return confirm('Hapus Data ???')">Delete product</a>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>