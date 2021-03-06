<?php
date_default_timezone_set('Europe/Amsterdam');

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db/db-connect.php';

$current_datetime = date("Y-m-d H:i:s");

if(!isset($_GET['id']) || $_GET['id'] == '') {
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
$dateupdated = $user['dateupdated'];
$datecreated = $user['datecreated'];
$organisation_id = $user['organisation_id'];

    
if (isset($_POST['submit'])) {
    isset($_POST['username']) ?      $username           = htmlspecialchars($_POST['username'], ENT_QUOTES)        : $errors[] = 'Username is required';
    isset($_POST['email']) ?         $email              = htmlspecialchars($_POST['email'], ENT_QUOTES)           : $errors[] = 'Email is required';
    isset($_POST['password']) ?      $password           = htmlspecialchars($_POST['password'], ENT_QUOTES)        : $errors[] = 'Password is required';
    isset($_POST['firstname']) ?     $firstname          = htmlspecialchars($_POST['firstname'], ENT_QUOTES)       : '';
    isset($_POST['lastname']) ?      $lastname           = htmlspecialchars($_POST['lastname'], ENT_QUOTES)        : '';
    isset($_POST['vocaltype']) ?     $vocaltype          = htmlspecialchars($_POST['vocaltype'], ENT_QUOTES)       : '';
    isset($_POST['role']) ?          $role               = htmlspecialchars($_POST['role'], ENT_QUOTES)            : $errors[] = 'Role is required';
    isset($_POST['organisation_id']) ? $organisation_id  = htmlspecialchars($_POST['organisation_id'], ENT_QUOTES) : $errors[] = 'organisation_id is required';

    if(empty($errors)) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $query_edit = "UPDATE users
        SET dateupdated = '$current_datetime', username = '$username', email = '$email', password = '$password_hashed', firstname = '$firstname', lastname = '$lastname', vocaltype = '$vocaltype', role = '$role', organisation_id = $organisation_id
        WHERE user_id = $id
        ";

        $result2 = mysqli_query($DB, $query_edit)
        or die('Error: '.$query_edit);
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
    <meta name="viewport" content="width=device-width,
    initial-schale=1.0">
    <script src="https://kit.fontawesome.com/0bc22cc72a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/utilities.css">
    <title>RC - 5.2.2 <?=$user['username']?> - User Edit</title>
</head>
<body>
    <section class="topbar-container">
        <div class="topbar details container flex">
            <a href="../../users/details?id=<?= $id ?>" class="btn btn-back flex-item"></a>
            <div class="topbar-main flex-item">
                <div class="titlesmall">User Edit</div> 
                <div class="titledesc"><?=$user['username']?></div> 
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
                <label for="password">password reset</label>
                <input id="password" type="password" name="password" value=""/> 
            </div>
            <div class="item">
                <label>password confirm</label>
                <input type="password" id="passwordconfirm" name="passwordconfirm" value="">
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
            <div class="container flex flexrow btnrow">
                <div class="flex-item item datasubmit-btn">
                    <input class="btn" method="post" type="submit" name="submit" value="Save"/>
                </div>
                <div class="flex-item item datasubmit-btn">
                    <a class="btn" href="../delete?id=<?= $id ?>">Delete</a>
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