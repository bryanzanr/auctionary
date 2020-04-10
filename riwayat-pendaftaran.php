<?php
include('src/php/classes/DBConnection.class.php');

$DBConn = new DBConnection("postgres", "postgres", "pop08521125");
$conn = $DBConn->conn;
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
    <title>Riwayat Pendaftaran</title>
  </head>
  <body>
  <?php include 'header.php'; ?>
    <div class="container">
      <h1 class="text-center"><b>Riwayat Pendaftaran</b></h1>
      <div class="col-md-8 col-md-offset-2 container-table">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <td class="judul-table">Id Pendaftaran</td>
              <td class="judul-table">Nomor periode</td>
              <td class="judul-table">Tahun Periode</td>
              <td class="judul-table">No Kartu Ujian</td>
              <td class="judul-table">Jalur</td>
              <td class="judul-table">Prodi 1</td>
              <td class="judul-table">Prodi 2</td>
              <td class="judul-table">Prodi 3</td>
            </tr>
          </thead>
          <tbody>
            <?php
              $query = "SELECT * FROM SIRIMA.PENDAFTARAN as p left outer join sirima.pendaftaran_semas as ps on p.id = ps.id_pendaftaran order by p.id desc";
              $result = pg_query($conn,$query);
              $row = pg_fetch_all($result);
              foreach ($row as $value){
                $jalur = "";
                if($value["no_kartu_ujian"] == null){
                  $jalur = "UUI";
                }else{
                  $jalur = "SEMAS";
                }
                echo "<tr>";
                echo "<td>".$value['id']."</td><td>".$value['nomor_periode']."</td><td>".$value['tahun_periode']."</td><td>".$value['no_kartu_ujian']."</td><td>".$jalur."</td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <ul class="pagination">
          <li><a href="#">&laquo</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">&raquo</a></li>
        </ul>
      </div>
    </div>
  </body>
  <footer>
		<hr>
		<h4>&copy; 2017 Kelompok A03. All rights reserved</h4>
	</footer>
</html>
