<?php
include("./confing.php");

$id=$_GET['id'];

$update = $conn->query("UPDATE complain set status='solved' where complain_id=$id");


if ($update) {
  // If the update query is successful
  echo "Updated successfully";
  header("Location: viewcomplain.php"); // Redirect to a page after successful update
  exit; // Make sure to exit after redirection
} else {
  // If the update query fails
  echo "Something went wrong";
}

?>