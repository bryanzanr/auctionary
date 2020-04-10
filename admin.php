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
		if ($_SESSION["role"] === 'f'){
			header("Location: pelamar.php");
		}
	}

	function keluar(){

		session_unset();
		session_destroy();
		header("Location: index.php");

	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if($_POST['command'] === 'logout') {
			keluar();
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ADMIN</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="src/css/admin.css">
	</head>
	<body>
		<div class="jumbotron">
			<center><img src="src/image/Sirima UI.png"/></center>
			<h1 style="font-size: 5	em;">Sistem Penerimaan Mahasiswa</h1>
			<div class="welcome-text">
			<h2>Administrator Manajemen Fakultas <b>
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
					 <a class="navbar-brand" href="admin.php">SIRIMA</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="form-rekap-pendaftaran.php">Rekap Pendaftaran</a></li>
					<li><a href="form-pemilihan-prodi-pelamar.php">Daftar Pelamar </a></li>
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
		<script src="src/js/jquery-3.1.0.min.js"> </script>
		<script src="bootstrap/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="src/js/admin.js"></script>
		<script type="text/javascript" src="src/js/ajax.js"></script>		
	</body>
	<footer>
		<hr>
		<h4>&copy; 2017 Kelompok A03. All rights reserved</h4>
	</footer>
</html>							