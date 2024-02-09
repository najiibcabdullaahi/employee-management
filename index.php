<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>login page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page"
style="background-color:#FBF29D">
<div class="login-box" style="width:400px">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center" style="background-color:black; color:white">
      <a href="" class="h1"><b>Employee </b> Record</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"style="font-size:24px;font-weight:bold">Sign in to login</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="enter usename"required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass"class="form-control" placeholder="Password" required>
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
            <button type="submit" name="login"class="btn btn-success btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    <?php  
include("myfiles/connection.php");
if(isset($_POST['login']))
{
    $myusername=$_POST['username'];
    $mypass=$_POST['pass'];
    $mylog=mysqli_query($conn,"select * from users where username='$myusername'and password='$mypass'");

$mycountresult=mysqli_num_rows($mylog);
$result=mysqli_fetch_array($mylog);
if($mycountresult>0)

{
  $_SESSION['UID']=$result[0];
  $_SESSION['fullname']=$result[1];
  $_SESSION['username']=$result[2];
  $_SESSION['password']=$result[3];
  $_SESSION['confirm']=$result[4];
  $_SESSION['gender']=$result[5];
  $_SESSION['usertype']=$result[6];
  $_SESSION['contact']=$result[7];
  $_SESSION['date']=$result[8];
  $_SESSION['userphoto']=$result[9];

  echo"<script> 
  alert('login is successfully');
  window.location.href='Dashboard.php'
  </script>";

}

else
{
    echo"<script> 
    alert('login is invalid');
    window.location.href='index.php'
    </script>";
}
}


?>



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
