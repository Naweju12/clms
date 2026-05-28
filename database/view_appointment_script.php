<?php 

function view_data(){

	include "connection.php";
	$date = '2024-05-15';
	$day = strtoupper(date('D', strtotime($date )));
	$sql = "SELECT a.id,a.status, p.p_name, d.d_name, a.app_date, s.day, s.timings FROM appointment a INNER JOIN doctor d ON a.d_id = d.id INNER JOIN patient p ON p.id = a.p_id INNER JOIN schedule s ON a.d_id = s.d_id where s.day = ? and a.app_date = ?";
 	$stmt = $conn->prepare($sql);
 	$stmt->bind_param('ss', $day, $date);
 	$stmt->execute();
 	$result = $stmt->get_result();
	return $result;
 	if($stmt){
 		header("location: ../view_appointment.php");
 	}
}
?>