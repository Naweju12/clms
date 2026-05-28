<?php
    session_start();
    if(isset($_SESSION['email'])){
?>
 <?php 
 include './include/header.php'; 
 include'database/connection.php';
 
 
 $stmt = $conn->prepare("SELECT * FROM test WHERE id = ?");
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
          <u>  <h1 class="h3 mb-0 text-gray-800">EDIT TEST</h1></u>
          </div>

          <!-- Content Row -->
          <div class="row">
           <form action="database/edit_test_script.php?id=<?php echo $_GET['id'] ?>" method="POST" class="row g-3">
            <div class="col-md-12">
              <label for="trade_name" class="form-label">Test Name</label>
              <input type="text" class="form-control" name="test_name" id="test_name" value="<?php echo $row['test_name'] ?>">
            </div>
            <div class="col-md-12">
              <label for="generic_name" class="form-label">Description</label>
              <input type="text" class="form-control" name="test_descp" id="test_descp" value="<?php echo $row['test_descp'] ?>">
            </div>
            <div class="col-md-12">
              <label for="generic_name" class="form-label">Test Fees</label>
              <input type="text" class="form-control" name="test_fees" id="test_fees" value="<?php echo $row['test_fees'] ?>">
            </div>
         
                            
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