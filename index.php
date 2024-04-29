<?php session_start() ?>
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
            <a href="games/PacMan/index.html">
                <div class="game"></div>
            </a>
            <a href="games/SnakeGame/index.html">
                <div class="game"></div>
            </a>
            <div class="game"></div>
            <div class="game"></div>
            <div class="game"></div>
            <div class="game"></div>
            <div class="game"></div>
            <div class="game"></div>
            <div class="game"></div>
            <div class="game"></div>
        </div>
    </section>
</body>
</html>