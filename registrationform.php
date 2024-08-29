<?php
session_start(); // Resume session

include("./confing.php"); // Corrected typo: changed 'confing.php' to 'config.php'
include("./navbar.php");

// Check for session message and display it
if(isset($_SESSION['message'])) {
    echo '<div style="padding: 10px; background-color: #f2dede; color: #a94442;">'.$_SESSION['message'].'</div>';
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="registrationformcss.css">
</head>

<body>
    <section>
        <div class="flex-1 d-flex flex-column justify-content-center py-6" style="height:100%;">
            <img class="login-logo" src="site_img\IT PARK.png" width='150' alt="Screenshot">
            <h1 style="color: black;font-size:25px;font-weight:bold; margin-top:80px;">Sign Up</h1>
            <p class="para">Welcome back! Please enter your details</p>


            <form class="yes" action="register.php" method="POST" onsubmit="return validateForm()">
                <div class="mb-2">
                    <label for="office_number" class="form-label">Office number</label>
                    <input type="text" name="office_number" class="form-control" placeholder="Enter your office number"
                        id="office_number" required>
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" id="name"
                        required>
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email " id="email"
                        required>
                </div>
                <!-- <div class="mb-3">
                <label for="contact_number" class="form-label">Contact number</label>
                <input type="number" name="contact_number" class="form-control" placeholder="Enter your contact number"
                    id="contact_number" required>
            </div> -->
                <div class="mb-2">
                    <label for="contact_number" class="form-label">Contact number</label>
                    <div class="input-group">
                        <span class="input-group-text">+91</span>
                        <input type="text" name="contact_number" class="form-control"
                            placeholder="000 000 0000" id="contact_number" required>
                    </div>
                </div>

                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter your password"
                            id="exampleInputPassword1" required>
                        <span class="input-group-text" id="showPassword">
                            <img src="./site_img/eyes.png" alt="Show Password" id="togglePassword">
                        </span>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="confirmpassword" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" name="confirmpassword" class="form-control"
                            placeholder="Re-Enter your password" id="confirmpassword" required>

                        <span class="input-group-text" id="showPassword">
                            <img src="./site_img/eyes.png" alt="Show Password" id="toggleConfirmPassword">
                        </span>

                    </div>
                </div>
                <div id="passwordError" style="color: #a94442;"></div>

                <div class="text-center mt-6">
                    <button type="submit" name="submit" class="button-submit">Submit</button>
                    <div class="mt-4">Already have an account? <a class="nav-link" href="loginform.php"><b>sign in</b></a></div>
                </div>
            </form>
        </div>
        <div class="flex-2">
            <img src="site_img\sign up.png" height='100%' width='100%' alt="Screenshot">
        </div>
    </section>
    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#exampleInputPassword1');

    togglePassword.addEventListener('click', function(e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Change the icon based on password visibility
        if (type === 'password') {
            this.src = './site_img/eyes.png'; // Replace with your eye icon SVG
            this.alt = 'Show Password';
        } else {
            this.src = './site_img/eyes2.png'; // Replace with your closed eye icon SVG
            this.alt = 'Hide Password';
        }
    });
    </script>
    <script>
    const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
    const confirmPassInput = document.querySelector('#confirmpassword');
    const toggleConfirmPasswordIcon = document.querySelector('#toggleConfirmPasswordIcon');

    toggleConfirmPassword.addEventListener('click', function(e) {
        const type = confirmPassInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassInput.setAttribute('type', type);

        // Change the icon based on password visibility
        if (type === 'password') {
            this.src = './site_img/eyes.png'; // Show Password Icon
            this.alt = 'Show Password';
        } else {
            this.src = './site_img/eyes2.png'; // Hide Password Icon
            this.alt = 'Hide Password';
        }
    });
    </script>

    <script>
    function validateForm() {
        var password = document.getElementById("exampleInputPassword1").value;
        var confirmPassword = document.getElementById("confirmpassword").value;
        var passwordError = document.getElementById("passwordError");

        if (password !== confirmPassword) {
            passwordError.textContent = "Passwords do not match";
            return false;
        } else {
            passwordError.textContent = "";
            return true;
        }
    }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>