<?php 
require 'admin/koneksi.php';
include "layout/header.php"
?>
<section class="container mt-5 pt-5">
<a href="./index.php" class="btn btn-warning mb-3 btn-sm text-white shadow-sm"><i class="fa-solid fa-arrow-left"></i></a>
    <h1 class="h3 mb-2 fw-bold">CART TABLE</h1>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo Product</th>
                            <th>Product Name</th>
                            <th>Rp.</th>
                            <th>QTY</th>
                            <th>TOTAL</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- nomor di mulai dari 1 -->
                            <?php $nomer=1;?>
                            <!-- query join keranjang dan produk -->
                            <?php
                            $ambilData = $conn->query("SELECT keranjang.id_keranjang, produk.nama_produk, produk.foto_produk, produk.harga_produk, keranjang.qty, (produk.harga_produk * keranjang.qty) AS total_harga FROM keranjang LEFT JOIN produk ON produk.id_produk = keranjang.id_produk");?>
                            <?php if($ambilData->num_rows == 0)
                            echo "<td colspan='7' class='text-center'>No Product in Cart.</td>";
                            ?>
                            <?php while($tampil = $ambilData->fetch_assoc()){?>
                            <td><?= $nomer;?></td>
                            <td><img src="./assets/image/foto_produk/<?= $tampil['foto_produk'];?>" width="80"></td>
                            <td><?= $tampil['nama_produk']?></td>
                            <td>
                                <!-- menghitung banyaknya harga   -->
                                Rp. <?= number_format($tampil['harga_produk'], 0, ',', '.') ?></td>
                            <td><?= $tampil['qty']?></td>
                            <td>
                                <!-- menghitung  -->
                                Rp.<?= number_format($tampil['total_harga'], 0, ',', '.')?></td>
                            <td><a class="btn btn-danger" href="delete-keranjang.php?id=<?= $tampil['id_keranjang'] ?>">DELETE</a></td>
                        </tr>
                        <?php $nomer++; ?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include "layout/footer.php"?>