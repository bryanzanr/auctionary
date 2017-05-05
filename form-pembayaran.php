<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
    <link rel="stylesheet" type="text/css" href="src/css/form-pembayaran.css">
    <title>Pendaftaran SEMAS</title>
  </head>
  <?php
    include 'header.html';
  ?>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <h1 class="text-center" id="payment-header">Form Pembayaran</h1>
          <div id="payment">
            <h4 class="bayar-title bayar">ID Pendaftaran:</h4>
            <p class="bayar-value bayar">1234</p> <br>
            <h4 class="bayar-title bayar">Biaya Pendaftaran:</h4>
            <p class="bayar-value bayar">Rp500.000</p> <br>
            <div class="text-center">
              <button class="btn btn-default bayar">BAYAR</button>
            </div>
          </div>
        </div>
        </div>
      </div>
  </body>
</html>
