<?php include '../layout/header.php'; 
        require '../koneksi.php';
        
        if( !is_object(sessionAdmin()) ) {
            exit(header('Location: ../logout.php'));
        }
// menangkap data yang ada di form
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $nama_produk  = trim($_POST['nama_produk']);
            $qty  = trim($_POST['qty']);
            $harga_produk  = trim($_POST['harga_produk']);
            $deskripsi_produk  = trim($_POST['deskripsi_produk']);
// Variabel ini untuk upload gambar 
                $foto_produk = $_FILES['foto_produk']['name'];
                move_uploaded_file($_FILES['foto_produk']['tmp_name'], '../../assets/image/foto_produk/' . $foto_produk);
// query tambah produk
                $tambah_produk = mysqli_query($conn, "INSERT INTO produk VALUES (NULL, '$nama_produk', '$qty', '$harga_produk', '$foto_produk', '$deskripsi_produk')");
                if($tambah_produk) {
                    header('Location: product.php');
                    die;
        
                } else {
                    echo "<script>alert('Product Data Failed to Add');</script>";
                }
        
        }
?>

<section class="container">
    <div class="row">
        <div class="col">
        <a href="./product.php" class="btn btn-warning btn-sm mb-3"> <i class="fa-solid fa-arrow-left"></i></a>
            <h2 class="fw-bold">ADD PRODUCT</h2>

            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="nama_produk" placeholder="..." required>
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" min="1" class="form-control" name="qty" placeholder="..." required>
                </div>

                <div class="form-group">
                    <label>Price*</label>
                    <input type="number" min="1" class="form-control" name="harga_produk"  placeholder="..." required>
                </div>

                <div class="form-group">
                    <label>Product Photo*</label>
                    <input type="file" class="form-control" name="foto_produk"  placeholder="..." required>
                </div>

                <div class="form-group">
                    <label>Description*</label>
                    <textarea type="" class="form-control" name="deskripsi_produk"  placeholder="..." required></textarea>
                </div>
                
                <div class="row justify-content-end">
                    <button type="submit" class="btn btn-success mt-2 shadow-sm">SUBMIT</button>
                </div>
            </form>

        </div>
    </div>
</section>


<?php include '../layout/footer.php'?>