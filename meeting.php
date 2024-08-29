<?php
session_start(); // Start session to store messages


include("./confing.php");
include("./navbar2.php");

if(isset($_POST['submit'])){
    $topic=$_POST['topic'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $location=$_POST['location'];

    $xyz=$conn->query("insert into meeting(topic,date,time,location)values('$topic','$date','$time','$location')");

    if ($xyz) {
        $_SESSION['message'] = "User message successful."; // Set success message
    } else {
        $_SESSION['message'] = "Error: " . $conn->error; // Set error message
    }
    
    header("Location:meetingform.php"); 
    exit();
}


?>