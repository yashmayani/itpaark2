<?php
include("./confing.php");

$d=$_GET['id'];


$deletevehicle=$conn->query("delete from vehicle where vehicle_id='$d'");
  
  if ($deletevehicle) {
      echo "deleted successfully";
      header("Location:vehicleform.php");
  
  }
  else {
       echo "somthing went wrong";
  }




?>