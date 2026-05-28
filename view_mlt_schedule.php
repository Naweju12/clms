<?php
    session_start();
    if(isset($_SESSION['email'])){
?>
<?php 
include './include/header.php'; 
include './database/connection.php';
 
    $s = $conn->prepare('select ms.day, ms.timings from mlt_schedule ms inner join test t on ms.test_id = t.id where ms.test_id=?');
    $s->bind_param('i', $_GET['id']);
    $s->execute();
    $r = $s->get_result();

    $s1 = $conn->prepare('select m.mlt_name, t.test_name from test t inner join mlt m on t.mlt_id = m.id where t.id=?');
    $s1->bind_param('i', $_GET['id']);
    $s1->execute();
    $r1 = $s1->get_result()->fetch_assoc();
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
                      <h1 class="h3 mb-0 text-gray-800">MLT'S SCHEDULE</h1>
                    </div>

                    <p>Doctor Name: <?php echo $r1['mlt_name']; ?></p>
                    <p>Test Name: <?php echo $r1['test_name']; ?></p>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Working Days</th>
                                            <th>Timings</th> 
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    $i = 1;
                                        while($row = $r->fetch_assoc()){
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['day']; ?></td>
                                            <td><?php echo $row['timings']; ?></td>
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