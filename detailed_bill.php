<?php
    session_start();
    if(isset($_SESSION['email'])){
?>
 <?php include './include/header.php'; ?>
 <?php include './database/connection.php'; ?>

 <?php
    $stmt1 = $conn->prepare('SELECT a.app_date, d.d_fees FROM appointment a inner join doctor d on a.d_id = d.id WHERE p_id = ?');
    $stmt1->bind_param('i', $_POST['p_name']);
    $stmt1->execute();
    $result = $stmt1->get_result();

    // $stmt2 = $conn->prepare('SELECT d_fees FROM doctor WHERE id = ? ');
    // $stmt2->bind_param('i', $result['d_id']);
    // $stmt2->execute();
    // $result2 = $stmt2->get_result();

    $stmt3 = $conn->prepare('SELECT t.test_name, m.app_date, t.test_fees FROM mlt_appointment m inner join test t on m.test_id = t.id WHERE p_id = ?');
    $stmt3->bind_param('i', $_POST['p_name']);
    $stmt3->execute();
    $result3 = $stmt3->get_result();

    // $stmt4 = $conn->prepare('SELECT test_name, test_fees FROM test WHERE id = ? ');
    // $stmt4->bind_param('i', $result3['test_id']);
    // $stmt4->execute();
    // $result4 = $stmt4->get_result();

    $total_fees = 0;
 ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './include/sidebar.php';?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include './include/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                       <u> <h1 class="h3 mb-0 text-gray-800">ALL BILL</h1></u>
                    </div>
                    <div class='row'>
                     <table class="table table-bordered col-5 mr-1" >
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Fees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row2 = $result->fetch_assoc()){?>
                            <tr>
                                <td>Consultation</td>
                                <td><?php echo $row2['app_date'] ?></td>
                                <td><?php echo $row2['d_fees']; ?></td>
                            </tr>
                            <?php $total_fees = $total_fees+$row2['d_fees']; } ?>
                            <tr>
                                <td>Total Fees</td>
                                <td colspan="2"><?php echo $total_fees; ?></td>
                            </tr>
                        </tbody>
                     </table>
                    <table class="table table-bordered col-5 mr-1">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Fees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_fees = 0;        
                                while($row = $result3->fetch_assoc()){
                                ?>
                            <tr>
                                <td><?php echo $row['test_name']?></td>
                                <td><?php echo $row['app_date']?></td>
                                <td><?php echo $row['test_fees']?></td>
                            </tr>
                            <?php
                            $total_fees = $total_fees + $row['test_fees'];
                            }
                            ?>
                            <tr>
                                <td>Total Fees</td>
                                <td colspan="2"><?php echo $total_fees; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>





            <!-- Footer -->
            <?php include './include/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
<?php include './include/buttom_code.php' ?>
<?php
}
else{
    header("location: ./admin_login.php");
}
?>