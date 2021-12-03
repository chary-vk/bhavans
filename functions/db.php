<?php

$host = "bkalrcgh3pkvmk71zsza-mysql.services.clever-cloud.com"; //"localhost";
$db = "bkalrcgh3pkvmk71zsza"; //"assignments"; 
$user = "u8fhikpnddpazqci"; //"root";
$pass = "cyxBkJtvS3pyXbJHO59o";


$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
