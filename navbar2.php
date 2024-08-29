<?php
// Initialize $page based on the current page
$page = basename($_SERVER['PHP_SELF']);
// echo $page;
// Include necessary PHP files
include("./confing.php");
include("./session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta property="og:image" content="./site_img/IT PARK.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <title>IT PARK</title>
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="cyan" />
<meta name="theme-color" media="(prefers-color-scheme: dark)" content="black" />
<meta property="og:url" content="https://www.itpark.000.pe/" />

    <link rel="icon" href="./site_img/favicon.png" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboardcss.css">
    <style>
    li a:hover {
        background-color: #e0e0e0;
    }

    .active {
        color: yellow;
        font-weight: 700;
    }

    .container-fluid {
        width: 100%;
        max-width: 1140px;
        margin-right: auto;
        margin-left: auto;
        gap: 160px;
    }
    .modal.show .modal-dialog{
        display:flex !important;
        justify-content:center !important;
    }

    .navbar-collapse {
        display: flex;
        justify-content: space-between; /* Space between items */
    }

    .navbar-nav {
        display: flex;
        flex: 1;
        justify-content: center; /* Center align the nav items */
        gap: 45px;
        margin-right: 10px;
    }

    .d-flex {
        display: flex;
        align-items: center;
    }

    .nav-link {
        color: black;
        margin-right: 20px;
    }

    .nav-item.active {
        text-decoration-line: underline; /* Border for inactive tabs */
        text-underline-offset: 5px; /* Adjust this value to control the space between the text and the underline */
        color: blue !important;
    }

    .nav-item.active .nav-link {
        color: blue !important;
    }

    .modal-content {
        border-radius: 15px !important;
    }

    .modal-header {
        background-color: #e3ebff;
        border-radius: 10px 10px 0 0 !important;
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        
    }
.modal-title{
    font-size:20px;

}
    input, select {
        box-shadow: 0 0 10px rgba(179, 165, 165, 0.3);
        border: none !important;
    }
    .delete-modal{
    text-align:center;
    
}
.delete-modal2{
    height: 300px;
    width:300px;
    padding:20px;
    background-color:white;
    border-radius: 10px !important;
}
.yash{
    display:flex;
    justify-content:center;;
    gap:15px;
    margin-bottom:25px;

}
/* Default container styles */
.container {
    width: 100% !important;
    max-width: 1200px !important; /* Maximum width for larger screens */
    
    
}

/* Responsive adjustments for medium screens (tablets) */
@media (max-width: 768px) {
    .container {
        padding: 0 10px !important; /* Reduced padding for smaller screens */
    }
}

/* Responsive adjustments for small screens (mobile) */
@media (max-width: 576px) {
    .container {
        padding: 0 5px !important; /* Further reduced padding for very small screens */
    }
}

.logouts{
    color:white;
    background-color:#524FFF;

}

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php" style="color: navy;">
                <img class="login-logo" src="site_img\IT PARK.png" width='100' alt="Screenshot">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item <?php echo ($page == 'users.php' ? 'active' : ''); ?>">
                        <a class="nav-link" href="users.php">User</a>
                    </li>
                    <li class="nav-item <?php echo ($page == 'vehicleform.php' ? 'active' : ''); ?>">
                        <a class="nav-link" href="vehicleform.php">Vehicals</a>
                    </li>
                    <li class="nav-item <?php echo ($page == 'viewmeeting.php' ? 'active' : ''); ?>">
                        <a class="nav-link" href="viewmeeting.php">Meeting</a>
                    </li>
                    <li class="nav-item <?php echo ($page == 'viewcomplain.php' ? 'active' : ''); ?>">
                        <a class="nav-link" href="viewcomplain.php">Complains</a>
                    </li>
                </ul>
            </div>
            <div>
                <button class="btn logouts btn-sm px-2" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    Logout
                </button>
            </div>
        </div>
    </nav>

    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content delete-modal2">
                <div class="modal">
                    <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body delete-modal">
                <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="red" style="background-color:#ebecef; border-radius: 10px !important;  width: 50px; height: 40px;"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
                <br/>
                <p style=color:red;><b>Logout</b></p>

                    <p>Are you want to sure  log out this account?</p>
                </div>
                <div class="yash">
                    <button type="button"  data-bs-dismiss="modal" style="background-color:#ebecef; color: black; border-radius: 5px !important; width: 90px; height: 38px; border:none;">Cancel</button>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
