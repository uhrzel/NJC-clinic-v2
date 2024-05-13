<?php include 'includes/count.php'; ?>
<?php include "config/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NJC - Dental Clinic | Schedules</title>

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
            <a href="dashboard.php" class="brand-link">
                <img src="../dist/img/care.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                            <a href="index.php" class="nav-link">
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
                            <a href="appointments.php" class="nav-link active">
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


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="background-container"></div>
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1> Appointment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"> Appointment</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Appointment List</h3>
                                </div>

                                <div class="card-body">
                                    <table id="patientsTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Birth</th>
                                                <th>Gender</th>
                                                <th>Contact</th>
                                                <th>Bill generate</th>
                                                <th>Problem</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            // Include your database connection
                                            include 'config/conn.php';

                                            // Check if the patient ID is set in the URL
                                            if (isset($_SESSION['patient_id'])) {
                                                $patientId = $_SESSION['patient_id'];

                                                // SQL query to retrieve data for the specific patient
                                                $sql = "SELECT 
                s.id AS schedule_id,
                p.patient_id,
                CONCAT(p.firstname, ' ', p.lastname) AS name,
                p.age,
                p.birth,
                p.gender,
                p.contactnumber,
                s.bill_generate,
                s.problem
            FROM 
                schedule s
            JOIN 
                patient p ON s.patient_id = p.patient_id
            WHERE 
                p.patient_id = $patientId";

                                                // Execute the query
                                                $result = mysqli_query($conn, $sql);

                                                // Check if there are any results
                                                if (mysqli_num_rows($result) > 0) {
                                                    // Output data of each row
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>";

                                                        echo "<td>" . $row["name"] . "</td>";
                                                        echo "<td>" . $row["age"] . "</td>";
                                                        echo "<td>" . $row["birth"] . "</td>";
                                                        echo "<td>" . $row["gender"] . "</td>";
                                                        echo "<td>" . $row["contactnumber"] . "</td>";
                                                        echo "<td>" . $row["bill_generate"] . "</td>";
                                                        echo "<td>" . $row["problem"] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='8'>No data found for this patient</td></tr>";
                                                }

                                                // Close the connection
                                                mysqli_close($conn);
                                            } else {
                                                echo "<tr><td colspan='8'>Patient ID not provided</td></tr>";
                                            }
                                            ?>

                                        </tbody>

                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </section>



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
            $('#patientsTable').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Edit Patient Modal
            /*    $('#editPatientModal').on('show.bs.modal', function(event) {
                   var button = $(event.relatedTarget); // Button that triggered the modal
                   var patientId = button.data('id'); // Extract patient ID from data-id attribute
                   var patientFirstname = button.data('firstname'); // Extract patient first name from data-firstname attribute
                   var patientLastname = button.data('lastname'); // Extract patient last name from data-lastname attribute
                   var patientMiddlename = button.data('middlename'); // Extract patient middle name from data-middlename attribute
                   var patientSchedule = button.data('schedule'); // Extract patient schedule from data-schedule attribute
                   var patientDay = button.data('day'); // Extract patient day from data-day attribute
                   var patientProblem = button.data('problem'); // Extract patient problem from data-problem attribute
                   var patientPayment = button.data('payment'); // Extract patient payment from data-payment attribute

                   // Populate form fields with patient data
                   var modal = $(this);
                   modal.find('#editPatientId').val(patientId);
                   modal.find('#editPatientFirstname').val(patientFirstname);
                   modal.find('#editPatientLastname').val(patientLastname);
                   modal.find('#editPatientMiddlename').val(patientMiddlename);
                   modal.find('#editPatientSchedule').val(patientSchedule);
                   modal.find('#editPatientDay').val(patientDay);
                   modal.find('#editPatientProblem').val(patientProblem);
                   modal.find('#editPatientPayment').val(patientPayment);
               }); */

            // Handle form submission for scheduling appointment
            $('#editPatientForm').submit(function(e) {
                e.preventDefault(); // Prevent form submission

                // Serialize form data
                var formData = $(this).serialize();

                // Perform AJAX request to insert data into the schedule table
                $.ajax({
                    url: 'insert_schedule.php', // PHP script to handle database insertion
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Display success or error message using SweetAlert
                        Swal.fire({
                            icon: response.includes("successfully") ? 'success' : 'error',
                            title: response.includes("successfully") ? 'Success' : 'Error',
                            text: response,
                        }).then((result) => {
                            location.reload(); // Reload the page after successful scheduling
                        });
                    },
                    error: function(xhr, status, error) {
                        // Display error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while scheduling appointment.',
                        });
                        console.error('An error occurred while scheduling appointment:', error);
                        // Optionally, you can display an error message to the user
                    }
                });

            });
        });
    </script>
</body>

</html>