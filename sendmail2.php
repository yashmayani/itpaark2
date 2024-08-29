<?php

//Email address of the receiver
$to = "yashmayani.softaware@gmail.com";
//Email subject
$subject = 'Your order is submitted successfully.';
//Set the email body
$message = '
<p style="font-size:16px;">You have ordered the following products:</p>
<ol>
<li> A4 Mouse </li>
<li> Samsung Printer </li>
<li> HP Scanner </li>
</ol>
<p>Thank you for your order.</p>
';
//Newline characters
$nl = "\r\n";
//Header information
$headers = 'MIME-Version: 1.0'.$nl;
$headers .= 'Content-type: text/html; charset=iso-8859-1'.$nl;
$headers .= 'To: Fahmida Yesmin <yashmayani.softaware@gmail.com>'.$nl;
$headers .= 'From: Admin <yashmayani.softaware@gmail.com>'.$nl;
//Send email
if(mail($to, $subject, $message, $headers))
   echo "Email sent successfully.";
else
   echo "Unable to send the email.";
?>