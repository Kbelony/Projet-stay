<?php

    session_start();
    include "db_conn.php";
    $id = $_GET['updateid'];

    $sql = "SELECT booking.id, checkin, checkout, booking.price, client_id, `lastname`, rental.price rental_price FROM `booking` JOIN `rental` ON booking.rental_id = rental.id JOIN `client` ON booking.client_id = client.id WHERE booking.id=$id";
    $result=mysqli_query($conn, $sql);


    $row = mysqli_fetch_assoc($result);
        $checkin = $row['checkin'];
        $checkout = $row['checkout'];
        $rental_price = $row['rental_price'];
        

    if (isset($_POST['submit'])) {
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
       
    
        $sql = "UPDATE `booking` SET `checkin`='$checkin', checkout='$checkout' WHERE id =$id";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            header('Refresh:3; URL = user.php');
        } else {
            die(mysqli_error($conn));
        }
    }

?>
<?php
$date1 = new DateTime($checkin);
$date2 = new DateTime($checkout);
$diff = $date1->diff($date2);
$totalPaid = $diff->days * $rental_price;
// will output 2 days
//echo $totalPaid;?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Modifier</title>
  </head>
  <body>
    <div class = "container">
        <form method = "post">
            <div class="mb-3">
                <label for="checkin" class="form-label">Arrivée</label>
                <input type="date" class="form-control" id="fromDate" placeholder="" name = "checkin" autocomplete="off" value="<?php echo $checkin;?>">
            </div>
            <div class="mb-3">
                <label for="checkout" class="form-label">Départ</label>
                <input type="date" class="form-control" id="toDate" placeholder="" name = "checkout" autocomplete="off" value="<?php echo $checkout;?>">
            </div>

            <div class="mb-3">
                <label for="checkout" class="form-label">Prix total</label>
                <span><?php echo $totalPaid;?></span>
            </div>


            <button type="submit" class="btn btn-primary" name="submit" id="liveToastBtn">Modifier</button>


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
    </script>

</body>

</html>