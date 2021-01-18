<?php 
$DB_HOST    = "192.168.50.5";
$DB_USER    = "root";
$DB_PASS    = "root";
$DB_NAME    = "choirreservation";

$DB = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME)
or die("Error: " . mysqli_connect_error());

$query = "SELECT * FROM users";


$result = mysqli_query($DB, $query)
or die('Error in query: '.$query);

$user =  mysqli_fetch_assoc($result);

while($row = mysqli_fetch_assoc($result))
{
    // elke rij (dit is een album) wordt aan de array 'albums' toegevoegd.
    $users[] = $row;
}

mysqli_close($DB);

$x = 0;

?>

<?php var_dump($_POST) ?>

<?php var_dump($query) ?>

<?php var_dump($DB) ?>

<?php var_dump($result) ?>

<?php var_dump($user) ?>

<?php var_dump($users) ?>

<?php foreach ($users as $user) : $x++ ?>
<?php var_dump($user['user_id']) ?>
<?php endforeach; ?>