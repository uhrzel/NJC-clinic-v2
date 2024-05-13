<?php include 'config/session.php'; ?>
<?php include 'includes/count.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NJC - Dental Clinic | Produce Schedule</title>

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
      background-image: url(office.jpg);
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

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Staff</a>
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
              <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="patient_register.php" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i> <!-- Icon for Patient's Register -->
                <p>
                  Patient's Register
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="produce_schedule.php" class="nav-link active">
                <i class="nav-icon fas fa-calendar-alt"></i> <!-- Icon for Produce Schedule -->
                <p>
                  Produce Schedule
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="generate_bill.php" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar"></i> <!-- Icon for Generate Bill -->
                <p>
                  Generate Bill
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="feedbacks.php" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i> <!-- Icon for X-Ray -->
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


    <!-- Include PayPal JavaScript SDK -->

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
                <input type="text" class="form-control" id="editPatientFirstname" name="editPatientFirstname" required>
              </div>
              <div class="form-group">
                <label for="editPatientLastname">Last Name:</label>
                <input type="text" class="form-control" id="editPatientLastname" name="editPatientLastname" required>
              </div>
              <div class="form-group">
                <label for="editPatientMiddlename">Middle Name:</label>
                <input type="text" class="form-control" id="editPatientMiddlename" name="editPatientMiddlename" required>
              </div>
              <div class="form-group">
                <label for="editPatientDate">Date:</label>
                <input type="date" class="form-control" id="editPatientDate" name="editPatientDate" required>
              </div>
              <div class="form-group">
                <label for="editPatientTime">Time:</label>
                <select class="form-control" id="editPatientTime" name="editPatientTime" required>
                  <option value="">Select Time</option>
                  <option value="08:00">08:00 AM</option>
                  <option value="09:00">09:00 AM</option>
                  <option value="10:00">10:00 AM</option>
                  <option value="11:00">11:00 AM</option>
                  <option value="12:00">12:00 PM</option>
                  <option value="13:00">01:00 PM</option>
                  <option value="14:00">02:00 PM</option>
                  <option value="15:00">03:00 PM</option>
                  <option value="16:00">04:00 PM</option>
                  <option value="17:00">05:00 PM</option>
                  <option value="18:00">06:00 PM</option>
                  <option value="19:00">07:00 PM</option>
                  <option value="20:00">08:00 PM</option>
                </select>
              </div>

              <div class="form-group">
                <label for="editPatientProblem">Problem:</label>
                <select class="form-control" id="editPatientProblem" name="editPatientProblem" required>
                  <option value="">Select Problem</option>
                  <option value="Teeth Cleaning">Teeth Cleaning</option>
                  <option value="Whitening">Whitening</option>
                  <option value="Extractions">Extractions</option>
                  <option value="Veneers">Veneers</option>
                  <option value="Filling">Filling</option>
                  <option value="Crowns">Crowns</option>
                  <option value="Root Canal">Root Canal</option>
                  <option value="Brace/Invisalign">Brace/Invisalign</option>
                </select>
              </div>
              <div class="form-group">
                <label for="editPatientPayment">Enter Payment:</label>
                <input type="text" class="form-control" id="editPatientPayment" name="editPatientPayment" required>
              </div>


              <button type="submit" class="btn btn-primary" name="submit">Schedule Appointment</button>
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
              <h1>Produce Schedule</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Produce Schedule</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <section class="content">
        <div class="container-fluid">
          <!-- Patients Table -->
          <div class="row">
            <div class="col-md-7">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Available Schedule</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="calendar"></div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>


      <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css' rel='stylesheet' />
      <!-- Bootstrap CSS (optional, if you're using Bootstrap) -->
      <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet' />

      <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js'></script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Display month view initially
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: {
              url: 'get_available_dates.php', // PHP file to fetch available schedule dates
              method: 'POST',
              extraParams: {
                custom_param: 'something'
              },
              failure: function() {
                alert('Failed to fetch schedule dates!');
              }
            }
          });
          calendar.render();
        });
      </script>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Patients Table -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Patients List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="patientsTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Birth</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Postal Code</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <!-- PHP code for fetching patients -->
                      <?php
                      // Include your database connection
                      include 'config/conn.php';

                      // Fetch data from the patients table
                      $sql = "SELECT * FROM patient";
                      $result = mysqli_query($conn, $sql);

                      // Check if there are any rows returned
                      if (mysqli_num_rows($result) > 0) {
                        // Loop through each row and display data in table rows
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<tr>";
                          echo "<td>" . $row['patient_id'] . "</td>";
                          echo "<td>" . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . "</td>";
                          echo "<td>" . $row['age'] . "</td>";
                          echo "<td>" . $row['birth'] . "</td>"; // Adding Date of Birth
                          echo "<td>" . $row['gender'] . "</td>"; // Adding Gender
                          echo "<td>" . $row['contactnumber'] . "</td>"; // Adding Contact Number
                          // echo "<td></td>";
                          echo "<td>" . $row['postalcode'] . "</td>"; // Adding Postal Code

                          // Action icons (update and delete)
                          echo "<td>";
                          // Edit button
                          echo "<a href='#' class='editPatient btn-sm btn-info' data-id='" . $row['patient_id'] . "' data-firstname='" . $row['firstname'] . "' data-lastname='" . $row['lastname'] . "'  data-middlename='" . $row['middlename'] . "' data-toggle='modal' data-target='#editPatientModal'><i class='fas fa-calendar-plus'></i> Schedule</a>&nbsp;&nbsp;";

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
      $('#editPatientModal').on('show.bs.modal', function(event) {
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
      });

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