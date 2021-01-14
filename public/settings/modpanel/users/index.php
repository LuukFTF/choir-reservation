<?php
date_default_timezone_set('Europe/Amsterdam');

require_once 'includes/demoarray-users.php';

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
    <title>RC - 5.2 Users </title>
</head>
<body>
<div class="webcontainer">

    <section class="topbar-container">
            <div class="topbar details container flex">
                <a href="../../modpanel/" class="btn btn-back flex-item"></a>
                <div class="topbar-main flex-item">
                    <div class="titlesmall">Users</div> 
                    <div class="titledesc">Foo Fighters</div> 
                </div>
            </div>
    </section>

    <section class="users-table">
        <table class="users">
                <thead>
                    <th>#</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Role</th>
                    <th>Organisation_id</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach ($users as $id => $user) { ?>
                    <tr>
                        <td><?= $id ?></th>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['password'] ?></td>
                        <td><?= $user['firstname'] ?></td>
                        <td><?= $user['lastname'] ?></td>
                        <td><?= $user['role'] ?></td>
                        <td><?= $user['organisation_id'] ?></td>
                        <td><a class="btn" href="details?id=<?= $id ?>">Details</a></td>
                    </tr>
                    <?php $id++; } ?>
                </tbody>
            </table> 
        <a href="/create" class="btn">Create</a>
    </section>
</div>

    <section class="bottomnavbar-container">
        <nav class="bottomnavbar container flex nav">
            <a href="../../../main" class="btn nav-btn btn-home"><br><div class="btn-text">Home</div></a>
            <a href="../../../events" class="btn nav-btn btn-event"><br><div class="btn-text">Events</div></a>
            <a href="../../../inbox" class="btn nav-btn btn-inbox"><br><div class="btn-text">Inbox</div></a>
            <a href="../../../settings" class="btn nav-btn btn-settings active"><br><div class="btn-text">Settings</div></a>
        </nav>
    </section>

</body>
</html>