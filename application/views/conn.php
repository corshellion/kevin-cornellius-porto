<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tcreative";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
	}
?>