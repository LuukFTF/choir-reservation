<?php
date_default_timezone_set('Europe/Amsterdam');

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db/db-connect.php';

if(!isset($_GET['id']) || $_GET['id'] == '') {
    header('Location: /settings/modpanel/users');
    exit;
}

$id = $_GET['id'];

$query_delete = "DELETE FROM users WHERE user_id = $id";


$result = mysqli_query($DB, $query_delete)
or die('Error in query: '.$query_delete);

mysqli_close($DB);

header("Location: /settings/modpanel/users");
exit;