<?php 
$DB_HOST    = "192.168.50.5";
$DB_USER    = "root";
$DB_PASS    = "root";
$DB_NAME    = "choirreservation";

$DB = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME)
or die("Error: " . mysqli_connect_error());
?>
