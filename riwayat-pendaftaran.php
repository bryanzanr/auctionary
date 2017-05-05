<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
    <title>Riwayat Pendaftaran</title>
  </head>
  <body>
    <!--
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">SiR1Ma</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="#">Home</a></li>
          <li class="active"><a href="#">Riwayat Pendaftaran</a></li>
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
  -->
  <?php include 'header.php'; ?>
    <div class="container">
      <h1 class="text-center">Riwayat Pendaftaran</h1>
      <div class="col-md-8 col-md-offset-2">
        <table class="table table-bordered table-hover">
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
            <tr>
              <td><a href="#">5678</a></td>
              <td>2</td>
              <td>2017</td>
              <td>KOSONG</td>
              <td>UUI</td>
              <td>S1 Fisika Reguler</td>
              <td>S1 Biologi Reguler</td>
              <td>Kosong</td>
            </tr>
            <tr>
              <td><a href="#">5193</a></td>
              <td>2</td>
              <td>2017</td>
              <td>1234512348</td>
              <td>SEMAS PASCASARJANA</td>
              <td>S2 Ilmu Komputer Reguler</td>
              <td>KOSONG</td>
              <td>KOSONG</td>
            </tr>
            <tr>
              <td><a href="#">1234</a></td>
              <td>1</td>
              <td>2017</td>
              <td>1234512345</td>
              <td>SEMAS SARJANA</td>
              <td>S1 Ilmu Komputer Reguler</td>
              <td>S1 Biologi Reguler</td>
              <td>S1 Fisika Reguler</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
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
