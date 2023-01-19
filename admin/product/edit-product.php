<?php include '../layout/header.php';
include '../koneksi.php';

if( !is_object(sessionAdmin()) ) {
    exit(header('Location: ../logout.php'));
}
// mengambil id produk 
$id_produk= $_GET['id_produk'] ?? '';
$cek_produk = mysqli_query($conn, "SELECT  * FROM produk WHERE id_produk = '$id_produk'");
$data_produk =  mysqli_fetch_assoc($cek_produk);
// fungsi ini menangkap data yang ada di form
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $nama_produk        = trim($_POST['nama_produk']);
    $qty                = trim($_POST['qty']);
    $harga_produk       = trim($_POST['harga_produk']);
    $foto_produk        = trim($data_produk['foto_produk']); 
    $deskripsi_produk   = trim($_POST['deskripsi_produk']); 
// menangkap foto produk yang di isi di form
    if(!empty($_FILES['foto_produk']['name'])) {
        @unlink('../../assets/image/foto_produk/' . $foto_produk);
        move_uploaded_file($_FILES['foto_produk']['tmp_name'], '../../assets/image/foto_produk/' . $_FILES['foto_produk']['name']);
        $foto_produk = $_FILES['foto_produk']['name'];
    }
// query update data produk
    $edit_produk = mysqli_query($conn, "UPDATE produk SET nama_produk = '$nama_produk', qty = '$qty', harga_produk = '$harga_produk', foto_produk = '$foto_produk', deskripsi_produk = '$deskripsi_produk' WHERE id_produk = '$id_produk'");
//    kondidi jika data bener
    if( $edit_produk ) {
        echo "<script>
            alert('Product Data Updated Successfully');
            location.href = './product.php';
        </script>";
// kondisi jika data salah
    } else {
        echo "<script>alert('Product Data Update Failed!');</script>";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-10 col-sm-10">
        <a href="./product.php" class="btn btn-warning btn-sm mb-3"><i class="fa-solid fa-arrow-left"></i></a>
        <div class="card mb-5">
            <h5 class="card-header bg-warning text-white fw-bold">EDIT PRODUCT'S</h5>
            <div class="card-body">

                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">PRODUCT NAME</label>
                        <input type="text" class="form-control" name="nama_produk" value="<?= $data_produk['id_produk']?>" placeholder="..." readonly>
                    </div>

                    <div class="form-group">
                        <label for="">PRODUCT NAME</label>
                        <input type="text" class="form-control" name="nama_produk" value="<?= $data_produk['nama_produk']?>" placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="">STOCK</label>
                        <input type="number" min="1" class="form-control" name="qty" value="<?= $data_produk['qty']?>" placeholder="0" required>
                    </div>

                    <div class="form-group">
                        <label for="">PRICE</label>
                        <input type="number" min="1" class="form-control" name="harga_produk" value="<?= $data_produk['harga_produk']?>" placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="">PRODUCT PHOTO</label>
                        <input type="file" class="form-control" name="foto_produk" value="<?= $data_produk['foto_produk']?>" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="">DESCRIPTION</label>
                        <textarea type="" class="form-control" name="deskripsi_produk" placeholder="..." required><?= $data_produk['deskripsi_produk']?></textarea>
                    </div>

                    <div class="row justify-content-end">
                        <button type="submit" class="btn btn-success shadow-sm">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'?>