<?php include 'config/session.php';?>
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
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
        <img src="njclogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">NJC - Dental Clinic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../admin/dist/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$user;?></a>
            </div>
        </div>
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
                    <a href="index.php" class="nav-link ">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                 
                <li class="nav-item">
                  <a href="appointment_list.php" class="nav-link active">
                      <i class="nav-icon far fa-calendar-alt"></i> <!-- Icon for Appointment List -->
                      <p>
                          Appointment List
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
                        <li class="nav-item">
                            <a href="change_password.php" class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- /.content -->
<div class="modal fade" id="editPatientModal" tabindex="-1" role="dialog" aria-labelledby="editPatientModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-s" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPatientModalLabel">Schedule Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form for scheduling appointment -->
        <form id="editPatientForm">
          <input type="hidden" id="editPatientId" name="editPatientId">
          <div class="form-group">
            <label for="editPatientFirstname">First Name:</label>
            <input type="text" class="form-control" id="editPatientFirstname" name="editPatientFirstname" required disabled>
          </div>
          <div class="form-group">
            <label for="editPatientLastname">Last Name:</label>
            <input type="text" class="form-control" id="editPatientLastname" name="editPatientLastname" required disabled>
          </div>
          <div class="form-group">
            <label for="editPatientMiddlename">Middle Name:</label>
            <input type="text" class="form-control" id="editPatientMiddlename" name="editPatientMiddlename" required disabled>
          </div>
          <div class="form-group">
              <label for="editPatientDate">Date:</label>
              <input type="date" class="form-control" id="editPatientDate" name="editPatientDate" required disabled>
          </div>
          <div class="form-group">
              <label for="editPatientTime">Time:</label>
              <input type="time" class="form-control" id="editPatientTime" name="editPatientTime" required disabled>
          </div>

          <div class="form-group">
            <label for="editPatientProblem">Problem:</label>
            <input type="text" class="form-control" id="editPatientProblem" name="editPatientProblem" required disabled>
          </div>
          <div class="form-group">
            <label for="editPatientOtherProblem">Other Problem:</label>
            <input type="text" class="form-control" id="editPatientOtherProblem" name="editPatientOtherProblem" required disabled>
          </div>

          <button type="submit" class="btn btn-primary" name="submit">Make Treatment</button>
        </form>
      </div>
    </div>
  </div>
</div>
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
      <!-- Small Box (Stat card) for Make Treatment -->
      <div class="col-lg-4 col-md-6"> <!-- Adjust column size for responsiveness -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>Make Treatment</h3>
            <p>Record patient treatments</p>
          </div>
          <div class="icon">
            <i class="fas fa-notes-medical"></i> <!-- Icon for Make Treatment -->
          </div>
          <a href="make_treatment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
      <!-- Small Box (Stat card) for Add Patient's Problem -->
      <div class="col-lg-4 col-md-6"> <!-- Adjust column size for responsiveness -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>Add Patient's Problem</h3>
            <p>Add problems to patient records</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-md"></i> <!-- Icon for Add Patient's Problem -->
          </div>
          <a href="add_problem.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- Small Box (Stat card) for Check Prescriptions -->
      <div class="col-lg-4 col-md-6"> <!-- Adjust column size for responsiveness -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>Check Prescriptions</h3>
            <p>View patient prescriptions</p>
          </div>
          <div class="icon">
            <i class="fas fa-prescription-bottle-alt"></i> <!-- Icon for Check Prescriptions -->
          </div>
          <a href="check_prescriptions.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <!-- Appointment List Table -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Appointment List</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="appointmentsTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Patient Name</th>
                  <th>Age</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <!-- PHP code for fetching patients -->
                  <?php
                  // Include your database connection
                  include 'config/conn.php';
                  
                  // Fetch data from the patients table
                  $sql = "SELECT patient.*, schedule.*
                  FROM patient
                  JOIN schedule ON patient.patient_id = schedule.patient_id
                  WHERE schedule.bill_generate = 'prescription unchecked'";

                  
                  $result = mysqli_query($conn, $sql);

                  // Check if there are any rows returned
                  if (mysqli_num_rows($result) > 0) {
                      // Loop through each row and display data in table rows
                      while ($row = mysqli_fetch_assoc($result)) {
                                      // Check if the current date is past the schedule date
                          echo "<tr>";
                          echo "<td>" . $row['patient_id'] . "</td>";
                          echo "<td>" . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . "</td>";
                          echo "<td>" . $row['age'] . "</td>";
                          echo "<td><button class='timeBtn btn-sm " . ($row['date'] ? 'btn-success' : 'btn-warning') . "' >" . $row['date'] . "</button></td>";
                          echo "<td>" . $row['date'] . "</td>"; // Adding Gender
                          echo "<td>" . $row['time'] . "</td>"; // Adding Contact Number
                          echo "<td>";
                          // Edit button
                          echo "<a href='#' class='editPatient btn-sm btn-info' 
                                data-id='" . $row['id'] . "' 
                                data-firstname='" . $row['firstname'] . "' 
                                data-lastname='" . $row['lastname'] . "'  
                                data-middlename='" . $row['middlename'] . "' 
                                data-date='" . $row['date'] . "' 
                                data-time='" . $row['time'] . "' 
                                data-problem='" . $row['problem'] . "' 
                                data-other_problem='" . $row['other_problem'] . "' 
                                data-payment='" . $row['payment'] . "' 
                                data-toggle='modal' 
                                data-target='#editPatientModal'>
                                <i class='fas fa-eye'></i> View Appointment
                              </a>&nbsp;&nbsp;";

                          echo "</td>";
                          echo "</tr>";
                      }
                  } else {
                      // If no rows returned, display a message
                      echo "<tr><td colspan='13'>No patients found</td></tr>";
                  }
                  ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</div>
<?php include 'includes/footer.php';?>

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
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../dist/js/sweetalert2@11"></script>
<script>
  $(document).ready(function () {
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
      $('.editPatient').click(function() {
      // Retrieve data attributes from the clicked button
      var patientId = $(this).data('id');
      var firstname = $(this).data('firstname');
      var lastname = $(this).data('lastname');
      var middlename = $(this).data('middlename');
      var date = $(this).data('date');
      var time = $(this).data('time');
      var problem = $(this).data('problem');
      var payment = $(this).data('payment');
      var other_problem = $(this).data('other_problem'); // Corrected to 'otherproblem'

      // Update modal form fields with data from the clicked link
      $('#editPatientId').val(patientId);
      $('#editPatientFirstname').val(firstname);
      $('#editPatientLastname').val(lastname);
      $('#editPatientMiddlename').val(middlename);
      $('#editPatientDate').val(date);
      $('#editPatientTime').val(time);
      $('#editPatientProblem').val(problem);
      $('#editPatientPayment').val(payment);
      $('#editPatientOtherProblem').val(other_problem); // Corrected to 'otherProblem'
  });




    // Handle form submission for scheduling appointment
    $('#editPatientForm').submit(function(e) {
      e.preventDefault(); // Prevent form submission
      
      // Serialize form data
      var formData = $(this).serialize();
      
      // Perform AJAX request to insert data into the schedule table
      $.ajax({
        url: 'update_schedule.php', // PHP script to handle database insertion
        type: 'POST',
        data: formData,
        success: function(response) {
          // Display success message
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: response,
          }).then((result) => {
            // Reload the page after the success message is closed
            location.reload();
          });
          // Optionally, you can redirect the user or perform other actions after successful scheduling
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
