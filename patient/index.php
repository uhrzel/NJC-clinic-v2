<?php include 'includes/count.php'; ?>
<?php include "config/session.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NJC - Dental Clinic | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <style>
        /* bgstyle.css */
        .background-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image: url(./dist/img/office.jpg);
            background-size: cover;
            background-position: center;
            filter: blur(2.5px);
            opacity: 0.7;
        }

        .content-wrapper {
            position: relative;
            z-index: 1;
        }

        .content {
            background-color: transparent;
            padding: 20px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link"><strong>NJC - DENTAL CLINIC INFORMATION AND BILLING SYSTEM</strong></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="./dist/img/njclogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">NJC - Dental Clinic</span>
            </a>
            <?php


            // Include your database connection
            include 'config/conn.php';

            // Check if patient_id is set in the session
            if (isset($_SESSION['patient_id'])) {
                // Get the patient_id from the session
                $patient_id = $_SESSION['patient_id'];

                // Prepare and execute SQL query to fetch patient's name
                $stmt = $conn->prepare("SELECT firstname, lastname FROM patient WHERE patient_id = ?");
                $stmt->bind_param("i", $patient_id);
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if a row is returned
                if ($result->num_rows == 1) {
                    // Fetch the row
                    $row = $result->fetch_assoc();
                    // Display patient's name
                    echo '<div class="user-panel mt-3 pb-3 mb-3 d-flex">';
                    echo '<div class="image">';
                    echo '<img src="dist/img/patient.png" class="img-circle elevation-2" alt="User Image">';
                    echo '</div>';
                    echo '<div class="info">';
                    echo '<a href="#" class="d-block">' . $row['firstname'] . ' ' . $row['lastname'] . '</a>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    // Patient not found, handle accordingly
                    echo 'Patient not found';
                }
            } else {
                // Patient_id not set in session, handle accordingly
                echo 'Patient ID not set';
            }
            ?>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="schedule.php" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i> <!-- Icon for Produce Schedule -->
                                <p>
                                    Schedules
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="appointments.php" class="nav-link">
                                <i class="nav-icon fas fa-list-alt"></i> <!-- Changed Icon for Appointment List -->
                                <p>
                                    Appointment List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="treatment.php" class="nav-link ">
                                <i class="nav-icon fas fa-notes-medical"></i> <!-- Changed Icon for Treatment History -->
                                <p>
                                    Treatment History
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="debts.php" class="nav-link">
                                <i class="nav-icon fas fa-money-bill-alt"></i> <!-- Changed Icon for Debt -->
                                <p>
                                    Debts
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="bill_receipt.php" class="nav-link">
                                <i class="nav-icon fas fa-receipt"></i> <!-- Changed Icon for Debt -->
                                <p>
                                    Receipts
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="feedback.php" class="nav-link">
                                <i class="nav-icon fas fa-envelope"></i> <!-- Changed Icon for Debt -->
                                <p>
                                    Feedbacks
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-engine-alt"></i>
                                <p>
                                    Settings
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="logout.php" class="nav-link">
                                        <i class="nav-icon fas fa-sign-out-alt"></i>
                                        <p>Logout</p>
                                    </a>
                                </li>
                                <!--  <li class="nav-item">
                                    <a href="change_password.php" class="nav-link">
                                        <i class="nav-icon fas fa-key"></i>
                                        <p>Change Password</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="modal fade" id="generateBillModal" tabindex="-1" role="dialog" aria-labelledby="generateBillModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="generateBillModalLabel">Generate Bill Receipt</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Content for generating the professional receipt -->
                        <h4 style="text-align: center;">NJC - Dental Clinic <span id="receiptType"></span> Receipt</h4>
                        <hr>
                        <p>Issued to:</p>
                        <p><strong>Patient Name:</strong> <span id="patientName"></span></p>
                        <p>Services Rendered:</p>
                        <ul id="problemList">
                            <!-- List items will be dynamically added here -->
                        </ul>
                        <hr>
                        <p><strong>Total Amount Paid:</strong><span id="receiptAmount"></span></p>
                        <p><strong>Payment Date:</strong> <span id="receiptDate"></span></p>
                        <hr>
                        <p>Thank you for choosing NJC Dental Clinic. We look forward to serving you again.</p>
                    </div>
                    <div class="modal-footer">
                        <!-- Button to close the modal -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- Button to submit or generate the bill receipt -->
                    </div>
                </div>
            </div>
        </div>
        <style>
            #problemList {
                list-style-type: none;
                /* Remove bullet points */
                padding: 0;
                /* Remove default padding */
            }

            #problemList li {
                margin-bottom: 5px;
                margin-left: 50px;
                /* Optional: Add some spacing between list items */
            }
        </style>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="background-container"></div>
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row"> <!-- Center the row horizontally -->
                        <!-- Small Box (Stat card) for Patient's Register -->

                        <!-- Small Box (Stat card) for Produce Schedule -->
                        <div class="col-lg-4 col-md-6"> <!-- Adjust column size for responsiveness -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Produce Schedule</h3>
                                    <p>Schedule appointments</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar-alt"></i> <!-- Icon for Produce Schedule -->
                                </div>
                                <a href="schedule.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6"> <!-- Adjust column size for responsiveness -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Appointments</h3>
                                    <p>Appointment List </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-list-alt"></i>
                                </div>
                                <a href="appointments.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Small Box (Stat card) for Generate Bill -->
                        <div class="col-lg-4 col-md-6"> <!-- Adjust column size for responsiveness -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>Debt Bill</h3>
                                    <p>Debt Bill information</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-invoice-dollar"></i> <!-- Icon for Generate Bill -->
                                </div>
                                <a href="debts.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Schedule Table -->
                <div class="row">
                    <!--    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Transaction List</h3>
                                </div>
                         
                                <div class="card-body">

                                </div>
                           
                            </div>
                           
                        </div> -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include 'includes/footer.php'; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <script src="../dist/js/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#scheduleTable').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
        });
    </script>
    <script>
        // JavaScript/jQuery code to handle the "Generate Bill" link click event
        $('.editSchedule').click(function() {
            // Extract data from the table row
            var patientName = $(this).closest('tr').find('td:nth-child(2)').text();
            var receiptAmount = '₱' + $(this).closest('tr').find('td:nth-child(6)').text(); // Include peso sign
            var receiptDate = $(this).closest('tr').find('td:nth-child(3)').text();
            var problemData = $(this).closest('tr').find('td:nth-child(5)').text().split(', '); // Assuming problem data is separated by comma
            var problemData2 = $(this).closest('tr').find('td:nth-child(7)').text().split(', ');
            // Update the modal content with the extracted data
            $('#receiptType').text('Dental Services');
            $('#patientName').text(patientName);
            $('#receiptAmount').text(receiptAmount);
            $('#receiptDate').text(receiptDate);

            // Clear any existing problem list items
            $('#problemList').empty();

            // Concatenate both arrays into one
            var allProblems = problemData.concat(problemData2);

            // Add each problem as a list item to the problem list if there are values
            if (allProblems.length > 0) {
                allProblems.forEach(function(problem) {
                    $('#problemList').append('<li>' + problem + '</li>');
                });
            } else {
                // If there are no problems, you can show a message or handle it as needed
                $('#problemList').append('<li>No problems found</li>');
            }

            // Show the modal
            $('#generateBillModal').modal('show');
        });
    </script>
</body>

</html>