<?php

include("./confing.php");
include("./navbar2.php");


$viewmeeting=$conn->query("select * from meeting")->fetch_all();
// print_r('<pre>');
// print_r($viewmeeting);
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
    

<div class="container mt-5">
    <div  class="d-flex justify-content-between">
         <h2>Meeting data</h2>
         <span>
<a href="addmeeting.php" class="btn btn-primary btn-sm" >Create Meeting</a>
        
</span></div>
         <table id="employeeTable" class="table table-striped table-bordered" style="width:100%">
             <thead>
                 <tr>
                    
                     <th>topic</th>
                     <th>date</th>
                     <th>time</th>
                     <th>location</th>
                     <th>action</th>
                 </tr>
             </thead>
             <tbody>
                 <?php foreach($viewmeeting as $a){?>
                 <tr>
                     
                     <td><?php echo $a[4];?></td>
                     <td><?php echo $a[2];?></td>
                     <td><?php echo $a[3];?></td>
                     <td><?php echo $a[1];?></td>
                     <td> <a href='updatemeeting.php?id=<?php echo $a[0];?>' <button type="button" class="btn btn-outline-primary">edit</button>      
                     <a href='deletemeeting.php?id=<?php echo $a[0];?>'<button type="button" class="btn btn-outline-primary" onclick="confirmdelete()">delete</button></td>

                 </tr>
                 <?php }?>

                 <script>
        // Function to display confirmation dialog
        function confirmdelete() {
            if (confirm ('Are you sure you want to dalete?')) {
                window.location.href = 'viewmeeting.php'; // Redirect to logout script
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
</body>
</html>