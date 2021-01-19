<?php
date_default_timezone_set('Europe/Amsterdam');

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db/db-connect.php';

$current_datetime = date("Y-m-d H:i:s");

if (isset($_POST['submit'])) {
    isset($_POST['username'])           ? $username             = htmlspecialchars($_POST['username'], ENT_QUOTES)        : $errors[] = 'Username is required';
    isset($_POST['email'])              ? $email                = htmlspecialchars($_POST['email'], ENT_QUOTES)           : $errors[] = 'Email is required';
    isset($_POST['password'])           ? $password             = htmlspecialchars($_POST['password'], ENT_QUOTES)        : $errors[] = 'Password is required';
    isset($_POST['firstname'])          ? $firstname            = htmlspecialchars($_POST['firstname'], ENT_QUOTES)       : '';
    isset($_POST['lastname'])           ? $lastname             = htmlspecialchars($_POST['lastname'], ENT_QUOTES)        : '';
    isset($_POST['vocaltype'])          ? $vocaltype            = htmlspecialchars($_POST['vocaltype'], ENT_QUOTES)       : '';
    isset($_POST['role'])               ? $role                 = htmlspecialchars($_POST['role'], ENT_QUOTES)            : $errors[] = 'Role is required';
    isset($_POST['organisation_id'])    ? $organisation_id      = htmlspecialchars($_POST['organisation_id'], ENT_QUOTES) : $errors[] = 'organisation_id is required';

    if(empty($errors)) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $query_create = "INSERT INTO users
                (dateupdated,           username,       email,      password,       firstname,      lastname,       vocaltype,      role,       organisation_id)
        VALUES  ('$current_datetime',   '$username',    '$email',   '$password_hashed',    '$firstname',   '$lastname',    '$vocaltype',   '$role',    $organisation_id)";

        $result2 = mysqli_query($DB, $query_create)
        or die('Error: '.$query_create);
    }

    if ($result2) {
        header('Location: /settings/modpanel/users');
        exit;
    } else {
        $errors[] = 'Error: '.mysqli_error($DB);
    }
    
    mysqli_close($DB);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-schale=1.0">
    <script src="https://kit.fontawesome.com/0bc22cc72a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/utilities.css">
    <title>RC - 5.2.3 <?= isset($user) ? $username : ''  ?> - User Create</title>
</head>

<body>
    <section class="topbar-container">
        <div class="topbar details container flex">
            <a href="../../users" class="btn btn-back flex-item"></a>
            <div class="topbar-main flex-item">
                <div class="titlesmall">User Create</div> 
                <div class="titledesc"><?= isset($user) ? $username : ''  ?></div> 
            </div>
        </div>
    </section>


    <div class="webcontainer">
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
            <input id="vocaltype" type="text" name="vocaltype" value="<?= isset($user) ? $vocaltype : ''  ?>"/> 
        </div>
        <div class="item">
            <label for="role">role</label>
            <select id="role" name="role" value="<?= isset($user) ? $role : '' ?>">
                <option value="<?= isset($user) ? $role : '' ?>" selected><?= isset($user) ? $role : '' ?></option> 
                <option value="sysadmin">Sysadmin</option>
                <option value="admin">Admin</option>
                <option value="moderator">Moderator</option>
                <option value="editor">Editor</option>
                <option value="defaultuser">Default User</option>
                <option value="guest">Guest</option>
            </select>
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
    <span class="error"><?php isset($errors) ? var_dump($errors) : false ?></span>

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