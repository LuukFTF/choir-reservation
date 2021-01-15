<?php
date_default_timezone_set('Europe/Amsterdam');

require_once '../includes/demoarray-users.php';

    
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $role = $_POST['role'];
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

    if(empty($errors))
    {
        echo 'Name is: ' . $username;
    }
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
    <title>RC - 5.2.3 <?= isset($user) ? $username : ''  ?> - User Create</title>
</head>
<body>
<div class="webcontainer">


    <section class="topbar-container">
        <div class="topbar details container flex">
            <a href="../../users" class="btn btn-back flex-item"></a>
            <div class="topbar-main flex-item">
                <div class="titlesmall">User Edit</div> 
                <div class="titledesc"><?= isset($user) ? $username : ''  ?></div> 
            </div>
        </div>
    </section>

    <section class="tabledetails">
        <h2>Create New User</h2>
        <div class="item">
            <form action="" method="post">
                <label for="username">username</label>
                <input id="username" type="text" name="text" value="<?= isset($user) ? $username : ''  ?>"/> 
            </form>
        </div>
        <div class="item">
            <form action="" method="post">
                <label for="email">email</label>
                <input id="email" type="text" name="text" value="<?= isset($user) ? $email : ''  ?>"/> 
            </form>
        </div>
        <div class="item">
            <form action="" method="post">
                <label for="password">password</label>
                <input id="password" type="password" name="text" value="<?= isset($user) ? $password : ''  ?>"/> 
            </form>
        </div>
        <div class="item">
            <form action="" method="post">
                <label for="firstname">firstname</label>
                <input id="firstname" type="text" name="text" value="<?= isset($user) ? $firstname : ''  ?>"/> 
            </form>
        </div>
        <div class="item">
            <form action="" method="post">
                <label for="lastname">lastname</label>
                <input id="lastname" type="text" name="text" value="<?= isset($user) ? $lastname : ''  ?>"/> 
            </form>
        </div>
        <div class="item">
            <form action="" method="post">
                <label for="role">role</label>
                <input id="role" type="text" name="text" value="<?= isset($user) ? $role : ''  ?>"/> 
            </form>
        </div>
        <div class="item">
            <form action="" method="post">
                <label for="organisation_id">organisation_id</label>
                <input id="organisation_id" type="text" name="text" value="<?= isset($user) ? $organisation_id : ''  ?>"/> 
            </form>
        </div>
        <div class="item datasubmit-btn">
            <form action="../../users/">
                <input class="btn" type="submit" name="submit" value="Save"/>
            </form>
        </div>
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