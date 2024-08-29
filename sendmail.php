
<?php

//Email address of the receiver
$to = "yashmayani.software@gmail.com";
//Email subject
$subject = "testing mail() function";
//Email message
$message = "Sending email using mail() function";
//Header information
$headers = "From: Admin <yashmayani.software@gmail.com>\r\n";
//Send email
if(mail($to, $subject, $message, $headers))
   echo "Email sent successfully.";
else
   echo "Unable to send the email." . error_get_last()['message'];
?>