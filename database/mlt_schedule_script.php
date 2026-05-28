<?php
	include './connection.php';

	$mlt_id = (int)$_POST['mlt_name'];
	$day = $_POST['day'];
	$timing = $_POST['timing'];
	$stmt2 = $conn->prepare("select mlt_name from mlt where id = ?");
	$stmt2->bind_param('i', $mlt_id);
	$stmt2->execute();
	$result2 = $stmt2->get_result()->fetch_assoc();
	for($i=0; $i<sizeof($day); $i++){
		$stmt = $conn->prepare('INSERT INTO mlt_schedule(mlt_id, mlt_name, day, timings) VALUES(?, ?, ?, ?)');
		$stmt->bind_param('isss', $mlt_id, $result2['mlt_name'], $day[$i], $timing);
		$stmt->execute();
	}
	header("location: ../mlt_schedule.php");
?>