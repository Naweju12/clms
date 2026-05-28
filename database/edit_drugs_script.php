<?php
include "connection.php";

if(isset($_POST['submit'])){
	$trade_name = $_POST['trade_name'];
	$generic_name = $_POST['generic_name'];
	$note = $_POST['note'];
	


	$stmt=$conn->prepare('UPDATE drugs SET trade_name = ?, generic_name = ?, note = ? WHERE id = ?');
	
	$stmt->bind_param('sssi', $trade_name, $generic_name, $note, $_GET['id']);
	$stmt->execute();
	if($stmt){
		?>
		<script type="text/javascript">
			alert("Data Updated Successfully");
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
	//echo"Data Updated Successfully";
}
?>