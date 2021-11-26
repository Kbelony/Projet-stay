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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/search.php">
            <img src="/uploads/logo.png" alt="" />
            </a> 
        <!-- Start modal login -->
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="logout.php" class="">Logout</a> 
                <p class="hello">Hello, <?php echo $_SESSION['lastname']?> !</p>
            </div>

           
            
            
        </div>

        
      <!-- Ending modal login -->

    </nav> 
    

    <?php
} else {
        header("Location: form_login.php");
        exit();
    }
?>

    <div>    
        <a href="javascript:history.go(-1)" class="previous">&laquo; Précédent</a>
    </div>  

<footer>
    <div>
      
        <p><b> © 2021 DonkeyStay</b></p>
        
    </div>
</footer>
    
</body>
</html>
