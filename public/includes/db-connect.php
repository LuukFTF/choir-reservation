<?php 
$host       = "127.0.0.1:3306";
$database   = "test";
$user       = "root";
$password   = "root";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());
?>