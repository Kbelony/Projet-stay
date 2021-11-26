<?php
include "db_conn.php"; // Using database connection file here
   
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['lastname'])) {
?>     <nav class="navbar navbar-light bg-light">
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
    
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title Page-->
    <title>Home</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <form action="search.php" method="POST">
	<div name="search" placeholder="Search">
    <div class="page-wrapper bg-img-1 p-t-200 p-b-120">
        <div class="wrapper wrapper--w900">
            <div class="card card-4">
                <div class="card-body">
                    <ul class="tab-list">
                        <li class="tab-list__item active">
                            <a class="tab-list__link" href="#tab1" data-toggle="tab">Réservez votre logement</a>
                        </li>
                    </ul>
                    <div class="tab-content">
    
                        <div class="tab-pane active" id="tab1">
        
                                <div class="input-group">
                                <label class="label">Où ? :</label>
                                            <div class="input--style-1" id="">
                                            </div>
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="address">
                                                <?php $sql = "SELECT rental.location_id, location.district FROM `rental` 
                                                JOIN `location` ON rental.location_id = location.id;";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) { 
                                                    while($row = $result->fetch_assoc()) {
                                                    ?> <option <?php if(isset($_GET['district']) AND $_GET['district'] === $row ["district"]){echo "selected";} ?> value="<?php echo $row ["district"];?>" > <?php echo $row ["district"] . "<br>"; ?></option>
                                                    <?php }
                                                } ?> 
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                            </div>

                                    <!-- <label class="label">Où ?</label>
                                    <input class="input--style-1" type="text" name="address"  required="required">

                                    <select id=type name="type" placeholder="Type de logement>
                                        <option value=""></option>  

                                    
                                    </select> -->
                                
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">Arrivée :</label>
                                            <input class="input--style-1" type="text" name="check-in" placeholder="mm/dd/yyyy" id="input-start">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">Départ :</label>
                                            <input class="input--style-1" type="text" name="check-out" placeholder="mm/dd/yyyy" id="input-end">
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">Voyageurs :</label>
                                            <div class="input-group-icon" id="js-select-special">
                                                <input class="input--style-1 input--style-1-small" type="text" name="traveller" value="1 Personnes" disabled="disabled" id="info">
                                                <i class="zmdi zmdi-chevron-down input-icon"></i>
                                            </div>
                                            <div class="dropdown-select">
                                                <ul class="list-room">
                                                    <li class="list-room__item">
                                                        <!-- <span class="list-room__name">Room 1</span> -->
                                                        <ul class="list-person">
                                                            <li class="list-person__item">
                                                                <span class="name">Nombre</span>
                                                                <div class="quantity quantity1">
                                                                    <span class="minus">-</span>
                                                                    <input class="inputQty" type="number" min="0" max="12" value="1">
                                                                    <span class="plus">+</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn-submit" type="submit" name="submit-search">Rechercher</button>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <div class="article-container">                                    
    <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['address']);
            $sql = "SELECT rental.id, rental.title, rental.description, rental.price, rental.image_id, image.image_url, rental.type_id, type.type FROM rental
            JOIN image ON rental.image_id = image.id 
            JOIN type ON rental.type_id = type.id";
            // $sql = "SELECT rental.title, rental.type_id, FROM rental WHERE `type` LIKE '%$search%' OR adult LIKE '%$search%' OR pet LIKE '%$search%'  OR price LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            echo "There are ".$queryResult." results!";
            if ($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<a href='article.php?type=".$row['type']."&adult=".$row['type']."'><div class='article-box'>
						<h3>".$row['type']."</h3>
						<p>".$row['price']."</p>
						</div></a>";
                }
            } else {
                echo "There are no results matching your search!";
            }
        }
    
    ?>
    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
    <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
    <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <div>    
    <a href="javascript:history.go(-1)" class="previous">&laquo; Précédent</a>
    </div>  

    <!-- <footer>
    <div>
  
    <p><b> © 2021 DonkeyStay</b></p>
    
    </div>
    </footer> -->

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
