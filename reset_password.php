<?php
include("./confing.php");
if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    header('Location: forgot_password.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {
        // Hash the new password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // $a = $conn->query("UPDATE code_email SET email = $email");
        $a = $conn->query("UPDATE users SET password = '$hashed_password' WHERE email = '$email'");


        echo "Password updated successfully. <a href='index.php'>Login</a>";
    } else {
        echo "Passwords do not match. <a href='reset_password.php?email=$email'>Try Again</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
            color:#1079e9;
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

        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="password"]::placeholder {
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
    <h1>Reset Password</h1>
    <hr>
    <form action="reset_password.php?email=<?php echo htmlspecialchars($email); ?>" method="post">
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your confirm password" required>
        <button type="submit">Update Password</button>
    </form>
</div>
</body>
</html>
