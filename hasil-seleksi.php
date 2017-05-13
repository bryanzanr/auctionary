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
        <h1 class="text-center"><b>Hasil Seleksi</b></h1>
          <div class="detail-container">
            <?php
            $idpen = $_POST['id-pendaftaran'];
            $query = " SELECT id, nama_lengkap, p.status_lulus, nama, npm, jenis_kelas, ps.jenjang
            from sirima.pendaftaran AS p, sirima.pendaftaran_prodi AS pp,  sirima.program_studi AS ps,  sirima.pelamar AS pl
            where p.id = pp.id_pendaftaran and pp.kode_prodi = ps.kode and p.pelamar = pl.username and id = $idpen;";
            $result = pg_query($conn,$query);
            $row = pg_fetch_all($result);
            if($row==null){
              echo "ID tidak ditemukan";
            }else{
              foreach ($row as $value){
                $statuslulus = "";
                if($value['status_lulus'] == null){
                  $statuslulus = 'BELUM LULUS';
                }elseif ($value['status_lulus'] == 't') {
                  $statuslulus = 'LULUS';
                }else {
                  $statuslulus = 'TIDAK LULUS';
                }
                echo "<ul class = 'detail-pendaftaran'>";
                echo "<li>Id Pendaftaran : ".$value['id']."</li>";
                echo "<li>Nama Lengkap : ".$value['nama_lengkap']."</li>";
                echo "<li>Status : ".$statuslulus."</li>";
                if($statuslulus == 'LULUS'){
                  echo "<li>Prodi : ".$value['jenjang']." ".$value['nama']." ".$value['jenis_kelas']."</li>";
                  echo "<li>Npm : ".$value['npm']."</li>";
                }
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
