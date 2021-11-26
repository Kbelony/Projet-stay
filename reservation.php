<?php
include_once 'db_conn.php';

$checkin = $_POST['checkin-date'];
$checkout = $_POST['checkout-date'];
$lastname = $_POST['client_id'];

$sql = "INSERT INTO booking(checkin,checkout,client_id) VALUES ('$checkin', '$checkout','$lastname');";
$result = mysqli_query($conn,$sql);

//header("Location : /search.php?signup=success");
?>

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