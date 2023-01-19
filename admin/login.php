<?php 
require 'koneksi.php';
// menuju halaman index
if( is_object(sessionAdmin()) ) {
    exit(header('Location: index.php'));
}
// memasukan username dan password
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
// mengkoneksikan ke table admin
    $queryAdmin = mysqli_query($conn, "SELECT * FROM admin WHERE username = '{$username}'");
    $dataAdmin = mysqli_fetch_object($queryAdmin);
// kondisi jika username dan password tidak ada
    if($queryAdmin->num_rows == 0) {
        $_SESSION['alert'] = ['bg' => 'danger', 'message' => 'Username is not registered.'];
     }  else if($dataAdmin->password != $password) {
        $_SESSION['alert'] = ['bg' => 'danger', 'message' => 'Password Wrong.'];
// jika kalau bener langsung menuju halaman index
    } else {
        $_SESSION['user'] = $dataAdmin->id_admin;
        exit(header('Location: index.php'));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IR ADMIN LOGIN</title>

    <!-- Custom fonts for this template-->
    <link href="/admin/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/admin/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-trasnparant">

    <section class="container-fluid">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="/admin/assets/img/faviconn.png" width="700px" height="550px" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Heyyo! Welcome Back!</h1>
                                    </div>

                                    <form class="user" method="POST">
                                        <!-- notifikasi -->
                                        <?= alertMessage() ?>

                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="username" aria-describedby="username"
                                                placeholder="Enter Username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="password" placeholder="Enter Password..." required>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
