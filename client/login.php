<?php
// Include your database connection
include 'config/conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement to retrieve user data
    $stmt = $conn->prepare("SELECT * FROM clients WHERE contactnumber = ?");
    $stmt->bind_param("s", $phone_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Password is correct, login successful
            session_start();
            $_SESSION['client_id'] = $user['id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['middlename'] = $user['middlename'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['contactnumber'] = $user['contactnumber'];
            // Redirect to dashboard or home page
            header("Location: index.php");
            exit();
        } else {
            // Password is incorrect
            $error_message = "Incorrect password";
        }
    } else {
        // User not found
        $error_message = "User not found";
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
  <title>NJC - Dental Clinic| staff Log in</title>

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

      <p class="login-box-msg">Sign in to start your session</p>
      <form action="login.php" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Phone Number" name="phone_number">
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
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
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
// Display error message if login failed
if (isset($error_message)) {
    echo "<script>alert('$error_message');</script>";
}
?>
