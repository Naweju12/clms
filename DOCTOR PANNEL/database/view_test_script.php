<?php 

function view_data(){

	include "connection.php";

	$sql = "SELECT * FROM test";

 	$stmt = $conn->prepare($sql);

 	$stmt->execute();
 	$result = $stmt->get_result();
	// $row = $result->fetch_assoc();

	return $result;

 	if($stmt){
 		header("location: ../view_test.php");
 	}
}



?>