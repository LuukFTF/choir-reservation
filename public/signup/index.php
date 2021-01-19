<?php
date_default_timezone_set('Europe/Amsterdam');

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db/db-connect.php';

$current_datetime = date("Y-m-d H:i:s");

if (isset($_POST['submit'])) {
    isset($_POST['username']) ?      $username           = htmlspecialchars($_POST['username'], ENT_QUOTES)         : $errors[] = 'Username is required';
    isset($_POST['email']) ?         $email              = htmlspecialchars($_POST['email'], ENT_QUOTES)            : $errors[] = 'Email is required';
    isset($_POST['password']) ?      $password           = htmlspecialchars($_POST['password'], ENT_QUOTES)         : $errors[] = 'Password is required';
    isset($_POST['invitecode']) ?    $organisation_id    = htmlspecialchars($_POST['invitecode'], ENT_QUOTES)       : $errors[] = 'organisation_id is required';

    if(true) {
        $query_create = "INSERT INTO users
                (dateupdated,           username,       email,      password,      organisation_id, firstname)
        VALUES  ('$current_datetime',   '$username',    '$email',   '$password',   $organisation_id, '$username')";

        $result2 = mysqli_query($DB, $query_create)
        or die('Error: '.$query_create);
    } else {
        $errors[] = 'cant start database transaction';
    }

    if ($result2) {
        header('Location: /main/');
        exit;
    } else {
        $errors[] = 'Error: '.mysqli_error($DB);
    }
    
    // mysqli_close($DB);
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
    
    <section class="logo">RC</section>
    
    <section class="login signup">
    <form method="post" action="">
        <div class="main">
            <div class="title">Signup</div>
            <div class="loginform">
                <div class="field-item">
                    <label>username</label>
                    <input type="text" id="username" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>">
                </div>
                <div class="field-item">
                    <label>email</label>
                    <input type="text" id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
                </div>
                <div class="field-item space">
                    <label>password</label>
                    <input type="password" id="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                </div>
                <div class="field-item">
                    <label>password confirm</label>
                    <input type="password" id="passwordconfirm" name="passwordconfirm" value="">
                </div>
            </div>
        </div>
        <div class="main2">
            <div class="loginform">
                <div class="field-item">
                    <label>organisation invite code</label>
                    <input type="text" id="invitecode" name="invitecode" value="<?= isset($_POST['invitecode']) ? $_POST['invitecode'] : '' ?>">
                </div>
            </div>
        </div>  
        <div class="buttons container flex">
            <a class="btn secondary flex-item" href="../login/">Login<a>
            <div class="flex-item"><input class="btn" method="post" type="submit" name="submit" value="Signup"></input></div>
        </div>
    </form>
    </section>
    <span class="error"><?php isset($errors) ? var_dump($errors) : false ?></span>

</div>

</body>
</html>