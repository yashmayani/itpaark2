    <?php
    session_start();
    include("./confing.php");
    include("./navbar.php");



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

    <body>

    <body style=" background-color: white;">
        <section class="">
            <div class=" flex-1 d-flex flex-column justify-content-center ">
            <h1 style="color:black;font-size:30px;">Forgote password</h1>
                    <div class="flex-column">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" 
                                id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="text-center mt-3">
                                <button name="login" class="button-submit">submit</button><br/><br/>
                            </div>
            
    
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

        <button type="submit" name="log in" class="btn btn-primary">login</button>
    </form>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
    </body>

    </html>  -->