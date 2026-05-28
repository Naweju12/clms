<?php
    session_start();
    if(isset($_SESSION['email'])){
?>
 <?php include './include/header.php'; ?>
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
                       <u> <h1 class="h3 mb-0 text-gray-800">ADD PATIENT</h1></u>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <form action="database/add_patient_script.php" method="POST" class="row g-3">
                            <div class="col-md-6">
                            <label for="pat_name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="pat_name" id="pat_name">
                          </div>
                          <div class="col-md-6">
                            <label for="pat_email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="pat_email" id="pat_email">
                          </div>
                          <div class="col-md-6">
                            <label for="pat_phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="pat_phone" id="pat_phone">
                          </div>
                          <div class="col-md-6">
                            <label for="pat_gender" class="form-label">Gender</label>
                            <input type="text" class="form-control" name="pat_gender" id="pat_gender">
                          </div>
                          <div class="col-6">
                            <label for="pat_bloodgroup" class="form-label">Blood Group</label>
                            <input type="text" class="form-control" name="pat_bloodgroup" id="pat_bloodgroup">
                          </div>
                          <div class="col-6">
                            <label for="pat_dob" class="form-label">Date Of Birth</label>
                            <input type="text" class="form-control"name="pat_dob" id="pat_dob">
                          </div>
                          <div class="col-md-6">
                            <label for="pat_age" class="form-label">Age</label>
                            <input type="text" class="form-control"name="pat_age" id="pat_age">
                          </div>
                          <div class="col-md-6">
                            <label for="pat_rname" class="form-label">Relative Name</label>
                            <input type="text" class="form-control"name="pat_rname" id="pat_rname">
                          </div>
                          <div class="col-md-6">
                            <label for="pat_phone" class="form-label">Relative phone:</label>
                            <input type="text" class="form-control" name="pat_rphone" id="pat_rphone">
                          </div>
                          <div class="col-md-6">
                            <label for="pat_state" class="form-label">State</label>
                            <input type="text" class="form-control" name="pat_state" id="pat_state">
                          </div>
                          <div class="col-md-6">
                            <label for="pat_district" class="form-label">District</label>
                            <input type="text" class="form-control" name="pat_district" id="pat_district">
                          </div>
                          <div class="col-md-6">
                            <label for="pat_addrr" class="form-label">Address</label>
                            <input type="text" class="form-control" name="pat_addrr" id="pat_addrr">
                          </div>
                          <div class="col-md-6">
                            <label for="pat_descp" class="form-label">Description</label>
                            <input type="text" class="form-control" name="pat_descp" id="pat_descp">
                          </div>
                          <!-- <div class="col-md-4">
                            <label for="inputState" class="form-label">State</label>
                            <select id="inputState" class="form-select">
                              <option selected>Choose...</option>
                              <option>...</option>
                            </select>
                          </div> -->
                         <!-- <div class="col-md-2">
                            <label for="inputZip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                          </div>
                          <div class="col-12">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="gridCheck">
                              <label class="form-check-label" for="gridCheck">
                                Check me out
                              </label>
                            </div>-->
                          
                          <div class="col-12">
                            <label></label>
                            <input type="submit" name="submit" onclick ="return confirm ('Are you sure ?')" class="form-control btn btn-primary">
                          </div>
                        </form>
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