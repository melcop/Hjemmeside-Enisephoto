<?php
	# mysql db constants DB_HOST, DB_USER, DB_PASS, DB_NAME
	$servername = "photobyenise.dk.mysql";
	$username = "photobyenise_dk";
	$password = "L2bQfVK3";
	$dbname = "photobyenise_dk";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>