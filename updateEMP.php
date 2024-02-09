 <?php

include("myfiles/connection.php");
?>


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
            <h1>update employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">employee list</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            
              <div class="card-body">
         <?php 
       
         if(isset($_POST['updateEmp']))
         {
       $myId=$_POST['updateID'];
     $myresult=mysqli_query($conn,"select * from  poor where ID='$myId'");
    foreach($myresult as $row1)

{


         ?>       
            



<form action="#" method="POST" enctype="multipart/form-data">
  <input type="hidden" id="myedit" name="myedit" value="<?php echo $row1['ID']?>">
  <div class="form-group">
    <label for="empphoto">Emp photo</label>
    <input type="file"class="form-control" id="empphoto"name="myimages" aria-describedby="emailHelp" value="<?php echo $row1['PHOTO']?>">
  </div>


  <div class="form-group">
    <label for="empname">Emp name</label>
    <input type="text"class="form-control" id="empname"name="Empname" aria-describedby="emailHelp"value="<?php echo $row1['EMPNAME']?>" place holder="enter employee name" required>
  </div>
  
 
  <div class="form-group">
    <label for="gender">gender</label>
   <select name="Gen" id="gender" class="form-control" placeholde="enter emp gender" required>
   <option value="<?php echo $row1['GENDER']?>"><?php echo $row1['GENDER']?></option>
   <option value="male">male</option>
   <option value="female">female</option>
   </select>
  </div>

  <div class="form-group">
    <label for="address">address</label>
    <input type="text"class="form-control" id="address"name="myaddress" aria-describedby="emailHelp"value="<?php echo $row1['ADDRESS']?>" place holder="enter emp address" required>
  </div>


  <div class="form-group">
    <label for="jobtitle">jobtitle</label>
    <input type="text"class="form-control" id="jobtitle"
    name="myjob" aria-describedby="emailHelp"value="<?php echo $row1['JOBTITLE']?>"
     placeholder="enter emp jobtitle" required>
  </div>

  <div class="form-group">
    <label for="tell">contact</label>
    <input type="text"class="form-control" id="tell"name="contact" aria-describedby="emailHelp"value="<?php echo $row1['CONTACT']?>" place holder="enter employee contact" required>
  </div>

  <div class="form-group">
    <label for="salary">Emp salary</label>
    <input type="text"class="form-control" id="salary"name="sal" aria-describedby="emailHelp"value="<?php echo $row1['SALARY']?>" place holder="enter employee salary" required>
  </div>

  <div class="form-group">
    <label for="mydate">date</label>
    <input type="date"class="form-control" id="mydate"name="createdate" aria-describedby="emailHelp"value="<?php echo $row1['DATE']?>">
  </div>




  </div>
      <div class="modal-footer">
        <a href="employeelist.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
        <button type="submit"name="send" class="btn btn-primary">Update</button>
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
 if(isset($_POST['send']))
 {
  $allow=array("png","jpeg","jpg","gif","PNG","JPEG","JPG","GIF","");
  $filename=$_FILES['myimages']['name'];
  $Ext=pathinfo($filename,PATHINFO_EXTENSION);
  
       if(in_array($Ext,$allow))
           {
      move_uploaded_file ($_FILES['myimages']['tmp_name'],'../img'.$filename);
  
      if($filename=="")
  
   {
      $path='img/photo.jpg';
   }
   else
   {
      $path='img'.$filename;
   }
 // create another variables
 $id=$_POST['myedit'];
 $empname=$_POST['Empname'];
 $gender=$_POST['Gen'];
 $address=$_POST['myaddress'];
 $jobtitle=$_POST['myjob'];
 $contact=$_POST['contact'];
 $salary=$_POST['sal'];
 $date=$_POST['createdate'];
 
 $myupdate=mysqli_query($conn,"update poor set EMPNAME='$empname', GENDER='$gender', ADDRESS='$address', JOBTITLE='$jobtitle', CONTACT='$contact', SALARY='$salary', DATE='$date', PHOTO='$path' where ID='$id'");
if($myupdate)
{
   echo"<script> 
   alert('data hasbeen updated');
   window.location.href='employeelist.php'
   </script>";
}


else
{
  echo"<script> 
   alert('data not updated')</scrip>";
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
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
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
