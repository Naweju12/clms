<?php
    session_start();
    if(isset($_SESSION['email'])){
?>
 <?php 
 include './include/header.php'; 
 include'database/connection.php';
 
 
 $stmt = $conn->prepare("SELECT * FROM mlt WHERE id = ?");
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
           <u> <h1 class="h3 mb-0 text-gray-800">EDIT MLT'S</h1></u>
          </div>

          <!-- Content Row -->
          <div class="row">
           <form action="database/edit_mlt_script.php?id=<?php echo $_GET['id'] ?>" method="POST" class="row g-3">
            <div class="col-md-6">
              <label for="mlt_name" class="form-label">Name</label>
              <input type="text" class="form-control" name="mlt_name" id="mlt_name" value="<?php echo $row['mlt_name'] ?>">
            </div>
            <div class="col-md-6">
              <label for="mlt_email" class="form-label">Email Address</label>
              <input type="text" class="form-control" name="mlt_email" id="mlt_email" value="<?php echo $row['mlt_email'] ?>">
            </div>
            <div class="col-md-6">
              <label for="mlt_password" class="form-label">Password</label>
              <input type="text" class="form-control" name="mlt_password" id="mlt_password" value="<?php echo $row['mlt_password'] ?>">
           </div>
          <!--  <div class="col-md-6">
              <label for="doc_desg" class="form-label">Designation</label>
              <input type="text" class="form-control" name="doc_desg" id="doc_desg" value="<?php echo $row['d_desg'] ?>">
            </div>-->
            <div class="col-6">
              <label for="mlt_dept" class="form-label">Department</label>
              <input type="text" class="form-control" name="mlt_dept" id="mlt_dept" value="<?php echo $row['mlt_dept'] ?>">
            </div>
          <!--  <div class="col-6">
              <label for="doc_specialist" class="form-label">Specialist</label>
              <input type="text" class="form-control" name="doc_specialist" id="doc_specialist" value="<?php echo $row['d_specialist'] ?>">
            </div>-->
            <div class="col-md-6">
              <label for="mlt_education" class="form-label">Education</label>
              <input type="text" class="form-control" name="mlt_education" id="mlt_education" value="<?php echo $row['mlt_education'] ?>">
            </div>
            <div class="col-md-6">
              <label for="mlt_exp" class="form-label">Experience</label>
              <input type="text" class="form-control" name="mlt_exp" id="mlt_exp" value="<?php echo $row['mlt_exp'] ?>">
            </div>
          <!-- <div class="col-md-6">
              <label for="doc_workingdays" class="form-label">Working Days:</label>

              <select class="form-control" name="doc_workingdays"  id="doc_workingdays" >
                                    <option value="" selected>--Select--</option>
                                    <option value="sunday">Sunday</option>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                    <option value="saturday">Saturday</option>
                                </select>
                
            </div>-->
            <div class="col-md-6">
              <label for="mlt_phone" class="form-label">Phone No::</label>
              <input type="text" class="form-control" name="mlt_phone" id="mlt_phone" value="<?php echo $row['mlt_phone'] ?>">
            </div>
            <div class="col-md-6">
              <label for="mlt_addrr" class="form-label">Address</label>
              <input type="text" class="form-control" name="mlt_addrr" id="mlt_addrr" value="<?php echo $row['mlt_addrr'] ?>">
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