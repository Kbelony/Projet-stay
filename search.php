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

     <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
      <!-- Start navbar -->
  <nav class="navbar navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/index.html">
        <img src="/img/logo (1).png" alt=""/>
      </a>
      <!-- Start modal login -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
        data-bs-whatever="@mdo">
        Connexion
      </button>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Se connecter</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="login-name" class="col-form-label">Login:</label>
                  <input type="text" class="form-control" id="login-name" />
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Mot de passe:</label>
                  <input type="text" class="form-control" id="login-name" />
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Connexion</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Ending modal login -->
    </div>
  </nav>
  <!-- Ending navbar -->
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
      <div class="title">
  <h1>Qui sommes-nous ?</h1>
    </div>
    <div class="explanation_para">
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis ullam dolores necessitatibus tenetur sint tempore! Vero, distinctio, perferendis recusandae omnis in et deleniti, sit vel quisquam accusantium corrupti sequi consectetur!</p>
  </div>
    <!-- Start list card -->
    <div class="title">
      <h1>Nos appartements du moments</h1>
        </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100">
          <img src="/img/c8df4d92f70cb2e6d1e7741acf730b59.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="/img/c8df4d92f70cb2e6d1e7741acf730b59.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a short card.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="/img/c8df4d92f70cb2e6d1e7741acf730b59.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="/img/c8df4d92f70cb2e6d1e7741acf730b59.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="/img/c8df4d92f70cb2e6d1e7741acf730b59.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a short card.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="/img/c8df4d92f70cb2e6d1e7741acf730b59.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a short card.</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
