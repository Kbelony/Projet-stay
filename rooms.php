<?php session_start();
    include "db_conn.php";
    $rental_id = $_GET['id'];
    $sql = "SELECT * FROM `rental` 
    WHERE rental.id=$rental_id";

    $result=mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
        $checkin = $_SESSION['check-in'];
        $checkout = $_SESSION['check-out'];
        $rental_price = $row['price'];
        $date1 = new DateTime($checkin);
        $date2 = new DateTime($checkout);
        $diff = $date1->diff($date2);

        $booking_price = $diff->days * $rental_price;

        if (isset($_POST['update'])) {
          $checkin = $_POST['checkin'];
          $checkout = $_POST['checkout'];
      
          if ($result) {
              header('rooms.php');
          } ;
          
      }

    if (isset($_POST['submit'])) {
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
       
        $sql = "INSERT INTO booking(checkin, checkout, price, rental_id, client_id)
                VALUES ('$checkin','$checkout','$booking_price','$rental_id', '1')";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            header('Refresh:3; URL = user.php');
        } else {
            die(mysqli_error($conn));
        }
    }
    var_dump($_SESSION, $_GET);
?>


<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Réserver</title>
  </head>
  <body>
    <div class = "container">
        <form method = "post">
            <div class="mb-3">
                <label for="checkin" class="form-label">Arrivée</label>
                <input type="date" class="form-control datepicker-from" id="fromDate" placeholder="" name="checkin" autocomplete="off" value="<?php echo $_SESSION['check-in'];?>">
            </div>
            <div class="mb-3">
                <label for="checkout" class="form-label">Départ</label>
                <input type="date" class="form-control datepicker-to" id="toDate" placeholder="" name="checkout" autocomplete="off" value="<?php echo $_SESSION['check-out'];?>">
            </div>

            <label for="quantity">Nombre de Voyageurs:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="6" value="<?php echo $_SESSION['traveller'];?>">

            <div class="mb-3">
                <label for="checkout" class="form-label">Détail :</label>
                <span id="nbNights"><?php echo $diff->days . " nuits x " . $rental_price . " €" ;?></span><br>
                <span>Prix total : <span id="priceTotal"><?php echo $booking_price . "</span> €";?></span>
            </div>


            <button type="submit" class="btn btn-primary" name="submit" id="liveToastBtn">Réserver</button>


            <div class="toast" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    Un e.mail de confirmation a été envoyé
                </div>
            </div>
            

            <script src=index.js></script>

            <?php
                if (isset($_POST['submit'])) {
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                    $from = "oceanezara@yahoo.fr";
                    $to = "oceanezara@yahoo.fr";
                    $subject = "Essai de PHP Mail";
                    $message = "PHP Mail fonctionne parfaitement";
                    $headers = "De :" . $from;
                    mail($to, $subject, $message, $headers); ?> 
                    <script>
                        emailSentToast.show();
                        

                    </script>


                <?php
                }
            ?>
        </form>
    </div>

    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    ></script>
    <script type="text/javascript">
      var fromDate;
      $("#fromDate").on("change", function (event) {
        fromDate = $(this).val();
        $("#toDate").prop("min", function () {
          return fromDate;
        });
      });

      var toDate;
      $("#toDate").on("change", function (event) {
        toDate = $(this).val();
        $("#fromDate").prop("max", function () {
          return fromDate;
        });
      });

      jQuery('.datepicker-from, .datepicker-to').on('blur', (e) => {
        var rentalPrice = <?php echo $rental_price; ?>;
        var t2 = new Date($("#toDate").val()).getTime();
        var t1 = new Date($("#fromDate").val()).getTime();
        var nbDays = parseInt((t2-t1)/(24*3600*1000));

        $('#nbNights').text(nbDays + " nuits x <?php echo $rental_price; ?> €");
        $('#priceTotal').text(nbDays * rentalPrice);
      });
    </script>



</body>

</html>