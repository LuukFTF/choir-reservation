<?php
session_start();

date_default_timezone_set('Europe/Amsterdam');

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db/db-connect.php';

if (isset($_SESSION['logindata'])) {
    header("Location: /main/");
    exit;
}

if (isset($_POST['submit'])) {
    isset($_POST['username'])   ? $username     = htmlspecialchars($_POST['username'], ENT_QUOTES)         : $errors[] = 'Username is required';
    isset($_POST['password'])   ? $password     = $_POST['password']                                       : $errors[] = 'Password is required';
    
    if(empty($errors)) {
        $query_login = "SELECT *
        FROM users
        WHERE username = '$username'";

        $result = mysqli_query($DB, $query_login)
        or die($errors[] = 'Error: '.mysqli_error($DB));
    
        $user = mysqli_fetch_assoc($result);
    }

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['logindata'] = [
                'user_id' => $user['user_id'],
                'organisation_id' => $user['organisation_id'],
                'role' => $user['role'],
                'username' => $user['username']
            ];
            header("Location: /main/");
            exit;
        } else { $errors[] = 'Your login details are incorrect'; }
    } else { $errors[] = 'Your login details are incorrect'; }
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
    <title>RC - 0.1 Login</title>
</head>

<body>
<div class="webcontainer">

<?php var_dump($errors) ?>
<?php var_dump($_SESSION['logindata']) ?>
<?php var_dump($_SESSION) ?>
<?php var_dump($_POST) ?>
<?php var_dump($result) ?>
<?php var_dump($user) ?>


    <section class="logo">RC</section>

    <section class="login">
    <form method="post" action="">
        <div class="main">
            <div class="title">Login</div>
            <div class="loginform">
                <div class="field-item">
                    <label>username</label>
                    <input type="text" id="username" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>">
                </div>
                <div class="field-item">
                    <label>password</label>
                    <input type="password" id="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                </div>
            </div>
        </div>
        <div class="buttons container flex">
            <a class="btn secondary flex-item" href="../signup/">Signup<a>
            <div class="flex-item"><input class="btn" method="post" type="submit" name="submit" value="Login"></input></div>
        </div>
    </form>
    </section>
    <span class="error"><?php isset($errors) ? var_dump($errors) : false ?></span>


</div>

</body>
</html>