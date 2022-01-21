<?php
include "dbconect.php";

$sql = "select * from users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
