<?php 

function view_data(){

	include "connection.php";

	$day = strtoupper(date('D', strtotime('2024-05-12')));
	$sql = "SELECT a.id, p.id as 'pid', p.p_name, a.status, d.d_name, s.day, a.app_date, s.timings FROM appointment a INNER JOIN schedule s ON a.d_id = s.d_id INNER JOIN doctor d ON a.d_id = d.id INNER JOIN patient p ON p.id = a.p_id where  s.d_id = 9 AND s.day = ?";
 	$stmt = $conn->prepare($sql);
 	$stmt->bind_param('s', $day);
 	$stmt->execute();
 	$result = $stmt->get_result();
	return $result;
 	if($stmt){
 		header("location: ../view_appointment.php");
 	}
}
?>