<?php

include("./confing.php");
include("./navbar2.php");


$user=$conn->query("SELECT u.name,cc.catagary,c.massage,comp_photo
        FROM complain c
        JOIN users u ON c.users_id = u.users_id
        JOIN complain_catagary cc ON c.comp_catagary_id = cc.comp_catagary_id  order by c.complain_id asc")->fetch_all();
  echo '<pre>';
     print_r($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h2>compain data</h2>
         <table id="employeeTable" class="table table-striped table-bordered" style="width:100%">
             <thead>
                 <tr>
                     <th>complain photo</th>
                     <th>complain catagary</th>
                     <th>complain details</th>
                    
                 </tr>
             </thead>
             <tbody>
                 <?php foreach($user as $v){?>
                 <tr>
                     <!-- <td><?php echo $v[3];?></td> -->
                     
                     <td><?php echo  "<img src='images/$v[3]'  height='100' width='100'>"?></td>
                     
                     <td><?php echo $v[1];?></td>
                     <td><?php echo $v[2];?></td>
                    

                 </tr>
                 <?php }
                 ?>

<!-- <div class="row ">
        <?php

                   foreach ($user as $u){
                    echo " <div class='col-3 m-2 p-3 card' >

                    <div class='container'>

                    <h5 class='card-title'>$u[0]</h5>
                    <h5 class='card-title'>$u[1]</h5>
                    <h5 class='card-title'>$u[2]</h5>
                    <h5 class='card-title'><img src='images/$u[3]' height='100' width='100'></h5>
        
                   
                    </div>
                    </div>";

                   }
                   
        ?> -->

           


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html> 