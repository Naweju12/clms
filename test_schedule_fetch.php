<?php
	include 'database/connection.php';
	$result=mysqli_query($conn, "select * from mlt_schedule where test_id = ".$_POST['test_name']);
	while($row = mysqli_fetch_row($result)){
		echo '<tr>';
		echo '<td>' . $row[2] . '</td>';
		echo '<td>' . $row[3] . '</td>';
		echo '</tr>';
	}
?>