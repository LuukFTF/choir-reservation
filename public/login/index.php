<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-schale=1.0">
    <script src="https://kit.fontawesome.com/0bc22cc72a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/utilities.css">
    <title>0.1 Login</title>
</head>

<body>

    <div class="webcontainer">
        <section class="logo">RC</section>
        <section class="login">
            <div class="main">
                <div class="title">Login</div>
                <div class="loginform">
                    <form class="field-item" action="" method="post">
                        <label>username</label>
                        <input type="text" id="username" name="username" value="">
                    </form>
                    <form class="field-item" action="" method="post">
                        <label>password</label>
                        <input type="text" id="password" name="password" value="">
                    </form>
                </div>
            </div>
            <div class="buttons container flex">
                <a class="btn secondary flex-item" href="">Signup<a>
                <form class="flex-item"><input class="btn" type="submit" value="Login"></input></form>
            </div>
        </section>

    </div>

    <section class="bottomnavbar-container">
        <nav class="bottomnavbar container flex nav">
            <a href="../../main" class="btn nav-btn btn-home"><br><div class="btn-text">Home</div></a>
            <a href="../../events" class="btn nav-btn btn-event active"><br><div class="btn-text">Events</div></a>
            <a class="btn nav-btn btn-inbox"><br><div class="btn-text">Inbox</div></a>
            <a class="btn nav-btn btn-settings"><br><div class="btn-text">Settings</div></a>
        </nav>
    </section>
</body>
</html>