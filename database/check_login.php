<?php
if(isset($_POST['login_submit'])){
	include './connection.php';
	$email = $_POST['email'];
	$password = $_POST['password'];

	$stmt = $conn->prepare('select * from admin_login where email = ? and password = ?');
	$stmt->bind_param('ss', $email, $password);
	$stmt->execute();
	$result = $stmt->get_result()->fetch_assoc();
	if($result){ 
		session_start();
		$_SESSION['email'] = $email;
		header('location: ../dashboard.php');
	}
	else{
		echo "<h2>User Not Found</h2>";
	}
}
else{
	header("location: login.php");
}
?>