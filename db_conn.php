<?php

$sname = "localhost";
$user_name = "root";
$password = "Sacarine12";
$db_name = "stay";

$conn = mysqli_connect($sname, $user_name, $password, $db_name);

if (!$conn) {
    echo "connection failed";
}
