<?php
session_start();
include "db_conn.php";

if (isset($_POST['nom']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $nom = validate($_POST['nom']);
    $password = validate($_POST['password']);

    if (empty($nom)) {
        header("Location: index.php?error=Nom is required");
        exit();
    } elseif (empty($password)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM client WHERE nom='$nom' AND `password`='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['nom'] === $nom && $row['password'] === $password) {
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            }
        } else {
            header("Location: index.php?error= Nom ou Password incorrects");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
