 <?php 
 include './include/header.php'; 
 include './database/connection.php';
 include 'database/view_appointment_script.php';



 $output = view_data();
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
                      <u> <h1 class="h3 mb-0 text-gray-800">APPOINTMENT LIST</h1></u>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>PATIENT NAME</th>
                                            <th>DOCTOR NAME</th>
                                            <th>DAYS</th>
                                            <th>DATE</th>
                                            <th>TIME</th>
                                            <th>PRESCRIPTION</th>

                                            <th>STATUS</th>
                                            <th>COMPLETED</th>
                                            
                                        </tr>
                                    </thead>
                                   <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>-->
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = $output->fetch_assoc()){
                                            ?>
                                            <tr>
                                             <td> <?php echo $i; ?></td>
                                             <td><?php echo $row['p_name']; ?> </td>
                                             <td> <?php echo $row['d_name']; ?> </td>
                                             <td> <?php echo $row['day']; ?> </td>
                                             <td> <?php echo $row['app_date']; ?> </td>
                                             <td> <?php echo $row['timings']; ?> </td>
                                             <td>  <u> <a class="btn btn-success"onclick="return confirm('Are you sure,you want to Prescribe?')"href="./add_prescp.php?id=<?php echo $row['pid'] ?>">Prescribe</a></u> </td>
                                             <td> <?php echo $row['status']; ?> </td>  
                                             <td> 
                                                <a class="btn btn-warning"href="./database/comp_app.php?id=<?php echo $row['id']; ?>">
                                                    Completed       
                                                </a> 
                                             </td>
                                           
                                        </tr>
                                        <?php
                                        
                                        $i++;
                                    }
                                    ?>
                                  <!--  <a href="./add_test.php" align="right">ADD TEST</a><br><br>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

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