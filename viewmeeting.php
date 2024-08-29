<?php
include("./confing.php");
include("./navbar2.php");

$viewmeeting = $conn->query("SELECT m.topic,m.date, m.time, m.location, m.meeting_id, u.name, u.contact_number, u.office_number
FROM meeting m
JOIN users u ON m.users_id = u.users_id
ORDER BY m.meeting_id ASC")->fetch_all();



if(isset($_POST['edit'])){
    $topic = $_POST['topic'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $id = $_POST['meeting_id'];

    $updatemeeting = $conn->query("UPDATE meeting SET topic = '$topic', date = '$date', time = '$time', location = '$location' WHERE meeting_id = '$id'");
    if ($updatemeeting) {
        header("Location: viewmeeting.php");
        exit; // Ensure script stops after redirection
    } else {
        echo "Error updating meeting.";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .users_maindiv {

        padding-block:30px;
        margin-block:60px;
        box-shadow: 0 0 10px rgba(179, 165, 165, 0.5);
        border-radius: 20px;
    
        

    }
    #employeeTable,#employeeTable {
        border-radius:0px;
    }
    #employeeTable_filter{
        border-bottom:1px solid black;
        padding-bottom:15px;
        margin-bottom:20px;
    }
    .search-header{
        margin-inline:20px;
        margin-bottom:10px;
    }
    .search-header label{
        display: flex;
        justify-content:start;
        width:250px;

    }
    .employeeTable_filter,label{
        margin-bottom:10px;
    }
    .dataTables_length{
        display: none;
    }
    .employeeTable_filter,label,input{
        gap:10px;
    }
    .pagination{
        display: flex;
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
.btn-outline-success {
    color: green; /* Text color */
    border-color: green; /* Border color */
}

.btn-outline-success .icon {
    fill: green; /* Default color for the icon */
    transition: fill 0.3s; /* Smooth transition for color change */
}

/* Change icon color on button hover and focus */
.btn-outline-success:hover .icon,
.btn-outline-success:focus .icon,
.btn-outline-success:active .icon {
    fill: white; /* Icon color on hover/focus/active */
}

/* Button styling for outline-success */
.btn-outline-success {
    color: green; /* Text color */
    border-color: green; /* Border color */
}

.dataTables_info{
    display: none;
}
#employeeTable_paginate{
    display:flex;
    justify-content:end;
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
/* #tableSearch{
    width: 17%;
    margin-bottom:20px;
    margin-top:10px;
} */
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
.meeting{
    color:white;
    background-color:#524FFF;
}
.update-modal2{
    height: 400px;
    width:370px;
    border-radius: 10px !important;

}
.it{
    margin-top:5px;
    background-color:#524FFF !important;
    color:white;

}
.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #dee2e6;
}
.add-modal2{
    height: 400px;
    width:370px;
    border-radius: 10px !important;

}
.okay-modal2{
    height: 270px;
    width:360px;
    border-radius: 10px !important;

}
.yass{
    background-color:#ebecef;
    padding:15px;
    width: min-content;
    display:flex;
    justify-content:center;
    border-radius:13px;
}
.wrapper-div{
    display:flex;
    flex-direction:column;
    gap:8px;

}

</style>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    
</head>
<body>
<div class="container">
    <div class="users_maindiv p-3">
    <div class="d-flex justify-content-between">
            <h2 style="font-size: 30px;">Meeting</h2>
        
    </div>
    <div class="">
    <div class="search-create-wrapper">
    <div class="input-wrapper">

<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>    
        <input type="text" id="tableSearch" class="form-control form-control-sm" placeholder="Search...">
</div>
        <a href="#" class="btn meeting btn-sm " data-bs-toggle="modal" data-bs-target="#createMeetingModal">Create Meeting</a>
    </div>
</div>

    <hr style="border:1px solid black !important;">
    <table id="employeeTable" class="table table-striped " style="width:100%">
        <thead>
            <tr>
                
                <th>Date</th>
                <th>Time</th>
                <th>Meeting Topic</th>
                <th>Meeting Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($viewmeeting as $meeting): ?>
                <tr >
                    <td><?php echo $meeting[1]; ?></td>
                    <td><?php echo date("h:i
 A", strtotime($meeting[2]));  ?></td>
                     <td><?php echo $meeting[0]; ?></td>

                    <td><?php echo $meeting[3]; ?></td>
                    <td class="space">
                    <a href="#" onclick="func(e)" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $meeting[4]; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="icon"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg><b>View</b></a>
            
                    <a href="#" onclick="func(e)" class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#editMeetingModal<?php echo $meeting[4]; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="icon"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg><b>Edit</b></a>                      
                    <button type="button" class="btn btn-outline-danger delete-btn" data-id="<?php echo $v[0]; ?>" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal<?php echo $meeting[4]; ?>">
    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="icon">
        <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
    </svg>
    <b>Delete</b>
</button>



<div class="modal fade" id="deleteConfirmationModal<?php echo $meeting[4]; ?>" tabindex="-1" aria-labelledby="editMeetingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content delete-modal2">
            <div class="modal ">
            
            
            </div>
            <div class="modal-body delete-modal">

            <center>
        <div class="yass">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="red"  style="background-color:#ebecef; border-radius: 10px !important;  width: 30px; height: 30px;"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
            </div>
            <center>
            <p style=color:red;><b>Delete</b></p>
            <p>Are you want to sure delete meeting?</p>
            

            </div>
            <div class="yash">
                <button type="button" data-bs-dismiss="modal"  style="background-color:#ebecef; color: black; border-radius: 5px !important; width: 90px; height: 38px; border:none;"
                data-dismiss="modal">Cancle</button>
                <form action="deletemeeting.php">
                    <input type="hidden" name='id' value="<?php echo $meeting[4];?>"/>
                <button type="submit" style="background-color:#f13926; color: white; border-radius: 5px !important; width: 90px; height: 38px; border:none;">delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
                     
                    
                    
                    
                    
                    
                    
                    
                    
                     <div class="modal fade" id="editMeetingModal<?php echo $meeting[4]; ?>" tabindex="-1" aria-labelledby="editMeetingModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content update-modal2">
                            <div class="modal-header">
                                <h3 class="modal-title" id="editMeetingModalLabel" style="color:#3365da;">Update Meeting</h3>
                                <svg data-bs-dismiss="modal"
                                aria-label="Close" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#565656" style="cursor:pointer;"><path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>                            </div>
                            <form action="viewmeeting.php" method="POST">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="topic" class="form-label">Topic</label>
                                        <input type="text" name="topic" class="form-control" value="<?php echo $meeting[0]; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" name="location" class="form-control" value="<?php echo $meeting[3]; ?>" required>
                                    </div>
                                    <div class="row">
                                    <div class="mb-3 col">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" name="date" class="form-control" value="<?php echo $meeting[1]; ?>" required>
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="time" class="form-label">Time</label>
                                        <input type="time" name="time" class="form-control" value="<?php echo $meeting[2]; ?>" required>
                                    </div>
            </div>
                                    <input type="hidden" name="meeting_id" value="<?php echo $meeting[4]; ?>">
                                
            
                                <div class="">
                                    <button type="submit" name="edit" class="btn it" style=width:100%>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
                </td>
                </tr>
                <div class="modal fade" id="exampleModal<?php echo $meeting[4];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content okay-modal2">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:#3365da;">Meeting</h5>
        <svg data-bs-dismiss="modal"
        aria-label="Close" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#565656" style="cursor:pointer;"><path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>      </div>
      <div class="modal-body " style="margin-top:8px;" >
        <div class='wrapper-div'>
        <div class=" a d-flex flex-row">

        <b>Office number :</b><span><?php echo $meeting[7]; ?></span>
            </div>
            <div class="b d-flex flex-row">
    
       <b> User name  : </b> <?php echo $meeting[5]; ?>
       </div>

       <div class="c d-flex flex-row">
        <b>Topic  : </b><?php echo $meeting[0]; ?>
        </div>

        <div class="d d-flex flex-row">

       <b> Date  : </b> <?php echo $meeting[1]; ?>
       </div>

       <div class="e d-flex flex-row">

       <b> Mobile number  :</b><?php echo $meeting[6]; ?>
       </div>
            </div>



        
      </div>
      
    </div>
  </div>
</div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
          <!-- Edit Meeting Modal -->
       
        </tbody>
    </table>
</div>

<!-- Create Meeting Modal -->
<div class="modal fade" id="createMeetingModal" tabindex="-1" aria-labelledby="createMeetingModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content add-modal2">
            <div class="modal-header">
                <h3 class="modal-title" id="createMeetingModalLabel" style="color:#3365da;">Create Meeting</h3>
                <svg data-bs-dismiss="modal"
                aria-label="Close" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#565656"   style="cursor:pointer;"><path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>                            </div>
            <form action="addmeeting2.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="topic" class="form-label">Topic</label>
                        <input type="text" name="topic" class="form-control" placeholder="Enter  your meeting topic" id="topic" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" placeholder="Enter your meeting location" id="location" required>
                    </div>
                    <div class="row">
                    <div class="mb-3 col ">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" id="date" required>
                    </div>
                    <div class="mb-3 col">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" name="time" class="form-control" id="time" required>
                    </div>
            </div>
            
                <div class="">
                    <button type="submit" name="submit" class="btn btn-primary" style=width:100%;>Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
            </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script>
         $(document).ready(function() {
            var table = $("#employeeTable").DataTable({
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

    $('.delete-btn').on('click', function() {
    var meetingId = $(this).data('id');
    console.log(meetingId);
    $('#deleteConfirmationModal' + meetingId).modal('show'); // Show corresponding delete confirmation modal
});
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
</body>
</html>