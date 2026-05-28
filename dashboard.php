<?php
    session_start();
    if(isset($_SESSION['email'])){
        $month = date('m');
        $day = date('d');
        $year = date('Y');

        $today = $year . '-' . $month . '-' . $day;
?>
 <?php include './include/header.php'; 
  include './database/connection.php';
 include 'database/view_appointment_script.php';



 $output = view_data();?>
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                APPOINTMENTS
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                include './database/connection.php';
                                                $stmt = $conn->prepare('select count(*) as total_app from appointment');
                                                $stmt->execute();
                                                $result = $stmt->get_result()->fetch_assoc();
                                                echo $result['total_app'];
                                            ?>
                                            </div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            PATIENTS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $stmt = $conn->prepare('select count(*) as total_pat from patient');
                                                $stmt->execute();
                                                $result = $stmt->get_result()->fetch_assoc();
                                                echo $result['total_pat'];
                                                ?>
                                            </div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                     

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            DOCTORS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $stmt = $conn->prepare('select count(*) as total_doc from doctor');
                                                $stmt->execute();
                                                $result = $stmt->get_result()->fetch_assoc();
                                                echo $result['total_doc'];
                                                ?>
                                            </div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <div class=" mb-0 text-gray-800">
                                    <label >Select Date: </label>
                                    <input type="date" value="<?php echo $today ?>" id="app_date" onfocusout="getdata();">
                          </div>
                        </div>
                    <div class="row">
                           <div class="card-body">
                            <div class="table-responsive">
                                <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <h1 class="btn btn-primary "class="h3 mb-0 text-gray-800">Recent Appointments</h1>
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>PATIENT NAME</th>
                                            <th>DOCTOR NAME</th>
                                            <th>DATE</th>
                                            <th>DAYS</th>
                                            <th>TIME</th>
                                            <th>STATUS</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="appointment">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            

        </div>
        <!-- End of Content Wrapper -->
        <!-- Footer -->
            <?php include './include/footer.php'; ?>
            <!-- End of Footer -->

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
                <a class="btn btn-primary" href="./database/logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function getdata(){
            var app_date = document.getElementById('app_date').value;
            $.ajax({
                type: "POST",
                url: "app_date_fetch.php",
                dataType: "html",
                data: {
                        'app_date': app_date
                    },
                success: function (response) {  
                        $('#appointment').html(response);
                    }
            });
        }
    </script>
    <script>
        function getDate(){
            var today = new Date();
            document.getElementById("app_date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
        }
    </script>
<?php include './include/buttom_code.php' ?>

<?php
}
else{
    header("location: ./admin_login.php");
}
?>