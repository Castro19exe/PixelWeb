<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <link rel="stylesheet" href="../public/styles/login.css">
    <link rel="icon" href="../public/images/logo.png">
    <title>Pixel Web | Register</title>
</head>
<body>
    <section class="structure-base">
        <div class="structure-align">
            <div>
                <!-- <img src="../public/images/void.png" alt="" class="void">
                <img src="../public/images/allien2.png" alt="" class="allien-red">
                <img src="../public/images/allien1.png" alt="" class="allien-yellow"> -->
                <!-- <h1 class="title-login"> Login </h1> -->
                <form action="../controller/register-controller.php" method="POST" id="login-form">
                    <input type="text" name="username" class="form-input" placeholder="Username" autofocus>
                    <input type="email" name="email" class="form-input" placeholder="Email">
                    <input type="password" name="password" class="form-input" placeholder="Password">
                    <input type="password" name="con-password" class="form-input" placeholder="Confirm Password">
                    <button type="submit" name="submit" class="btn-login"> Create </button>
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
    </section>
</body>
</html>