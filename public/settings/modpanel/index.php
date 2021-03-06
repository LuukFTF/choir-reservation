<?php
date_default_timezone_set('Europe/Amsterdam');

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db/db-connect.php';

$logindata = $_SESSION['logindata'];

$user_id = $logindata['user_id'];
$organisation_id = $logindata['organisation_id'];
$role = $logindata['role'];
$username = $logindata['username'];

if ($role !== 'mod' && $role !== 'admin' && $role !== 'sysadmin') {
    header('Location:/settings/');
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
    <title>RC - 4. Settings</title>
</head>
<body>
    <section class="topbar-container">
            <div class="topbar details container flex">
                <a href="../../settings/" class="btn btn-back flex-item"></a>
                <div class="topbar-main flex-item">
                    <div class="titlesmall">Modpanel</div> 
                    <div class="titledesc">Foo Fighters</div> 
                </div>
            </div>
    </section>
    <span class="error"><?php isset($errors) ? var_dump($errors) : false ?></span>

    <div class="webcontainer">
    <section class="settings container flex">
        <div class="settings-search flex-item">
            <form class="field-item" action="" method="post">
                <label>search</label>
                <input type="text" id="username" name="username" value="">
            </form>
        </div>
        <div class="settings-mainbutton flex-item">
            <a class="btn flex-item" href="../../settings/">User Settings</a>
        </div>
        <div class="settings-main flex-item container flex ">
            <a class="btn secondary s2 setting flex-item">Organisation</a>
            <a href="users" class="btn secondary s2 setting flex-item">Members</a>
            <a href="users" class="btn secondary s2 setting flex-item">Roles</a>
            <a class="btn secondary s2 setting flex-item">Privacy</a>
        </div>
        <div class="settings-main flex-item container flex ">
            <a class="btn secondary s2 setting flex-item">Notifications</a>
            <a class="btn secondary s2 setting flex-item">Event Items</a>
            <a class="btn secondary s2 setting flex-item">Presence</a>
        </div>
        <div class="settings-main flex-item container flex ">
            <a href="users" class="btn secondary s2 setting flex-item">Users Table</a>
            <a class="btn secondary s2 setting flex-item">Event Table</a>
            <a class="btn secondary s2 setting flex-item">Presence Table</a>
        </div>
        <div class="settings-main flex-item container flex ">
            <a class="btn secondary s2 setting flex-item">Audit Log</a>
            <a class="btn secondary s2 setting flex-item">Invites</a>
        </div>
        <div class="settings-main flex-item container flex ">
            <a class="btn secondary s2 setting flex-item">Security</a>
            <a class="btn secondary s2 setting flex-item">About</a>
            <a class="btn secondary s2 setting flex-item">Help</a>
        </div>
        <div class="settings-main flex-item container flex ">
            <h2>dev tools</h2>
            <a href="/dev/organisations/" class="btn secondary s2 setting flex-item">Organisations Table</a>
            <a href="users" class="btn secondary s2 setting flex-item">Users DB Table</a>
            <a href="/dev/sessions/" class="btn secondary s2 setting flex-item">Session Data Edit</a>
        </div>
    </section>
    </div>


    <section class="bottomnavbar-container">
        <nav class="bottomnavbar container flex nav">
            <a href="../../main" class="btn nav-btn btn-home"><br><div class="btn-text">Home</div></a>
            <a href="../../events" class="btn nav-btn btn-event"><br><div class="btn-text">Events</div></a>
            <a href="../../inbox" class="btn nav-btn btn-inbox"><br><div class="btn-text">Inbox</div></a>
            <a href="../../settings" class="btn nav-btn btn-settings active"><br><div class="btn-text">Settings</div></a>
        </nav>
    </section>
</body>
</html>