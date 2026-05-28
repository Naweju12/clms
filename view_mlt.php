<?php
    session_start();
    if(isset($_SESSION['email'])){
?>
 <?php 
 include './include/header.php'; 
 include './database/connection.php';
 include './database/view_mlt_script.php';

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
                      <u>  <h1 class="h3 mb-0 text-gray-800">LABORATORY TECHNICIAN LIST</h1></u>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Technician Name</th>
                                            <th>Email Address</th> 
                                            <!-- <th>Password</th>-->
                                            <!--<th>Designation</th>-->
                                            <th>Department</th>
                                            
                                            <!--<th>Education</th>-->
                                            <!--<th>Doctor Experience</th>-->
                                          <!--  <th>Working Days</th>-->
                                            <th>Phone no</th>
                                            <!--<th>Address</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 <!--   <tfoot>
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
                                             <td><?php echo $row['mlt_name']; ?> </td>
                                             <td> <?php echo $row['mlt_email']; ?> </td> 
                                             <!--    <td> <?php echo $row['d_password']; ?> </td>-->
                                             <!--   <td> <?php echo $row['d_desg']; ?> </td>-->
                                             <td> <?php echo $row['mlt_dept']; ?> </td>
                                             
                                             <!--   <td> <?php echo $row['d_education']; ?> </td>-->
                                             <!--   <td> <?php echo $row['d_exp']; ?> </td>-->
                                            <!-- <td> <?php echo $row['d_workingdays']; ?> </td>-->
                                             <td> <?php echo $row['mlt_phone']; ?> </td>
                                             <!-- <td> <?php echo $row['d_addrr']; ?> </td>-->


                                             <td>
                                                <u><a class="btn btn-success"href="./mlt_profile.php?id=<?php echo $row['id'] ?>" >PROFILE</a></u>
                                                <u> <a class="btn btn-warning"onclick="return confirm('Are you sure,you want to edit?')"href="./edit_mlt.php?id=<?php echo $row['id'] ?>">EDIT</a></u>
                                                <u> <a class="btn btn-danger"onclick="return confirm('Are you sure,you want to delete?')"href="./database/del_mlt.php?id=<?php echo $row['id'] ?>">DELETE</a></u>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    
                                    ?>
                                    <a class="btn btn-primary"href="./insert_mlt.php" align="right">ADD LABORATORY TECHNICIAN</a><br><br>
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
<?php
}
else{
    header("location: ./admin_login.php");
}
?>