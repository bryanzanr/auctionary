<!DOCTYPE html>

<html lang="en">
<head>
  <title>Rekap Pendaftaran</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">SIR1ma</a>
		</div>
		<ul class="nav navbar-nav">
		  <li><a href="#">Home</a></li>
		  <li><a href="#">Riwayat Pendaftaran</a></li>
		  <li class="active"><a href="#">Rekap Pendaftaran</a></li>
		  <li><a href="#">Page 3</a></li>
		</ul>
	</div>
</nav>
-->
<?php include 'header.php'; ?>
<div class="container">

	<h2>Hasil Rekap Pendaftaran</h2>

	<br>
	<br>
	<h4>Jenjang: S1</h4>
	<table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Nama Prodi</th>
        <th>Jenis Kelas</th>
        <th>Nama Fakultas</th>
		<th>Kuota</th>
		<th>Jumlah Pelamar</th>
		<th>Jumlah Diterima</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Ilmu Komunikasi</td>
        <td>Reguler</td>
        <td>FISIP</td>
		<td>300</td>
        <td>800</td>
        <td>175</td>
      </tr>
	  <tr>
        <td>Ilmu Komputer</td>
        <td>Paralel</td>
        <td>Fasilkom</td>
		<td>350</td>
        <td>1500</td>
        <td>175</td>
      </tr>
	  <tr>
        <td>Ilmu Keperawatan</td>
        <td>Reguler</td>
        <td>FIK</td>
		<td>250</td>
        <td>500</td>
        <td>200</td>
      </tr>
    </tbody>
  </table>
	<div class="text-center">
	  <ul class="pagination">
		<li class="active"><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">5</a></li>
	  </ul>
	</div>

</div>

</body>
</html>
