<?php
session_start(); // Start session to store messages


include("./confing.php");

if(isset($_POST['submit'])){
    $officenumber=$_POST['vehicle_id'];
    $name=$_POST['office_number'];
    $emailaddress=$_POST['vehicle_type'];
    $password=$_POST['vehicle_no'];
    $user_id = $_SESSION['user_id'];

    $students=$conn->query("insert into vehicle(users_id,vehicle_id,office_number,vehicle_type,vehicle_no)values('
    $user_id','$officenumber','$name','$emailaddress','$password')");

    if ($students) {
        $_SESSION['message'] = "User add vehicle successful."; // Set success message
    } else {
        $_SESSION['message'] = "Error: " . $conn->error; // Set error message
    }
    
    header("Location: vehicleform.php"); // Redirect to registrationform.php
    exit();
}

        
?>