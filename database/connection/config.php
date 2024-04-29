<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "pixelweb";

	$connection = mysqli_connect($server, $user, $pass, $dbname);
	mysqli_set_charset($connection, "utf8");
	
	if(!$connection) {
		die("Falha na conexão: " . mysqli_connect_error());
	}
    else { }
?>