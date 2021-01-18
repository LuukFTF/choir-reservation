<?php 
$DB_HOST    = "192.168.50.5";
$DB_USER    = "root";
$DB_PASS    = "root";
$DB_NAME    = "test";

$DB = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME)
or die("Error: " . mysqli_connect_error());

$query = "SELECT * FROM tests";


$result = mysqli_query($DB, $query)
or die('Error in query: '.$query);

$test =  mysqli_fetch_assoc($result);

while($row = mysqli_fetch_assoc($result))
{
    // elke rij (dit is een album) wordt aan de array 'albums' toegevoegd.
    $tests[] = $row;
}

mysqli_close($DB);

$x = '';

?>

<?php var_dump($_POST) ?>

<?php var_dump($query) ?>

<?php var_dump($DB) ?>

<?php var_dump($result) ?>

<?php var_dump($test) ?>

<?php var_dump($tests) ?>

<?php foreach ($tests as $test) : $x++ ?>
<?php var_dump($test['test_id']) ?>
<?php endforeach; ?>