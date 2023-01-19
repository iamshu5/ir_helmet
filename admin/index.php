<?php include 'layout/header.php'?>
<?php include 'koneksi.php';
// menuju halaman logout
if( !is_object(sessionAdmin()) ) {
  exit(header('Location: logout.php'));
}
// query menjumlahkan banyaknya ID Produk
$total_produk = mysqli_query($conn, "SELECT COUNT(id_produk) AS total FROM produk");
$total_produk = mysqli_fetch_assoc($total_produk);

?>

<div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>
            <!-- Content Row -->
            <div class="row">

              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Product(s)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <!-- number format fungsinya untuk mentotalkan produk -->
                          -<?= number_format($total_produk['total'] ?? 0, 0, ',', '.')?>-
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fa-solid fa-cube fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="row">

            </div>
            
            <div class="row">

            </div>

          </div>
          <!-- /.container-fluid -->
<?php include 'layout/footer.php'?>
