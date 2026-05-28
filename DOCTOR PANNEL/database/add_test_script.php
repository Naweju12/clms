 
<?php
 include "connection.php";

 if(isset($_POST['submit'])){

 	$test_name = $_POST['test_name'];
 	$test_descp = $_POST['test_descp'];
 
 	

 	$sql = "INSERT into test(test_name, test_descp) VALUES(?, ?)";

 	$stmt = $conn->prepare($sql);

 	$stmt->bind_param('ss', $test_name, $test_descp);

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