<?php
    session_start();
    require '../database/connection/config.php';
    require '../repository/user-repository.php';

    $nome = $conn -> real_escape_string($_POST['username']);
    $password = $conn -> real_escape_string($_POST['password']);

    if(empty($nome) || empty($password))  {
        $_SESSION['error_message'] = "Todos os campos têm de estar preenchidos!";
        header("Location: ../views/login.php");
    }
    elseif(preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>,;@\|\-=\-_+\-¬\`\]]/", $nome)) {
        $_SESSION['error_message'] = "Apenas pode usar letras e números!";
        header("Location: ../views/login.php");
        exit;
    }
    else {
        selectUser($nome, $password);
    }

    $conn->close();
?>