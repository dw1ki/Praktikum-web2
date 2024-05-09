<?php
session_start();
require 'functions.php';

if( isset($_POST["email"]) ) {

  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' ");
  

    // cek email
    if( mysqli_num_rows($result) === 1 ) {
      
      // cek password
      $row = mysqli_fetch_assoc($result);

      if($row['role']=="admin" && password_verify($password, $row["password"])){
 
        // buat session login
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:admin_index.php");

      }else if($row['role']=="user" && password_verify($password, $row["password"])){
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "user";
        // alihkan ke halaman login kembali
        header("location:index.php");
      }	else {
        $error = true; 
      }
      
    }

    else {
      $error = true;
    }
    
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MedWiki | Sign in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.html" class="h1"><b>MedWiki</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Log in to start your session</p>

      <?php if(isset($error)): ?>
        <span style="color: red;">
          Email / Password tidak sesuai
        </span>
      <?php endif; ?>


      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">      
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
          </div>
          <!-- /.col -->
        </div>
      </form>     
      <p class="mb-2 pt-3">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
