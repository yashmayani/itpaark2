<?php
include("./confing.php");
include("./navbar2.php");

// Initialize variables
$users = [];

// Check if search form is submitted
if (isset($_GET['search'])) {
    // Sanitize the search term to prevent SQL injection
    $searchTerm = htmlspecialchars($_GET['search']);
    // Modify the query with search term
    $query = "SELECT * FROM users WHERE name LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%' OR contact_number LIKE '%$searchTerm%'";
} else {
    // Default query to fetch all users
    $query = "SELECT * FROM users";
}

// Execute query
$result = $conn->query($query);

if ($result) {
    $users = $result->fetch_all();
}

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

        padding-block: 30px;
        margin-block: 60px;
        box-shadow: 0 0 10px rgba(179, 165, 165, 0.5);
        border-radius: 20px;

    }

    #vehicleTable,
    #vehicleTable * {
        border: none;
        border-radius: 0px;
    }

    #vehicleTable_filter {
        border-bottom: 1px solid black;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }

    .search-header {
        margin-inline: 10px;
    }

    .search-header label {
        display: flex;
        justify-content: start;

    }

    .dataTables_length {
        display: none;
    }

    .dataTables_info {
        display: none;
    }

    .delete-modal {
        text-align: center;

    }

    .delete-modal2 {
        height: 300px;
        width: 300px;
        padding: 20px;
        background-color: white;
        border-radius: 10px !important;
    }

    .yash {
        display: flex;
        justify-content: center;
        ;
        gap: 15px;
        margin-bottom: 25px;

    }

    .logouts {
        color: white;
        background-color: #524FFF;
    }

    /* #tableSearch{
    width: 20%;
    height: 40px !important;
    margin-bottom:20px;
    border:1px solid #c6bdbdf5  !important; 
    box-shadow:none; 
    border-radius:8px;
} */

    .input-wrapper {
        position: relative;
        display: inline-block;
        width: 20%;


    }

    .input-wrapper input {
        padding-left: 40px;
        /* Space for the icon */
        height: 35px !important;

        box-shadow: none;
        border-radius: 7px;
        border: 1px solid #c6bdbdf5 !important;

    }

    .input-wrapper svg {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        height: 24px;
        /* Adjust size as needed */
        width: 24px;
        fill: #c6bdbdf5;
        /* SVG color */
    }

    input::placeholder {
        color: #c6bdbdf5 !important;
        /* Change this to your desired color */
    }

    ul.pagination * {
        margin-top: 10px;
        border: none;
        border-radius: 7px;
        background-color: white;
        color: #a8aaac;
        font-size: 15px;
        /* Adjust the font size as needed */


    }

    .page-item.active .page-link {
        background-color: #524FFF;
        box-shadow: none;

    }
    </style>
</head>

<body>
    <div class="container users_maindiv">
        <div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 style="font-size: 30px;">Members</h2>

            </div>
            <div class="input-wrapper">

                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#5f6368">
                    <path
                        d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                </svg>
                <input type="text" id="tableSearch" class="form-control form-control-sm" placeholder="Search...">
            </div>
            <hr style="border:1px solid black !important;">
            <table id="vehicleTable" class="table table-striped table-bordered" style="width:100%">
                <thead>

                    <tr>
                        <th>Office Number</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $u) { ?>
                    <tr>
                        <td><?php echo $u[1]; ?></td>
                        <td><?php echo $u[2]; ?></td>
                        <td><?php echo $u[3]; ?></td>
                        <td><?php echo $u[4]; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS and jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
    // $(document).ready(function() {
    //     // Initialize DataTables with custom layout
    //     $('#vehicleTable').DataTable({
    //         "dom": '<"row"<"col-sm-6"l><"col-sm-6 text-center"f>>tip', // Place search input (f) on the right side
    //     });
    // });
    $(document).ready(function() {
        if ($.fn.DataTable.isDataTable('#vehicleTable')) {
            $('#vehicleTable').DataTable().clear().destroy();
        }
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

    document.addEventListener('DOMContentLoaded', function() {
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    });
    </script>

</body>

</html>