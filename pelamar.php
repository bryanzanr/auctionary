<?php
	
	session_start();
	function connectDB() {

		$databaseConnection = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres");
	
		if (!$databaseConnection){
			die ("Connection to database failed");
		}
		return $databaseConnection;
	
	}

	if(!isset($_SESSION["namauser"])) {
		header("Location: index.php");
	}else{
		if ($_SESSION["role"] === 't'){
			header("Location: admin.php");
		}
	}

	function keluar(){

		session_unset();
		session_destroy();
		header("Location: index.php");

	}

	function insertAkun(){

		$conn = connectDB();

		$username = $_POST['namauser'];
		$sql = "SELECT username FROM SIRIMA.AKUN WHERE username = '$namauser'";
		$result = pg_query($conn,$sql);
		if ($result !== null){
			echo  "<script type='text/javascript'>alert('Username sudah ada');</script>";
		}else {
			$password = $_POST['katakunci'];
			$repeatPassword = $_POST['ulangpassword'];
			if ($password !== $repeatPassword){
				echo  "<script type='text/javascript'>alert('Password tidak sama');</script>";
			}else {
				$sql = "INSERT INTO SIRIMA.AKUN (username,role,password) VALUES ('$username',FALSE,'$password'";
				pg_query($conn,$sql);
				$surat = $_POST['emailaddress'];
				$ulangsurat = $_POST['repeatemail'];
				if ($surat !== $ulangsurat){
					echo  "<script type='text/javascript'>alert('E-mail tidak sama');</script>";
				}else {
					$fullname = $_POST['namalengkap'];
					$idnumber = $_POST['nomorktp'];
					$gender = $_POST['jeniskelamin'];
					$birthdate = $_POST['ulangtahun'];
					$homeaddress = $_POST['alamatrumah'];
					$sql = "INSERT INTO SIRIMA.PELAMAR (username,nama_lengkap,alamat,jenis_kelamin,tanggal_lahir,no_ktp,email) VALUES ('$username','$fullname','$homeaddress','$gender','$birthdate','$idnumber','$surat'";
					if($result = pg_query($conn, $sql)) {
						echo  "<script type='text/javascript'>alert('Pendaftaran Berhasil');</script>";
						header("Location: pelamar.php");
						} else {
						die("Error: $sql");
					}
					pg_close($conn);
				}
			}
		}

	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if($_POST['command'] === 'logout') {
			keluar();
		}else if ($_POST['command'] === 'insert'){
			insertAkun();
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PELAMAR</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="src/css/pelamar.css">
	<script type="text/javascript" src="src/js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="src/js/pelamar.js"></script>	
	<script type="text/javascript" src="src/js/ajax.js"></script>
</head>
<body>
	<div class="jumbotron">
		<center><img src="src/image/Sirima UI.png"/></center>
		<h1 style="font-size: 5em;">Sistem Penerimaan Mahasiswa</h1>
		<div class="welcome-text">
		<h2>Pelamar <b>
			<?php
			if (isset($_SESSION["namauser"])){
				echo $_SESSION["namauser"];
			}
			?></b>
		</h2>
		</div>
	</div>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				 <a class="navbar-brand" href="pelamar.php">SIRIMA</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="pendaftaran-semas.php">Membuat Pendaftaran</a></li>
				<li><a href="riwayat-pendaftaran.php">Riwayat Pendaftaran</a></li>
				<li><a href="kartu-ujian.php">Kartu Ujian</a></li>
				<li><a href="hasil-seleksi.php">Hasil Seleksi</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
					if (isset($_SESSION["namauser"])){
						echo "<form class='form-inline navbar-form navbar-left' action='admin.php' method='post'><button type='submit' class='btn btn-'><span class='glyphicon glyphicon-log-out'></span>Logout</button><input type='hidden' id='logout-command' name='command' value='logout'></form>";
					}
				?>
			</ul>
		</div>
	</nav>
	<div class="container">
	    <br><button type='button' class='btn-addbook btn btn-primary' data-toggle='modal' data-target='#insertModal'>
            REGISTER
        </button>
	    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	        <div class="modal-dialog" role="document">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                    <h4 class="modal-title black-modal" id="insertModalLabel">Pendaftaran Akun Pelamar</h4>
	                </div>
	                <div class="modal-body">
	                    <form action="pelamar.php" method="post">
	                        <div class="form-group">
	                            <label for="namauser">Username</label>
	                            <input type="text" class="form-control" id="insert-namauser" name="username" placeholder="Masukkan Username Anda ..." required pattern="[A-Za-z0-9.]*" title="Username harus berupa huruf, angka, atau titik">
	                        </div>
	                        <div class="form-group">
	                            <label for="katakunci">Password</label>
	                            <input type="password" class="form-control" id="insert-katakunci" name="kataKunci" placeholder="Masukkan Password Anda ..." required pattern=".{6,}" title="Password minimal 6 karakter">
	                        </div>
	                        <div class="form-group">
	                            <label for="ulangpassword">Ulangi password</label>
	                            <input type="password" class="form-control" id="insert-ulangpassword" name="ulangPassword" placeholder="Masukkan Kembali Password Anda ..." required pattern=".{6,}" title="Password minimal 6 karakter">
	                        </div>
	                        <div class="form-group">
	                            <label for="namalengkap">Nama lengkap</label>
	                            <input type="text" class="form-control" id="insert-namalengkap" name="fullname" placeholder="Masukkan Nama Lengkap Anda ..." required>
	                        </div>
	                        <div class="form-group">
	                            <label for="nomorktp">Nomor Identitas</label>
	                            <input type="text" class="form-control" id="insert-nomorktp" name="nomorKtp" placeholder="Masukkan Nomor Identitas Anda ..." required pattern="[0-9]{16}">
	                        </div>
	                        <div class="form-group">
	                        	<label for="jenisKelamin">Jenis kelamin</label>
	                        	<select class="from-control" id="insert-jeniskelamin" name="jenisKelamin">
	                        		<option value="Pria">Laki-Laki</option>
	                        		<option value="Wanita">Perempuan</option>
	                        	</select>
	                        </div>
	                        <div class="form-group">
	                        	<label for="tanggalLahir">Tanggal lahir</label>
	                        	<input type="date" class="form-control" id="insert-ulangtahun" name="ulangTahun" placeholder="Masukkan Tanggal Lahir Anda ..." required>
	                        </div>
	                        <div class="form-group">
	                            <label for="alamatrumah">Alamat</label>
	                            <input type="text" class="form-control" id="insert-alamatrumah" name="alamatRumah" placeholder="Masukkan Alamat Anda ..." required>
	                        </div>
	                        <div class="form-group">
	                            <label for="emailaddress">Alamat email</label>
	                            <input type="email" class="form-control" id="insert-emailaddress" name="emailAddress" placeholder="Masukkan Alamat Email Anda ..." required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Masukkan email yang benar">
	                        </div>
	                        <div class="form-group">
	                            <label for="repeatemail">Ulangi email</label>
	                            <input type="email" class="form-control" id="insert-repeatemail" name="repeatEmail" placeholder="Masukkan Kembali Alamat Email Anda ..." required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Masukkan email yang benar">
	                        </div>
	                        <input type="hidden" id="insert-command" name="command" value="insert">
	                        <button type="button" class="btn btn-primary">DAFTAR</button>
	                    </form>
	                </div>
	            </div>
	        </div>
    	</div>
		<div class="well well-sm">
			<strong>Tampilan</strong>
			<div class="btn-group">
				<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-leaf">
				</span>Black</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
				class="glyphicon glyphicon-fire"></span>Blue</a>
			</div>
		</div>
		<div id="products" class="row list-group">
		</div>
	</div>
</body>
<footer>
	<hr>
	<h4>&copy; 2017 Kelompok A03. All rights reserved</h4>
</footer>
</html>							