<?php
if (isset($_POST['create'])) {
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
    $user_data = 'votre prenom est ' . $name . 'l email est' . $email;

    if (empty($name)) {
        header("location:../index?error=Vous devez entrer le prenom&$user_data");
    } else if (empty($email)) {
        header("location:../index?error=Vous devez entrer votre email&$user_data");
    } else {
        $sql = "insert into users(name,email) values('$name','$email')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location:read.php");
        } else {
            header("location:../index?error=Echec de l envoie des donnees$user_data");
        }
    }
}
