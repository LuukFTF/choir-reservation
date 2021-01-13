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
        <section class="login signup">
            <div class="main">
                <div class="title">Signup</div>
                <div class="loginform">
                    <form class="field-item" action="" method="post">
                        <label>username</label>
                        <input type="text" id="username" name="username" value="">
                    </form>
                    <form class="field-item" action="" method="post">
                        <label>email</label>
                        <input type="text" id="email" name="email" value="">
                    </form>
                    <form class="field-item space" action="" method="post">
                        <label>password</label>
                        <input type="password" id="password" name="password" value="">
                    </form>
                    <form class="field-item" action="" method="post">
                        <label>password confirm</label>
                        <input type="password" id="passwordconfirm" name="passwordconfirm" value="">
                    </form>
                </div>
            </div>
            <div class="main2">
                <div class="loginform">
                    <form class="field-item" action="" method="post">
                        <label>organisation invite code</label>
                        <input type="text" id="invitecode" name="invitecode" value="">
                    </form>
                </div>
            </div>  
            <div class="buttons container flex">
                <a class="btn secondary flex-item" href="../login/">Login<a>
                <form class="flex-item" action="../main/"><input class="btn" type="submit" value="Signup"></input></form>
            </div>
        </section>

    </div>

</body>
</html>