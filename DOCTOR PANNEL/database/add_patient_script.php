 
<?php
 include "connection.php";

 if(isset($_POST['submit'])){

 	$pat_name = $_POST['pat_name'];
 	$pat_email = $_POST['pat_email'];
 	$pat_phone = $_POST['pat_phone'];
 	$pat_gender = $_POST['pat_gender'];
 	$pat_bloodgroup = $_POST['pat_bloodgroup'];
 	$pat_dob = $_POST['pat_dob'];
 	$pat_age = $_POST['pat_age'];
 	$pat_rname = $_POST['pat_rname'];
 	$pat_rphone = $_POST['pat_rphone'];
 	$pat_state = $_POST['pat_state'];
 	$pat_district = $_POST['pat_district'];
 	$pat_addrr = $_POST['pat_addrr'];
 	$pat_descp = $_POST['pat_descp'];

 	$sql = "INSERT into patient(p_name, p_email, p_phone,p_gender,p_bloodgroup,p_dob,p_age,p_rname,p_rphone,p_state,p_district,p_addrr,p_descp) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

 	$stmt = $conn->prepare($sql);

 	$stmt->bind_param('sssssssssssss', $pat_name, $pat_email, $pat_phone , $pat_gender, $pat_bloodgroup , $pat_dob, $pat_age, $pat_rname, $pat_rphone, $pat_state, $pat_district , $pat_addrr , $pat_descp);

 	$stmt->execute();

 	if($stmt){
		?>
		<script type="text/javascript">
			alert("Patient added Successfully");
			window.open("http://localhost/clms/view_patient.php","_self");
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