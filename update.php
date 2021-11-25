<?php

    session_start();
    include "db_conn.php";
    $id = $_GET['updateid'];

    $sql = "SELECT booking.id, checkin, checkout, booking.price, client_id, `lastname` FROM `booking` JOIN `rental` ON booking.rental_id = rental.id JOIN `client` ON booking.client_id = client.id WHERE booking.id=$id";
    $result=mysqli_query($conn, $sql);


    $row = mysqli_fetch_assoc($result);
        $checkin = $row['checkin'];
        $checkout = $row['checkout'];
        

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
                <input type="date" class="form-control" id="checkin" placeholder="" name = "checkin" autocomplete="off" value=<?php echo $checkin;?>>
            </div>
            <div class="mb-3">
                <label for="checkout" class="form-label">Départ</label>
                <input type="date" class="form-control" id="checkout" placeholder="" name = "checkout" autocomplete="off" value=<?php echo $checkout;?>>
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

    

</body>

  </body>
</html>