<?php
include("./confing.php");

// echo '<pre>';
// print_r($students);

    
if(isset($_POST['edit'])){
    $office_number=$_POST['office_number'];
    $vehicle_type=$_POST['vehicle_type'];
    $vehicle_no=$_POST['vehicle_no'];
    $id=$_POST['vehicle_id'];


    $updatevehial=$conn->query("UPDATE vehicle SET office_number = '$office_number', vehicle_type = '$vehicle_type', vehicle_no = '$vehicle_no' WHERE vehicle_id = $id");
       if ($updatevehial) {
        header("Location:vehicleform.php");
       } else {
        echo "error";
       }
    }
   
$id=$_GET['id'];
$users=$conn->query("select * from vehicle where vehicle_id='$id'")->fetch_all();  
// print_r('<pre>');
// print_r($users);


?>

<!-- <form action="updatevehicle.php" method="POST">
    
    <lable>office_number</lable>
    <input type="text" value="<?php echo $users[0][1] ?>"name= "office_number" /><br/>
    <lable>vehicle_type</lable>
    <input type="text" value="<?php echo $users[0][2] ?>"name= "vehicle_type" /></br/>
    <lable>vehicle_no</lable>
    <input type="text" value="<?php echo $users[0][4] ?>"name= "vehicle_no" /><br/>


    <input type="hidden" value="<?php echo $id ?>" name="vehicle_id"/>
    <br />
    

    <button name="edit">submit</button>
</form -->


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
<h1 style="color:DarkCyan ;">Update vehicle</h1>

<hr>
<form action="updatevehicle.php" method="POST">
  
    <div class="mb-3">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">office number</label>
            <input type="text" value="<?php echo $users[0][1] ?>" name="office_number" class="form-control" placeholder="enter your office number"
                id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">

        <label for="cars">vehicle type:</label>
        <select value="<?php echo $users[0][2] ?>"name="vehicle_type" id="cars">
            <option value="car">car</option>
            <option value="bike">bike</option>
          
        </select>
        <br/><br/>
            
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">vehicle number</label>
                <input type="text"  value="<?php echo $users[0][4] ?>"name="vehicle_no" class="form-control" placeholder="enter your vehicle number"
                    id="exampleInputPassword1" required>
            </div>
            
            <input type="hidden" value="<?php echo $id ?>" name="vehicle_id"/>
            <button name="edit"  class="btn btn-primary">submit</button>
    <br />


                
</form>









    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>