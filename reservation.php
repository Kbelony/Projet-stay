<?php
include_once 'db_conn.php';

$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];

$sql = "INSERT INTO booking(checkin,checkout) VALUES ('$checkin', '$checkout');";
$result = mysqli_query($conn,$sql);

header("Location : /search.php?signup=success");
?>