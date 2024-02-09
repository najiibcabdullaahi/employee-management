<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><center> <b> EMPLOYEE REPORT </b> </center>
  <hr>
  <br>
  <br>
</title>


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
            <h1>REPORT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Report</li>
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
             <br>
            </div>
             
              
     
         <?php 
     include("myfiles/connection.php");
       $display=mysqli_query($conn,"select * from poor")
            ?>





                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Empphoto</th>
                    <th>Empname</th>
                    <th>gender</th>
                    <th>address</th>
                    <th>jobtitle</th>
                    <th>contact</th>
                    <th>salary</th>
                    <th>Date</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>
                 <?php
                 if($display)
                 {
                  foreach($display as $rows)
                 
                 {

                 
                 ?>
                <tr>
                <td> <?php echo $rows ['ID']?></td>
                <td>
              <img src="<?php echo $rows['PHOTO'] ?>" width="50px" height="40px" class="img-circle" >
              <td> <?php echo $rows['EMPNAME']?></td>
              <td> <?php echo $rows['GENDER']?></td>
              <td> <?php echo $rows['ADDRESS']?></td>
              <td> <?php echo $rows['JOBTITLE']?></td>
              <td> <?php echo $rows['CONTACT']?></td>
              <td> <?php echo $rows['SALARY']?></td>
              <td> <?php echo $rows['DATE']?></td>

              
     
         <?php
           }
        }
            
       else
       {
        echo"not available data";
       }
           
      
    ?>
                  </tfoot>
                </table>   
              </div>
<!--modal bootstrap-->










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
 $(document).ready(function(){
//alert("welcome");
$('.delbtn').on('click',function(){
//alert("yes");
$('#delmodal').modal ('show');
$mytd=$(this).closest('td');
var mydata=$mytr.children('td').map(function(){
  return $('this').text();
}).get();
$('#mydelid').val(mydata[0]);
});
  });

</script>





<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons":["excel","pdf","print"]
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
