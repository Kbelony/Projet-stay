<?php
include_once 'db_conn.php';

$checkin = $_POST['checkin-date'];
$checkout = $_POST['checkout-date'];

$sql = "INSERT INTO booking(checkin,checkout) VALUES ('$checkin', '$checkout');";
$result = mysqli_query($conn,$sql);

header("Location : /search.php?signup=success");
?>