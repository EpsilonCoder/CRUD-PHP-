<?php

$sname = "localhost";
$uname = "root";
$passxord = "";
$bdname = "testphp";
$conn = mysqli_connect($sname, $uname, $passxord, $bdname);

if (!$conn) {
    echo "connection failed";
}
