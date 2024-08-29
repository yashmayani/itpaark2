<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
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

        form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
    display:flex;
}

input[type="email"], input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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
    <h1>Verify Code</h1>
    <hr>
    <form action="verify_code.php" method="post">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" placeholder="you@example.com" required>
        <label for="code">Enter verification code:</label>
        <input type="text" id="code" name="code" placeholder="Enter code here" required>
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
<?php
include("./confing.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $code = $_POST['code'];

    // $y=$conn->query("SELECT code FROM code_email WHERE $email='email'")->fetch_all();
    $y = $conn->query("SELECT code FROM code_email WHERE email='$email'")->fetch_all(MYSQLI_ASSOC);

    if ($code == $y[0]['code']) {
        echo "Code verified. <a href='reset_password.php?email=$email'>Reset Password</a>";
    } else {
        echo "Invalid code. <a href='verify_code.php'>Try Again</a>";
    }
}
?>
