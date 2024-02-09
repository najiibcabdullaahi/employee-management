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
            <h1>EMPLOYEE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">emp update</li>
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
          include("myfiles/connection.php");
          if(isset($_POST['updateEmp']))
          
          {

          $myempid=$_POST['updateID'];
         $result=mysqli_query($conn,"select * from poor where ID='$myempid'");
        foreach($result as $row1)
      {
     ?>

 <form action="#" method="POST" enctype="multipart/form-data">
<input type="Text" name="myedits" id="myedit" value="<?php echo $row1['ID'] ?>">
  <div class="form-group">
    <label for="empphoto">Empphoto</label>
    <input type="file"class="form-control" id="empphoto"name="sawir" aria-describedby="emailHelp"
    value="<?php echo $row1['PHOTO'] ?>">
  </div>s


  <div class="form-group">
    <label for="empname">Empname</label>
    <input type="text"class="form-control" id="empname"name="empname" aria-describedby="emailHelp"
    value="<?php echo $row1['EMPNAME'] ?>" 
    place holder="enter employee name" required>
  </div>
  
 

  <div class="form-group">
    <label for="gender">gender</label>
   <select name="Gen" id="gender" class="form-control"placeholde="enter emp gender"required>
   <option value="<?php echo $row1['GENDER'] ?>"> <?php echo $row1['GENDER'] ?></option>
   <option value="male">male</option>
   <option value="female">female</option>
   </select>
  </div>

  <div class="form-group">
    <label for="address">address</label>
    <input type="text"class="form-control" id="address" name="addres" aria-describedby="emailHelp"value="<?php echo $row1['ADDRESS'] ?>" place holder="enter employee address" required>
  </div>


  <div class="form-group">
    <label for="jobtitle">jobtitle</label>
    <input type="text"class="form-control"id="jobtitle"name="myjob" aria-describedby="emailHelp"  value="<?php echo $row1['JOBTITLE'] ?>" place holder="enter employee jobtitle" required>
  </div>

  <div class="form-group">
    <label for="tell">contact</label>
    <input type="text"class="form-control" id="tell"name="contacts" aria-describedby="emailHelp"value="<?php echo $row1['CONTACT'] ?>" place holder="enter employee contact" required>
  </div>

  <div class="form-group">
    <label for="salary">Empsalary</label>
    <input type="text"class="form-control" id="salary" name="empsal" aria-describedby="emailHelp" value="<?php echo $row1['SALARY'] ?>" place holder="enter employee salary" required>
  </div>

  <div class="form-group">
    <label for="mydate">date</label>
    <input type="date"class="form-control"id="mydate" name="dat" aria-describedby="emailHelp"value="<?php echo $row1['DATE'] ?>">
  </div>

  
  <div class="modal-footer">
        <a href="#"class="btn btn-secondary" data-dismiss="modal">Close</a>
        <button type="submit" name="Send" class="btn btn-primary">Update</button>
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



          <?php
   include("myfiles/connection.php");
if(isset($_POST['Send']))
{
$allow=array("png","jpeg","jpg","gif","PNG","JPEG","JPG","GIF","");
$filename=$_FILES['sawir']['name'];
$Ext=pathinfo('PATHINFO_EXTENSION');
if(in_array($Ext,$allow))
{
    move_uploaded_file ($_FILES['sawir']['tmp_name'],'../img'.$filename);

 if($filename=="")

 {
    $mypath='img/photo.jpg';
 }
 else
 {
    $mypath='img'.$filename;
 }

// create another variables

$MyEd=$_POST['myedits'];
$myempname=$_POST['empnam'];
$mygender=$_POST['Gen'];
$myaddress=$_POST['addres'];
$myjobtitle=$_POST['myjob'];
$mytell=$_POST['contacts'];
$mysalary=$_POST['empsal'];
$mycreate=$_POST['dat'];

$myupdate=mysqli_query($conn,"update poors set EMPNAME='$myempname',GENDER='$mygender',ADDRESS='$myaddress',JOBTITLE='$myjobtitle',CONTACT='$mytell',SALARY='$mysalary',DATE='$mycreate',PHOTO='$mypath' where ID='$MyEd");

if($myupdate)
{
  echo"<script> 
  alert('data has been Updated');
  window.location.href='employeelist.php'
  </script>";
}

else
{
die("There something error......");
}

}
}
?>




          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 







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
