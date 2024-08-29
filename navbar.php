<?php
$page = basename($_SERVER['PHP_SELF']);
// echo $page;
include("./confing.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta property="og:url" content="https://www.itpark.000.pe/" />
    <meta property="og:image" content="./site_img/IT PARK.png" />


    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <title>web</title>
    <link rel="icon" href="./site_img/favicon.png" type="image/png">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#524fff" />
<meta name="theme-color" media="(prefers-color-scheme: dark)" content="black" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .active {
        color: yellow;
        font-weight: 700;
        }
    </style>
</head>

<body>



    <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:Navy ;"><b>ITPARK</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="registrationform.php"
                            style="color:darkGreen ;">sign up</a>
                    </li> -->
                    <!-- <li class="nav-item <?php echo ($page == 'registrationform.php' ? 'active' : ''); ?>">
                        <a class="nav-link" href="registrationform.php" style="color: darkgreen;">sign up</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="loginform.php"
                            style="color:darkGreen ;">sign in</a>
                        </li> -->
                        <!-- <li class="nav-item <?php echo ($page == 'loginform.php' ? 'active' : ''); ?>">
                        <a class="nav-link" href="loginform.php" style="color: darkgreen;">sign in</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="login.php" style="color:darkGreen ;">sign in</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="loginform.php" style="color:darkGreen ;">logout</a>
                    </li> -->


                </ul>

            </div>
        </div>
    </nav>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>