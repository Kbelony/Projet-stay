<?php
include "db_conn.php"; // Using database connection file here
    ?>
    
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title Page-->
    <title>Au Form Wizard</title>

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
</head>

<body>
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
                                        <button class="btn-submit" type="submit">Rechercher</button>

                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
