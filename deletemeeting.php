<?php
include("./confing.php");

$d=$_GET['id'];
  

$deletemeeting=$conn->query("delete from meeting where meeting_id='$d'");
  
  if ($deletemeeting) {
      echo "deleted successfully";
      header("Location:viewmeeting.php");
  
  }
  else {
       echo "somthing went wrong";
  }




?>