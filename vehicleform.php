<?php

session_start(); // Start session to store messages

include("./confing.php");
include("./navbar2.php");

   
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
    if (isset($_POST['delete'])) {
    $vehicle_id_to_delete = $_POST['delete_vehicle_id'];

    // Perform your deletion query here
    $delete_query = "DELETE FROM vehicle WHERE vehicle_id = $vehicle_id_to_delete";
    $result = $conn->query($delete_query);

    if ($result) {
        // Deletion successful, redirect or show success message
        header("Location: vehicleform.php");
        exit();
    } else {
        // Deletion failed, handle error
        echo "Error deleting vehicle.";
    }
}


// Fetching vehicles data
$vehicles = $conn->query("SELECT * FROM vehicle")->fetch_all();

// echo "<pre>";
// print_r($vehicles);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles Data</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <style>
    .users_maindiv {

        padding-block:30px;
        margin-block:60px;
        box-shadow: 0 0 10px rgba(179, 165, 165, 0.5);
        border-radius: 20px;

    }
    #vehicleTable_filter{
        border-bottom:1px solid black;
        padding-bottom:15px;
        margin-bottom:20px;
    }
    .search-header{
        margin-inline:10px;
    }
    .search-header label{
        display: flex;
        justify-content:start;

    }
    .dataTables_length{
        display: none;
    }
    /* Styling for the delete button */
.btn-outline-danger {
    color: red; /* Text color */
    border-color: red; /* Border color */
    
}

.btn-outline-danger .icon {
    fill: red; /* Default color for the icon */
    transition: fill 0.3s; /* Smooth transition for color change */
}

/* Change icon color on button hover and focus */
.btn-outline-danger:hover .icon,
.btn-outline-danger:focus .icon,
.btn-outline-danger:active .icon {
    fill: white; /* Icon color on hover/focus/active */
}

/* Button styling for outline-success */
.btn-outline-primary {
    color: blue; /* Text color */
    border-color: blue; /* Border color */

}

/* SVG icon color */
.btn-outline-primary .icon {
    fill: blue; /* Default icon color */
    transition: fill 0.3s; /* Smooth transition for color change */
    
}

/* Change icon color on button hover, focus, and active */
.btn-outline-primary:hover .icon,
.btn-outline-primary:focus .icon,
.btn-outline-primary:active .icon {
    fill: white; /* Icon color on hover/focus/active */
}

/* Optional: change text color on hover/focus/active */
.btn-outline-primary:hover,
.btn-outline-primary:focus,
.btn-outline-primary:active {
    color: white; /* Text color on hover/focus/active */
}

 
thead *{
    border:none !important;
}
.dataTables_info{
    display: none;
}
.modal-header {
    text-align: center;
}

.delete-modal {
    text-align: center;
}

.delete-modal2{
    height: 300px;
    width:300px;
    padding:20px;
    background-color:white;
    border-radius: 10px !important;

}
.update-modal2{
    height: 330px;
    width:350px;
    border-radius: 10px !important;

}
.it{
    margin-top:5px;
    background-color:#524FFF !important;
    color:white;

}
.add-modal2{
    height: 330px;
    width:350px;
    border-radius: 10px !important;

}

.yash{
    display:flex;
    justify-content:center;;
    gap:15px;
    margin-bottom:25px;

}

p{
    margin-top:15px;
}

#tableSearch{
    width: 20%;
    margin-bottom:20px;
}
.space{
     display:flex;
     gap:20px !important;
}


.search-create-wrapper {
    display: flex;
    justify-content: space-between; /* Space between the items */
    align-items: center; /* Align items vertically */
}

#tableSearch {
    width: 20%;
    margin-bottom:10px;
    margin-top:20px;
    
}



.btn {
    /* Ensure the button doesn’t exceed its content width */
    white-space: nowrap;
}
.logouts{
    color:white;
    background-color:#524FFF;
}
.input-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;

            
        }
        .input-wrapper input {
            padding-left: 40px; /* Space for the icon */
            height: 35px !important;

            box-shadow:none; 
            border-radius:7px;
            border:1px solid #c6bdbdf5  !important; 

        }
        .input-wrapper svg {
            position: absolute;
            left: 10px;
            top: 60%;
            transform: translateY(-50%);
            height: 24px; /* Adjust size as needed */
            width: 24px;
            fill: #c6bdbdf5; /* SVG color */
        }
        input::placeholder {
  color: #c6bdbdf5 !important; /* Change this to your desired color */
}

ul.pagination * {
    margin-top:10px;
    border: none;
    border-radius:7px;
    background-color:white;
    color:#a8aaac;
    font-size: 15px; /* Adjust the font size as needed */

    
}
.page-item.active .page-link {
    background-color:#524FFF;
    box-shadow:none;
    
}
.added{
    color:white;
    background-color:#524FFF;

}

.yass{
    background-color:#ebecef;
    padding:15px;
    width: min-content;
    display:flex;
    justify-content:center;
    border-radius:13px;
}

    </style>
</head>

<body>
    
    <div class="container">
        <div class="users_maindiv p-3">
        <div class="d-flex justify-content-between">
            <h2 style="font-size: 30px;">Vehicles</h2>
            
        </div>
        <div class="search-create-wrapper">
        <div class="input-wrapper">

        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
        <input type="text" id="tableSearch" class="form-control form-control-sm" placeholder="Search...">
</div>
        <a href="#" class="btn added   btn-sm " data-bs-toggle="modal"
                data-bs-target="#createMeetingModal" style="width: 75px; height:35px; ">Add +</a>
</div>

        <hr style="border:1px solid black !important;">

        <table id="vehicleTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Office Number</th>
                    <th>Vehicle Type</th>
                    <th>Vehicle Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vehicles as $v) { ?>
                <tr>
                    <td><?php echo $v[1]; ?></td>
                    <td>
                        <?php if ($v[2] === 'car'): ?>

                        <!-- Output for car -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-car-front-fill" viewBox="0 0 16 16">
                            <path
                                d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                        </svg>

                        <?php elseif ($v[2] === 'bike'): ?>
                        <!-- Output for bike -->
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#5f6368">
                            <path
                                d="M207.62-92.31q-77.93 0-132.77-54.92Q20-202.15 20-280.08 20-358 74.92-412.85q54.93-54.84 132.85-54.84 77.92 0 132.77 54.92 54.84 54.92 54.84 132.85 0 77.92-54.92 132.77-54.92 54.84-132.84 54.84Zm-.02-60q53.17 0 90.48-37.21 37.31-37.22 37.31-90.39t-37.22-90.48q-37.22-37.3-90.39-37.3-53.16 0-90.47 37.21Q80-333.26 80-280.09t37.22 90.48q37.21 37.3 90.38 37.3ZM450-210v-198.85L316.62-517.39q-10.47-9.46-15.89-22.13-5.42-12.67-5.42-26.65 0-13.98 5.73-26.37 5.73-12.38 15.58-22.23l114.3-114.31q10.47-10.46 24.22-15.88 13.76-5.42 28.85-5.42 15.09 0 28.86 5.42 13.76 5.42 24.23 15.88l76 76q28 28 63.42 44.2 35.42 16.19 75.04 18.11V-530q-52.77-1.92-100.23-22.96t-84.39-57.96L528-649.85 420.46-542.31 510-448.77V-210h-60Zm162.31-532.31q-29.16 0-49.58-20.42-20.42-20.42-20.42-49.58 0-29.15 20.42-49.57 20.42-20.43 49.58-20.43 29.15 0 49.57 20.43 20.43 20.42 20.43 49.57 0 29.16-20.43 49.58-20.42 20.42-49.57 20.42Zm139.92 650q-77.92 0-132.77-54.92-54.84-54.92-54.84-132.85 0-77.92 54.92-132.77 54.92-54.84 132.84-54.84 77.93 0 132.77 54.92Q940-357.85 940-279.92q0 77.92-54.92 132.77-54.93 54.84-132.85 54.84Zm-.01-60q53.16 0 90.47-37.21Q880-226.74 880-279.91t-37.22-90.48q-37.21-37.3-90.38-37.3-53.17 0-90.48 37.21-37.31 37.22-37.31 90.39t37.22 90.48q37.22 37.3 90.39 37.3Z" />
                        </svg>

                        <?php else: ?>

                        <!-- Output for other cases (optional) -->
                        <?php endif; ?>
                        <!-- <?php echo $v[2]; ?> -->

                    </td>

                    <td><?php echo $v[4]; ?></td>

                    
                    
                    <td class="space">
                    <button type="button" class="btn btn-outline-danger delete-btn" data-id="<?php echo $v[0]; ?>" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal<?php echo $v[0]; ?>">
    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="icon">
        <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
    </svg>
    <b>Delete</b>
</button>



<div class="modal fade" id="deleteConfirmationModal<?php echo $v[0]; ?>" tabindex="-1" aria-labelledby="editMeetingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content delete-modal2">
            <div class="modal">
            
            
            </div>
            
            <div class="modal-body delete-modal">
<center>
        <div class="yass">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#FA2020"  ><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                        
        </div>
                        </center>
            <p style=color:#FA2020;><b>Delete</b></p>
            <p>Are you want to sure delete Vehicle?</p>
            

            </div>
            <div class="yash">
                <button type="button" data-bs-dismiss="modal"  style="background-color:#ebecef; color: black; border-radius: 5px !important; width: 90px; height: 38px; border:none;"
                data-dismiss="modal">Cancle</button>
                <form action="deletevehicle.php">
                    <input type="hidden" name='id' value="<?php echo $v[0];?>"/>
                <button type="submit" style="background-color:#f13926; color: white; border-radius: 5px !important; width: 90px; height: 38px; border:none;">delete</button>
                </form>
            </div>
        </div>
    </div>
</div>



                    <?php
if ($_SESSION['user_id'] == $v[3]) {
    echo '<a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editMeetingModal' . $v[0] . '">
    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="icon">
        <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
    </svg>
   <b> Edit</b>
</a>';

} else {
    echo ''; // This line might not be necessary unless you have additional logic.
}

?>





                       
                        <div class="modal fade" id="editMeetingModal<?php echo $v[0]; ?>" tabindex="-1"
                            aria-labelledby="editMeetingModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content update-modal2">
                                    <div class="modal-header" >
                                        <h3 class="modal-title" id="editMeetingModalLabel" style="color:#524FFF;">
                                            Update
                                            Vehicles</h3>
                                            <svg data-bs-dismiss="modal"
                                            aria-label="Close" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#565656" style="cursor:pointer;"><path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                                    </div>
                                    <form action="vehicleform.php" method="POST">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="topic" class="form-label">Office number</label>
                                                <input type="text" name="office_number" class="form-control"
                                                    value="<?php echo $v[1]; ?>" required>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">

                                            <div class="mb-3" >

                                                <label class="form-label" for="cars">vehicle type</label>
                                                <select class="form-control" name="vehicle_type" id="cars">
                                                    <option value="car" <?php if($v[2]=='car'){echo 'selected';}?>>car
                                                    </option>
                                                    <option value="bike" <?php if($v[2]=='bike'){echo 'selected';}?>>
                                                        bike</option>

                                                </select>
</div>
</div>

                                                <div class="mb-3 col">
                                                    <label for="exampleInputPassword1" class="form-label">vehicle
                                                        number</label>
                                                    <input type="text" name="vehicle_no" class="form-control"
                                                        value="<?php echo $v[4]; ?>" id="exampleInputPassword1"
                                                        required>
                                                </div>
</div>
                                                <input type='hidden' name="vehicle_id" value='<?php echo $v[0];?>' />
                                                <div class="">
                                                   
                                                    <button type="submit" name="edit"
                                                        class="btn it " style=width:100%;>Submit</button>
                                                </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Modal added vehicle -->
    <div class="modal fade" id="createMeetingModal" tabindex="-1" aria-labelledby="createMeetingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content add-modal2">
                <div class="modal-header">
                    <h3 class="modal-title" id="createMeetingModalLabel" style="color:#3365da;">Add Vehicles</h3>
                    <svg data-bs-dismiss="modal"
                    aria-label="Close" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#565656" style="cursor:pointer;"><path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>                </div>
                <form action="addvehicle2.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">office number</label>
                            <input type="text" name="office_number" class="form-control"
                                placeholder="enter your office number" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required>
                        </div>
                
                        <div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="cars" class="form-label">Vehicle type</label>
            <select name="vehicle_type" id="cars" class="form-select">
                <option value="car">Car</option>
                <option value="bike">Bike</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Vehicle number</label>
            <input type="text" name="vehicle_no" class="form-control" placeholder="Enter your vehicle number" id="exampleInputPassword1" required>
        </div>
    </div>
</div>

                            <div class="">
                                <button type="submit" name="submit" class="btn it" style=width:100%>Submit</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
  




    <!-- End Modal added vehicle-->
    <!-- Bootstrap JS and jQuery (required for DataTables) -->
  

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    

    <script>
    // $(document).ready(function() {
    //     // Initialize DataTables
    //     $('#vehicleTable').DataTable();



    $(document).ready(function() {
            var table = $("#vehicleTable").DataTable({
                language:{
                paginate:{
                    previous:"<",
                    next:">",
                }
            },
                dom: '<"#tableId"t>i<"#paginatorId"lp>',
            });

            var searchBar = $(
                '<input type="text" id="tableSearch" class="form-control form-control-sm" placeholder="Search...">'
            );
            $('.search-header').append(searchBar);

            $('#tableSearch').on('keyup', function() {
                table.search(this.value).draw();
            });
        });

    </script>

</body>

</html>