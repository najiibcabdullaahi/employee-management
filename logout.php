<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>
<body>
   <?php
   include("myfiles/connection.php");
   session_destroy();
   
  echo"<script> 
  window.location.href='index.php'
  </script>";


   ?> 
</body>
</html>