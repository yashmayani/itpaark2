<?php
session_start(); // Start session to store messages


include("./confing.php");

if(isset($_POST['login'])){
    
    $emailaddress=$_POST['email'];
    $password=$_POST['password'];

    $user=$conn->query("select password,users_id from users where email='$emailaddress'")->fetch_all();
    // print_r('<pre>');
    // print_r($user);
    if (password_verify($password, $user[0][0])) {
        $_SESSION['user_id']=$user[0][1];
       header("location:dashboard.php");
    } else {
        $_SESSION['message'] = "The password you've entered is incorrect. " . $conn->error; 
        header("Location: loginform.php");

    }
    
    exit();
}


?>