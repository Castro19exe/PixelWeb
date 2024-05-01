<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <link rel="stylesheet" href="../public/styles/login.css">
    <link rel="icon" href="../public/images/logo.png">
    <title>Pixel Web | Login</title>
</head>
<body>
    <section class="structure-base">
        <div class="structure-align">
            <div>
                <form action="../controller/login-controller.php" method="POST" id="login-form">
                    <input type="text" name="username" class="form-input" placeholder="Username" autofocus autocomplete="off">
                    <input type="password" name="password" class="form-input" placeholder="Password" autocomplete="off">
                    <button type="submit" name="submit" class="btn-login"> Login </button>
                </form>
            </div>
        </div>

        <div class="form-group 
            <?php 
                if(empty($_SESSION['error_message']))
                    echo("hide");
            ?>
            ">
            <span class="erro">
                <?php if(!empty($_SESSION['error_message']))
                    echo $_SESSION['error_message'];
                    unset($_SESSION['error_message']);
                ?>
            </span>
        </div>
        <div class="form-group 
            <?php 
                if(empty($_SESSION['success_message']))
                    echo("hide");
            ?>
            ">
            <span class="success">
                <?php if(!empty($_SESSION['success_message']))
                    echo $_SESSION['success_message'];
                    unset($_SESSION['success_message']);
                ?>
            </span>
        </div>
    </section>
</body>
</html>