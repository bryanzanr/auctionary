<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SiR1Ma</title>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
  </head>
  <body>
   <?php include 'header.php' ;?>
    <div class="container container-form-kartu-ujian">
      <h1 class="text-center header-form-kartu-ujian"><b>Form Lihat Hasil Seleksi</b></h1>
      <div class="form-lihat-kartu">
        <form class="form-inline" method="post" action="hasil-seleksi.php">
            <label for="id-pendaftaran">Id Pendaftaran : </label>
            <input type="text" class="form-control" name="id-pendaftaran">
          <input type="submit" class="btn btn-default" value='LIHAT'></input>
        </form>
      </div>
    </div>
  </body>
  <footer class="footer-fixed">
		<h4>&copy; 2017 Kelompok A03. All rights reserved</h4>
	</footer>
</html>
