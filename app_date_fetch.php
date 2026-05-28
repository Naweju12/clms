<?php
include "./database/connection.php";
$date = $_POST['app_date'];
$day = strtoupper(date('D', strtotime($date)));
$sql = "SELECT a.id,a.status, p.p_name, d.d_name, a.app_date, s.day, s.timings FROM appointment a INNER JOIN doctor d ON a.d_id = d.id INNER JOIN patient p ON p.id = a.p_id INNER JOIN schedule s ON a.d_id = s.d_id where s.day = ? and a.app_date = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $day, $date);
$stmt->execute();
$result = $stmt->get_result();
$edit_msg = "return confirm('Are you sure,you want to edit?')";
$delete_msg = "return confirm('Are you sure,you want to delete?')";
$i=1;
while($row = $result->fetch_assoc()){
echo '<tr>';
echo '<td>'. $i .'</td>';
echo '<td>'. $row['p_name'] . '</td>';
echo '<td>'. $row['d_name'] . '</td>';
echo '<td>'. $row['app_date']. '</td>';
echo '<td>'. $row['day'] .'</td>';
echo '<td>'. $row['timings']. '</td>';
echo '<td>'. $row['status'] . '</td>'; 

echo '<td>';
echo '<u><a onclick="'. $edit_msg .'"href="./edit_appointment.php?id=' .$row['id'] .'">EDIT</a></u> ';
echo '<u><a onclick="'. $delete_msg .'"href="./database/del_appointment.php?id=' . $row['id'] . '">DELETE</a></u>';
echo '</td>';
echo '</tr>';
$i++;
}
?>