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

    <h1 style="color:DarkCyan ;">Complain Form</h1>
    <hr>
    <form action="complain.php" method="POST" enctype="multipart/form-data">
        <select name="comp_catagary_id">
            <option selected>complain catagary</option>
            <?php
                    foreach($complain_catagary as $c){
                        echo "<option value='$c[0]'>$c[1]</option>";
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
                    id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Massage</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    </form>









    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>