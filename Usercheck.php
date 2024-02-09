<?php
include("myfiles/connection.php");
$myUname=$_POST['username'];
$mycheck=mysqli_query($conn,"select * from users where username='$myUname'");
$mycount=mysqli_num_rows($mycheck);
if($myUname=="")
{
    echo"<span> </span>";
}
elseif($mycount>0)
{
    echo"<span class='badge badge-danger'> <b> $myUname </b> is already exist </span>";
    echo"<script> document.getELementBYid ('UID').disabled=true </script>";
}
elseif($mycount<=0)
{
    echo"<span class='badge badge-success'><b> $myUname </b> is available  </span>";
    echo"<script> document.getELementBYid ('UID').disabled=false </script>";
}

?>


