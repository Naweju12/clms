 
<?php
 include "connection.php";

 if(isset($_POST['submit'])){

 	$test_name = $_POST['test_name'];
 	$test_descp = $_POST['test_descp'];
 	$test_fees = $_POST['test_fees'];
 
 	

 	$sql = "INSERT into test(test_name, test_descp,test_fees) VALUES(?, ?, ?)";

 	$stmt = $conn->prepare($sql);

 	$stmt->bind_param('ss', $test_name, $test_descp),$test_fees;

 	$stmt->execute();

 	if($stmt){
		?>
		<script type="text/javascript">
			alert("Drug added Successfully");
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
	
}
?>