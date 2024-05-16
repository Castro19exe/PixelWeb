<?php
    session_start();
    require '../database/connection/config.php';
    require '../repository/user-repository.php';

    $name = $connection -> real_escape_string($_POST['username']);
    $password = $connection -> real_escape_string($_POST['password']);

    if(empty($name) || empty($password))  {
        $_SESSION['error_message'] = "Todos os campos têm de estar preenchidos!";
        header("Location: ../views/login.php");
    }
    elseif(preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>,;@\|\-=\-_+\-¬\`\]]/", $name)) {
        $_SESSION['error_message'] = "O nome de conta apenas pode ter letras e números!";
        header("Location: ../views/login.php");
        exit;
    }
    else {
        selectUser($name, $password);
    }

    $connection->close();
?>