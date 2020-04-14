<?php
	session_start();
	function connectDB() {
		$servername = "sql12.freesqldatabase.com";
		$username = "sql12313869";
		$password = "qy1jlUjdiy";
		$dbname = "sql12313869";
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " + mysqli_connect_error());
		}
		return $conn;
	}
	
    if (!isset($_GET['id'])) {
        header("Location: metode-pembayaran.php");
    }

	
	function daftarBuku($table) {
		$conn = connectDB();
		
		$sql = "SELECT * FROM $table";
		
		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Auctionary</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="src/css/home.css">
	</head>
	<body>
		<div class="jumbotron">
			<h1 style="font-size: 6em;">Auctionary</h1>
			<div class="welcome-text">
			<h2>Selamat Datang <b>
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
					 <a class="navbar-brand" href="#">Auctionary</a>
				</div>
				<ul class="nav navbar-nav">
					<?php
					if(isset($_SESSION['namauser']) && $_SESSION['role'] === 'user') {
						echo '
						<li><a href="home.php">Home</a></li>
						';
					}
					?>
					<li><a href="daftar.php">Daftar Buku</a></li>
					<?php
                    echo '
                        <li class="active"><a href="detail.php?id='.$_GET['id'].'">Detail Buku</a></li>
                    ';
                    ?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
						if (isset($_SESSION["namauser"])){
							echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span>Logout</a></li>";
						}
					?>
				</ul>
			</div>
		</nav>
		<div class="container">
			<div class="row">
            <?php 
                // $conn = connectDB();
                // $user_id = $_SESSION['user_id'];
                // $datePaid = date("Y-m-d");
                // if (isset($_GET['id'])) {
                //   $no = $_GET['id'];
                //   $query = mysqli_query($conn, "INSERT INTO purchase (book_id, user_id, date) VALUES ('$no', '$user_id', '$datePaid')");
                // }else{
                //   $arraybook = selectBooks();
                //   $gabungan = "INSERT INTO purchase (book_id, user_id, date) VALUES ";
                //   for ($i=0; $i < count($arraybook) - 1; $i++) {
                //     $buku = selectAllFromBook($arraybook[$i]);
                //     while ($row = mysqli_fetch_row($buku)) {
                //       $gabungan .= "('$row[0]', '$user_id', '$datePaid'), ";
                //     }
                //   }
                //   for ($i=count($arraybook) - 1; $i < count($arraybook); $i++) {
                //     $buku = selectAllFromBook($arraybook[$i]);
                //     while ($row = mysqli_fetch_row($buku)) {
                //       $gabungan .= "('$row[0]', '$user_id', '$datePaid')";
                //     }
                //   }
                //   $query = mysqli_query($conn, $gabungan);
                // }
              ?>
            <div class="col-md-6">
            <a href="home.php" class="btn btn-success btn-block btn-register btn-lg">SUCCESS</a>

            </div>
            <div class="col-md-6">
            <a href="home.php" class="btn btn-danger btn-block btn-register btn-lg">FAILED</a>
            </div>
			</div>
		</div>
		<script src="src/js/jquery-3.1.0.min.js"> </script>
		<script src="bootstrap/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="src/js/home.js"></script>
		<script type="text/javascript" src="src/js/ajax.js"></script>
	</body>
	<footer>
		<hr>
		<h4>&copy; 2020 DTPL 2019SB-5 Inc. All rights reserved</h4>
	</footer>
</html>
<!-- <div class="register">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="register-title">Status Pembayaran?</h1>
        
        <div class="btn-metode-pembayaran">
        <div class="row">
            <div class="col-md-6">
              <a href="buku-saya.php" class="btn btn-success btn-block btn-register btn-lg">SUCCESS</a>
              
            </div>
            <div class="col-md-6">
              <a href="buku-saya.php" class="btn btn-danger btn-block btn-register btn-lg">FAILED</a>
            </div>
          </div>
        </div>
                 
      </div>

      <div class="col-md-9 form-register-group">
        <form>
        </form>
      </div>

    </div>


  </div>
</div> -->