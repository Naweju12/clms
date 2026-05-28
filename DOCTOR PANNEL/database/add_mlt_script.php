 
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
 	

 	$sql = "INSERT into mlt(mlt_name, mlt_email,mlt_password,mlt_dept,mlt_education,mlt_exp,mlt_phone,mlt_addrr,mlt_fees) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

 	$stmt = $conn->prepare($sql);

 	$stmt->bind_param('sssssssss', $mlt_name, $mlt_email, $mlt_password ,$mlt_dept, $mlt_education, $mlt_exp, $mlt_phone, $mlt_addrr,$mlt_fees);

 	$stmt->execute();

 	if($stmt){
		?>
		<script type="text/javascript">
			alert("Technician added Successfully");
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
	
}
?>