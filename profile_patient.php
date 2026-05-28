<?php
    session_start();
    if(isset($_SESSION['email'])){
?>
 <?php 
 include './include/header.php'; 
 include'./database/connection.php';
 
 
 $stmt = $conn->prepare("SELECT * FROM patient WHERE id = ?");
 $stmt->bind_param("i", $_GET['id']);
 $stmt->execute();
 $result = $stmt->get_result();
 $row = $result->fetch_assoc();

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
           <u> <h1 class="h3 mb-0 text-gray-800">PATIENT PROFILE</h1></u>
          </div>

          <!-- Content Row -->
          <div class="row">
            <form action="database/profile_patient_script.php?id=<?php echo $_GET['id'] ?>" method="POST" class="row g-3">
              <div class="col-md-6">
                <label for="pat_name" class="form-label">Name</label>
                <input type="text" class="form-control" name="pat_name"  id="pat_name" value="<?php echo $row['p_name'] ?>" disabled>
              </div>
              <div class="col-md-6">
                <label for="pat_email" class="form-label">Email</label>
                <input type="text" class="form-control" name="pat_email" id="pat_email" value="<?php echo $row['p_email'] ?>"disabled>
              </div>
              <div class="col-md-6">
                <label for="pat_phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="pat_phone" id="pat_phone" value="<?php echo $row['p_phone'] ?>"disabled>
              </div>
              <div class="col-md-6">
                <label for="pat_gender" class="form-label">Gender</label>
                <input type="text" class="form-control" name="pat_gender" id="pat_gender" value="<?php echo $row['p_gender'] ?>"disabled>
              </div>
              <div class="col-6">
                <label for="pat_bloodgroup" class="form-label">Blood Group</label>
                <input type="text" class="form-control" name="pat_bloodgroup" id="pat_bloodgroup" value="<?php echo $row['p_bloodgroup'] ?>"disabled>
              </div>
              <div class="col-6">
                <label for="pat_dob" class="form-label">Date Of Birth</label>
                <input type="text" class="form-control"name="pat_dob" id="pat_dob" value="<?php echo $row['p_dob'] ?>"disabled>
              </div>
              <div class="col-md-6">
                <label for="pat_age" class="form-label">Age</label>
                <input type="text" class="form-control"name="pat_age" id="pat_age" value="<?php echo $row['p_age'] ?>"disabled>
              </div>
              <div class="col-md-6">
                <label for="pat_rname" class="form-label">Relative Name</label>
                <input type="text" class="form-control"name="pat_rname" id="pat_rname" value="<?php echo $row['p_rname'] ?>"disabled>
              </div>
              <div class="col-md-6">
                <label for="pat_phone" class="form-label">Relative phone:</label>
                <input type="text" class="form-control" name="pat_rphone" id="pat_rphone" value="<?php echo $row['p_rphone'] ?>"disabled>
              </div>
              <div class="col-md-6">
                <label for="pat_state" class="form-label">State</label>
                <input type="text" class="form-control" name="pat_state" id="pat_state" value="<?php echo $row['p_state'] ?>"disabled>
              </div>
              <div class="col-md-6">
                <label for="pat_district" class="form-label">District</label>
                <input type="text" class="form-control" name="pat_district" id="pat_district" value="<?php echo $row['p_district'] ?>"disabled>
              </div>
              <div class="col-md-6">
                <label for="pat_addrr" class="form-label">Address</label>
                <input type="text" class="form-control" name="pat_addrr" id="pat_addrr" value="<?php echo $row['p_addrr'] ?>"disabled>
              </div>
              <div class="col-md-6">
                <label for="pat_descp" class="form-label">Description</label>
                <input type="text" class="form-control" name="pat_descp" id="pat_descp" value="<?php echo $row['p_descp'] ?>"disabled>
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