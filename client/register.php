<?php
// Include your database connection
include 'config/conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $contactnumber = $_POST['contactnumber'];
    $password = $_POST['password'];

    // Perform validation here if needed

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement to insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO clients (firstname, lastname, middlename, contactnumber, password, registered) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssss", $firstname, $lastname, $middlename, $contactnumber, $hashed_password);

    if ($stmt->execute()) {
        // Registration successful
        $message = "Registration successful. You may now log in.";
    } else {
        // Registration failed
        $error_message = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NJC - Dental Clinic| Staff Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
<style>
    body {
        background-image: url('../dist/img/care.jpg'); /* Specify the path to your background image */
        background-size: cover; /* Cover the entire viewport */
        background-repeat: no-repeat;
        background-position: center;
    }
    
</style>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b><strong style="color:DarkSlateGrey;">NJC - Dental Clinic</strong></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

    <div class="login-logo d-flex justify-content-center">
                    <a href="index.php"><img src="../admin/njclogo.png" alt="Your Image" class="img-fluid" style="max-width: 150px;border-radius:50%;"></a>
                </div>

      <p class="login-box-msg">Register Account</p>
      <form action="register.php" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="First Name" name="firstname">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Last Name" name="lastname">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Middle Name" name="middlename">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Contact Number" name="contactnumber">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-phone"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <div class="col-12">
            <a href="login.php">login here.</button>
        </div>
        <!-- /.col -->
    </div>
</form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>

<?php
// Display message if registration was successful
if (isset($message)) {
    echo "<script>alert('$message');</script>";
} elseif (isset($error_message)) {
    echo "<script>alert('$error_message');</script>";
}
?>
