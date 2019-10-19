<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "register";

$conn = mysqli_connect($servername,$dBUsername, $dBPassword, $dBName);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

date_default_timezone_set('Europe/Belgrade');
$error = "";