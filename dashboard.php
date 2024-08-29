<?php
include ("./confing.php");
include ("./navbar2.php");
$users = $conn->query("select count(*) from users")->fetch_all();
$vehicle = $conn->query("select count(*) from vehicle")->fetch_all();
$complain = $conn->query("select count(*) from complain")->fetch_all();
$meeting = $conn->query("select count(*) from meeting")->fetch_all();
$today = date('Y-m-d');
// $todaycomplain =$conn->query("SELECT * FROM complain WHERE DATE(created_at) = '$today'")->fetch_all();
$todaycomplain = $conn->query("SELECT c.*, cc.*,ci.*
        FROM complain c
        JOIN complain_catagary cc ON c.comp_catagary_id = cc.comp_catagary_id
        JOIN comp_images ci ON c.complain_id = ci.c_id
        WHERE DATE(c.created_at) = '$today'")->fetch_all();
//  $todaymeeting =$conn->query("SELECT * FROM meeting WHERE DATE(date) = '$today'")->fetch_all();
$todaymeeting = $conn->query("SELECT m.*, u.* 
                              FROM meeting m 
                              JOIN users u ON m.users_id = u.users_id 
                              WHERE DATE(m.date) = '$today'")->fetch_all();
// print_r('<pre>');
// print_r($todaycomplain);
// print_r($todaymeeting);
// print_r ($users);

$complain_catagary = $conn
    ->query("SELECT * FROM complain_catagary")
    ->fetch_all();

?>

<div class="container">
    <div class="maindiv">
        <div class="card">
            <div class="item item--1">

                <div class="complains">

                    <span class="text text--3"> Users</span>
                    <a href="users.php" class="button"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                            fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707z" />
                        </svg></a>
                    <!-- <button onclick="location.href='users.php';">view more</button> -->
                </div>
                <div class="total">

                    <span class="quantity"> <?php echo $users[0][0]; ?></span>
                </div>
            </div>
            <div class="item item--2">
                <div class="complains">
                    <span class="text text--4"> Vehicals </span>
                    <a href="vehicleform.php" class="button"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                            height="30" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707z" />
                        </svg></a>
                    <!-- <button type="login" name="login" class="btn btn-outline-success">View more</button> -->
                </div>
                <div class="total">

                    <span class="quantity"><?php echo $vehicle[0][0]; ?></span>
                </div>
            </div>
            <div class="item item--3">
                <div class="complains">
                    <span class="text text--2"> Meetings </span>
                    <a href="viewmeeting.php" class="button"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                            height="30" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707z" />
                        </svg></a>
                    <!-- <button type="login" name="login" class="btn btn-outline-success">View more</button> -->
                </div>
                <div class="total">
                    <span class="quantity"><?php echo $meeting[0][0]; ?></span>
                </div>
            </div>

            <div class="item item--4">
                <div class="complains">
                    <span class="text text--3"> Complains</span>
                    <a href="viewcomplain.php" class="button"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                            height="30" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707z" />
                        </svg></a>
                </div>
                <div class="total">
                    <span class="quantity"><?php echo $complain[0][0]; ?></span>
                </div>

                <!-- <button type="login" name="login" class="btn btn-outline-success">View more</button> -->
            </div>
        </div>
    </div>
    <div>










        <br />



        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    role="tab" aria-controls="nav-home" aria-selected="true">Today's Complains</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                    role="tab" aria-controls="nav-profile" aria-selected="false">Today's Meeting</button>




                <!-- Container for the Create Meeting button -->
                <div class="nav nav-tab" id="createMeetingContainer">
                    <a href="#" class="btn meeting btn-sm"
                        style="color:white; background-color:#524FFF;margin-bottom:10px;  margin-left:650px;"
                        data-bs-toggle="modal" data-bs-target="#createMeetingModal">
                        Create Meeting
                    </a>

                </div>

                <div class="nav nav-tab" id="createComplainContainer">
                    <a href="#" class="btn Complain btn-sm"
                        style="color:white; background-color:#524FFF;margin-bottom:10px;  margin-left:650px;"
                        data-bs-toggle="modal" data-bs-target="#createComplainModal">
                        Add Complain
                    </a>

                </div>
            
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                tabindex="0">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Complain Category</th>
                                        <th>Complain Details</th>
                                        <th>Images</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
              // Initialize variable to track the current row
              $current_row = [];
              // Loop through each complain

              foreach ($todaycomplain as $u):
                // Check if the current complain ID matches the previous row
                if (isset($current_row['id']) && $current_row['id'] != $u[0]) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $current_row['category']; ?>
                                            <?php
                      // Display the icon based on the category
                      if ($current_row['category'] == 'service') {
                        echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960  960" width="24px" fill="#5f6368"><path d="M370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q22-23 48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/></svg>';
                      } elseif ($current_row['category'] == 'power') {
                        echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960" width="24px" fill="#5f6368"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-84 31.5-156.5T197-763l56 56q-44 44-68.5 102T160-480q0 134 93 227t227 93q134 0 227-93t93-227q0-67-24.5-125T707-707l56-56q54 54 85.5 126.5T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-40-360v-440h80v440h-80Z"/></svg>';
                      } elseif ($current_row['category'] == 'cleaning') {
                        echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960" width="24px" fill="#5f6368"><path d="M120-40v-280q0-83 58.5-141.5T320-520h40v-320q0-33 23.5-56.5T440-920h80q33 0 56.5 23.5T600-840v320h40q83 0 141.5 58.5T840-320v280H120Zm80-80h80v-120q0-17 11.5-28.5T320-280q17 0 28.5 11.5T360-240v120h80v-120q0-17 11.5-28.5T480-280q17 0 28.5 11.5T520-240v120h80v-120q0-17 11.5-28.5T640-280q17 0 28.5 11.5T680-240v120h80v-200q0-50-35-85t-85-35H320q-50 0-85 35t-35 85v200Zm320-400v-320h-80v320h80Zm0 0h-80 80Z"/></svg>';
                      } elseif ($current_row['category'] == 'fire-safety') {
                        echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960" width="24px" fill="#5f6368"><path d="M360-80q-33 0-56.5-23.5T280-160v-40h400v40q0 33-23.5 56.5T600-80H360Zm-80-160v-200h400v200H280Zm4-240q10-46 42-86.5t81-59.5q-10-8-18-17.5T375-664l-175-36v-40l175-36q15-29 42.5-46.5T480-840q21 0 40 7t34 19l126-26v240l-127-26q47 19 79.5 57.5T676-480H284Zm196-200q17 0 28.5-11.5T520-720q-1-18-12-29t-28-11q-17 0-28.5 11.5T440-720q0 17 11.5 28.5T480-680Z"/></svg>';
                      } else {
                        echo '';
                      }
                      ?>
                                        </td>
                                        <td><?php echo $current_row['details']; ?></td>
                                        <td class='align-left d-flex'>
                                            <?php
                                                $maximgs = 4;
                                                $imageCount = count($current_row['images']);
                                                $index = 1;
                                                ?>

                                            <?php foreach ($current_row['images'] as $image): ?>
                                            <?php if ($index > $maximgs): ?>
                                            <!-- Stop displaying more images after reaching the limit -->
                                            <?php break; ?>
                                            <?php endif; ?>
                                            <img src='images/<?php echo htmlspecialchars($image); ?>' height='70'
                                                width='70'>&nbsp;
                                            <?php $index++; ?>
                                            <?php endforeach; ?>

                                            <?php if ($imageCount > $maximgs): ?>
                                            <!-- Display the "+" icon if there are more images -->
                                            <div class='more-img'>
                                                <img src='images/<?php echo htmlspecialchars($image); ?>' height='70'
                                                    width='70'>
                                                <span
                                                    class="more-img-count">+<?php echo $imageCount - $maximgs; ?></span>
                                            </div> <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php
                $current_row = [];
                                            }
              // Add current complain data to the current row
              $current_row['id'] = $u[0];
              $current_row['category'] = $u[9];
              $current_row['details'] = $u[1];
              // Split the images column into an array
              $images = explode(',', $u[14]);
              foreach ($images as $image) {
                $current_row['images'][] = $image;
              }
            endforeach;
            // Output the last row if there's any data left
            if (!empty($current_row)) {
              echo "<tr>";
              echo "<td>";
              echo $current_row['category'];
              if ($current_row['category'] == 'service') {
                echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="http://www.w3.org/2000/svg" width="24px" fill="#5f6368"><path d="M370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q22-23 48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/></svg>';
              } elseif ($current_row['category'] == 'power') {
                echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="http://www.w3.org/2000/svg" width="24px" fill="#5f6368"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-84 31.5-156.5T197-763l56 56q-44 44-68.5 102T160-480q0 134 93 227t227 93q134 0 227-93t93-227q0-67-24.5-125T707-707l56-56q54 54 85.5 126.5T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-40-360v-440h80v440h-80Z"/></svg>';
              } elseif ($current_row['category'] == 'cleaning') {
                echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="http://www.w3.org/2000/svg" width="24px" fill="#5f6368"><path d="M120-40v-280q0-83 58.5-141.5T320-520h40v-320q0-33 23.5-56.5T440-920h80q33 0 56.5 23.5T600-840v320h40q83 0 141.5 58.5T840-320v280H120Zm80-80h80v-120q0-17 11.5-28.5T320-280q17 0 28.5 11.5T360-240v120h80v-120q0-17 11.5-28.5T480-280q17 0 28.5 11.5T520-240v120h80v-120q0-17 11.5-28.5T640-280q17 0 28.5 11.5T680-240v120h80v-200q0-50-35-85t-85-35H320q-50 0-85 35t-35 85v200Zm320-400v-320h-80v320h80Zm0 0h-80 80Z"/></svg>';
              } elseif ($current_row['category'] == 'fire-safety') {
                echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="http://www.w3.org/2000/svg" width="24px" fill="#5f6368"><path d="M360-80q-33 0-56.5-23.5T280-160v-40h400v40q0 33-23.5 56.5T600-80H360Zm-80-160v-200h400v200H280Zm4-240q10-46 42-86.5t81-59.5q-10-8-18-17.5T375-664l-175-36v-40l175-36q15-29 42.5-46.5T480-840q21 0 40 7t34 19l126-26v240l-127-26q47 19 79.5 57.5T676-480H284Zm196-200q17 0 28.5-11.5T520-720q-1-18-12-29t-28-11q-17 0-28.5 11.5T440-720q0 17 11.5 28.5T480-680Z"/></svg>';
              } else {
                echo '';
              }
              ?>
                                    </td>
                                    <td><?php echo $current_row['details']; ?></td>
                                    <td class='align-left d-flex'>
                                        <?php
                                                $maximgs = 4;
                                                $imageCount = count($current_row['images']);
                                                $index = 1;
                                                ?>

                                        <?php foreach ($current_row['images'] as $image): ?>
                                        <?php if ($index > $maximgs): ?>
                                        <!-- Stop displaying more images after reaching the limit -->
                                        <?php break; ?>
                                        <?php endif; ?>
                                        <img src='images/<?php echo htmlspecialchars($image); ?>' height='50'
                                            width='50'>&nbsp;
                                        <?php $index++; ?>
                                        <?php endforeach; ?>

                                        <?php if ($imageCount > $maximgs): ?>
                                        <!-- Display the "+" icon if there are more images -->
                                        <div class='more-img'>
                                            <img src='images/<?php echo htmlspecialchars($image); ?>' height='50'
                                                width='50'>
                                            <span class="more-img-count">+<?php echo $imageCount - $maximgs; ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                    </tr>
                                    <?php
            }
            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Meeting Topic</th>
                                    <th>Meeting Location</th>
                                    <th style="width:200px;">Create metting by</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($todaymeeting as $u): ?>
                                <tr>
                                    <td><?php echo $u[2]; ?></td>
                                    <td><?php echo date("h:i A", strtotime($u[3])); ?></td>
                                    <td><?php echo $u[4]; ?></td>

                                    <td><?php echo $u[1]; ?></td>
                                    <td><?php echo $u[11]; ?></td>

                                </tr>
                                <?php
endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Create Meeting Modal -->

    <div class="modal fade" id="createMeetingModal" tabindex="-1" aria-labelledby="createMeetingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content add-modal2">
                <div class="modal-header">
                    <h3 class="modal-title" id="createMeetingModalLabel" style="color:#3365da;">Create Meeting</h3>
                    <svg data-bs-dismiss="modal" aria-label="Close" xmlns="http://www.w3.org/2000/svg" height="30px"
                        viewBox="0 -960 960 960" width="30px" fill="#565656" style="cursor:pointer;">
                        <path
                            d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                    </svg>
                </div>
                <form action="addmeeting3.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="topic" class="form-label">Topic</label>
                            <input type="text" name="topic" class="form-control" placeholder="Enter  your meeting topic"
                                id="topic" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control"
                                placeholder="Enter your meeting location" id="location" required>
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
                            <button type="submit" name="submit" class="btn btn-primary"
                                style=width:100%;>Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="createComplainModal" tabindex="-1" aria-labelledby="addComplaintModalLabel"
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
                        <form action="addcomplain3.php" method="POST" enctype="multipart/form-data">
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('#nav-tab .nav-link');
    const createMeetingContainer = document.getElementById('createMeetingContainer');
    const createComplainContainer = document.getElementById('createComplainContainer');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            if (this.getAttribute('data-bs-target') === '#nav-profile') {
                createMeetingContainer.style.display = 'block';
                createComplainContainer.style.display='none';
            } else {
                createMeetingContainer.style.display = 'none';
                createComplainContainer.style.display='block';
            }
        });
    });

    // Optionally, you can also show/hide the button on page load based on the initial tab
    const activeTab = document.querySelector('#nav-tab .nav-link.active');
    if (activeTab.getAttribute('data-bs-target') === '#nav-profile') {
        createMeetingContainer.style.display = 'block';
    } else {
        createMeetingContainer.style.display = 'none';
    }
});
</script>