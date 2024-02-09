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
            <h1>USERS</h1>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
             
            </div>
             
              <!-- /.card-header -->
              <div class="card-body">
             <!-- Button trigger modal -->
             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staffModal">
              Addnew
               </button>
<?php
include("myfiles/connection.php");
$display=mysqli_query($conn,"select * from users");

?>




                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>#</th>
                  <th>userphoto</th>
                  <th>fullname</th>
                    <th>Username</th>
                    <th>gender</th>
                    <th>Usertype</th>
                   <th>contact</th>
                   <th>createDate</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                   
                  <?php
                 if($display)
                 {
                  foreach($display as $row)
                 
                 {

                 
                 ?>
                <tr>
                <td> <?php echo $row['UID']?></td>
                <td>
              <img src="<?php echo $row['userphoto'] ?>" width="50px" height="40px" class="img-circle" >
              <td> <?php echo $row['fullname']?></td>
              <td> <?php echo $row['username']?></td>
              <td> <?php echo $row['gender']?></td>
              <td> <?php echo $row['usertype']?></td>
              <td> <?php echo $row['contact']?></td>
              <td> <?php echo $row['date']?></td>
            


                <td>
              <form action="Userupdate.php" method="POST">
              <input type="hidden" name="updateUID" value="<?php echo $row['UID']?>">
             <button type="submit" name="updateuser"class ="btn btn-success"><i class="fa fa-edit"> </i> </button>
             <button type="button" class ="btn btn-danger delbtn"><i class="fa fa-trash"> </i> </button>
             </form>
              </td>

              <?php
                 }
                }
             else
             {
              echo"No available data";
             }
              
             






      ?>  
                  


                  </tfoot>
                </table>   
              </div>



     <!-- Modal -->
<div class="modal fade" id="staffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="Allquery/Userinsert.php" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="userphoto">Userphoto</label>
    <input type="file"class="form-control" id="userphoto"name="userphoto" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="fullname">fullname</label>
    <input type="text"class="form-control" id="fullname"name="fullname" aria-describedby="emailHelp" place holder="enter employee name" required>
  </div>
  




  
  <div class="form-group">
    <label for="username">username</label>
    <input type="text"class="form-control" id="username"name="username" aria-describedby="emailHelp" 
    place holder="enter employee name" required>
<span id="checkuser"></span>

  </div>
  
  <div class="form-group">
    <label for="password">password</label>
    <input type="text"class="form-control" id="password"name="password" aria-describedby="emailHelp" place holder="enter employee name" required>
    <span class="mypassword"> </span>
  </div>

  <div class="form-group">
    <label for="confirm">confirm</label>
    <input type="text"class="form-control" id="confirm"name="confirm" aria-describedby="emailHelp" place holder="enter employee name" required>
    <span class="myconfirm"> </span>
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
    <label for="usertype">usertype</label>
   <select name="usertype" id="usertype" class="form-control"placeholde="enter emp gender"required>
   <option></option>
   <option value="Admin">Admin</option>
   <option value="Normal">Normal</option>
   <option value="user">user</option>
   </select>
  </div>


  
  <div class="form-group">
    <label for="tell">contact</label>
    <input type="text"class="form-control" id="tell"name="tell" aria-describedby="emailHelp" place holder="enter employee contact" required>
  </div>


  <div class="form-group">
    <label for="mydate">CreateDate</label>
    <input type="date"class="form-control" id="mydate"name="mydate" aria-describedby="emailHelp">
  </div>




  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="btnuser" id="UID" class="btn btn-primary">insert user</button>
      </div>

</form>
    </div>
  </div>
</div>










              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
     <form action="delete/deleteuser.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="delid" id="mydelid" 
      value="<?php echo $row['UID']?>">
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

$(document).ready(function(){

//alert("njb");

$("#username").keyup(function(){

//alert("kng");
var uname=$(this).val();
$.ajax({
url:"Usercheck",
method:"POST",
data:{username:uname},
dataType:"text",
success:function(res){
$("#checkuser").html(res);
}
});

});// end user name

$("#password").keyup(function(){
//alert("welcome");
var passone=$(this).val();
if(passone=="")
{
  $(".mypassword").html("<span>  </span>");
}
else if(passone.length>=1 && passone.length<=5)
{
  $(".mypassword").html("<span class='badge badge-danger'> <b> password isvery weak  </b> </span>");
}

else if(passone.length>=6 && passone.length<=10)
{
  $(".mypassword").html("<span class='badge badge-info'> <b> password is medium </b> </span>");
}

else 
{
  $(".mypassword").html("<span class='badge badge-success'> <b> password isvery strong  </b> </span>");
}


}); // end password


// confirm

$("#confirm").keyup(function(){
//alert("come on");
var pass1=$("#password").val();
var confpass=$(this).val();
if(confpass=="")
{
  $(".myconfirm").html("<span> </span>");
}
else if(pass1!=confpass)
{
  $(".myconfirm").html("<span class='badge badge-danger'><b>  password  mis-matching </b> </span>");
$("myID").prop("disabled",true);
}
else
{
  $(".myconfirm").html("<span class='badge badge-success'><b>  password is matching </b> </span>");
$("myID").prop("disabled",false); 
}

});// end confirm
});// end document

 </script>












 




<script>

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
