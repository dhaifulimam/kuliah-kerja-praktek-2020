<?php 

session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: ../login/login.php");
        exit;
    }

require '../function/functions.php';

$datakop = query("SELECT * FROM koperasi");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <!-- My Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style-Daftar.css">
    <title>Daftar Koperasi</title>
  </head>
  <body>
    <!-- Nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
          <img src="../logodinascilegon/logo.png" alt="logo">
          <a class="navbar-brand" href="../home/index.php">Dinas Koperasi Dan UMKM kota Cilegon</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
              <a class="nav-item nav-link active" href="admin-page.php">Home <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="newuser.php">tambah admin</a>
              <a class="nav-item btn btn-success tombol" href="logout.php">join us</a>
            </div>
          </div>
      </div>
    </nav>
    <!-- Akhir nav bar -->

    <!-- content -->
    <div class="container">
      
      <h1 class="header">daftar Koperasi</h1>

      <a class="nav-item btn btn-success add" href="tambah.php">tambah data</a>

      <?php foreach( $datakop as $dt ) : ?>

      <div class="row daftarkoperasi">
        <div class="col-lg-6">
          <img src="../imgcontent/<?= $dt["gambar_koperasi"]; ?>" alt="hero" class="hero">
        </div>
        <div class="col-lg-6">
          <h1><?= $dt["nama_koperasi"]; ?></h1>
          <h3 class="alamat"><span>alamat</span>: <?= $dt["alamat"]; ?> </h3>
          <p>
          <?= substr($dt["isi_koperasi"], 0, 40); ?>...
          <a class="nav-item btn btn-primary button" href="article-admin.php?id=<?=$dt["id"]; ?>">selengkapnya</a>

          <br>
          <a class="nav-item btn btn-warning admin" href="../function/ubahFunction.php?id=<?=$dt["id"]; ?>">ubah</a>
          <a class="nav-item btn btn-danger admin" href="../function/deleteFunction.php?id=<?=$dt["id"]; ?>">hapus</a>
          </p> 
        </div>
      </div>
      <br>

      <?php endforeach; ?>

    </div>
    <!-- akhir content -->

    <!-- footer -->

    <!-- akhir footer -->


    <!-- Optional JavaScript -->
    <script src=""></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>