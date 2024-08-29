<?php
session_start(); 
  include("./confing.php");
  include("./navbar2.php");

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

</head>

<body>
<h1 style="color:DarkCyan ;">Meeting Form</h1>
<hr>

<form action="meeting.php" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Topic</label>
        <input type="text" name="topic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="enter your topic" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Date</label>
        <input type="date" name="date" class="form-control" id="exampleInputPassword1"
            placeholder="DD/MM/YYYY" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Time</label>
        <input type="time" name="time" class="form-control" id="exampleInputPassword1"
            placeholder="00:00:00" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Location</label>
        <input type="text" name="location" class="form-control" id="exampleInputPassword1"
            placeholder="enter your location" required>
    </div>
    

    <button type="submit" name="submit" class="btn btn-primary">submit</button>
</form>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>