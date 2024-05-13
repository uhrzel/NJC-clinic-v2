<?php include 'config/session.php'; ?>
<?php include 'includes/count.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NJC - Dental Clinic | Patient Register</title>

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
              <a href="schedule.php" class="nav-link">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                  Patient Schedules
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="treatment.php" class="nav-link">
                <i class="nav-icon fas fa-notes-medical"></i> <!-- Changed Icon for Treatment History -->
                <p>
                  Treatment History
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="patient_register.php" class="nav-link active">
                <i class="nav-icon fas fa-clipboard-list"></i> <!-- Icon for Patient's Register -->
                <p>
                  Patient's Register
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
            <!--     <li class="nav-item">
              <a href="produce_schedule.php" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i> <
                <p>
                  Produce Schedule
                </p>
              </a>
            </li> -->

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
    <!-- Edit Patient Modal -->
    <div class="modal fade" id="editPatientModal" tabindex="-1" role="dialog" aria-labelledby="editPatientModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editPatientModalLabel">Edit Patient</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form for editing patient -->
            <form id="editPatientForm">
              <input type="hidden" id="editPatientId" name="editPatientId">
              <div class="row">
                <div class="col-md-6">
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
                    <label for="editPatientAge">Age:</label>
                    <input type="number" class="form-control" id="editPatientAge" name="editPatientAge" required>
                  </div>
                  <div class="form-group" id="editfileUploadGroup">
                    <label for="editfileUpload">Proof of Guidance:</label>
                    <input type="file" class="form-control-file" id="editfileUpload" name="editfileUpload">
                  </div>


                  <div class="form-group">
                    <label for="editPatientBirth">Date of Birth:</label>
                    <input type="date" class="form-control" id="editPatientBirth" name="editPatientBirth" required>
                  </div>
                  <div class="form-group">
                    <label for="editPatientGender">Gender:</label>
                    <select class="form-control" id="editPatientGender" name="editPatientGender" required>
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="editPatientOccupation">Occupation:</label>
                    <input type="text" class="form-control" id="editPatientOccupation" name="editPatientOccupation" required>
                  </div>
                  <div class="form-group">
                    <label for="editPatientHeight">Height (in meters):</label>
                    <input type="number" class="form-control" id="editPatientHeight" name="editPatientHeight" required>
                  </div>
                  <div class="form-group">
                    <label for="editPatientWeight">Weight (in kilograms):</label>
                    <input type="number" class="form-control" id="editPatientWeight" name="editPatientWeight" required>
                  </div>
                  <div class="form-group">
                    <label for="editPatientContactnumber">Contact Number:</label>
                    <input type="text" class="form-control" id="editPatientContactnumber" name="editPatientContactnumber" required>
                  </div>
                  <div class="form-group">
                    <label for="editPatientProvince">Province:</label>
                    <input type="text" class="form-control" id="editPatientProvince" name="editPatientProvince" required>
                  </div>
                  <div class="form-group">
                    <label for="editPatientCity">City:</label>
                    <input type="text" class="form-control" id="editPatientCity" name="editPatientCity" required>
                  </div>
                  <div class="form-group">
                    <label for="editPatientPostalcode">Postal Code:</label>
                    <input type="text" class="form-control" id="editPatientPostalcode" name="editPatientPostalcode" required>
                  </div>
                  <div class="form-group">
                    <label for="editPatientPassword">Password:</label>
                    <input type="password" class="form-control" id="editPatientPassword" name="editPatientPassword" required>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Function to toggle file upload field based on age
      function toggleFileUpload() {
        var ageInput = document.getElementById('editPatientAge');
        var fileUploadGroup = document.getElementById('editfileUploadGroup');

        // Get the value of age input
        var age = parseInt(ageInput.value);

        // If age is 18 or above, show the file upload field, otherwise hide it
        if (age <= 18) {
          fileUploadGroup.style.display = 'block';
        } else {
          fileUploadGroup.style.display = 'none';
        }
      }

      // Listen for changes in the age input field
      document.getElementById('editPatientAge').addEventListener('input', toggleFileUpload);
    </script>
    <!-- Delete Patient Modal -->
    <div class="modal fade" id="deletePatientModal" tabindex="-1" role="dialog" aria-labelledby="deletePatientModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deletePatientModalLabel">Delete Patient</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete this patient?</p>
            <!-- Hidden input to store patient ID -->
            <input type="hidden" id="deletePatientId" name="deletePatientId">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="confirmDeletePatient" data-dismiss="modal">Delete</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        // JavaScript to handle delete patient
        $(document).on('click', '.deletePatient', function() {
          var patientId = $(this).data('id');
          $('#deletePatientId').val(patientId); // Set the patient ID in the hidden input
        });

        // JavaScript to handle confirmation of delete
        $('#confirmDeletePatient').click(function() {
          var patientId = $('#deletePatientId').val();
          // AJAX request to delete patient
          $.ajax({
            url: 'delete_patient.php',
            type: 'POST',
            data: {
              patientId: patientId
            },
            success: function(response) {
              // Handle success response
              location.reload(); // Reload or update the patients table after deletion
            },
            error: function(xhr, status, error) {
              // Handle error response
              console.error('An error occurred while deleting patient:', error);
            }
          });
        });
      });
    </script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="background-container"></div>
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Patient Register</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Patient Register</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
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
                          echo "<a href='#' class='editPatient btn-sm btn-info' data-id='" . $row['patient_id'] . "' data-firstname='" . $row['firstname'] . "' data-lastname='" . $row['lastname'] . "'  data-middlename='" . $row['middlename'] . "' data-age='" . $row['age'] . "' data-birth='" . $row['birth'] . "' data-gender='" . $row['gender'] . "' data-occupation='" . $row['occupation'] . "' data-height='" . $row['height'] . "' data-weight='" . $row['weight'] . "' data-contactnumber='" . $row['contactnumber'] . "' data-province='" . $row['province'] . "' data-city='" . $row['city'] . "' data-postalcode='" . $row['postalcode'] . "' data-password='" . $row['password'] . " 'data-toggle='modal' data-target='#editPatientModal'><i class='fas fa-edit'></i></a>&nbsp;&nbsp;";
                          // Delete button
                          echo "<a href='#' class='deletePatient  btn-sm btn-danger' data-id='" . $row['patient_id'] . "' data-toggle='modal' data-target='#deletePatientModal'><i class='fas fa-trash-alt'></i></a>";
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

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Your content here -->
          <div class="row justify-content-center">
            <!-- Add Patient Form -->
            <div class="col-lg-10">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Patient</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <form id="addPatientForm" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstname">First Name:</label>
                          <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                        <div class="form-group">
                          <label for="lastname">Last Name:</label>
                          <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                        <div class="form-group">
                          <label for="middlename">Middle Name:</label>
                          <input type="text" class="form-control" id="middlename" name="middlename" required>
                        </div>
                        <div class="form-group">
                          <label for="age">Age:</label>
                          <input type="number" class="form-control" id="age" name="age" required>
                        </div>
                        <div class="form-group" id="fileUploadGroup">
                          <label for="fileUpload">Proof of Guidance:</label>
                          <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
                        </div>
                        <div class="form-group">
                          <label for="birth">Date of Birth:</label>
                          <input type="date" class="form-control" id="birth" name="birth" required>
                        </div>
                        <div class="form-group">
                          <label for="gender">Gender:</label>
                          <select class="form-control" id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="occupation">Occupation:</label>
                          <input type="text" class="form-control" id="occupation" name="occupation" required>
                        </div>
                        <div class="form-group">
                          <label for="height">Height (in meters):</label>
                          <input type="number" class="form-control" id="height" name="height" required>
                        </div>
                        <div class="form-group">
                          <label for="weight">Weight (in kilograms):</label>
                          <input type="number" class="form-control" id="weight" name="weight" required>
                        </div>
                        <div class="form-group">
                          <label for="contactnumber">Contact Number:</label>
                          <input type="text" class="form-control" id="contactnumber" name="contactnumber" required>
                        </div>
                        <div class="form-group">
                          <label for="province">Province:</label>
                          <input type="text" class="form-control" id="province" name="province" required>
                        </div>
                        <div class="form-group">
                          <label for="city">City:</label>
                          <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="form-group">
                          <label for="postalcode">Postal Code:</label>
                          <input type="text" class="form-control" id="postalcode" name="postalcode" required>
                        </div>
                        <div class="form-group">
                          <label for="password">Password:</label>
                          <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->
    <script>
      // Function to toggle file upload field based on age
      function toggleFileUpload() {
        var ageInput = document.getElementById('age');
        var fileUploadGroup = document.getElementById('fileUploadGroup');

        // Get the value of age input
        var age = parseInt(ageInput.value);

        // If age is 18 or above, show the file upload field, otherwise hide it
        if (age <= 18) {
          fileUploadGroup.style.display = 'block';
        } else {
          fileUploadGroup.style.display = 'none';
        }
      }

      // Listen for changes in the age input field
      document.getElementById('age').addEventListener('input', toggleFileUpload);
    </script>


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
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <script src="../dist/js/sweetalert2@11"></script>
  <!-- Page specific script -->
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
      $('#addPatientForm').submit(function(e) {
        e.preventDefault(); // Prevent form submission

        // Submit the form via AJAX
        $.ajax({
          url: 'add_patient.php',
          type: 'POST',
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(response) {
            if (response.trim() === 'success') {
              // Show SweetAlert success message
              Swal.fire({
                icon: 'success',
                title: 'Patient Added',
                text: 'The patient has been successfully added.',
                timer: 2000,
              }).then(() => {
                location.reload(); // Reload the page after successful addition
              });
            } else {
              // Show SweetAlert error message
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response,
              });
            }
          },
          error: function(xhr, status, error) {
            // Show SweetAlert error message
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'An error occurred. Please try again.',
            });
          }
        });
      });
    });
  </script>
  <script>
    // JavaScript/jQuery code for fetching patient data and populating the edit modal
    $(document).ready(function() {
      // Edit Patient Modal
      $('#editPatientModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var patientId = button.data('id'); // Extract patient ID from data-id attribute
        var patientFirstname = button.data('firstname'); // Extract patient first name from data-firstname attribute
        var patientLastname = button.data('lastname'); // Extract patient last name from data-lastname attribute
        var patientMiddlename = button.data('middlename'); // Extract patient middle name from data-middlename attribute
        var patientAge = button.data('age'); // Extract patient age from data-age attribute
        var patientBirth = button.data('birth'); // Extract patient birth date from data-birth attribute
        var patientGender = button.data('gender'); // Extract patient gender from data-gender attribute
        var patientOccupation = button.data('occupation'); // Extract patient occupation from data-occupation attribute
        var patientHeight = button.data('height'); // Extract patient height from data-height attribute
        var patientWeight = button.data('weight'); // Extract patient weight from data-weight attribute
        var patientContactnumber = button.data('contactnumber'); // Extract patient contact number from data-contactnumber attribute
        var patientProvince = button.data('province'); // Extract patient province from data-province attribute
        var patientCity = button.data('city'); // Extract patient city from data-city attribute
        var patientPostalcode = button.data('postalcode'); // Extract patient postal code from data-postalcode attribute
        var patientPassword = button.data('password'); // Extract patien from password attribute

        var modal = $(this);
        modal.find('#editPatientId').val(patientId); // Set the patient ID in the hidden input field
        modal.find('#editPatientFirstname').val(patientFirstname); // Set the patient first name in the input field
        modal.find('#editPatientLastname').val(patientLastname); // Set the patient last name in the input field
        modal.find('#editPatientMiddlename').val(patientMiddlename); // Set the patient middle name in the input field
        modal.find('#editPatientAge').val(patientAge); // Set the patient age in the input field
        modal.find('#editPatientBirth').val(patientBirth); // Set the patient birth date in the input field
        modal.find('#editPatientGender').val(patientGender); // Set the patient gender in the input field
        modal.find('#editPatientOccupation').val(patientOccupation); // Set the patient occupation in the input field
        modal.find('#editPatientHeight').val(patientHeight); // Set the patient height in the input field
        modal.find('#editPatientWeight').val(patientWeight); // Set the patient weight in the input field
        modal.find('#editPatientContactnumber').val(patientContactnumber); // Set the patient contact number in the input field
        modal.find('#editPatientProvince').val(patientProvince); // Set the patient province in the input field
        modal.find('#editPatientCity').val(patientCity); // Set the patient city in the input field
        modal.find('#editPatientPostalcode').val(patientPostalcode); // Set the patient postal code in the input field
        modal.find('#editPatientPassword').val(patientPassword); // Set the patient postal code in the input field
      });

      $('#editPatientForm').submit(function(e) {
        e.preventDefault(); // Prevent form submission
        var formData = new FormData(this); // Create FormData object
        // Perform update operation using AJAX
        $.ajax({
          url: 'update_patient.php',
          type: 'POST',
          data: formData,
          processData: false, // Prevent jQuery from automatically processing the FormData object
          contentType: false, // Prevent jQuery from setting contentType
          success: function(response) {
            if (response === "success") {
              // Show success message using SweetAlert
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Patient record updated successfully'
              }).then((result) => {
                if (result.isConfirmed) {
                  $('#editPatientModal').modal('hide'); // Hide the Bootstrap modal
                  location.reload(); // Refresh the page
                }
              });
            } else {
              // Show error message using SweetAlert
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response
              }).then((result) => {
                if (result.isConfirmed) {
                  $('#editPatientModal').modal('hide'); // Hide the Bootstrap modal
                  location.reload(); // Refresh the page
                }
              });
            }
          },
          error: function(xhr, status, error) {
            console.error('An error occurred while updating patient:', error);
          }
        });
      });

      // JavaScript to handle delete patient
      $(document).on('click', '.deletePatient', function() {
        var patientId = $(this).data('id');
        $('#deletePatientId').val(patientId); // Set the patient ID in the hidden input
      });

      // JavaScript to handle confirmation of delete
      $('#confirmDeletePatient').click(function() {
        var patientId = $('#deletePatientId').val();
        // AJAX request to delete patient
        $.ajax({
          url: 'delete_patient.php',
          type: 'POST',
          data: {
            patientId: patientId
          },
          success: function(response) {
            // Handle success response
            location.reload(); // Reload or update the patients table after deletion
          },
          error: function(xhr, status, error) {
            // Handle error response
            console.error('An error occurred while deleting patient:', error);
          }
        });
      });
    });
  </script>

</html>