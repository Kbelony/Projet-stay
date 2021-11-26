<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['lastname'])) {
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
    <h1>Hello, <?php echo $_SESSION['lastname']?></h1>
    <a href="logout.php">Logout</a>

    <?php
} else {
        header("Location: form_login.php");
        exit();
    }
?>

   
    
</body>
</html>
