<?php
    session_start();
    if(isset($_SESSION['email'])){
?>
<?php 
include './include/header.php';
include './database/connection.php';
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
                    <div class="row">
                        <div class="col-xl-4 col-lg-5">
                            <div class="card-body">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <u><h1 class="h3 mb-0 text-gray-800">ADD SCHEDULE</h1></u>
                            </div>
                            <form action="database/add_schedule_script.php" method="POST" class="row g-3">
                                <div class="col-md-12">
                                    <label for="d_name" class="form-label" >Doctor Name</label>
                                    <select class="form-control" name="doc_name" id="doc_name">
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
                                <div class="col-md-12 mt-4">
                                    <label for="doc_workingdays" class="form-label">Working Days</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="SUN" id="flexCheck1" name="day[]">
                                        <label class="form-check-label" for="flexCheck1">
                                            Sunday
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="MON" id="flexCheck2" name="day[]">
                                        <label class="form-check-label" for="flexCheck2">
                                            Monday
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="TUE" id="flexCheck3" name="day[]">
                                        <label class="form-check-label" for="flexCheck3">
                                            Tuesday
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="WED" id="flexCheck4" name="day[]">
                                        <label class="form-check-label" for="flexCheck4">
                                            Wednesday
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="THU" id="flexCheck5" name="day[]">
                                        <label class="form-check-label" for="flexCheck5">
                                            Thursday
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="FRI" id="flexCheck6" name="day[]">
                                        <label class="form-check-label" for="flexCheck6">
                                            Friday
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="SAT" id="flexCheck7" name="day[]">
                                        <label class="form-check-label" for="flexCheck7">
                                            Saturday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label for="timing" class="form-label">Timing</label>
                                    <input type="input" class="form-control" name="timing" id="timing">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="submit" name="submit" class="form-control btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-7">
                        <div class="card-body">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <u><h1 class="h3 mb-0 text-gray-800">DOCTOR'S SCHEDULE</h1></u>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Doctor</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                            $stmt1 = $conn->prepare("select distinct(d_id), d_name from schedule");
                                            $stmt1->execute();
                                            $result1 = $stmt1->get_result();
                                            $i=1;
                                            while($row1 = $result1->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td> <?php echo $i; ?></td>
                                            <td> <?php echo $row1['d_name']; ?> </td>
                                            <td>
                                                <a class="btn btn-success"href="./view_schedule.php?id=<?php echo $row1['d_id']?>">VIEW</a>
                                                <a class="btn btn-warning"onclick="return confirm('Are you sure,you want to edit?')"href="./edit_doctor.php?id=<?php echo $row['id'] ?>">EDIT</a>
                                                <a class="btn btn-danger"onclick="return confirm('Are you sure,you want to delete?')"href="./database/del_doctor.php?id=<?php echo $row['id'] ?>">DELETE</a>
                                            </td>
                                        </tr>
                                        <?php
                                                $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
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

        <!-- Footer -->
        <?php include './include/footer.php'; ?>
        <!-- End of Footer -->
    </div>
    <?php include './include/buttom_code.php' ?>
    <?php
}
else{
    header("location: ./admin_login.php");
}
?>