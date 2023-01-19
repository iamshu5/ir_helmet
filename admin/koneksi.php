<?php
session_start();
$conn = mysqli_connect("localhost","root", "", "ir_helmet");
// fungsi untuk login
function sessionAdmin() {
    global $conn;

    if(!isset($_SESSION['user'])) {
        return false;
    }
// Memilih Tabel Admin
    $queryAdmin = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = '{$_SESSION['user']}'");
    $dataAdmin = mysqli_fetch_object($queryAdmin);

    return $queryAdmin->num_rows > 0 ? $dataAdmin : false;
}
// notifikasi
function alertMessage() {
    if(!isset($_SESSION['alert'])) {
        return '';
    }
// Notifikasi jikalau data Login tidak ditemukan atau tidak ada.
    $sess = $_SESSION['alert'];
    unset($_SESSION['alert']);
    return "
        <div class=\"mb-3 alert alert-{$sess['bg']} alert-dismissible\" role=\"alert\">
            {$sess['message']}
        </div>
    ";
}
?>