

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
    <link rel="stylesheet" type="text/css" href="src/css/pendaftaran-semas-style.css">
    <title>Pendaftaran Semas UI</title>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <h1 class="text-center" id="signup-header">Pendaftaran Seleksi Masuk</h1>
          <div id="input-jenjang">
            <div class="form-group text-center">
              <label for="jenjang" class="form-element">Pilih jenjang:</label>
              <select class="form-control form-element" id="jenjang">
                <option>S1</option>
                <option>S2</option>
                <option>S3</option>
              </select>
              <button class="btn btn-default form-element">PILIH</button>
            </div>
          </div>
        </div>
        </div>
      </div>
  </body>
</html>
