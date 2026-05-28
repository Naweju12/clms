<?php
    session_start();
    if(isset($_SESSION['email'])){
?>
 <?php 
 include './include/header.php'; 
 include './database/connection.php';
 include 'database/view_drugs_script.php';

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
                      <u>  <h1 class="h3 mb-0 text-gray-800">DRUG'S LIST</h1></u>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th> Trade Name</th>
                                            <th>Generic Name</th>
                                            <th>Note</th>
                                           
                                            <th>Action</th>
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
                                             <td><?php echo $row['trade_name']; ?> </td>
                                             <td> <?php echo $row['generic_name']; ?> </td>
                                             <td> <?php echo $row['note']; ?> </td>
                                             
                                             <td>
                                             <!--   <u><a href="./add_drugs.php" >ADD DRUG,</a></u>-->
                                                <u><a onclick="return confirm('Are you sure,you want to edit?')"href="./edit_drugs.php?id=<?php echo $row['id'] ?>">EDIT,</a></u>
                                                <u><a onclick="return confirm('Are you sure,you want to delete?')"href="./database/del_drugs.php?id=<?php echo $row['id'] ?>">DELETE</a></u>
                                            </td>
                                        </tr>
                                        <?php
                                        
                                        $i++;
                                    }
                                    ?>
                                <a href="./add_drugs.php" align="right">ADD DRUG</a><br><br>

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