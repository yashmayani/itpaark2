<?php

include("./confing.php");
include("./navbar2.php");


$vehicles=$conn->query("select * from vehicle ")->fetch_all();
   print_r('<pre>');
  print_r($vehicles);
  ?> 


  <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>DataTables Example</title> 

     jQuery CDN 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 

     Bootstrap CSS (optional, only if using Bootstrap) 
      <link rel="stylesheet" type="text/css"
         href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

      DataTables CSS 
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> 

 DataTables Bootstrap CSS (optional, if using Bootstrap) 
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
 </head>

 <body>

    

     <td>
     <a href="addvehicle.php" class="float-right btn btn-primary btn-sm" style="margin-right: 210px; margin-top: 50px; padding-left: 10px; padding-right: 10px;">Add</a>
        
     </td>

     <div class="container mt-5">
         <h2>Vehicles Data</h2>
         <table id="employeeTable" class="table table-striped table-bordered" style="width:100%">
             <thead>
                 <tr>
                     <th>Office Number</th>
                     <th>Vehicle Type</th>
                     <th>Vehicle Number </th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 <?php foreach($vehicles as $v){?>
                 <tr>
                     <td><?php echo $v[1];?></td>
                     <td><?php echo $v[2];?></td>
                     <td><?php echo $v[4];?></td>
                     
                     <td> <a href='updatevehicle.php?id=<?php echo $v[0];?>' <button type="button" class="btn btn-outline-primary">edit</button>      
                            <a href='deletevehicle.php?id=<?php echo $v[0];?>'<button type="button" class="btn btn-outline-primary" onclick="confirmdelete()">delete</button></td>
                 </tr>
                 <?php }?>
                 <!-- Add more rows as needed -->
              </tbody>
         </table>
     </div>

     <script>
        // Function to display confirmation dialog
   function confirmdelete() {
           if (confirm('Are you sure you want to dalete?')) {
    window.location.href = 'vehicleform.php'; // Redirect to logout script
       }
        
                
    
           
     }
</script> 
     DataTables JavaScript
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> 

     DataTables Bootstrap JavaScript (optional, if using Bootstrap)
     <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

     <script>
     $(document).ready(function() {
         $('#employeeTable').DataTable();
     });
     </script>
 </body>

 </html>