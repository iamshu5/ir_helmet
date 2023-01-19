<?php 
require 'admin/koneksi.php';
include 'layout/header.php';
?>

<!-- HOME -->
<section class="container mt-5 pt-5">
    <div class="row text-center">
      <!-- mengambil tabel produk  -->
      <?php
      $ambilData = $conn->query("SELECT * FROM produk");?>
      <?php while($tampil = $ambilData->fetch_assoc()){ ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
              <div class="card shadow mt-4 bg-white text-black">
                  <div class="card-header">
                      <div class="card-body">
                        <img src="assets/image/foto_produk/<?= $tampil['foto_produk'] ?>" class="mb-2 shadow-sm rounded mx-auto d-block img-fluid card-img-top" width="130" height="100">
                          <h6 class="card-title"><?= $tampil['nama_produk'] ?></h6>
                            <p class="card-text">   
                              <!-- menjumlah banyaknya id harga -->
                              Rp. <?= number_format($tampil['harga_produk'], 0, ',', '.') ?></p>
                              <a class="btn btn-info text-white mt-2 d-grid fw-bold" href="detail.php?id=<?= $tampil['id_produk'] ?>">PRODUCT DETAIL</a>
                            </p>
                      </div>
                  </div>
              </div>
          </div>
        <?php } ?>

    </div> <!-- END ROW -->
</div> <!-- END CONTAINER -->
<!-- END HOME -->
<?php include 'layout/footer.php'?>