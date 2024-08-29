<?php
session_start(); // Start session to store messages

include "./confing.php";
include "./navbar2.php";

$complain_catagary = $conn
    ->query("SELECT * FROM complain_catagary")
    ->fetch_all();

// echo '<pre>';
// var_dump($complain_catagary);

// Fetch all complaints
$userAllRaw = $conn
    ->query(
        "
    SELECT u.name, cc.catagary, c.massage, c.status, c.complain_id, u.contact_number, u.office_number, ci.img_id, ci.img
    FROM complain c
    JOIN users u ON c.users_id = u.users_id
    JOIN complain_catagary cc ON c.comp_catagary_id = cc.comp_catagary_id
    LEFT JOIN comp_images ci ON c.complain_id = ci.c_id
    ORDER BY c.complain_id ASC
"
    )
    ->fetch_all(MYSQLI_ASSOC);

$userAll = [];

// echo "<pre>";
// var_dump($userAllRaw);
foreach ($userAllRaw as $row) {
    $complainId = $row["complain_id"];

    // If the complaint doesn't exist in $userAll array yet, add it
    if (!isset($userAll[$complainId])) {
        $userAll[$complainId] = [
            "name" => $row["name"],
            "catagary" => $row["catagary"],
            "massage" => $row["massage"],
            "status" => $row["status"],
            "complain_id" => $complainId,
            "contact_number" => $row["contact_number"],
            "office_number" => $row["office_number"],
            "images" => [],
        ];
    }

    // Add image to the 'images' array for the corresponding complaint
    if ($row["img_id"] !== null) {
        $userAll[$complainId]["images"][] = [
            "img_id" => $row["img_id"],
            "img" => $row["img"],
        ];
    }
}

// Resetting array keys to have a sequential array
$userAll = array_values($userAll);

// echo "<pre>";
// var_dump($userAll);
// Fetch counts for different statuses
$countAll = count($userAll);
$countsolved = $conn
    ->query("SELECT COUNT(*) FROM complain WHERE status = 'solved'")
    ->fetch_row()[0];
$countpanding = $conn
    ->query("SELECT COUNT(*) FROM complain WHERE status = 'Panding'")
    ->fetch_row()[0];
$countService = $conn
    ->query("SELECT COUNT(*) FROM complain WHERE comp_catagary_id = 1")
    ->fetch_row()[0]; // Assuming service category ID is 1
$countPower = $conn
    ->query("SELECT COUNT(*) FROM complain WHERE comp_catagary_id = 2")
    ->fetch_row()[0]; // Assuming power category ID is 2
$countcleaning = $conn
    ->query("SELECT COUNT(*) FROM complain WHERE comp_catagary_id = 3")
    ->fetch_row()[0]; // Assuming cleaning category ID is 3
$countfiresefety = $conn
    ->query("SELECT COUNT(*) FROM complain WHERE comp_catagary_id = 4")
    ->fetch_row()[0]; // Assuming fire-sefety category ID is 4

// Determine filter
$filter = isset($_GET["filter"]) ? $_GET["filter"] : "all";
switch ($filter) {
    case "solved":
        $userAllRaw = $conn
            ->query(
                "SELECT u.name, cc.catagary, c.massage, c.status, c.complain_id, u.contact_number, u.office_number, ci.img_id, ci.img
                FROM complain c
                JOIN users u ON c.users_id = u.users_id
                JOIN complain_catagary cc ON c.comp_catagary_id = cc.comp_catagary_id
                LEFT JOIN comp_images ci ON c.complain_id = ci.c_id
                WHERE c.status = 'solved'
                ORDER BY c.complain_id ASC
                "
            )
            ->fetch_all(MYSQLI_ASSOC);
        $userAll = [];

        foreach ($userAllRaw as $row) {
            $complainId = $row["complain_id"];

            if (!isset($userAll[$complainId])) {
                $userAll[$complainId] = [
                    "name" => $row["name"],
                    "catagary" => $row["catagary"],
                    "massage" => $row["massage"],
                    "status" => $row["status"],
                    "complain_id" => $complainId,
                    "contact_number" => $row["contact_number"],
                    "office_number" => $row["office_number"],
                    "images" => [],
                ];
            }

            if ($row["img_id"] !== null) {
                $userAll[$complainId]["images"][] = [
                    "img_id" => $row["img_id"],
                    "img" => $row["img"],
                ];
            }
        }

        $user = array_values($userAll);

        break;
    case "panding":
        $userAllRaw = $conn
            ->query(
                "SELECT u.name, cc.catagary, c.massage, c.status, c.complain_id, u.contact_number, u.office_number, ci.img_id, ci.img
            FROM complain c
            JOIN users u ON c.users_id = u.users_id
            JOIN complain_catagary cc ON c.comp_catagary_id = cc.comp_catagary_id
            LEFT JOIN comp_images ci ON c.complain_id = ci.c_id
            WHERE c.status = 'panding'
            ORDER BY c.complain_id ASC
            "
            )
            ->fetch_all(MYSQLI_ASSOC);
        $userAll = [];

        foreach ($userAllRaw as $row) {
            $complainId = $row["complain_id"];

            if (!isset($userAll[$complainId])) {
                $userAll[$complainId] = [
                    "name" => $row["name"],
                    "catagary" => $row["catagary"],
                    "massage" => $row["massage"],
                    "status" => $row["status"],
                    "complain_id" => $complainId,
                    "contact_number" => $row["contact_number"],
                    "office_number" => $row["office_number"],
                    "images" => [],
                ];
            }

            if ($row["img_id"] !== null) {
                $userAll[$complainId]["images"][] = [
                    "img_id" => $row["img_id"],
                    "img" => $row["img"],
                ];
            }
        }

        $user = array_values($userAll);
        break;
    case "service":
        $userAllRaw = $conn
            ->query(
                "SELECT u.name, cc.catagary, c.massage, c.status, c.complain_id, u.contact_number, u.office_number, ci.img_id, ci.img
            FROM complain c
            JOIN users u ON c.users_id = u.users_id
            JOIN complain_catagary cc ON c.comp_catagary_id = cc.comp_catagary_id
            LEFT JOIN comp_images ci ON c.complain_id = ci.c_id
            WHERE cc.catagary = 'service'
            ORDER BY c.complain_id ASC
            "
            )
            ->fetch_all(MYSQLI_ASSOC);
        $userAll = [];

        foreach ($userAllRaw as $row) {
            $complainId = $row["complain_id"];

            if (!isset($userAll[$complainId])) {
                $userAll[$complainId] = [
                    "name" => $row["name"],
                    "catagary" => $row["catagary"],
                    "massage" => $row["massage"],
                    "status" => $row["status"],
                    "complain_id" => $complainId,
                    "contact_number" => $row["contact_number"],
                    "office_number" => $row["office_number"],
                    "images" => [],
                ];
            }

            if ($row["img_id"] !== null) {
                $userAll[$complainId]["images"][] = [
                    "img_id" => $row["img_id"],
                    "img" => $row["img"],
                ];
            }
        }

        $user = array_values($userAll);
        break;
    case "power":
        $userAllRaw = $conn
            ->query(
                "SELECT u.name, cc.catagary, c.massage, c.status, c.complain_id, u.contact_number, u.office_number, ci.img_id, ci.img
            FROM complain c
            JOIN users u ON c.users_id = u.users_id
            JOIN complain_catagary cc ON c.comp_catagary_id = cc.comp_catagary_id
            LEFT JOIN comp_images ci ON c.complain_id = ci.c_id
            WHERE cc.catagary = 'power'
            ORDER BY c.complain_id ASC
            "
            )
            ->fetch_all(MYSQLI_ASSOC);
        $userAll = [];

        foreach ($userAllRaw as $row) {
            $complainId = $row["complain_id"];

            if (!isset($userAll[$complainId])) {
                $userAll[$complainId] = [
                    "name" => $row["name"],
                    "catagary" => $row["catagary"],
                    "massage" => $row["massage"],
                    "status" => $row["status"],
                    "complain_id" => $complainId,
                    "contact_number" => $row["contact_number"],
                    "office_number" => $row["office_number"],
                    "images" => [],
                ];
            }

            if ($row["img_id"] !== null) {
                $userAll[$complainId]["images"][] = [
                    "img_id" => $row["img_id"],
                    "img" => $row["img"],
                ];
            }
        }

        $user = array_values($userAll);
        break;
    case "cleaning":
        $userAllRaw = $conn
            ->query(
                "SELECT u.name, cc.catagary, c.massage, c.status, c.complain_id, u.contact_number, u.office_number, ci.img_id, ci.img
            FROM complain c
            JOIN users u ON c.users_id = u.users_id
            JOIN complain_catagary cc ON c.comp_catagary_id = cc.comp_catagary_id
            LEFT JOIN comp_images ci ON c.complain_id = ci.c_id
            WHERE cc.catagary = 'cleaning'
            ORDER BY c.complain_id ASC
            "
            )
            ->fetch_all(MYSQLI_ASSOC);
        $userAll = [];

        foreach ($userAllRaw as $row) {
            $complainId = $row["complain_id"];

            if (!isset($userAll[$complainId])) {
                $userAll[$complainId] = [
                    "name" => $row["name"],
                    "catagary" => $row["catagary"],
                    "massage" => $row["massage"],
                    "status" => $row["status"],
                    "complain_id" => $complainId,
                    "contact_number" => $row["contact_number"],
                    "office_number" => $row["office_number"],
                    "images" => [],
                ];
            }

            if ($row["img_id"] !== null) {
                $userAll[$complainId]["images"][] = [
                    "img_id" => $row["img_id"],
                    "img" => $row["img"],
                ];
            }
        }

        $user = array_values($userAll);
        break;
    case "fire-sefety":
        $userAllRaw = $conn
            ->query(
                "SELECT u.name, cc.catagary, c.massage, c.status, c.complain_id, u.contact_number, u.office_number, ci.img_id, ci.img
            FROM complain c
            JOIN users u ON c.users_id = u.users_id
            JOIN complain_catagary cc ON c.comp_catagary_id = cc.comp_catagary_id
            LEFT JOIN comp_images ci ON c.complain_id = ci.c_id
            WHERE cc.catagary = 'fire-sefety'
            ORDER BY c.complain_id ASC
            "
            )
            ->fetch_all(MYSQLI_ASSOC);
        $userAll = [];

        foreach ($userAllRaw as $row) {
            $complainId = $row["complain_id"];

            if (!isset($userAll[$complainId])) {
                $userAll[$complainId] = [
                    "name" => $row["name"],
                    "catagary" => $row["catagary"],
                    "massage" => $row["massage"],
                    "status" => $row["status"],
                    "complain_id" => $complainId,
                    "contact_number" => $row["contact_number"],
                    "office_number" => $row["office_number"],
                    "images" => [],
                ];
            }

            if ($row["img_id"] !== null) {
                $userAll[$complainId]["images"][] = [
                    "img_id" => $row["img_id"],
                    "img" => $row["img"],
                ];
            }
        }

        $user = array_values($userAll);
        break;

    default:
        // 'all' or unrecognized filter, show all complaints
        $user = $userAll;
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">


    <style>
    .users_maindiv {

        padding-block: 30px;
        margin-block: 60px;
        box-shadow: 0 0 10px rgba(179, 165, 165, 0.5);
        border-radius: 20px;


    }

    #employeeTable,
    #employeeTable {
        /* border:none; */
        border-radius: 0px;
    }

    #vehicleTable_filter {
        border-bottom: 1px solid black;
        padding-bottom: 15px;
        margin-bottom: 20px;

    }

    .search-header {
        margin-inline: 15px;

    }

    .search-header label {
        display: flex;
        justify-content: start;


    }

    /* .my-3,.search-header {
    display: flex;
    justify-content: space-between;
} */


    thead * {
        border: none !important;

    }

    .dataTables_info {
        display: none;
    }

    .dataTables_length {
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

        gap: 15px;
        margin-bottom: 25px;
    }


    .badge-solved {
        display: flex;
        /* Use flexbox to align items horizontally */
        align-items: center;
        /* Align items vertically centered */
        font-size: 14px;
        /* Adjust font size as needed */
        color: green;
        /* Adjust text color as needed */
        border: 2px solid green;
        border-radius: 10px;
        background-color: #eefcef;
        height: 40px;
        /* Adjust as needed */
        width: 85%;
        padding: 8px;
        margin-top: 7%;
        margin-left: 15px;
        margin-right: 15px;
        gap: 7px;

    }


    .badge-solved svg {
        margin-left: 1px;
        /* Space between the text and the icon */
        vertical-align: middle;
        /* Ensure vertical alignment of the icon */
    }

    .badge-pending {
        display: flex;
        /* Use flexbox to align items horizontally */
        align-items: center;
        /* Align items vertically centered */
        font-size: 14px;
        /* Adjust font size as needed */
        color: orange;
        /* Adjust text color as needed */
        border: 2px solid orange;
        border-radius: 10px;
        background-color: #fefddd;
        height: 40px;
        /* Adjust as needed */
        width: 85%;
        padding: 8px;
        margin-top: 7%;
        margin-left: 15px;
        margin-right: 15px;
        gap: 7px;

    }



    .badge-status {
        height: 30px;
        /* Adjust as needed */
        width: 100%;
        padding: 8px;
        /* Adjust padding if necessary */
        margin-top: 5px;
        margin-left: 10px;
        border-radius: 5px;
        background-color: #f9afae;
        color: red;
        border: 1px solid red;

    }

    .logouts {
        color: white;
        background-color: #524FFF;
    }

    .input-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;


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

    .complain {
        color: white;
        background-color: #524FFF;
    }

    .add-modal2 {
        height: auto;
        width: 370px;
        border-radius: 10px !important;

    }

    .okay-modal2 {
        height: 230px;
        width: 360px;
        border-radius: 10px !important;

    }

    .wrapper-div {
        display: flex;
        flex-direction: column;
        gap: 8px;

    }
    .removeborder{
        border-bottom:none !important;
    }
    .more-img-count{
        height:50px;
        width: 50px;
        font-weight:bold;
    }
    .more-img .c-img{
top:0%;
left:0%;
position: relative;
height: 50px !important;
width: 50px !important;

}
.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #dee2e6;
}
/* :root{
    --bs-table-striped-bg:#000;
}
.table-striped>tbody>tr:nth-of-type(odd)>*{
    --bs-table-bg-type:var(--bs-table-striped-bg) !important;
} */
    </style>



    </style>
</head>

<body>
    <div class="container">
        <div class="users_maindiv p-3">
            <div>
                <!-- style="display:flex; justify-content:space-between"> -->
                <h2 style="font-size: 30px;">Complains</h2>
            </div>

            <div class="my-3 filter-header">

                <div style="display:flex; justify-content:space-between; align-items: center; ">
                    <!-- Button Group -->
                    <!-- <div class="btn-group" role="group">
            <a href="viewcomplain.php?filter=all" class="btn btn-secondary btn-sm">All
                (<?php echo $countAll; ?>)</a>
            <a href="viewcomplain.php?filter=solved" class="btn btn-success btn-sm">Solved
                (<?php echo $countsolved; ?>)</a>
            <a href="viewcomplain.php?filter=panding" class="btn btn-warning btn-sm">Pending
                (<?php echo $countpanding; ?>)</a>
            <a href="viewcomplain.php?filter=service" class="btn btn-info btn-sm">Service
                (<?php echo $countService; ?>)</a>
            <a href="viewcomplain.php?filter=power" class="btn btn-danger btn-sm">Power
                (<?php echo $countPower; ?>)</a>
            <a href="viewcomplain.php?filter=cleaning"
                class="btn btn-warning btn-sm">Cleaning (<?php echo $countcleaning; ?>)</a>
            <a href="viewcomplain.php?filter=fire-sefety"
                class="btn btn-info btn-sm">Fire Safety (<?php echo $countfiresefety; ?>)</a>
        </div> -->

                    <!-- Dropdown Filter -->
                    <?php
// Fetch current filter from URL parameters
$currentFilter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
?>
                    <div class="d-flex justify-content-between" style="width:100%; ">
                        <div class="d-flex">
                            <div class="search-header" style="width:200px; ">
                            </div>
                            <select
                                style="width:150px;   box-shadow:none;  border-radius:7px;border:1px solid #c6bdbdf5  !important; "
                                class="form-select form-control-sm" onchange="window.location.href=this.value;">
                                <option value="viewcomplain.php?filter=all"
                                    <?php if ($currentFilter == 'all') echo 'selected'; ?>>
                                    All

                                    (<?php echo $countAll; ?>)
                                    <span class="dropdown-arrow"></span> <!-- Unicode arrow down -->

                                </option>
                                <option value="viewcomplain.php?filter=solved"
                                    <?php if ($currentFilter == 'solved') echo 'selected'; ?>>
                                    Solved (<?php echo $countsolved; ?>)
                                </option>
                                <option value="viewcomplain.php?filter=panding"
                                    <?php if ($currentFilter == 'panding') echo 'selected'; ?>>
                                    Pending (<?php echo $countpanding; ?>)
                                </option>
                                <option value="viewcomplain.php?filter=service"
                                    <?php if ($currentFilter == 'service') echo 'selected'; ?>>
                                    Service (<?php echo $countService; ?>)
                                </option>
                                <option value="viewcomplain.php?filter=power"
                                    <?php if ($currentFilter == 'power') echo 'selected'; ?>>
                                    Power (<?php echo $countPower; ?>)
                                </option>
                                <option value="viewcomplain.php?filter=cleaning"
                                    <?php if ($currentFilter == 'cleaning') echo 'selected'; ?>>
                                    Cleaning (<?php echo $countcleaning; ?>)
                                </option>
                                <option value="viewcomplain.php?filter=fire-sefety"
                                    <?php if ($currentFilter == 'fire-sefety') echo 'selected'; ?>>
                                    Fire Safety (<?php echo $countfiresefety; ?>)
                                </option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class=" btn complain btn-sm px-3 " style="height:35px;  text-align:center;"
                                data-bs-toggle="modal" data-bs-target="#addComplaintModal"> Add complain</a>
                        </div>
                    </div>
                </div>


                <hr>

                <table id="employeeTable" class="table table-striped " style="width:100%">
                    <thead>
                        <tr>
                            <th>Complain Category</th>
                            <th>Complain Details</th>
                            <th>images</th>
                            <th>Status</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $v) { ?>
                        <tr data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $v[
                    "complain_id"
                ]; ?>">
                            <td>
                                <?php if($v["catagary"]=='service'){
                           echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/></svg>';
                        
                  }elseif($v["catagary"]=='power'){
                    echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-84 31.5-156.5T197-763l56 56q-44 44-68.5 102T160-480q0 134 93 227t227 93q134 0 227-93t93-227q0-67-24.5-125T707-707l56-56q54 54 85.5 126.5T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-40-360v-440h80v440h-80Z"/></svg>';
                }elseif($v["catagary"]=='cleaning'){
                      echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M120-40v-280q0-83 58.5-141.5T320-520h40v-320q0-33 23.5-56.5T440-920h80q33 0 56.5 23.5T600-840v320h40q83 0 141.5 58.5T840-320v280H120Zm80-80h80v-120q0-17 11.5-28.5T320-280q17 0 28.5 11.5T360-240v120h80v-120q0-17 11.5-28.5T480-280q17 0 28.5 11.5T520-240v120h80v-120q0-17 11.5-28.5T640-280q17 0 28.5 11.5T680-240v120h80v-200q0-50-35-85t-85-35H320q-50 0-85 35t-35 85v200Zm320-400v-320h-80v320h80Zm0 0h-80 80Z"/></svg>';
                
            }elseif($v["catagary"]=='fire-sefety'){
                     echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M360-80q-33 0-56.5-23.5T280-160v-40h400v40q0 33-23.5 56.5T600-80H360Zm-80-160v-200h400v200H280Zm4-240q10-46 42-86.5t81-59.5q-10-8-18-17.5T375-664l-175-36v-40l175-36q15-29 42.5-46.5T480-840q21 0 40 7t34 19l126-26v240l-127-26q47 19 79.5 57.5T676-480H284Zm196-200q17 0 28.5-11.5T520-720q-1-18-12-29t-28-11q-17 0-28.5 11.5T440-720q0 17 11.5 28.5T480-680Z"/></svg>';
            }
                else{
                    echo '';
                }
                ?>
                                <?php echo $v["catagary"]; ?>

                            </td>
                            <td><?php echo $v["massage"]; ?></td>

                            <td class='d-flex removeborder' ><?php if ($v["images"] != null) {

                            $maximags = 4;
                            $imageCount = count($v['images']);
                            $index =1;

                            foreach ($v["images"] as $img) { ?>
                                <?php if($index<$maximags){ ?>

                                <img src='images/<?php echo $img[
                                "img"
                            ]; ?>' height='50' width='50'>

                                <?php
                            $index++; 
                            
                        }else{
                            break;
                        }
                        
                    } ?>
                                <?php
                                if ($imageCount > $maximags){ ?>
                                <div class='more-img'>
                                    <img class='c-img' src='images/<?php echo $v['images'][0]['img']; ?>' height='70' width='70'>
                                    <span class="more-img-count">+<?php echo $imageCount - $maximags; ?></span>
                                </div>
                                <?php }} ?>

                            </td>


                            <td>
                                <?php
    // Check the value of $v["status"]
    if ($v["status"] == "solved") {
        echo '<span class="badge-solved"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="green"><path d="m424-312 282-282-56-56-226 226-114-114-56 56 170 170ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg><b>Solved</b></span>';
    } elseif ($v["status"] == "panding") {
        echo '<span class="badge-pending"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="orange"><path d="M204-318q-22-38-33-78t-11-82q0-134 93-228t227-94h7l-64-64 56-56 160 160-160 160-56-56 64-64h-7q-100 0-170 70.5T240-478q0 26 6 51t18 49l-60 60ZM481-40 321-200l160-160 56 56-64 64h7q100 0 170-70.5T720-482q0-26-6-51t-18-49l60-60q22 38 33 78t11 82q0 134-93 228t-227 94h-7l64 64-56 56Z"/></svg><b>Pending</b></span>';
    } else {
        echo '<span class="badge-status">Unknown status</span>';
    }
    ?>
                            </td>

                            <!-- <td>
                            <?php if ($v["name"] != "solved") { ?>
                            <a href='updatecomplain.php?id=<?php echo $v[
                            "complain_id"
                        ]; ?>' class="btn btn-outline-primary btn-sm">Approve</a>
                            <?php } ?>
                        </td> -->
                        </tr>
                        <div class="modal fade" id="exampleModal<?php echo $v[
                    "complain_id"
                ]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content okay-modal2">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="color:#3365da;">Complain
                                        </h5>
                                        <svg data-bs-dismiss="modal" aria-label="Close"
                                            xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960"
                                            width="30px" fill="#565656">
                                            <path
                                                d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                        </svg>
                                    </div>
                                    <div class="modal-body" style="margin-top:8px;">
                                        <div class='wrapper-div'>
                                            <div class="a d-flex flex-row">

                                                <b>Office number :</b> <?php echo $v["office_number"]; ?>
                                            </div>
                                            <div class="b d-flex flex-row">
                                                <b>User name :</b> <?php echo $v["name"]; ?>
                                            </div>
                                            <div class="c d-flex flex-row">
                                                <b>Complain :</b> <?php echo $v["catagary"]; ?>
                                            </div>

                                            <div class="d d-flex flex-row">
                                                <b> Mobile number :</b> <?php echo $v["contact_number"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="addComplaintModal" tabindex="-1" aria-labelledby="addComplaintModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content add-modal2">
                        <div class="modal-header">
                            <h3 class="modal-title" id="addComplaintModalLabel" style="color:#3365da;">Add Complain</h3>
                            <svg data-bs-dismiss="modal" aria-label="Close" xmlns="http://www.w3.org/2000/svg"
                                height="30px" viewBox="0 -960 960 960" width="30px" fill="#565656" style="cursor:pointer;">
                                <path
                                    d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                            </svg>
                        </div>
                        <form action="addcomplain2.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <label for="complainCategory" class="form-label">Complain Category</label>

                                <select name="comp_catagary_id" class="form-select mb-3 ">
                                    <option selected disabled>Select Complain Category</option>
                                    <?php foreach ($complain_catagary as $c) {
                                echo "<option value='$c[0]'>$c[1]</option>";
                            } ?>
                                </select>
                                <div class="mb-3">

                                    <label for="formFileSm" class="form-label">Upload Image</label>

                                    <input name="image[]" class="form-control form-control-sm" id="formFileSm"
                                        type="file" multiple />
                                    </label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" name="massage" placeholder="Leave a comment here"
                                        id="floatingTextarea" required></textarea>
                                    <label for="floatingTextarea">Enter your Message</label>
                                </div>
                                <br />
                                <div class="">
                                    <button type="submit" name="submit" class="btn btn-primary"
                                        style=width:100%>Submit</button>
                                </div>
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
        // $(document).ready(function() {
        //     $("#employeeTable").DataTable({
        //         dom: '<"search-header"f><"#tableId"t>i<"#paginatorId"lp>',
        //     });
        // });

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

                '<div class="input-wrapper"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg><input type="text" id="tableSearch" class="form-control form-control-sm" placeholder="Search..."></div>'
            );
            $('.search-header').append(searchBar);

            $('#tableSearch').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
        
        </script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
</body>

</html>