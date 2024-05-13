<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NJC - Dental Clinic| staff Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    body {
      background-image: url('dist/img/care.jpg');
      /* Specify the path to your background image */
      background-size: cover;
      /* Cover the entire viewport */
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
          <a href="index.php"><img src="admin/njclogo.png" alt="Your Image" class="img-fluid" style="max-width: 150px;border-radius:50%;"></a>
        </div>

        <p class="login-box-msg">LOGIN</p>

        <form action="login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="name" name="username" id="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="patientCheckbox">
                <label for="patientCheckbox">
                  Patient?
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
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#patientCheckbox').change(function() {
        if ($(this).is(':checked')) {
          $('#username').attr('placeholder', 'Contact number');
        } else {
          $('#username').attr('placeholder', 'name');
        }
      });
    });
  </script>
</body>

</html>