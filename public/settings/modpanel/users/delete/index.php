<?php
date_default_timezone_set('Europe/Amsterdam');

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db/db-connect.php';

if(!isset($_GET['id']) || $_GET['id'] == '') {
    header('Location: /settings/modpanel/users');
    exit;
}

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    
    $query_delete = "DELETE FROM users WHERE user_id = $id";


    $result = mysqli_query($DB, $query_delete)
    or die('Error in query: '.$query_delete);

    mysqli_close($DB);

    header("Location: /settings/modpanel/users");
    exit;
}


$query = "SELECT * 
FROM users 
WHERE user_id = $id
";

$result = mysqli_query($DB, $query)
or die('Error in query: '.$query);

$user =  mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-schale=1.0">
    <script src="https://kit.fontawesome.com/0bc22cc72a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/utilities.css">
    <title>RC - 5.2.4 <?= isset($user) ? $user['username'] : '';?> - User Delete</title>
</head>

<body>
    <section class="topbar-container">
        <div class="topbar details container flex">
            <a href="../edit?id=<?= $id ?>"" class="btn btn-back flex-item"></a>
            <div class="topbar-main flex-item">
                <div class="titlesmall">User Delete</div> 
                <div class="titledesc"><?= isset($user) ? $user['username'] : ''; ?></div> 
            </div>
        </div>
    </section>


    <div class="webcontainer">
    <section class="tabledetails">
    <form method="post" action="">
        <h3>Are you sure you want to delete user: <?= $user['username']; ?> (user_id: <?= $user['user_id']; ?>)</h3>
        <div class="container flex flexrow btnrow">
        <div class="item datasubmit-btn">
            <input class="btn" method="post" type="submit" name="submit" value="Delete <?= $user['username']; ?>"/>
        </div>
        <div class="item datasubmit-btn">
            <a class="btn" href="../edit?id=<?= $id ?>">Back</a>
        </div>
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