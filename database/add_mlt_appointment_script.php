 
<?php
 include "connection.php";

 if(isset($_POST['submit'])){

 	$test_name = $_POST['test_name'];
 	$pat_name = $_POST['pat_name'];
 	$app_date = $_POST['app_date'];


 
 	

 	$sql = "INSERT into mlt_appointment(test_id,p_id ,app_date) VALUES(?, ?,?)";

 	$stmt = $conn->prepare($sql);

 	$stmt->bind_param('iis', $test_name, $pat_name,$app_date);

 	$stmt->execute();

 	if($stmt){
		?>
		<script type="text/javascript">
			alert("Appointment booked Successfully");
			window.open("http://localhost/clms/view_mlt_appointment.php","_self");
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
	
}
?>