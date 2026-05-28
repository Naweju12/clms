 
<?php
 include "connection.php";

 if(isset($_POST['submit'])){
 	
    $p_date = $_POST['p_date'];
 	$description = $_POST['description'];
 	$med1 = $_POST['med1'];
 	$med2 = $_POST['med2'];
 	$test1 = $_POST['test1'];
 	$test2 = $_POST['test2'];
 	
 
 	

 	$sql = "INSERT into prescription(p_id,p_date, description, m1,m2,t1,t2) VALUES(?, ?, ?,?,?,?,?)";

 	$stmt = $conn->prepare($sql);

 	$stmt->bind_param('issssss', $_GET['id'], $p_date, $description, $med1,$med2,$test1,$test2);

 	$stmt->execute();

 	if($stmt){
		?>
		<script type="text/javascript">
			alert("Drug added Successfully");
			window.open("http://localhost/clms/DOCTOR%20PANNEL/add_prescp.php?id=<?php echo $_GET['id']?>","_self");
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