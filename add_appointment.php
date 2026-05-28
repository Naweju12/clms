<?php
    session_start();
    if(isset($_SESSION['email'])){
?>
 <?php include './include/header.php'; ?>
 <?php include './database/connection.php'; ?>

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
                       <u> <h1 class="h3 mb-0 text-gray-800">New Appointment</h1></u>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <form action="database/add_appointment_script.php" method="POST" class="row g-3">
                            <div class="col-md-12">
                                <label for="doc_name" class="form-label" >Doctor</label>
                            <!-- <input type="text" class="form-control" name="pat_name" id="pat_name"> -->
                                <select class="form-control" name="doc_name" id="doc_name" onchange="getdata();">
                                    <option value="none" selected>--Select--</option>
                                    <?php
                                        $stmt = $conn->prepare("select id, d_name from doctor");
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        while($row = $result->fetch_assoc()){
                                    ?>
                                      <option value="<?php echo $row['id']; ?>">
                                          <?php echo $row['d_name']; ?>
                                      </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="pat_name" class="form-label" >Patient</label>
                                <select class="form-control" name="pat_name" id="pat_name">
                                    <option value="none" selected>--Select--</option>
                                    <?php
                                        $stmt = $conn->prepare("select id, p_name from patient");
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        while($row = $result->fetch_assoc()){
                                    ?>
                                        <option value="<?php echo $row['id'];?>">
                                          <?php echo $row['p_name']; ?>
                                        </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                          
                            <div class="col-md-12">
                                <label for="app_date" class="form-label">Date</label>
                                <input type="date" class="form-control" name="app_date" id="app_date">
                            </div>
                         
                          
                            <div class="col-12">
                                <input type="submit" name="submit" onclick ="return confirm ('Are you sure ?')" class="form-control btn btn-primary">
                            </div>
                        </form>
                        <table class="table col-md-4 ml-4 mt-4">
                        <thead>
                            <tr>
                                <th scope="col">Days</th>
                                <th scope="col">Time</th>
                            </tr>
                      </thead>
                      <tbody id="schedule">

                      </tbody>
                    </table>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function getdata(){
            var doc_name = document.getElementById('doc_name').value;
            $.ajax({
                type: "POST",
                url: "fetch.php",
                dataType: "html",
                data: {
                        'doc_name': doc_name
                    },
                success: function (response) {  
                        $('#schedule').html(response);
                    }
            });
        }
    </script>
<?php include './include/buttom_code.php' ?>
<?php
}
else{
    header("location: ./admin_login.php");
}
?>