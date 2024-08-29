<?php
include("./confing.php");
session_start();

if(isset($_POST['submit'])) {
    $massage = $_POST['massage'];
    $complain_catagary_id = $_POST['comp_catagary_id'];
    $user_id = $_SESSION['user_id'];
    $current_time = date('Y-m-d H:i:s'); // Format: 'YYYY-MM-DD HH:MM:SS'
    $current_time = $conn->real_escape_string($current_time);

    // Insert into `complain` table
    $complain_query = "INSERT INTO complain (users_id, massage, comp_catagary_id,created_at) 
                       VALUES ($user_id,  '$massage', '$complain_catagary_id','$current_time')";
    $complain_result = $conn->query($complain_query);
    $complain_id = $conn->insert_id; // Get the ID of the inserted complain

    if($complain_result && $complain_id) {
        $message = "Complain added successfully";
        foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['image']['name'][$key];
            $file_tmp = $_FILES['image']['tmp_name'][$key];
            $folder = 'images/' . $file_name;

            // Move uploaded file to desired directory
            move_uploaded_file($file_tmp, $folder);

            // Insert into `comp_images` table
            $insert_image_query = "INSERT INTO comp_images (img, c_id) VALUES ('$file_name', $complain_id)";
            $insert_image_result = $conn->query($insert_image_query);

            if (!$insert_image_result) {
                $message = "Error in inserting images";
                break;
            }
        }
    } else {
        $message = "Complain not added";
    }

    $_SESSION['message'] = $message;
    header("Location: viewcomplain.php");
    exit();
}
?>
