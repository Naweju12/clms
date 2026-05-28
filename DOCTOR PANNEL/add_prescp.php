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
                                    <u><h1 class="h3 mb-0 text-gray-800"><a class="btn btn-primary" href="./new_prescription.php?id=<?php echo $_GET['id']?>">ADD</a></h1></u>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-5">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                            $stmt1 = $conn->prepare("select id,p_date from prescription where p_id = ?");
                                            $stmt1->bind_param('i', $_GET['id']);
                                            $stmt1->execute();
                                            $result1 = $stmt1->get_result();
                                            if($result1){
                                            $i=1;
                                            while($row1 = $result1->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td> <?php echo $i; ?></td>
                                            <td> <?php echo $row1['p_date']; ?> </td>
                                            <td>
                                                <a class="btn btn-success" href="view_prescp.php?id=<?php echo $row1['id'] ?>">VIEW</a>
                                            </td>
                                        </tr>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7">

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