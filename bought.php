<?php
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
    if($_SERVER["REQUEST_METHOD"] == "GET") {
		if($_GET['command'] === 'bought') {
			$conn = connectDB();
			$user_id = $_SESSION['user_id'];
			if (isset($_GET['id'])) {
				$no = $_GET['id'];
                $query = mysqli_query($conn, "INSERT into orders (book_id, user_id) values ('$no','$user_id')");
                header("Location: home.php");
			}
		}else{
			echo  "<script type='text/javascript'>alert('Pembayaran Gagal, silahkan coba lagi');window.location = './status-pembayaran.php?id=".$_GET['id']."';</script>";
		}
    }
?>