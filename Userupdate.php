

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin panel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include("myfiles/header.php") ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("myfiles/sidebar.php") ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">manage users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <d3DDQ//iv class="container-fluid">
        <div class="row">
          <div class="col-10">
            <div class="card">
           <div class="card-body">
      
            <?php 
       include("myfiles/connection.php");
       if(isset($_POST['updateuser']))
       {
     $myid=$_POST['updateUID'];
   $myresult=mysqli_query($conn,"select * from users where UID='$myid'");
  foreach($myresult as $myrow)

{?>       
             



    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" id="myedit" name="myedit" value="<?php echo $myrow['UID']?>">
  <div class="form-group">
    <label for="userphoto">Userphoto</label>
    <input type="file"class="form-control" id="userphoto"name="PHOTO" aria-describedby="emailHelp"value="<?php echo $myrow['userphoto']?>">
  </div>

  <div class="form-group">
    <label for="fullname">fullname</label>
    <input type="text"class="form-control" id="fullname"name="myfullname" aria-describedby="emailHelp" value="<?php echo $myrow['fullname']?>">
  </div>
  




  
  <div class="form-group">
    <label for="username">username</label>
    <input type="text"class="form-control" id="username"name="myusername" aria-describedby="emailHelp" value="<?php echo $myrow['username']?>">
  </div>
  
  <div class="form-group">
    <label for="password">password</label>
    <input type="text"class="form-control" id="password"name="mypassword" aria-describedby="emailHelp" value="<?php echo $myrow['password']?>">
  </div>

  <div class="form-group">
    <label for="confirm">confirm</label>
    <input type="text"class="form-control" id="confirm"name="myconfirm" aria-describedby="emailHelp" value="<?php echo $myrow['confirm']?>">
  </div>


  
  <div class="form-group">
    <label for="gender">gender</label>
   <select name="gen" id="gender" class="form-control">
   <option value="<?php echo $myrow['gender']?>"><?php echo $myrow['gender']?></option>
   <option value="male">male</option>
   <option value="female">female</option>
   </select>
  </div>






  <div class="form-group">
    <label for="usertype">usertype</label>
   <select name="myusertype" id="usertype" class="form-control">
   <option value="<?php echo $myrow['usertype']?>"><?php echo $myrow['usertype']?></option>
   <option value="Admin">Admin</option>
   <option value="Normal">Normal</option>
   <option value="user">user</option>
   </select>
  </div>


  
  <div class="form-group">
    <label for="contact">contact</label>
    <input type="contact"class="form-control" id="tell"name="mycontact" aria-describedby="emailHelp" value="<?php echo $myrow['contact']?>">
  </div>


  <div class="form-group">
    <label for="mydate">CreateDate</label>
    <input type="date"class="form-control" id="mydate"name="createdate" aria-describedby="emailHelp"value="<?php echo $myrow['date']?>">
  </div>




</div>
      <div class="modal-footer">
        <a href="user.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
        <button type="submit" name="btnuser"class="btn btn-primary">update user</button>
      </div>
    </form>
<?php
}
}

?>





                
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php
if(isset($_POST['btnuser']))
{
$allow=array("png","jpeg","jpg","gif","PNG","JPEG","JPG","GIF","");
$filename=$_FILES['userphoto']['name'];
$Ext=pathinfo($filename,PATHINFO_EXTENSION);

     if(in_array($Ext,$allow))
         {
    move_uploaded_file ($_FILES['userphoto']['tmp_name'],'../img'.$filename);

                if($filename=="")

 {
    $mypath='img/photo.jpg';
 }
 else
 {
    $mypath='img'.$filename;
 }
 
// create another variables
$myid=$_POST['myedit'];
$fullname=$_POST['myfullname'];
$myusername=$_POST['myusername'];
$password=$_POST['mypassword'];
$confirm=$_POST['myconfirm'];
$gender=$_POST['gen'];
$usertype=$_POST['myusertype'];
$contact=$_POST['mycontact'];
$date=$_POST['createdate'];

$myupdate=mysqli_query($conn,"update users set fullname='$fullname',username='$myusername',password='$mypassword',confirm='$myconfirm',gender='$gender',usertype='$usertype',contact='$contact',date='$date' where UID='$myid'");
if($myupdate)
{
  echo"<script>
  alert('data has updated');
  window.location.href='user.php'
  </script>";
}

else
{
  echo"<script>
  alert('data has nor updated')</script>";
}

    }
    }
?>





  <!-- /.content-wrapper -->
 <?php include("myfiles/footer.php") ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
   
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->

<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
