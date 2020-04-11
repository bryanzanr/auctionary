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
    
    function daftarUser($table) {
		$conn = connectDB();
		
		$sql = "SELECT * FROM $table";
		
		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
	}
	
	if($_SERVER["REQUEST_METHOD"] == "GET") {
        $conn = connectDB();
		// username and password sent from form 
        session_start();
        
        if(isset($_SESSION['namauser']) && $_SESSION['role'] === 'admin') {
            $query = $_GET['id']; 
            
            $daftaruser = daftarUser("book");
            $sdhAda = false;
            // $last = 0;
            while ($row = mysqli_fetch_row($daftaruser)) {	
                if($row[0] == $query) {
                    $sdhAda = true;
                    break;
                }
                // $last = $row[0];
            }
            
            if($sdhAda == false) {
                echo  "<script type='text/javascript'>alert('Delete failed, book not exists');window.location = './daftar.php';</script>";
            } else {
                $sql = "DELETE FROM book WHERE book_id = $query";
            }

            if($result = mysqli_query($conn, $sql)) {
                header("Location: daftar.php");
            } else {
                die("Error: $sql");
            }
            mysqli_close($conn);
        }else{
            echo  "<script type='text/javascript'>alert('Forbidden access, you are not an admin');window.location = './daftar.php';</script>";
        }
					
	}
	
?>