<?php
session_start();
include("./confing.php");
include("./navbar2.php");


if(isset($_SESSION['message'])) {
    echo '<div style="padding: 10px; background-color: #f2dede; color: #a94442;">'.$_SESSION['message'].'</div>';
    unset($_SESSION['message']);
}

 

$complain_catagary=$conn->query("select * from complain_catagary ")->fetch_all();       


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>



<body>

    <h1 style="color:DarkCyan ;">add complain</h1>
    <hr>
    <a href="#" class="m-3 btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addComplaintModal">Add</a>

    <div class="modal fade" id="addComplaintModal" tabindex="-1" aria-labelledby="addComplaintModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addComplaintModalLabel">Add Complaint</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    <form action="addcomplain2.php" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
    <select name="comp_catagary_id" class="form-select mb-3">
    <option selected disabled>Complaint Category</option>           
            <?php
                    foreach($complain_catagary as $c){
                        echo "<option value='$c[0]'>$c[1] </option>";
                    }
                ?>
        </select>
        <br /><br />
        <div class="mb-3">
            <label for="formFileSm">
                <input name="image" class="form-control form-control-sm" id="formFileSm" type="file" />
        </div>
        <div>
            <div class="form-floating">
                <textarea class="form-control" name="massage" placeholder="Leave a comment here"
                    id="floatingTextarea" required></textarea>
                <label for="floatingTextarea">Massage</label>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
          </form>
      </div>
    </div>
</div>
 <!-- Button trigger modal -->







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>