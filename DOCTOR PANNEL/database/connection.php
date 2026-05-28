<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "clms";

	$conn = mysqli_connect($host, $user, $password, $db);
	if(!$conn){
		echo 'Error';
	}
	//echo 'connected';
?>