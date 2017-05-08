<?php
	
	$databaseConnection = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres");
	
	if (!$databaseConnection){
		die ("Connection to database failed");
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// username and password sent from form 
		session_start();
		
		$username = $_POST['username'];
		$password = $_POST['password']; 
				
		$queryLogin = "SELECT * FROM SIRIMA.AKUN WHERE username = '$username' and password = '$password'";
		$resultLogin = pg_query($databaseConnection,$queryLogin);
		
		$row = pg_fetch_array($resultLogin);
		
		$count = pg_num_rows($resultLogin);
		// If result matched $myusername and $mypassword, table row must be 1 row
			
		if($count == 1) {
			
			$_SESSION["namauser"] = $row[0];
			$_SESSION["role"] = $row[1];
			$_SESSION["katakunci"] = $row[2];

			if ($_SESSION["role"] === f){
				header("Location: pelamar.php");
			}else{
				header("Location: admin.php");
			}

		}else {
			echo  "<script type='text/javascript'>alert('Login Gagal');</script>";
		}
		
	}
	
	pg_close($databaseConnection);
	
	
?>
<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SIRIMA</title>
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="src/css/index.css">
	</head>
	<body>
		<div class="row">
			<center><img src="src/image/Sirima UI.png"/></center>
			<h1 class="title">SISTEM PENERIMAAN MAHASISWA</h1>
			<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#insertModal">
				LOGIN
			</button>	
		</div>
		<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="insertModalLabel">Login</h4>
					</div>
					<div class="modal-body">
						<form action="index.php" method="post">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="insert-username" name="username" placeholder="Username" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="insert-password" name="password" placeholder="Password" required>
							</div>
							<input type="hidden" id="insert-command" name="command" value="insert">
							<a href="pelamar.html"><button type="submit" class="btn btn-primary">LOGIN</button></a>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="src/js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
	</body>
</html>