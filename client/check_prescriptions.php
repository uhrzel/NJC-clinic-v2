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
                <a href="#" class="d-block">Dentist</a>
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
                    <a href="add_problem.php" class="nav-link ">
                        <i class="nav-icon fas fa-user-md"></i> <!-- Icon for Add Patient's Problem -->
                        <p>
                            Add Patient's Problem
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="check_prescriptions.php" class="nav-link active">
                        <i class="nav-icon fas fa-prescription-bottle-alt"></i> <!-- Icon for Check Prescriptions -->
                        <p>
                            Check Prescriptions
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
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Modal for generating bill receipt -->
<div class="modal fade" id="generateBillModal" tabindex="-1" role="dialog" aria-labelledby="generateBillModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="generateBillModalLabel">Prescriptions with Receipt</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Content for generating the professional receipt -->
        <h4 style="text-align: center;">NJC - Dental Clinic <span id="receiptType"></span> Prescriptions</h4>
        <hr>
        <p>Issued to:</p>
        <p><strong>Patient Name:</strong> <span id="patientName"></span></p>
        <p>Services Rendered:</p>
        <ul id="problemList">
          <!-- List items will be dynamically added here -->
        </ul>
        <hr>
        <p><strong>Total Amount Paid:</strong> <span id="receiptAmount"></span></p>
        <p><strong>Payment Date:</strong> <span id="receiptDate"></span></p>
        <hr>
        <p><strong>Prescription:</strong></p>
        <textarea class="form-control" id="prescriptionTextarea" name="prescription" rows="3"></textarea>
        <!-- Hidden input field for schedule ID -->
        <input type="hidden" id="scheduleId" name="scheduleId">
        <hr>
        <div style="text-align: center;">
          <!-- Name at the top -->
          <div style="margin-bottom: 20px;">
            <span style="font-weight: bold;">Evelyn B. Caya</span>
            <hr style="border-top: 1px solid black; width: 50%; margin: 5px auto;">
            <span style="font-weight: bold;">Signature over Printed Name:</span>
          </div>
        </div>
        <div class="signature">
          <!-- Add a signature field here, such as an input or a signature pad -->
        </div>
        <hr>
        <p>Thank you for choosing NJC Dental Clinic. We look forward to serving you again.</p>
      </div>
      <div class="modal-footer">
        <!-- Button to close the modal -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Button to submit or generate the bill receipt -->
        <button type="button" class="btn btn-primary" id="generateBillButton">Generate Bill</button>
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
<!-- /.content -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Schedule Table -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Prescription List</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="scheduleTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Patient Name</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Problem</th>
                  <th>Payment</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
              <?php
// Include your database connection
include 'config/conn.php';

// Fetch data from the schedule table
$sql = "SELECT * FROM schedule WHERE bill_generate = 'prescription unchecked'";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
  // Loop through each row and display data in table rows
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['patient_id'] . "</td>";
    
    // Fetch patient name using patient_id
    $patientSql = "SELECT CONCAT(firstname, ' ', middlename, ' ', lastname) AS patient_name FROM patient WHERE patient_id = " . $row['patient_id'];
    $patientResult = mysqli_query($conn, $patientSql);
    $patientRow = mysqli_fetch_assoc($patientResult);
    echo "<td>" . $patientRow['patient_name'] . "</td>";

    echo "<td><button class='timeBtn btn-sm btn-success'>" . $row['date'] . "</button></td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['problem'] . "</td>";
    echo "<td>" . $row['payment'] . "</td>";
    
    // Action icons (update and delete)
    echo "<td>";
    // Edit button
    echo "<a href='#' class='editSchedule btn-sm btn-info' data-id='" . $row['id'] . "' data-toggle='modal' data-target='#generateBillModal'><i class='fas fa-file-invoice'></i> View Bill</a>&nbsp;&nbsp;";
    echo "</td>";
    echo "</tr>";
  }
} else {
  // If no rows returned, display a message
  echo "<tr><td colspan='7'>No Transaction found</td></tr>";
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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../dist/js/sweetalert2@11"></script>
<script>
  $(document).ready(function () {
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
    // Get the prescription value
    var prescription = $('#prescriptionTextarea').val();
    // Get the schedule ID value
    var scheduleId = $('#scheduleId').val();
    // Call the function to print bill receipt and update schedule table
    printBillReceiptAndUpdateSchedule(prescription, scheduleId);
  });

  // Function to print bill receipt and update schedule table
  function printBillReceiptAndUpdateSchedule(prescription, scheduleId) {
    // Debug statements to log scheduleId and prescription
    console.log("Schedule ID:", scheduleId);
    console.log("Prescription:", prescription);

    // Clone the modal content to remove any events or listeners
    var modalContent = document.getElementById('generateBillModal');
    var printContents = modalContent.cloneNode(true);

    // Update the prescription value in the printed content
    var prescriptionElement = printContents.querySelector('#prescriptionTextarea');
    if (prescriptionElement) {
      prescriptionElement.textContent = prescription;
    }
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
      url: 'update_prescription.php',
      method: 'POST',
      data: { scheduleId: scheduleId, prescription: prescription },
      success: function(response) {
        // Handle the response
        console.log(response);
        location.reload(); // Reload the page after updating the schedule
      },
      error: function(xhr, status, error) {
        console.error('Error updating schedule:', error);
        location.reload(); // Reload the page even if there's an error
      }
    });
  }
</script>

</body>
</html>
