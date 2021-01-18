<?php
date_default_timezone_set('Europe/Amsterdam');

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db/db-connect.php';

if(!true) {
// if(!isset($_GET['id']) || $_GET['id'] == '') {
    header('Location: /settings/modpanel/users');
    exit;
}

$id = $_GET['id'];

$query = "SELECT * 
FROM users 
WHERE user_id = $id
";

$result = mysqli_query($DB, $query)
or die('Error in query: '.$query);

$user =  mysqli_fetch_assoc($result);

$user_id = $user['user_id'];
$username = $user['username'];
$email = $user['email'];
$password = $user['password'];
$firstname = $user['firstname'];
$lastname = $user['lastname'];
$vocaltype = $user['vocaltype'];
$role = $user['role'];
$datecreated = $user['datecreated'];
$organisation_id = $user['organisation_id'];

    
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    isset($vocaltype) ? $vocaltype = $_POST['vocaltype'] : '';
    $role = $_POST['role'];
    isset($vocaltype) ? $vocaltype = $datecreated = $_POST['datecreated'] : '';
    $organisation_id = $_POST['organisation_id'];

    $errors = [];
    if($username == '') {
        $errors[] = 'Username is required';
    }
    if($email == '') {
        $errors[] = 'Email is required';
    }
    if($password == '') {
        $errors[] = 'Password is required';
    }
    if($role == '') {
        $errors[] = 'Role is required';
    }
    if($organisation_id == '') {
        $errors[] = 'organisation_id is required';
    }

    if(empty($errors)){
        $query_edit = "UPDATE users
        SET firstname = '$firstname' 
        WHERE user_id = $id
        ";

        $result2 = mysqli_query($DB, $query_edit)
        or die('Error: '.$query_edit);
    }

    if ($result2) {
        echo 'Updated Successfully!';
        exit;
    } else {
        $errors[] = 'Error: '.mysqli_error($db);
    }
    
    mysqli_close($db);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-schale=1.0">
    <script src="https://kit.fontawesome.com/0bc22cc72a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/utilities.css">
    <title>RC - 5.2.2 <?=$user['username']?> - User Edit</title>
</head>
<body>
<div class="webcontainer">


    <section class="topbar-container">
        <div class="topbar details container flex">
            <a href="../../users/details?id=<?= $id ?>" class="btn btn-back flex-item"></a>
            <div class="topbar-main flex-item">
                <div class="titlesmall">User Edit</div> 
                <div class="titledesc"><?=$user['username']?></div> 
            </div>
        </div>
    </section>

<?php var_dump($_POST); ?>

    <section class="tabledetails">
        <form method="post" action="">
        <div class="item">
            <label for="username">username</label>
            <input id="username" type="text" name="username" value="<?= isset($user) ? $username : ''  ?>"/> 
        </div>
        <div class="item">
            <label for="email">email</label>
            <input id="email" type="text" name="email" value="<?= isset($user) ? $email : ''  ?>"/> 
        </div>
        <div class="item">
            <label for="password">password</label>
            <input id="password" type="password" name="password" value="<?= isset($user) ? $password : ''  ?>"/> 
        </div>
        <div class="item">
            <label for="firstname">firstname</label>
            <input id="firstname" type="text" name="firstname" value="<?= isset($user) ? $firstname : ''  ?>"/> 
        </div>
        <div class="item">
            <label for="lastname">lastname</label>
            <input id="lastname" type="text" name="lastname" value="<?= isset($user) ? $lastname : ''  ?>"/> 
        </div>
        <div class="item">
            <label for="vocaltype">vocaltype</label>
            <input id="vocaltype" type="text" name="role" value="<?= isset($user) ? $role : ''  ?>"/> 
        </div>
        <div class="item">
            <label for="role">role</label>
            <input id="role" type="text" name="role" value="<?= isset($user) ? $role : ''  ?>"/> 
        </div>
        <div class="item">
            <label for="organisation_id">organisation_id</label>
            <input id="organisation_id" type="text" name="organisation_id" value="<?= isset($user) ? $organisation_id : ''  ?>"/> 
        </div>
        <div class="item datasubmit-btn">
            <input class="btn" method="post" type="submit" name="submit" value="Save"/>
        </div>
        </form>
    </section>
</div>

<section class="bottomnavbar-container">
        <nav class="bottomnavbar container flex nav">
            <a href="../../../../main" class="btn nav-btn btn-home"><br><div class="btn-text">Home</div></a>
            <a href="../../../../events" class="btn nav-btn btn-event"><br><div class="btn-text">Events</div></a>
            <a href="../../../../inbox" class="btn nav-btn btn-inbox"><br><div class="btn-text">Inbox</div></a>
            <a href="../../../../settings" class="btn nav-btn btn-settings active"><br><div class="btn-text">Settings</div></a>
        </nav>
    </section>
</body>
</html>