<?php
	include 'database/connection.php';
	$result=mysqli_query($conn, "select * from schedule where d_id = ".$_POST['doc_name']);
	while($row = mysqli_fetch_row($result)){
		echo '<tr>';
		echo '<td>' . $row[3] . '</td>';
		echo '<td>' . $row[4] . '</td>';
		echo '</tr>';
	}
?>