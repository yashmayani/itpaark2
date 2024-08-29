<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            box-sizing: border-box;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .card h1 {
            margin: 0 0 20px;
            color: #1079e9;
        }

        hr {
            border: none;
            border-top: 2px solid #ddd;
            margin: 20px 0;
            width: 100%;
            max-width: 400px;
            border-radius: 5px;
            margin-left: auto;
            margin-right: auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            text-align: left; /* Aligns label text to the left */
        }

        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="email"]::placeholder {
            color: #aaa;
            opacity: 1; /* Ensures placeholder color is visible */
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Forgot Password</h1>
        <hr>
        <form action="send_code.php" method="post">
            <label for="email">Enter your email:</label>
            <input type="email" id="email" name="email" placeholder="you@example.com" required>
            <button type="submit">Send Code</button>
        </form>
    </div>
</body>
</html>
<?php
include("./confing.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Generate a random code
    $code = rand(100000, 999999);

    // Save the code to a file for demo purposes (use a database in real applications)
    file_put_contents('code_' . $email . '.txt', $code);

    $to = $email;
    //Email subject
    $subject = 'Your order is submitted successfully.';
    //Set the email body
    $message = '
    <p style="font-size:16px;">Your code for forgot password is : '.$code.'</p>
    ';
    //Newline characters
    $nl = "\r\n";
    //Header information
    $headers = 'MIME-Version: 1.0'.$nl;
    $headers .= 'Content-type: text/html; charset=iso-8859-1'.$nl;
    $headers .= 'To: Fahmida Yesmin <yashmayani.softaware@gmail.com>'.$nl;
    $headers .= 'From: Admin <yashmayani.softaware@gmail.com>'.$nl;
    //Send email
    if(mail($to, $subject, $message, $headers)){

      
    $u=$conn->query("DELETE FROM code_email  WHERE email='$email'");

    $v=$conn->query("INSERT INTO code_email (code,email)VALUES('$code','$email')");
        
    echo "Code sent to $email. <a href='verify_code.php'>Verify Code</a>";
    }else{
        echo "something went wrong";
    }
}
?>
