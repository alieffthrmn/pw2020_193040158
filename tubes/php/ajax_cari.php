<?php
require '../php/functions.php';
$buku = cari($_GET['keyword']);
?>
<?php if (empty($buku)) : ?>
  <div class="alert alert-danger text-center font-weight-bold" role="alert">
    Product not found !
  </div>
<?php else : ?>
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
<?php endif; ?>