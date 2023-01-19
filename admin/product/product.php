<?php include '../layout/header.php'?>
<?php include '../koneksi.php';
if( !is_object(sessionAdmin()) ) {
    exit(header('Location: ../logout.php'));
}
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Products Table</h1>

        <!-- DataTales Products -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row justify-content-end mx-auto">
                    <a href="/admin/product/add-product.php" class="btn btn-primary">ADD DATA +</a>
                </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                        <th>No</th>
                                        <th>ID Product's</th>
                                        <th>Product's Name</th>
                                        <th>Stock Product's</th>
                                        <th>Rp.</th>
                                        <th>Photo's</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                        <th>ID Products's</th>
                                        <th>Product's Name</th>
                                        <th>Stock Product's</th>
                                        <th>Rp.</th>
                                        <th>Photo's</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- menghitung nomor dari angka 1 -->
                                        <?php $nomer=1;?>
                                        <!-- mengambil data dari table produk -->
                                        <?php
                                        $ambilData = $conn->query("SELECT * FROM produk");?>
                                        <?php while($tampil = $ambilData->fetch_assoc()){ ?>
                                        <tr>
                                            <!-- data ditampilkan di table data -->
                                            <td><?= $nomer; ?></td>
                                            <td><?= $tampil['id_produk'];?></td>
                                            <td><?= $tampil['nama_produk'];?></td>
                                            <td><?= $tampil['qty'];?></td>
                                            <td><?= $tampil['harga_produk'];?></td>
                                            <td><img src="../../assets/image/foto_produk/<?= $tampil['foto_produk'];?>" width="90"></td>
                                            <td><?= $tampil['deskripsi_produk'];?></td>
                                            <td>
                                                <a href="./edit-product.php?id_produk=<?= $tampil['id_produk']?>" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a onclick="confirmDelete('delete-product.php?id_produk=<?= $tampil['id_produk']?>')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <!-- menghitung nomer tanpa batas  -->
                                        <?php $nomer++;?>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
</div>
<?php include '../layout/footer.php'?>