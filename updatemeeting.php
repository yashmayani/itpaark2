<?php
include("./confing.php");

// echo '<pre>';
// print_r($students);

    
if(isset($_POST['edit'])){
    $topic=$_POST['topic'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $location=$_POST['location'];
    $id=$_POST['meeting_id'];


    $updatemeeting=$conn->query("UPDATE meeting SET topic = '$topic', date = '$date', time = '$time', location = '$location' WHERE meeting_id = '$id'");
       if ($updatemeeting) {
        header("Location:viewmeeting.php");
       } else {
        echo "error";
       }
    }
   
$id=$_GET['id'];
$users=$conn->query("select * from meeting where meeting_id='$id'")->fetch_all();  
// print_r('/<pre>');
// print_r($users);


?>

<!-- 
<form action="updatemeeting.php" method="POST">
    <lable>topic</lable>
    <input type="text" value="<?php echo $users[0][4] ?>"name= "topic" /><br/>
    <lable>date</lable>
    <input type="date" value="<?php echo $users[0][2] ?>"name= "date" /></br/>
    <lable></lable>time
    <input type="time" value="<?php echo $users[0][3] ?>"name= "time" /><br/>
    <lable>location</lable>
    <input type="text" value="<?php echo $users[0][1] ?>"name= "location" /><br/>


    <input type="hidden" value="<?php echo $id ?>" name="meeting_id"/>
    <br />
    

    <button name="edit">submit</button>
</form> -->



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
<h1 style="color:DarkCyan ;">Update Meeting</h1>

<hr>
<form action="updatemeeting.php" method="POST">
        
    <div class="mb-3">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">topic</label>
            <input type="text" value="<?php echo $users[0][4] ?>"name="topic" class="form-control" placeholder="enter your meeting topic"
                id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
       
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">date</label>
                <input type="date"  value="<?php echo $users[0][2] ?>"name="date" class="form-control" placeholder="enter your date"
                    id="exampleInputPassword1" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">time</label>
                <input type="time" value="<?php echo $users[0][3] ?>"name="time" class="form-control" placeholder="enter your time"
                    id="exampleInputPassword1" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">location</label>
                <input type="text" value="<?php echo $users[0][1] ?>"name="location" class="form-control" placeholder="enter your meeting location"
                    id="exampleInputPassword1" required>
            </div>
            

            <input type="hidden" value="<?php echo $id ?>" name="meeting_id"/>
    <br />
    

    <button name="edit" class="btn btn-primary">submit</button>
</form>









    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>