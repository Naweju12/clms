<?php
	include './connection.php';

	$d_id = (int)$_POST['doc_name'];
	$day = $_POST['day'];
	$timing = $_POST['timing'];
	$stmt2 = $conn->prepare("select d_name from doctor where id = ?");
	$stmt2->bind_param('i', $d_id);
	$stmt2->execute();
	$result2 = $stmt2->get_result()->fetch_assoc();
	for($i=0; $i<sizeof($day); $i++){
		$stmt = $conn->prepare('INSERT INTO schedule(d_id, d_name, day, timings) VALUES(?, ?, ?, ?)');
		$stmt->bind_param('isss', $d_id, $result2['d_name'], $day[$i], $timing);
		$stmt->execute();
	}
	header("location: ../schedule.php");
?>