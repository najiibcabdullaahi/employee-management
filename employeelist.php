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
  <?php if($_SESSION['usertype']=='Admin') { ?>
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
            <div class="card-header">
             
            </div>
             
              <!-- /.card-header -->
              <div class="card-body">
                
             <!-- Button trigger modal -->
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EmloyeeModal">
              Addnew
               </button>

       <!---view table-->
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
                    <th>Action</th>
                    
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

              <td>
              <form action="updateEMP.php" method="POST">
              <input type="hidden" name="updateID" value="<?php echo $rows ['ID']?>">
             <button type="submit" name="updateEmp"class="btn btn-success"><i class="fa fa-edit"> </i> </button>
             <button type="button" class ="btn btn-danger delbtn"><i class="fa fa-trash"> </i> </button>
             </form>
              </td>
             
     
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


<!--add Modal -->
<div class="modal fade" id="EmloyeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="Allquery/insertEmployee.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="empphoto">Empphoto</label>
    <input type="file"class="form-control" id="empphoto"name="myimages" aria-describedby="emailHelp">
  </div>


  <div class="form-group">
    <label for="empname">Empname</label>
    <input type="text"class="form-control" id="empname"name="Empname" aria-describedby="emailHelp" place holder="enter employee name" required>
  </div>
  
  

  <div class="form-group">
    <label for="gender">gender</label>
   <select name="Gender" id="gender" class="form-control"placeholde="enter emp gender"required>
   <option></option>
   <option value="male">male</option>
   <option value="female">female</option>
   </select>
  </div>

  <div class="form-group">
    <label for="address">address</label>
    <input type="text"class="form-control" id="address"name="address" aria-describedby="emailHelp" place holder="enter emp address" required>
  </div>


  <div class="form-group">
    <label for="jobtitle">jobtitle</label>
    <input type="text"class="form-control" id="jobtitle"
    name="jobtitles" aria-describedby="emailHelp"
     placeholder="enter emp jobtitle" required>
  </div>

  <div class="form-group">
    <label for="tell">contact</label>
    <input type="text"class="form-control" id="tell"name="tell" aria-describedby="emailHelp" place holder="enter employee contact" required>
  </div>

  <div class="form-group">
    <label for="salary">Emp salary</label>
    <input type="text"class="form-control" id="salary"name="salary" aria-describedby="emailHelp" place holder="enter employee salary" required>
  </div>

  <div class="form-group">
    <label for="mydate">date</label>
    <input type="date"class="form-control" id="mydate"name="mydates" aria-describedby="emailHelp">
  </div>




  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"name="ok" class="btn btn-primary">Insert</button>
      </div>

</form>
    </div>
  </div>
</div>



    <!-- /.card-body -->
            </div>

<!--delete Modal -->
<div class="modal fade" id="delmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Delete Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form action="delete/deleteEMP.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="delid" id="mydelid" value="<?php echo $rows ['ID']?>">
      <h4>Do you want to Delete this data?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">NO</button>
        <button type="submit" name="mydelete" class="btn btn-danger">Yes to Delete</button>
      </div>
    </div>
    </form>
  </div>
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
  <?php } else if($_SESSION['usertype']=='user') 
  { 
    echo"<script> window.location.href='Reportlist.php'</script>";
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
