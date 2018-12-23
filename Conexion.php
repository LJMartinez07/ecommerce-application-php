<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="finalweb";	

	// Create connection
	$con = new mysqli($servername, $username, $password, $db);
	@mysqli_query("SET NAMES 'utf8'", $con);  

	// Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	


?>
	
