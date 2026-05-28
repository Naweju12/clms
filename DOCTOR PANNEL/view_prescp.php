<?php 
include './include/header.php'; 
include './database/connection.php';
 
    $s1 = $conn->prepare('select p_id from prescription where id=? limit 1');
    $s1->bind_param('i', $_GET['id']);
    $s1->execute();
    $r1 = $s1->get_result()->fetch_assoc();
    $s = $conn->prepare('select p_name from patient where id=? limit 1');
    $s->bind_param('i', $r1['p_id']);
    $s->execute();
    $r = $s->get_result()->fetch_assoc();
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
                      <h1 class="h3 mb-0 text-gray-800">VIEW PRECRIPTION</h1>
                    </div>

                    <p>Patient Name: <?php echo $r['p_name']; ?></p>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>MEDICINES</th>
                                            <th>TESTS</th> 
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                        $stmt=$conn->prepare('select m1,m2, t1,t2 from prescription where id=?');
                                        $stmt->bind_param('i', $_GET['id']);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        $i = 1;
                                        while($row = $result->fetch_assoc()){
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['m1'] . ", ". $row['m2']; ?></td>
                                            <td><?php echo $row['t1']. ", ". $row['t2']; ?></td>
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