<?php
session_start();
include "db_conn.php";

if (isset($_POST['lastname']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $nom = validate($_POST['lastname']);
    $password = validate($_POST['password']);

    if (empty($nom)) {
        header("Location: index.php?error=Lastname is required");
        exit();
    } elseif (empty($password)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM client WHERE lastname='$nom' AND `password`='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['lastname'] === $nom && $row['password'] === $password) {
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            }
        } else {
            header("Location: index.php?error= Lastname or Password incorrect");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
