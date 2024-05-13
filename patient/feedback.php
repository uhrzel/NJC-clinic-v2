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
            background-image: url(../admin/office.jpg);
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

        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .rating>input {
            display: none;
        }

        .rating>label {
            padding: 5px;
            font-size: 30px;
            color: #ddd;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .rating>input:checked~label,
        .rating>input:checked~label~label {
            color: #f8d053;
        }

        body {
            background-image: url('dist/img/care.jpg');
            /* Specify the path to your background image */
            background-size: cover;
            /* Cover the entire viewport */
            background-repeat: no-repeat;
            background-position: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            /* Transparent white background */
            border: none;
            /* No border */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Soft shadow */
            border-radius: 15px;
            /* Rounded corners */
        }

        .card-header {
            background-color: lightblue;
            /* Yellow background */
            border-bottom: none;
            /* No border at the bottom */
            border-radius: 15px 15px 0 0;
            /* Rounded corners only at the top */
            font-weight: bold;
            color: #333;
            /* Dark text color */
        }

        .form-control {
            border: none;
            /* No border for form controls */
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Soft shadow */
        }

        .btn-primary {

            /* Yellow background */
            border: none;
            /* No border */
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Soft shadow */
        }

        .btn-primary:hover {
            background-color: lightskyblue;
            /* Lighter yellow on hover */
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
                            <a href="debts.php" class="nav-link ">
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
                            <a href="feedback.php" class="nav-link active">
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
                                <!-- <li class="nav-item">
                                    <a href="change_password.php" class="nav-link active">
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
                            <h1>Feedbacks </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Feedbacks </li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>


            <section class="content">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4 class="mb-0">NJC Dental Clinic Feedback Form</h4>
                                </div>
                                <div class="card-body">
                                    <form action="submit_feedback.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="feedback" name="feedback" rows="3" placeholder="Your Feedback" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="rating">Rating</label>
                                            <div class="rating">
                                                <input type="radio" name="rating" id="star5" value="5">
                                                <label for="star5"><i class="fas fa-star"></i></label>
                                                <input type="radio" name="rating" id="star4" value="4">
                                                <label for="star4"><i class="fas fa-star"></i></label>
                                                <input type="radio" name="rating" id="star3" value="3">
                                                <label for="star3"><i class="fas fa-star"></i></label>
                                                <input type="radio" name="rating" id="star2" value="2">
                                                <label for="star2"><i class="fas fa-star"></i></label>
                                                <input type="radio" name="rating" id="star1" value="1">
                                                <label for="star1"><i class="fas fa-star"></i></label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Submit Feedback</button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>



                <!-- /.row -->

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



    <!-- Add a Bootstrap modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Feedback Submitted Successfully</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Thank you for your feedback!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Check if the URL has a success parameter (indicating successful submission)
        const urlParams = new URLSearchParams(window.location.search);
        const success = urlParams.get('success');

        // If success parameter is present, show the modal
        if (success === 'true') {
            $('#successModal').modal('show');


        }
    </script>


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
        $('.editSchedule').click(function() {
            // Extract data from the table row
            var scheduleId = $(this).data('id');

            // Extract data from the table row
            var patientName = $(this).closest('tr').find('td:nth-child(2)').text();
            var receiptAmount = '₱' + $(this).closest('tr').find('td:nth-child(6)').text(); // Include peso sign
            var receiptDate = $(this).closest('tr').find('td:nth-child(3)').text();
            var problemData = $(this).closest('tr').find('td:nth-child(5)').text().split(', '); // Assuming problem data is separated by comma

            // Update the modal content with the extracted data
            $('#receiptType').text('Dental Services');
            $('#patientName').text(patientName);
            $('#receiptAmount').text(receiptAmount);
            $('#receiptDate').text(receiptDate);

            // Clear any existing problem list items
            $('#problemList').empty();

            // Add each problem as a list item to the problem list
            problemData.forEach(function(problem) {
                $('#problemList').append('<li>' + problem + '</li>');
            });

            // Update the hidden input field with the schedule ID
            $('#scheduleId').val(scheduleId);

            // Show the modal
            $('#generateBillModal').modal('show');
        });

        // JavaScript/jQuery code to handle the "Generate Bill" button click event
        $('#generateBillButton').click(function() {
            // Get the schedule ID value
            var scheduleId = $('#scheduleId').val();

            // Call the function to print bill receipt and update schedule table
            printBillReceiptAndUpdateSchedule(scheduleId);
        });

        // Function to print bill receipt and update schedule table
        function printBillReceiptAndUpdateSchedule(scheduleId) {
            // Debug statements to log scheduleId
            console.log("Schedule ID:", scheduleId);

            // Clone the modal content to remove any events or listeners
            var modalContent = document.getElementById('generateBillModal');
            var printContents = modalContent.cloneNode(true);

            // Update the schedule ID value in the printed content
            var scheduleIdElement = printContents.querySelector('#scheduleId');
            if (scheduleIdElement) {
                scheduleIdElement.value = scheduleId;
            }

            // Remove the buttons and header from the printed content
            var buttons = printContents.querySelectorAll('.modal-footer');
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].parentNode.removeChild(buttons[i]);
            }
            var header = printContents.querySelector('.modal-header');
            if (header) {
                header.parentNode.removeChild(header);
            }

            // Print the modified content
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents.innerHTML;
            window.print();

            // Restore the original content
            document.body.innerHTML = originalContents;

            // Update the schedule table via AJAX
            $.ajax({
                url: 'update_billstatus.php', // PHP script to handle database insertion
                type: 'POST',
                data: {
                    scheduleId: scheduleId,
                    bill_generate: 'Payment Done'
                },
                dataType: 'json', // Expect JSON response
                success: function(response) {
                    // Check if the insertion was successful
                    if (response.success) {
                        // Display success message using SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then((result) => {
                            // Reload the page after the success message is closed
                            location.reload();
                        });
                    } else {
                        // Display error message if insertion failed
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Display error message if AJAX request fails
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while adding problem.',
                    });
                    console.error('An error occurred while adding problem:', error);
                }
            });
        }
    </script>

</body>

</html>