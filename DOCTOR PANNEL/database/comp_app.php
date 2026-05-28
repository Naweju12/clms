<?php
include './connection.php';
$stmt=$conn->prepare("UPDATE appointment SET status = 'completed' WHERE id = ?");
	
	$stmt->bind_param('i' , $_GET['id']);
	$stmt->execute();
	if($stmt){
		?>
		<script type="text/javascript">
			alert("Data Updated Successfully");
			window.open("http://localhost/clms/DOCTOR%20PANNEL/view_appointment.php","_self");
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			alert("Please Try Again");
		</script>
		<?php
	}
	//echo"Data Updated Successfully";

?>