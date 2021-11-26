<?php

include 'db_conn.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet">

    <title>User</title>
</head>
<body>
        <!-- Start navbar -->
    
    <div class="container" id="logout_button">
        <a href="logout.php" class="">Logout</a>
    </div>

    <!-- Ending navbar -->

    <div class = "container">
        <table class="table">
            <thead class="table-dark">
                <tr>
                <th scope="col">Arrivée</th>
                <th scope="col">Départ</th>
                <th scope="col">Prix</th>
                <th scope="col">Client</th>
                <th scope="col" colspan="2">Options</th>
                
                </tr>
            </thead>

            <?php

                $sql = "SELECT booking.id, checkin, checkout, booking.price, client_id, `lastname` FROM `booking` JOIN `rental` ON booking.rental_id = rental.id JOIN `client` ON booking.client_id = client.id";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    while ($row= mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $arr_date = $row['checkin'];
                        $dep_date = $row['checkout'];
                        $price = $row['price'];
                        $nom = $row['lastname'];

                        echo '<tr>
                                <td> '.$arr_date.' </td>
                                <td> '.$dep_date.'</td>
                                <td> '.$price.' €</td> 
                                <td> '.$nom.' </td>
                                <td width=100px>
                                    <button class="btn btn-secondary"><a href="update.php?updateid='.$row['id'].'" class="text-dark">Modifier</a></button>
                                    
                                 </td>
                                 <td width=100px><button class="btn btn-outline-dark"><a href="delete.php?id='.$row['id'].'" class="text-dark">Annuler</a></button></td>
                            </tr>';
                    }
                }

            ?>

           
        </table>
        
    </div>
</body>
</html>