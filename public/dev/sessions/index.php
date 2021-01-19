<?php
date_default_timezone_set('Europe/Amsterdam');

session_start();

$logindata = $_SESSION['logindata'];

$user_id = $logindata['user_id'];
$organisation_id = $logindata['organisation_id'];
$role = $logindata['role'];
$username = $logindata['username'];

if (isset($_POST['submit'])) {
    isset($_POST['user_id']) ?          $user_id            = htmlspecialchars($_POST['user_id'], ENT_QUOTES)               : '';
    isset($_POST['organisation_id']) ?  $organisation_id    = htmlspecialchars($_POST['organisation_id'], ENT_QUOTES)      : '';
    isset($_POST['role']) ?             $role               = htmlspecialchars($_POST['role'], ENT_QUOTES)                  : '';
    isset($_POST['username']) ?         $username           = htmlspecialchars($_POST['username'], ENT_QUOTES)              : '';

    if(empty($errors)) {
        $_SESSION['logindata'] = [
            'user_id' => $user_id,
            'organisation_id' => $organisation_id,
            'role' => $role,
            'username' => $username
        ];
    }
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
    <title>RC - 0.2 Signup</title>
</head>

<body>
<div class="webcontainer">
    <section class="tabledetails">
            <form method="post" action="">
                <div class="item">
                    <label for="user_id">user_id</label>
                    <input id="user_id" type="text" name="user_id" value="<?= isset($logindata) ? $user_id : ''  ?>"/> 
                </div>
                <div class="item">
                    <label for="organisation_id">organisation_id</label>
                    <input id="organisation_id" type="text" name="organisation_id" value="<?= isset($logindata) ? $organisation_id : ''  ?>"/> 
                </div>
                <div class="item">
                <label for="role">role</label>
                <select id="role" name="role" value="<?= isset($user) ? $role : '' ?>">
                    <option value="<?= isset($logindata) ? $role : '' ?>" selected><?= isset($logindata) ? $role : '' ?></option> 
                    <option value="sysadmin">Sysadmin</option>
                    <option value="admin">Admin</option>
                    <option value="moderator">Moderator</option>
                    <option value="editor">Editor</option>
                    <option value="defaultuser">Default User</option>
                    <option value="guest">Guest</option>
                </select>
            </div>
                <div class="item">
                    <label for="username">username</label>
                    <input id="username" type="text" name="username" value="<?= isset($logindata) ? $username : ''  ?>"/> 
                <div class="container flex flexrow btnrow">
                    <div class="flex-item item datasubmit-btn">
                        <input class="btn" method="post" type="submit" name="submit" value="Save"/>
                    </div>
                    <div class="flex-item item datasubmit-btn">
                        <a class="btn" href="/settings/modpanel/">Back</a>
                    </div>
                </div>   
            </form>
    </section>
</div>

 <?php var_dump($_SESSION['logindata']) ?>