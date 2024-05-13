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

  <!-- <link rel="stylesheet" href="bgstyle.css"> -->
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
      <a href="index.php" class="brand-link">
        <img src="njclogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">NJC - Dental Clinic</span>
      </a>
      <?php
      // Start the session
      session_start();

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
                  Schedule
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="appointments.php?patient_id=<?php echo $patient_id; ?>" class="nav-link">
                <i class="nav-icon fas fa-list-alt"></i> <!-- Changed Icon for Appointment List -->
                <p>
                  Appointment List
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="debts.php?patient_id=<?php echo $patient_id; ?>" class="nav-link">
                <i class="nav-icon fas fa-money-bill-alt"></i> <!-- Changed Icon for Debt -->
                <p>
                  Debt
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
                  <a href="change_password.php" class="nav-link active">
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="background-container"></div>
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Change Password</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Change Password</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Change Password Section -->
      <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header bg-primary text-white">
                  <h3 class="card-title">Change Password</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- Admin Image -->
                  <div class="text-center mb-4">
                    <img src="./dist/img/patient.png" alt="Admin Image" class="img-fluid rounded-circle" style="width: 100px;">
                  </div>
                  <!-- Change Password Form -->
                  <form id="changePasswordForm">
                    <div class="form-group">
                      <label for="currentPassword">Current Password:</label>
                      <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                    </div>
                    <div class="form-group">
                      <label for="newPassword">New Password:</label>
                      <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                      <label for="confirmNewPassword">Confirm New Password:</label>
                      <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                  </form>
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
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>

  <script src="../dist/js/sweetalert2@11"></script>
  <script>
    $(document).ready(function() {
      // Function to validate password match
      function validatePasswords() {
        var newPassword = $('#newPassword').val();
        var confirmNewPassword = $('#confirmNewPassword').val();
        if (newPassword !== confirmNewPassword) {
          $('#passwordMatchError').text('Passwords do not match');
          return false;
        } else {
          $('#passwordMatchError').text('');
          return true;
        }
      }

      // Function to handle form submission
      $('#changePasswordForm').submit(function(e) {
        e.preventDefault(); // Prevent form submission

        // Validate passwords before submitting
        if (!validatePasswords()) {
          return;
        }

        // Get form data
        var formData = $(this).serialize();

        // Submit form data via AJAX
        $.ajax({
          url: 'config/updatepass.php',
          type: 'POST',
          data: formData,
          success: function(response) {
            // Display success message using SweetAlert
            Swal.fire({
              icon: 'success',
              title: 'Password Changed',
              text: response,
            });
          },
          error: function(xhr, status, error) {
            // Display error message using SweetAlert
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'An error occurred. Please try again later.',
            });
            console.error('An error occurred:', error);
          }
        });
      });

      // Function to validate passwords on input change
      $('#newPassword, #confirmNewPassword').on('input', function() {
        validatePasswords();
      });
    });
  </script>
</body>

</html>