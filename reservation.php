<?php
include_once 'db_conn.php';

$checkin = $_POST['checkin-date'];
$checkout = $_POST['checkout-date'];
$lastname = $_POST['client_id'];

$sql = "INSERT INTO booking(checkin,checkout,client_id) VALUES ('$checkin', '$checkout','$lastname');";
$result = mysqli_query($conn,$sql);

//header("Location : /search.php?signup=success");
?>

