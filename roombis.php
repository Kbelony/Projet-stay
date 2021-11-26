<?php
include "db_conn.php"; // Using database connection file here
?>
<!doctype html>
<html lang="fr">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
  <!-- Start navbar -->
  <nav class="navbar navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/search.php">
        <img src="listing/uploads/logo (1).png" alt="" />
      </a>
    </div>
  </nav>
  <!-- Ending navbar -->
  </div>
</section>
<div class = "form-item">
    <form action="/reservation.php" method="POST" class = "book-form">
        <div class="none">
        <?php //logement for the menu selection
        include_once 'db_conn.php';
                $sql = "SELECT * FROM client";
                $result = $conn->query($sql);
            ?>
            <select name = "client_id">
            <?php while ($row = mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['lastname']; ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <div class = "form-item">
          <label for = "checkin-date"></label>
          <input type = "date" id = "chekin-date" name="checkin-date" style="border: 3px solid #3a50fb;border-radius: 50px">
          <div class = "form-item">
              <div class="list">
            <label for = "checkout-date"></label>
            <input type = "date" id = "chekout-date" name="checkout-date" style="border: 3px solid #3a50fb;border-radius: 50px">
        </div>
        <button class="btn btn-primary" type="submit">Réserver</button>
      </div>
      </div> 
      <!-- Starting confirmation-mail-->
      <div class="toast" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body">
                    Un e.mail de confirmation a été envoyé
                    </div>
            </div>
            <script src=/js/index.js></script>
          <!-- Ending confirmation-mail-->  
    </form>
</div>
<div class="tab-content">
    
                        <div class="tab-pane active" id="tab1">
        
                                <div class="input-group">
                                <label class="label">Où ? :</label>
                                            <div class="input--style-1" id="">
                                            </div>
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="address">
                                                    <?php $sql = "SELECT * FROM `location`";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) { 
                                                    while($row = $result->fetch_assoc()) {
                                                    ?> 
                                                    <option <?php if(isset($_GET['district']) AND $_GET['district'] === $row ["district"]){echo "selected";} ?> value="<?php echo $row ["district"];?>" > <?php echo $row ["district"] . "<br>"; ?></option>
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
                                            <input class="input--style-1" type="text" name="check-in" placeholder="dd/mm/yyyy" id="input-start">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">Départ :</label>
                                            <input class="input--style-1" type="text" name="check-out" placeholder="dd/mm/yyyy" id="input-end">
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">Voyageurs :</label>
                                            <div class="input-group-icon" id="js-select-special">
                                                <input class="input--style-1 input--style-1-small" type="text" value="1 Personnes" disabled="disabled" id="info">
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
                                                                    <input class="inputQty" type="number" name="traveller" min="1" value="1">
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
                         
        <!-- Starting footer-->
        <footer>
      <hr>
      <center>
        <p><b> © 2021 DonkeyStay</b></p>
      </center>
      <!-- Starting legal mention modal-->
      <!-- Button trigger modal -->
      <p type="text" class="mention_légales" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Mention légales
      </p>
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Mention légales</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Ces mentions légales sont à distinguer des conditions générales de vente (CGV) également obligatoires sur les sites e-commerce, mais également des conditions générales d’utilisation (CGU – conseillées mais non obligatoires) dans lesquelles elles peuvent cependant être intégrées.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      </div>
      <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    ></script>
    <script type="text/javascript">
      var fromDate;
      $("#chekin-date").on("change", function (event) {
        fromDate = $(this).val();
        $("#chekout-date").prop("min", function () {
          return fromDate;
        });
      });
      var toDate;
      $("#chekout-date").on("change", function (event) {
        toDate = $(this).val();
        $("#chekin-date").prop("max", function () {
          return fromDate;
        });
      });
    </script>
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
    </footer>
     <!-- Ending footer-->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>