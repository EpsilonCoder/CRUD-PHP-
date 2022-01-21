<?php

if (isset($_GET['id'])) {
    include "dbconect.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);
    $sql = "select * from users where id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("location:read.php");
    }
} else if (isset($_POST['update'])) {
    include "dbconect.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $id = validate($_POST['id']);


    if (empty($name)) {
        header("location:update?id=$id&error=Vous devez entrer le prenom");
    } else if (empty($email)) {
        header("location:update?id=$id&error=Vous devez entrer votre email");
    } else {
        $sql = "UPDATE users SET name='$name',email='$email' WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location:read.php?sucess='operation bien reussi'");
        } else {
            header("location:../update?id=$id&error=Echec de l envoie des donnees");
        }
    }
} else {
    header("location:read.php");
}
