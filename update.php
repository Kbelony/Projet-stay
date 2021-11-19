<?php

    session_start();
    include "db_conn.php";
    $id = $_GET['updateid'];

    $sql= "SELECT reservation.id, arr_date, dep_date, reservation.price, logement_id, `type` FROM `reservation` JOIN logement ON reservation.logement_id = logement.id WHERE reservation.id=$id";
    $result=mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
        $arr_date = $row['arr_date'];
        $dep_date = $row['dep_date'];
        $price = $row['price'];
        $type = $row['type'];
        

    if (isset($_POST['submit'])) {
        $arr_date = $_POST['arr_date'];
        $dep_date = $_POST['dep_date'];
        $price = $_POST['price'];
        $type = $_POST['type'];
       
    
        $sql = "UPDATE `reservation` SET `arr_date`='$arr_date', dep_date='$dep_date', price='$price', `type`=$type WHERE id =$id";
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
                <label for="type" class="form-label">Logement</label>
                <input type="text" class="form-control" id="type" placeholder="" name= "type" autocomplete="off" value=<?php echo $type;?>>
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
        </form>

    </div>

    
  </body>
</html>