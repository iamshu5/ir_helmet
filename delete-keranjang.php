<?php 
require 'admin/koneksi.php';
// Memilih Tabel Keranjang.
$idKeranjang = $_GET['id'] ?? '';
mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang = '$idKeranjang'");

header('Location: keranjang.php');