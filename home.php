<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['nom'])) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <h1>Hello, <?php echo $_SESSION['nom']?></h1>
    <a href="logout.php">Logout</a>

    <?php
} else {
        header("Location: index.php");
        exit();
    }
?>

    <?php
    include "db_conn.php"; // Using database connection file here

    $sql = "SELECT * FROM logement ";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        ?>


    <table class="table table-dark table-striped">
        <tr>
            <th>Type de logement</th>
            <th>Adultes</th>
            <th>Animaux</th>
            <th>Prix</th>
            <th>Enfants</th>
            <th>Réserver</th>


        </tr>
        <?php // output data of each row
            ?>
        <?php while ($row = $result->fetch_assoc()) {
                ?> <tr>
            <td> <?php echo $row["type"]; ?></td>
            <td><?php echo $row["adult"]; ?> </td>
            <td> <?php echo $row["pet"]; ?> </td>
            <td><?php echo $row["price"]; ?> </td>
            <td> <?php echo $row["child"]; ?> </td>
            <td> <button><a href='book.php'>Réserver</a></button> </td>
            
        </tr>
        <?php
            } ?>
    </table>


    <?php
    } else { ?>
    0 results
    <?php }

    $conn->close();
    ?>
    
</body>
</html>

