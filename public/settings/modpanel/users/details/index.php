<?php
date_default_timezone_set('Europe/Amsterdam');

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db/db-connect.php';

// Redirect back if index not in url or value is empty
if(!isset($_GET['id']) || $_GET['id'] == '')
{
    header('Location:/settings/modpanel/users');
    exit;
}

$id = $_GET['id'];

$query = "SELECT * 
FROM users 
WHERE user_id = $id";


$result = mysqli_query($DB, $query)
or die('Error in query: '.$query);

$user =  mysqli_fetch_assoc($result);
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
    <title>RC - 5.2.1 <?=$user['username']?> - User Detail</title>
</head>
<body>
    <section class="topbar-container">
            <div class="topbar details container flex">
                <a href="../../users/" class="btn btn-back flex-item"></a>
                <div class="topbar-main flex-item">
                    <div class="titlesmall">User Detail</div> 
                    <div class="titledesc"><?=$user['username']?></div> 
                </div>
            </div>
    </section>
    <span class="error"><?php isset($errors) ? var_dump($errors) : false ?></span>

    <div class="webcontainer">
    <section class="tabledetails">
        <div class="item">
            <h3><?=$user['username']?></h3>
            <p>#<?=$id?></p>
        </div>
        <div class="item">
            <p>email</p>
            <h4><?=$user['email']?></h4>
        </div>
        <div class="item">
            <p>firstname</p>
            <h4><?=$user['firstname']?></h4>
        </div>
        <div class="item">
            <p>lastname</p>
            <h4><?=$user['lastname']?></h4>
        </div>
        <div class="item">
            <h4><?=$user['vocaltype']?></h4>
            <p>vocaltype</p>
        </div>
        <div class="item">
            <h4><?=$user['role']?></h4>
            <p>role</p>
        </div>
        <div class="item">
            <h4><?=$user['dateupdated']?></h4>
            <p>dateupdated</p>
        </div>
        <div class="item">
            <h4><?=$user['datecreated']?></h4>
            <p>datecreated</p>
        </div>
        <div class="item">
            <h4><?=$user['organisation_id']?></h4>
            <p>organisation_id</p>
        </div>
        <a class="btn" href="../edit?id=<?= $id ?>">Edit</a>
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