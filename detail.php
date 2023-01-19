<?php 
require 'admin/koneksi.php';

// memilih table produk
$idProduk = $_GET['id'] ?? '';
$cek_produk = mysqli_query($conn, "SELECT *  FROM produk WHERE id_produk = '$idProduk'");
$data_produk = mysqli_fetch_assoc($cek_produk);

include 'layout/header.php';
?>

<section class="container mt-5 pt-5">
<a href="./index.php" class="btn btn-warning btn-sm mb-3 text-white"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="row">
        <div class="col-9 col-md-6 col-lg-6 col-sm-10 mt-4">
            <!-- memanggil foto dari database lalu disimpan di folder asssets/image -->
            <img src="assets/image/foto_produk/<?= $data_produk['foto_produk'] ?>" class="ms-5 mx-auto d-block img-fluid mt-4 rounded" width="300">
        </div>
            
        <div class="ms-3 col-12 col-md-12 col-sm-12 col-lg-4 mt-5">
            <!-- memanggil data nama produk  -->
            <h2 class="fw-bold"><?= $data_produk['nama_produk'] ?></h2>
            <!-- memeanggil data harga produk  -->
            <h4>Rp. <?= number_format($data_produk['harga_produk'], 0, ',', '.') ?></h4>
            <!-- memanggil data deskripsi produk  -->
            <p class="mt-4"><?= nl2br($data_produk['deskripsi_produk']) ?></p>

            <form action="tambah-keranjang.php" method="POST" class="row justify-content-end">
                <!-- memanggil id_produk -->
                <input type="hidden" name="id" value="<?= $data_produk['id_produk'] ?>">
                <div class="col-12">
                <div class="form-group">
                        <input type="number" min="1" class="form-control mt-3" name="qty" placeholder="Number of items purchased..." required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success mt-4 shadow fw-bold d-grid">CART</button>
                    <button type="reset" class="btn btn-danger mt-4 shadow fw-bold d-grid">CLEAR</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include 'layout/footer.php'?>