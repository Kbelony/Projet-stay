<?php

    session_start();
    include "db_conn.php";
    $id = $_GET['updateid'];

    $sql= "SELECT * FROM `reservation` WHERE id=$id";
    $result=mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
        $arr_date = $row['arr_date'];
        $dep_date = $row['dep_date'];
        $price = $row['price'];
        $logement_id = $row['logement_id'];
        

    if (isset($_POST['submit'])) {
        $arr_date = $_POST['arr_date'];
        $dep_date = $_POST['dep_date'];
        $price = $_POST['price'];
        $logement_id = $_POST['logement_id'];
       
    
        $sql = "UPDATE `reservation` SET id=$id, `arr_date`='$arr_date', dep_date='$dep_date', price='$price', `logement_id`='$logement_id' WHERE id = $id";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            //echo "Updated successfully";
            header('location: user.php');
        } else {
            die(mysqli_error($conn));
        }
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Modifier</title>
  </head>
  <body>
    <div class = "container">
        <form method = "post">
            <div class="mb-3">
                <label for="arr_date" class="form-label">Arrivée</label>
                <input type="date" class="form-control" id="arr_date" placeholder="" name = "arr_date" autocomplete="off" value=<?php echo $arr_date;?>>
            </div>
            <div class="mb-3">
                <label for="dep_date" class="form-label">Départ</label>
                <input type="date" class="form-control" id="dep_date" placeholder="" name = "dep_date" autocomplete="off" value=<?php echo $dep_date;?>>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Total</label>
                <input type="text" class="form-control" id="price" placeholder="" name = "price" autocomplete="off" value=<?php echo $price;?>>
            </div>
            <div class="mb-3">
                <label for="logement_id" class="form-label">Logement</label>
                <input type="logement_id" class="form-control" id="logement_id" placeholder="" name= "logement_id" autocomplete="off" value=<?php echo $logement_id;?>>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
        </form>

    </div>

    
  </body>
</html>