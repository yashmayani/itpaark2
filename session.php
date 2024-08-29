<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// session_start();

if (isset($_SESSION['user_id'])) {
    // header("Location:dashboard.php"); 
} else {
    header("location:loginform.php");
}   


?>