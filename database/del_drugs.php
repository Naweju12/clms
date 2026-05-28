<?php
	include './connection.php';

	$stmt=$conn->prepare("DELETE FROM drugs WHERE id= ?");
	$stmt->bind_param('i',$_GET['id']);
	$stmt->execute();
	if($stmt){
		?>
		<script type="text/javascript">
			alert("Data Deleted Successfully");
			window.open("http://localhost/clms/view_drugs.php","_self");
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
?>