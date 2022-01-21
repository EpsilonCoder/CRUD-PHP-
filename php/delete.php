<?php
include "dbconect.php";
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$id = validate($_GET['id']);

if (isset($_GET['id'])) {
    $sql = "DELETE FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    header("location:read.php");

    if ($result) {
        echo '<script>alert(les données ont bien ete supprimé </script>)';
    }
}
