<?php 
require 'admin/koneksi.php';

$idProduk = $_POST['id'];
$qty = $_POST['qty'];
// fungsinya untuk mengecek data produk ada atau tidaknya produk
$cekProduk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$idProduk'");
$dataProduk = mysqli_fetch_assoc($cekProduk);
// jika produk tidak ditemukan maka dia akan otomatis kembali ke halaman index
if($cekProduk->num_rows == 0) {
    echo " <script>alert('Product Not Found!'); location.href = 'index.php';</script> ";
// Jikalau Stok produk udah mau habis.
} else if($dataProduk['qty'] <= $dataProduk['batas_stok']){
    echo "<script>alert('Items are almost sold out!, soon contact admin to add stock!'); location= 'index.php';</script>";
        // jikalau stock tidak ada otomatis kembali ke halaman index
}else if($dataProduk['qty'] < $qty) {
    echo " <script>alert('Insufficient Product Stock'); location.href = 'index.php';</script> ";
// jika ada akan sukses dan kembali ke halaman keranjang.
} else {
    mysqli_query($conn, "INSERT INTO keranjang VALUES(null, '$idProduk', '$qty')");
    echo " <script>alert('Successfully Added to Cart'); location.href = 'keranjang.php';</script> ";
}