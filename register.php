<?php
session_start(); // Start session to store messages


include("./confing.php");

if(isset($_POST['submit'])){
    $officenumber=$_POST['office_number'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contactnumber=$_POST['contact_number'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];


    // if ($password == $confirmpassword) {

    //     $students=$conn->query("insert into users(office_number,name,email,contact_number,password)values('$officenumber','$name','$email',' $contactnumber','$password')");

    //     if ($students) {
    //         $_SESSION['message'] = "User registration successful."; // Set success message
    //     } else {
    //         $_SESSION['message'] = "Error: " . $conn->error; // Set error message
    //     }
        
    //     header("Location: registrationform.php"); // Redirect to registrationform.php
    //     exit();
    // }
    
    // else {
    //     $_SESSION['message'] = "password and confirm password does not match " . $conn->error; // Set error message
    //      header("Location: registrationform.php"); // Redirect to registrationform.php
    // exit();
        
    // }
    

if ($password == $confirmpassword) {
    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $stmt = $conn->prepare("INSERT INTO users (office_number, name, email, contact_number, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $officenumber, $name, $email, $contactnumber, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['message'] = "User registration successful.";
        $_SESSION['user_id'] = $stmt->insert_id; // Store user ID
        header("Location: dashboard.php"); // Redirect to dashboard.php
        exit();
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error; // Set error message
    }
    
    $stmt->close();
} else {
    $_SESSION['message'] = "Password and confirm password do not match."; // Set error message
}

header("Location: registrationform.php"); // Redirect back to registration form
exit();

    
}

   


?>