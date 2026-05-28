<?php
include "connection.php";

if(isset($_POST['submit'])){
	$test_name = $_POST['test_name'];
	$test_descp = $_POST['test_descp'];
	$test_fees = $_POST['test_fees'];
	
	


	$stmt=$conn->prepare('UPDATE test SET test_name = ?, test_descp = ? , test_fees=? WHERE id = ?');
	
	$stmt->bind_param('ssi', $test_name, $test_descp,$test_fees, $_GET['id']);
	$stmt->execute();
	if($stmt){
		?>
		<script type="text/javascript">
			alert("Data Updated Successfully");
			window.open("http://localhost/clms/view_test.php","_self");
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