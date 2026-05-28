<?php
include "connection.php";

if(isset($_POST['submit'])){
	$mlt_name = $_POST['mlt_name'];
 	$mlt_email = $_POST['mlt_email'];
 	$mlt_password = $_POST['mlt_password'];
 	$mlt_dept = $_POST['mlt_dept'];
 	$mlt_education = $_POST['mlt_education'];
 	$mlt_exp = $_POST['mlt_exp'];
 	$mlt_phone = $_POST['mlt_phone'];
 	$mlt_addrr = $_POST['mlt_addrr'];
 	$mlt_fees = $_POST['mlt_fees'];


	$stmt=$conn->prepare('UPDATE mlt SET mlt_name = ?, mlt_email = ?, mlt_password = ?,mlt_dept = ?,mlt_education = ?,mlt_exp = ?,mlt_phone = ?,mlt_addrr = ?,mlt_fees= ? WHERE id = ?');
	
	$stmt->bind_param('sssssssssi', $mlt_name, $mlt_email, $mlt_password , $mlt_dept,  $mlt_education, $mlt_exp,$mlt_phone, $mlt_addrr,$mlt_fees, $_GET['id']);
	$stmt->execute();
	if($stmt){
		?>
		<script type="text/javascript">
			alert("Data Updated Successfully");
			window.open("http://localhost/clms/view_mlt.php","_self");
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
}
?>