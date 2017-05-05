<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
    <link rel="stylesheet" type="text/css" href="src/css/invoice-pembayaran.css">
    <title></title>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <h1 class="text-center" id="payment-header">Pendaftaran sukses!</h1>
          <h2 class="text-center"> Selamat, pembayaran berhasil dilakukan.</h2>
          <div id="payment">
            <h4 class="bayar-title bayar">ID Pendaftaran:</h4>
            <p class="bayar-value bayar">1234</p> <br>
            <h4 class="bayar-title bayar">ID Pembayaran:</h4>
            <p class="bayar-value bayar">1541</p> <br>
            <h4 class="bayar-title bayar">Nomor Kartu Ujian</h4>
            <p class="bayar-value bayar">12345678</p> <br>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
