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
<h1 style="color:DarkCyan ;">Add vehicle</h1>

<hr>
<form action="addvehicle2.php" method="POST">
  
    <div class="mb-3">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">office number</label>
            <input type="text" name="office_number" class="form-control" placeholder="enter your office number"
                id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">

        <label for="cars">vehicle type:</label>
        <select name="vehicle_type" id="cars">
            <option value="car">car</option>
            <option value="bike">bike</option>
          
        </select>
        <br/><br/>
            
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">vehicle number</label>
                <input type="text" name="vehicle_no" class="form-control" placeholder="enter your vehicle number"
                    id="exampleInputPassword1" required>
            </div>
            


                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>









    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>