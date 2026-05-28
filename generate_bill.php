<?php
    session_start();
    if(isset($_SESSION['email'])){
?>
<?php
    require_once('./dompdf/autoload.inc.php');
    include './database/connection.php'; 
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $stmt1 = $conn->prepare('SELECT * FROM appointment WHERE p_id = ? AND app_date = ?');
    $stmt1->bind_param('is', $_POST['p_name'], $_POST['b_date']);
    $stmt1->execute();
    $result = $stmt1->get_result()->fetch_assoc();

    $stmt2 = $conn->prepare('SELECT d_fees FROM doctor WHERE id = ? ');
    $stmt2->bind_param('i', $result['d_id']);
    $stmt2->execute();
    $result2 = $stmt2->get_result()->fetch_assoc();

    $stmt3 = $conn->prepare('SELECT * FROM mlt_appointment WHERE p_id = ? AND app_date = ?');
    $stmt3->bind_param('is', $_POST['p_name'], $_POST['b_date']);
    $stmt3->execute();
    $result3 = $stmt3->get_result()->fetch_assoc();

    $stmt4 = $conn->prepare('SELECT test_name, test_fees FROM test WHERE id = ? ');
    $stmt4->bind_param('i', $result3['test_id']);
    $stmt4->execute();
    $result4 = $stmt4->get_result();

    $total_fees = 0;
    $total_fees = $total_fees + $result2['d_fees'];
    $str = '';

    while($row = $result4->fetch_assoc()){
    $str = $str ."<tr>
        <td>" . $row['test_name'] ."</td>
        <td>" . $_POST['b_date'] . "</td>
        <td>" . $row['test_fees'] . "</td>
    </tr>";
    $total_fees = $total_fees + $row['test_fees'];
    }

    $html = "
    <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Clinic Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            
        }
        .invoice-container {
            max-width: 800px;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .header h1 {
            color: #3498db;
        }
        .clinic-info, .patient-info {
            margin-bottom: 20px;
        }
        .clinic-info h2, .patient-info h2 {
            color: #2c3e50;
        }
        .clinic-info p, .patient-info p {
            margin: 5px 0;
            color: #34495e;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
        }
        table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
            color: #2c3e50;
        }
        table tbody tr:nth-child(even) {
            background-color: #f4f7f6;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            color: #2c3e50;
        }
        .total strong {
            color: #e74c3c;
        }
    </style>
</head>
<body>

<div class='invoice-container'>
    <div class='header'>
        <h1>Clinic Invoice</h1>
    </div>

    <div class='clinic-info'>
        <h2>Clinic Information</h2>
        <p>Name: ABC Clinic</p>
        <p>Address: 123 Health St, Wellness City</p>
        <p>Phone: (123) 456-7890</p>
        <p>Email: info@abcclinic.com</p>
    </div>

    <div class='patient-info'>
        <h2>Patient Information</h2>
        <p>Name: John Doe</p>
        <p>Address: 456 Patient Rd, Caretown</p>
        <p>Phone: (987) 654-3210</p>
        <p>Email: john.doe@example.com</p>
    </div>
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Fees</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Consultation</td>
                        <td>" . $_POST['b_date'] . "</td>
                        <td>" . $result2['d_fees'] . "</td>
                    </tr>" .
                    $str
                    . "
                </tbody>
            </table>
            <div class='total'>
        <p><strong>Total Amount Due: ". $total_fees ."</strong></p>
    </div>

    <div class='footer'>
        <p>Thank you for your visit!</p>
    </div>
</div>

</body>
</html>
";

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrate');
    $dompdf->render();
    $dompdf->stream('Bill.pdf', array("Attachment" => false));
?>
<?php
}
else{
    header("location: ./admin_login.php");
}
?>