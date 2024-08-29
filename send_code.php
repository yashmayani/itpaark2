<?php
include("./confing.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Generate a random code
    $code = rand(100000, 999999);


    $html = "Your varification code is: ";
    $html .= " ".$code."";
    $mail = new PHPMailer(true);


    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'yashmayani522@gmail.com'; 
        $mail->Password   = 'icpeppokfbemgkjq';
        $mail->SMTPSecure = 'tls'; 
        $mail->Port       = 587;                            
        
        $mail->setFrom('yashmayani522@gmail.com', 'IT PARK');
        $mail->addAddress($email);
    
        $mail->isHTML(true);
        $mail->Subject = 'Verification code';
        $mail->Body    = $html;
    
        $mail->send();

        $u=$conn->query("DELETE FROM code_email  WHERE email='$email'");

        $v=$conn->query("INSERT INTO code_email (code,email)VALUES('$code','$email')");
            
        echo "Code sent to $email. <a href='verify_code.php'>Verify Code</a>";
        
    } catch (Exception $e) {
        echo "something went wrong '.$e.'";
    }

    // $to = $email;
    // $subject = 'Your order is submitted successfully.';
    // $message = '
    // <p style="font-size:16px;">Your code for forgot password is : '.$code.'</p>
    // ';
    // $nl = "\r\n";
    // $headers = 'MIME-Version: 1.0'.$nl;
    // $headers .= 'Content-type: text/html; charset=iso-8859-1'.$nl;
    // $headers .= 'To: Fahmida Yesmin <yashmayani.softaware@gmail.com>'.$nl;
    // $headers .= 'From: Admin <yashmayani.softaware@gmail.com>'.$nl;
    // if(mail($to, $subject, $message, $headers)){

      
//     $u=$conn->query("DELETE FROM code_email  WHERE email='$email'");

//     $v=$conn->query("INSERT INTO code_email (code,email)VALUES('$code','$email')");
        
//     echo "Code sent to $email. <a href='verify_code.php'>Verify Code</a>";
//     }else{
//         echo "something went wrong";
//     }
}
?>
