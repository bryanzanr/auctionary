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
	
	if(!isset($_SESSION["titlebookadded"])) {
		if (!isset($_GET['id'])) {
			header("Location: daftar.php");
		}
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
					<li class="active"><a href="daftar.php">Detail Buku</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
						if (isset($_SESSION["namauser"])){
							echo "<li><a href='services/logout.php'><span class='glyphicon glyphicon-log-out'></span>Logout</a></li>";
						}
					?>
				</ul>
			</div>
		</nav>
		<div class="container">
			<div class="row">
			<?php
			$daftarbuku = daftarBuku("book");
			while ($baris = mysqli_fetch_row($daftarbuku)) {
            	if($baris[2] == $_SESSION["titlebookadded"]) {
            		echo '<div class="col-md-4"><img class="list-group-image" style="width:300px; height:300px;" src="'.$baris[1].'" /></div>
            		<div class="col-md-8">
            			<h1>'.$baris[2].'</h1>
            			<p>Penulis : '.$baris[3].'</p>
            			<p>Penerbit : '.$baris[4].'</p>
            			<p>Deskripsi : 
            			'.$baris[5].'</p>
						<p>Jumlah buku : '.$baris[6].'</p>
						<a href="daftar.php"><button type="button" class="btn btn-lg btn-default">Kembali ke halaman daftar buku</button></a>
            		';	 
            		break;
				}
				if($baris[0] == $_GET["id"]) {
            		echo '<div class="col-md-4"><img class="list-group-image" style="width:300px; height:300px;" src="'.$baris[1].'" /></div>
            		<div class="col-md-8">
            			<h1>'.$baris[2].'</h1>
            			<p>Penulis : '.$baris[3].'</p>
            			<p>Penerbit : '.$baris[4].'</p>
            			<p>Deskripsi : 
            			'.$baris[5].'</p>
            			<p>Jumlah buku : '.$baris[6].'</p>
					';
					if(isset($_SESSION['namauser']) && $_SESSION['role'] === 'user') {
						echo '
							<a href="metode-pembayaran.php?id='.$_GET['id'].'&harga='.$baris[6].'"><button type="button" class="btn btn-lg btn-default">Beli Sekarang</button></a>
							<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#detailModal" onclick="detailBuku('.$_GET['id'].',"lelang")">Buat Penawaran</button>
						';
					}else{
						echo '
							<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#detailModal" onclick="detailBuku('.$_GET['id'].',"lelang")">Lihat Penawaran</button>
							<a href="daftar.php"><button type="button" class="btn btn-lg btn-default">Kembali ke halaman daftar buku</button></a>
						';
					}	 
            		break;
				}
            }
			?>
				</div>
			</div>
			<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title black-modal" id="detailModalLabel">Detail Buku</h4>
                        </div>
                        <div class="modal-body">
							<fieldset>
                        		<legend>Display Buku</legend>
								<div id="displayBuku">
								</div>
							</fieldset>
							<fieldset>
                        		<legend>Judul Buku</legend>
								<div id="judulBuku">
								</div>
							</fieldset>
                        	<fieldset>
                        		<legend>Deskripsi Buku</legend>
								<div id="deskripsiBuku">
								</div>
							</fieldset>
							<div style="overflow-x:auto;">
								<table class='table'>
									<thead> <tr><th>Book ID</th> <th>Pengarang</th> <th>Penerbit</th> <th>Stock</th> </tr> </thead>
									<tbody id="detailBuku">
									</tbody>
								</table>
							</div>
							<?php
								if(isset($_SESSION['namauser']) && $_SESSION['role'] === 'admin') {
									echo '
									<div style="overflow-x:auto;">
										<table class="table">
											<thead> <tr><th>Offer ID</th> <th>Book ID</th> <th>User ID</th> <th>Date</th> </tr> </thead>
											<tbody id="detailReview">
											</tbody>
										</table>
									</div>
									<fieldset>
										<legend>Book Offer</legend>
										<div id="reviewBuku">
										</div>
									</fieldset>';
								}
								if(isset($_SESSION['namauser']) && $_SESSION['role'] === 'user') {
									echo 
									'<div class="form-group">
										<label for="reviewBuku">Your Offer</label>
										<input type="text" class="form-control" id="update-reviewBuku" name="reviewBuku" placeholder="Insert your offer here ...">
									</div>
									<button type="button" class="btn btn-default" style="width:100%;" onclick="komenBuku(';
									echo $_SESSION["user_id"];
									echo ',"lelang")">Tawar</button><br>';
									echo '<br><div id="detailPinjam"></div>';
								}
                            ?>
                        </div>
                    </div>
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