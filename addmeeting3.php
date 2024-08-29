<?php
session_start(); // Start session to store messages


include("./confing.php");

if(isset($_POST['submit'])){
    $officenumber=$_POST['meeting_id'];
    $name=$_POST['topic'];
    $emailaddress=$_POST['date'];
    $password=$_POST['time'];
    $pass=$_POST['location'];
    $user_id = $_SESSION['user_id'];

    $students=$conn->query("insert into meeting(users_id,meeting_id,topic,date,time,location)values('$user_id','$officenumber','$name','$emailaddress','$password','$pass')");

    if ($students) {
        $_SESSION['message'] = "User add meeting successful."; // Set success message
    } else {
        $_SESSION['message'] = "Error: " . $conn->error; // Set error message
    }
    
    header("Location: dashboard.php"); // Redirect to registrationform.php
    exit();
}

        
?>