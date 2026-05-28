 
<?php
 include "connection.php";

 if(isset($_POST['submit'])){

 	$trade_name = $_POST['trade_name'];
 	$generic_name = $_POST['generic_name'];
 	$note = $_POST['note'];
 	

 	$sql = "INSERT into drugs(trade_name, generic_name, note) VALUES(?, ?, ?)";

 	$stmt = $conn->prepare($sql);

 	$stmt->bind_param('sss', $trade_name, $generic_name, $note);

 	$stmt->execute();

 	if($stmt){
		?>
		<script type="text/javascript">
			alert("Drug added Successfully");
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
	
}
?>