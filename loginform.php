<?php
session_start();
include("./confing.php");
include("./navbar.php");


if (isset($_SESSION['user_id'])) {
    header("Location:dashboard.php"); 
}  

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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="loginform.css">
</head>

<body style=" background-color: white;">
    <section class="">
        <div class=" flex-1 d-flex flex-column justify-content-center ">
            <img class="login-logo" src="site_img\IT PARK.png" width='150' alt="Screenshot">

            <h1 style="color:black;font-size:30px;">Sign in</h1>
            <p style="color:#758694; font-size:13px;">Welcome back! Please enter your details</p>

            <form class="" action="login.php" method="POST">
                <div class="flex-column">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" 
                            id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <!-- <label>Email </label></div>
                        <div  class="inputForm" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" height="20"><g data-name="Layer 3" id="Layer_3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
                            <input  type="email" name="email"placeholder="Enter your Email"   class="input" type="text" required>
                        </div> -->

                    <div class="flex-column">
                        <!-- <label>Password  </label></div>
                            <div  class="inputForm"  >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="-64 0 512 512" height="20"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
                                <input type="password" name="password" placeholder="Enter your Password" class="input" type="password" required>
                            </div> -->
                            <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <div class="input-group">
        <input type="password" name="password" class="form-control"
            placeholder="Enter your password" id="exampleInputPassword1" required>
        <span class="input-group-text" id="showPassword">
            <img src="./site_img/eyes.png" alt="Show Password" id="togglePassword">
        </span>
    </div>
</div>


                        <div class="text-end mt-3">
                            <!-- <a href="recover_email.php" style="color:black; text-decoration: none;"  class="button"><b>Forgote password ?</b></a> -->
                                                        <a href="forgot_password.php" style="color:black; text-decoration: none;"  class="button"><b>Forgote password ?</b></a>


                        </div>
                        <div class="text-center mt-3">
                            <button name="login" class="button-submit">Sign in</button><br/><br/>
                            <p class="lining">Don't have an account? <a class="nav-link" href="registrationform.php"><b>sign up</b></a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex-2">
            <img src="site_img\sign in.png" height='100%' width='100%' alt="Screenshot">
        </div>
    </section>
    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#exampleInputPassword1');

    togglePassword.addEventListener('click', function (e) {
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>

<!-- <form action="login.php" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="enter your email" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
            placeholder="enter your password" required>
    </div>

    <button type="submit"  class="btn btn-primary">login</button>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
 
</form> -->


