<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SiR1Ma</title>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">SiR1Ma</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="#">Home</a></li>
          <li class="active"><a href="#">Melihat Hasil Seleksi</a></li>
          <li><a href="#">Page 2</a></li>
        </ul>
        <form class="navbar-form navbar-right">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </nav>
   <?php include 'header.php' ;?>
    <div class="container container-form-kartu-ujian">
      <h1 class="text-center header-form-kartu-ujian"><b>Form Lihat Hasil Seleksi</b></h1>
      <div class="form-lihat-kartu">
        <form class="form-inline">
          <div class="form-group">
            <label for="email">Id Pendaftaran : </label>
            <input type="text" class="form-control" id="email">
          </div>
          <button type="submit" class="btn btn-default">LIHAT</button>
        </form>
      </div>
    </div>
  </body>
  <footer class="footer-fixed">
		<h4>&copy; 2017 Kelompok A03. All rights reserved</h4>
	</footer>
</html>
