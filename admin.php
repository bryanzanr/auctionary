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
            <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		        <div class="modal-dialog" role="document">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                    <h4 class="modal-title black-modal" id="insertModalLabel">Pendaftaran Akun Pelamar</h4>
		                </div>
		                <div class="modal-body">
		                    <form action="admin.php" method="post">
		                        <div class="form-group">
		                            <label for="namauser">Username</label>
		                            <input type="text" class="form-control" id="insert-namauser" name="username" placeholder="Masukkan Username Anda ..." required>
		                        </div>
		                        <div class="form-group">
		                            <label for="katakunci">Password</label>
		                            <input type="password" class="form-control" id="insert-katakunci" name="kataKunci" placeholder="Masukkan Password Anda ..." required>
		                        </div>
		                        <div class="form-group">
		                            <label for="ulangpassword">Ulangi password</label>
		                            <input type="password" class="form-control" id="insert-ulangpassword" name="ulangPassword" placeholder="Masukkan Kembali Password Anda ..." required>
		                        </div>
		                        <div class="form-group">
		                            <label for="namalengkap">Nama lengkap</label>
		                            <input type="text" class="form-control" id="insert-namalengkap" name="fullname" placeholder="Masukkan Nama Lengkap Anda ..." required>
		                        </div>
		                        <div class="form-group">
		                            <label for="nomorktp">Nomor Identitas</label>
		                            <input type="text" class="form-control" id="insert-nomorktp" name="nomorKtp" placeholder="Masukkan Nomor Identitas Anda ..." required>
		                        </div>
		                        <div class="form-group">
		                        	<label for="jenisKelamin">Jenis kelamin</label>
		                        	<select name="jenisKelamin" required>
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
		                            <input type="email" class="form-control" id="insert-emailaddress" name="emailAddress" placeholder="Masukkan Alamat Email Anda ..." required>
		                        </div>
		                        <div class="form-group">
		                            <label for="repeatemail">Ulangi email</label>
		                            <input type="email" class="form-control" id="insert-repeatemail" name="repeatEmail" placeholder="Masukkan Kembali Alamat Email Anda ..." required>
		                        </div>
		                        <input type="hidden" id="insert-command" name="command" value="insert">
		                        <button type="submit" class="btn btn-primary">DAFTAR</button>
		                    </form>
		                </div>
		            </div>
		        </div>
	    	</div>
            <div class="well well-sm">
		       <strong>Tampilan</strong>
		        <div class="btn-group">
		            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
		            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
		                class="glyphicon glyphicon-th"></span>Grid</a>
		        </div>
		    </div>
		    <div id="products" class="row list-group">
		    <!--<?php
		        $daftarbuku = daftarBuku("book");
		        if(isset($_SESSION['namauser'])) {
		        	$daftarpinjaman = selectRowsFromLoan();
		            $arrayloan = array();
		            while ($baris = pg_fetch_row($daftarpinjaman)) {
		            	array_push($arrayloan, $baris[1]);
		            }
		        }

		      while ($row = pg_fetch_row($daftarbuku)) {
		        echo '
				<div class="item  col-xs-4 col-lg-4">
		            <div class="thumbnail">
		            	<img class="list-group-image" style="width:300px; height:300px;" src="'.$row[1].'" />
		            	<div class="caption">
		            		<h4 class="title-book">'.$row[2].'</h4>
			            	<p class="list-group-item-text">Penulis : '.$row[3].'</p>
			            	<p class="list-group-item-text">Penerbit : '.$row[4].'</p>';
			            	if($row[5] > 0) {
			            		echo '<p class="list-group-item-text">Stok Tersedia : '.$row[5].'</p>';
			            	} else {
			            		echo '<p class="list-group-item-text" style="color:red;">Stok Kosong.</p>';
			            	}
			            	echo '
			                <div class="row">
				                <div class="col-md-6">
									<button type="button" class="btn btn-default" style="width:100%;" data-toggle="modal" data-target="#detailModal" onclick="detailBuku('.$row[0].')">
									Detail
									</button>
								</div>';
								echo '<div id="tombolPinjam'.$row[0].'" class="col-md-6">';
									if(isset($_SESSION['namauser']) && $_SESSION['role'] === 'user') {
										showActButton($arrayloan,$row[0],$row[5]);
									}
								echo '</div>';
			                    echo '
			                </div>
		            	</div>
		            </div>
		    	</div>
		       	';
		      }
		    ?>-->
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
							<!--<?php
								echo '
									<div style="overflow-x:auto;">
										<table class="table">
											<thead> <tr><th>Review ID</th> <th>Book ID</th> <th>User ID</th> <th>Date</th> </tr> </thead>
											<tbody id="detailReview">
											</tbody>
										</table>
									</div>
									<fieldset>
										<legend>Review Buku</legend>
										<div id="reviewBuku">
										</div>
									</fieldset>';
								if(isset($_SESSION['namauser']) && $_SESSION['role'] === 'user') {
									echo 
									'<div class="form-group">
										<label for="reviewBuku">Review Buku</label>
										<input type="text" class="form-control" id="update-reviewBuku" name="reviewBuku" placeholder="Review Buku">
									</div>
									<button type="button" class="btn btn-default" style="width:100%;" onclick="komenBuku(';
									echo $_SESSION["user_id"];
									echo ')">Submit</button><br>';
									echo '<br><div id="detailPinjam"></div>';
								}
                            ?>-->
                        </div>
                    </div>
                </div>
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