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

    <title>User</title>
</head>
<body>
    
    <div class = "container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Arrivée</th>
                <th scope="col">Départ</th>
                <th scope="col">Prix</th>
                <th scope="col">Logement</th>
                <th scope="col">Client</th>
                </tr>
            </thead>

            <?php

                $sql = "SELECT reservation.id, arr_date, dep_date, reservation.price, client_id, `type`, `nom` FROM `reservation` JOIN `logement` ON reservation.logement_id = logement.id JOIN `client` ON reservation.client_id = client.id";
                $result = mysqli_query($conn, $sql);
                


                if ($result) {
                    while ($row= mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $arr_date = $row['arr_date'];
                        $dep_date = $row['dep_date'];
                        $price = $row['price'];
                        $type = $row['type'];
                        $nom = $row['nom'];

                        echo '<tr>
                                <td> '.$arr_date.' </td>
                                <td> '.$dep_date.'</td>
                                <td> '.$price.' </td>
                                <td> '.$type.' </td>
                                <td> '.$nom.' </td>
                                <td>
                                    <button class="btn btn-primary"><a href="update.php?updateid='.$row['id'].'" class="text-light">Modifier</a></button>
                                    <button class="btn btn-danger"><a href="delete.php?id='.$row['id'].'" class="text-light">Annuler</a></button>
                                 </td>
                            </tr>';
                    }
                }

            ?>

           
        </table>
        
    </div>
</body>
</html>