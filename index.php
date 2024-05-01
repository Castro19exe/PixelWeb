<?php 
    session_start();
    require 'database/connection/config.php';
    require 'repository/games-repository.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <link rel="stylesheet" href="public/styles/index.css">
    <link rel="icon" href="public/images/logo.png">
    <script src=""></script>
    <title>Pixel Web | Início</title>
</head>
<body>
    <header class="menu" id="Menu">
        <h1>Pixel Web</h1>
        <div>
            <a class="menuBtn" href="views/register.php">Create Account</a>
            <a class="menuBtn" href="views/login.php">Login</a>
        </div>
    </header>
    <section class="titleContainer">
        <h1>Games</h1>
    </section>
    <section class="structure">
        <div class="gameContainer">
            <?php
            foreach(selectAllGames() as $dados) { ?>
                <a href="games/<?php echo $dados['gameLink'] ?>">
                    <div class="game" style="background-image: url('public/images/<?php echo $dados['gameImage'] ?>')"></div>
                </a>
            <?php
            } ?>
        </div>
    </section>
</body>
</html>