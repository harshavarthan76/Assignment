<?php
$dbServer = "localhost";
$dbUser = "root";
$dbPassword = "";  
$dbName = "org_data";

$conn = new mysqli($dbServer,$dbUser,$dbPassword,$dbName); // creating the connection to database

if(!$conn){
    die(mysqli_error($conn));
}
?>
