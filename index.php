<?php

$databaseServer = "sql12.freesqldatabase.com";
$databaseUsername = "sql12313869";
$databasePassword = "qy1jlUjdiy";
$databaseName = "sql12313869";

$databaseConnection = mysqli_connect($databaseServer, $databaseUsername, $databasePassword, $databaseName);

if (!$databaseConnection){
	die ("Connection to database failed");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// username and password sent from form 
	session_start();
	
	$username = $_POST['username'];
	$password = $_POST['password']; 
			
	$queryLogin = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
	$resultLogin = mysqli_query($databaseConnection,$queryLogin);
	
	$row = mysqli_fetch_array($resultLogin,MYSQLI_ASSOC);
	$active = $row['active'];
	  
	$count = mysqli_num_rows($resultLogin);
	// If result matched $myusername and $mypassword, table row must be 1 row
		
	if($count == 1) {
		
		$_SESSION["user_id"] = $row["user_id"];
		$_SESSION["namauser"] = $row["username"];
		$_SESSION["role"] = $row["role"];
		
		if ($row["role"] === "user"){
			header("Location: home.php");
		}else if ($row["role"] === "admin"){
			header("Location: daftar.php");
		}else{
			header("Location: index.php");
		}

	}else {
		echo  "<script type='text/javascript'>alert('wrong username/password');</script>";
	}
	
}

mysqli_close($databaseConnection);

?>
<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Auctionary</title>
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="src/css/index.css">
	</head>
	<body>
		<div class="row">
			<center><img src="src/image/Sirima UI.png"/></center>
			<h1 class="title">Auction and Loan System</h1>
			<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#insertModal">
				LOGIN
			</button>
			<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#registerModal">
				REGISTER
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
								<label for="username">E-mail / Username</label>
								<input type="text" class="form-control" id="insert-username" name="username" placeholder="Insert your E-mail or Username ..." required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="insert-password" name="password" placeholder="Insert your Password ..." required>
							</div>
							<input type="hidden" id="insert-command" name="command" value="insert">
							<a href="pelamar.html"><button type="submit" class="btn btn-primary">LOGIN</button></a>
						</form>
						<br />
						<a onclick="$('#insertModal').modal('hide')" data-toggle="modal" data-target="#registerModal" href="#registerModal">Don't have an account?</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="insertModalLabel">Register</h4>
					</div>
					<div class="modal-body">
						<form action="services/register.php" method="post">
							<div class="form-group">
								<label for="username">E-mail / Username</label>
								<input type="text" class="form-control" id="insert-username" name="username" placeholder="Insert your E-mail or Username ..." required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="insert-password" name="password" placeholder="Insert your Password ..." required>
							</div>
							<div class="form-group">
								<label for="role">Role</label>
								<select class="form-control" id="insert-role" name="role" placeholder="Role">
									<option>User</option>
									<option>Admin</option>
								</select>
							</div>
							<input type="hidden" id="insert-command" name="command" value="insert">
							<button type="submit" class="btn btn-primary">Register</button>
						</form>
						<br />
						<a onclick="$('#registerModal').modal('hide')" data-toggle="modal" data-target="#insertModal" href="#insertModal">Already have an account?</a>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="src/js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
	</body>
</html>
