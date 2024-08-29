<?php
include("./confing.php");
session_start();

if(isset($_POST['submit'])) {
     
 
    
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/'.$file_name;
    $massage = $_POST['massage'];
    $complain_catagary_id = $_POST['comp_catagary_id'];
    $user_id = $_SESSION['user_id'];
    move_uploaded_file($tempname,$folder)
    $complain=$conn->query("insert into complain(users_id,comp_photo,massage,comp_catagary_id) values ($user_id,'$file_name','$massage','$complain_catagary_id')");

    if($complain) {
     $_SESSION['message'] = "complain added successfully";
    } else {
        $_SESSION['message'] = "complain not added";
    }
    header("Location: complainform.php"); 
    exit();
	
}


?>  