<?php
  include('src/php/classes/DBConnection.class.php');

  $DBConnection = new DBConnection("sirimaDB", "postgres", "Maumasukin1");
  $conn = $DBConnection->conn;

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
    <link rel="stylesheet" type="text/css" href="src/css/form-pendaftaran-semas-S1.css">
    <title>Pendaftaran SEMAS S1</title>
  </head>
  <body>
   <?php include 'header.php' ;?>

    <div class="container">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <?php
            $jenjang = $_GET['jenjang'];
            echo "<h1>".$jenjang."</h1>";
            if ($conn) {
              echo "kicut";
            }
          ?>
          <h1 class="text-center" id="header-form">Form Pendaftaran SEMAS Sarjana</h1>
          <div id="form-body">
            <form class="" action="index.html" method="post">
                Asal Sekolah: <br>
                <input class="form-control" type="text" name="asal-sekolah" value=""> <br>
                Jenis SMA: <br>
                <select class="form-control" name="jenis-sma">
                  <option value="IPA">IPA</option>
                  <option value="IPS">IPS</option>
                  <option value="Bahasa">Bahasa</option>
                </select> <br>
                Alamat Sekolah: <br>
                <input class="form-control" type="text" name="alamat-sekolah" value=""> <br>
                Tanggal Lulus: <br>
                <input class="form-control" type="date" name="tanggal-lulus" value=""> <br>
                Nilai UAN: <br>
                <input class="form-control" type="text" name="nilai-uan" value=""><br>
                Prodi Pilihan 1: <br>
                <select class="form-control" name="prodi-pilihan1">
                <?php
                  $queryP1 = "SELECT ps.nama, ps.jenis_kelas
                              FROM sirima.program_studi ps
                              WHERE ps.jenjang = '$jenjang'";
                  $resultProdi1 = pg_query($conn, $queryP1);
                  $prodiS1 = pg_fetch_all($resultProdi1);
                  foreach ($prodiS1 as $value) {
                    echo "<option value=".$value['nama'].">".$value['nama']." - ".$value['jenis_kelas']."</option>";
                  }
                ?>
                </select> <br>
                <!--
                <select class="form-control" name="prodi-pilihan1">
                  <option >Prodi 1</option>
                  <option >Prodi 2</option>
                  <option >Prodi 3</option>
                </select> <br>
                -->
                Prodi Pilihan 2: <br>
                <select class="form-control" name="prodi-pilihan2">
                  <?php
                    $queryP1 = "SELECT ps.nama, ps.jenis_kelas
                                FROM sirima.program_studi ps
                                WHERE ps.jenjang = '$jenjang'";
                    $resultProdi1 = pg_query($conn, $queryP1);
                    $prodiS1 = pg_fetch_all($resultProdi1);
                    foreach ($prodiS1 as $value) {
                      echo "<option value=".$value['nama'].">".$value['nama']." - ".$value['jenis_kelas']."</option>";
                    }
                  ?>
                </select> <br>
                Prodi Pilihan 3: <br>
                <select class="form-control" name="prodi-pilihan3">
                  <?php
                    $queryP1 = "SELECT ps.nama, ps.jenis_kelas
                                FROM sirima.program_studi ps
                                WHERE ps.jenjang = '$jenjang'";
                    $resultProdi1 = pg_query($conn, $queryP1);
                    $prodiS1 = pg_fetch_all($resultProdi1);
                    foreach ($prodiS1 as $value) {
                      echo "<option value=".$value['nama'].">".$value['nama']." - ".$value['jenis_kelas']."</option>";
                    }
                  ?>
                </select> <br>
                Lokasi Kota Ujian: <br>
                <select class="form-control" name="lokasi-kota-ujian">
                  <option >Kota 1</option>
                  <option >Kota 2</option>
                  <option >Kota 3</option>
                </select> <br>
                Lokasi Tempat Ujian: <br>
                <select class="form-control" name="lokasi-tempat-ujian">
                  <option >Tempat 1</option>
                  <option >Tempat 2</option>
                  <option >Tempat 3</option>
                </select> <br>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
