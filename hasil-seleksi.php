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
    <?php include 'header.php'; ?>
    <div class="container">
        <h1 class="text-center"><b>Hasil Seleksi</b></h1>
          <div class="detail-container">
            <ul class="detail-pendaftaran">
              <li>Id Pendaftaran : 1234</li>
              <li>Nama Lengkap : Tania Putri</li>
              <li>Status : LULUS / TIDAK LULUS / BELUM LULUS</li>
              <li>Prodi : S1 Ilmu Komputer Reguler</li>
              <li>Npm : 1507345625</li>
            </ul>
        </div>
    </div>
  </body>
  <footer class="footer-fixed">
		<h4>&copy; 2017 Kelompok A03. All rights reserved</h4>
	</footer>
</html>
