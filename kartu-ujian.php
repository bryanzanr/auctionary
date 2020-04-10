<?php
include('src/php/classes/DBConnection.class.php');

$DBConn = new DBConnection("postgres", "postgres", "pop08521125");
$conn = $DBConn->conn;
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SiR1Ma</title>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
  </head>
  <body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1 class="text-center"><b>Kartu Ujian</b></h1>
          <div class="detail-container">
            <?php
            $nopen = $_POST['nomor-pendaftaran'];
            $query = " SELECT id,nama_lengkap,no_kartu_ujian,lokasi_kota,lokasi_tempat,waktu_mulai,waktu_selesai
            from sirima.pendaftaran AS p, sirima.pelamar AS pl, sirima.pendaftaran_semas AS ps,sirima.jadwal_penting AS jp, sirima.lokasi_ujian AS lu, sirima.lokasi_jadwal AS lj
            where p.pelamar = pl.username and ps.id_pendaftaran = p.id and ps.lokasi_kota = lu.kota and ps.lokasi_tempat = lu.tempat and lj.waktu_awal = jp.waktu_mulai and lu.kota = lj.kota and lu.tempat = lj.tempat AND id = $nopen";
            $result = pg_query($conn,$query);
            $row = pg_fetch_all($result);
            if($row==null){
              echo "ID tidak ditemukan";
            }else{
              foreach ($row as $value){
                echo "<ul class = 'detail-pendaftaran'>";
                echo "<li>Id Pendaftaran : ".$value['id']."</li>";
                echo "<li>Nama Lengkap : ".$value['nama_lengkap']."</li>";
                echo "<li>No Kartu Ujian : ".$value['no_kartu_ujian']."</li>";
                echo "<li>Lokasi Ujian : ".$value['lokasi_tempat']." ,".$value['lokasi_kota']."</li>";
                echo "<li>Waktu Ujian : ".$value['waktu_mulai']." - ".$value['waktu_selesai']."</li>";
                echo "</ul>";
              }
            }

             ?>
        </div>
    </div>
  </body>
  <footer class="footer-fixed">
		<h4>&copy; 2017 Kelompok A03. All rights reserved</h4>
	</footer>
</html>
