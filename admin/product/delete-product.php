<?php
include '../koneksi.php';
if( !is_object(sessionAdmin()) ) {
    exit(header('Location: ../logout.php'));
}

$id_produk = $_GET['id_produk'] ?? '';
$cek_produk = mysqli_query($conn, "SELECT  * FROM produk WHERE id_produk = '$id_produk'");
$data_produk =  mysqli_fetch_assoc($cek_produk);
// menghapus produk
if(is_array($data_produk)) {
    @unlink('../../assets/image/foto_produk/' . $data_produk['foto_produk']);
}
// menghapus produk
mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id_produk'");
header('Location: product.php');