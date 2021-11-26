<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Main CSS-->
  <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
  <!-- Start navbar -->
  <nav class="navbar navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/search.php">
        <img src="/images/logo (1).png" alt="" />
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
    </footer>
     <!-- Ending footer-->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>