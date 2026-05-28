<?php
include "connection.php";

if(isset($_POST['submit'])){
	$doc_name = $_POST['doc_name'];
	$doc_email = $_POST['doc_email'];
	$doc_password = $_POST['doc_password'];
	$doc_desg = $_POST['doc_desg'];
	$doc_dept = $_POST['doc_dept'];
	$doc_specialist = $_POST['doc_specialist'];
	$doc_education = $_POST['doc_education'];
	$doc_exp = $_POST['doc_exp'];
	$doc_workingdays = $_POST['doc_workingdays'];
	$doc_phone = $_POST['doc_phone'];
	$doc_addrr = $_POST['doc_addrr'];
	$doc_fees = $_POST['doc_fees'];


	$stmt=$conn->prepare('UPDATE doctor SET d_name = ?, d_email = ?, d_password = ?,d_desg = ?,d_dept = ?,d_specialist = ?,d_education = ?,d_exp = ?,d_workingdays = ?,d_phone = ?,d_addrr = ?,d_fees= ? WHERE id = ?');
	
	$stmt->bind_param('ssssssssssssi', $doc_name, $doc_email, $doc_password , $doc_desg, $doc_dept, $doc_dept , $doc_education, $doc_exp, $doc_workingdays, $doc_phone, $doc_addrr,$doc_fees, $_GET['id']);
	$stmt->execute();
	if($stmt){
		?>
		<script type="text/javascript">
			alert("Data Updated Successfully");
			window.open("http://localhost/clms/view_doc.php","_self");
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