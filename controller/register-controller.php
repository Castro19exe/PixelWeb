<?php
    session_start();
    require '../database/connection/config.php';
    require '../repository/user-repository.php';

    $name = $connection -> real_escape_string($_POST['username']);
    $email = $connection -> real_escape_string($_POST['email']);
    $password = $connection -> real_escape_string($_POST['password']);
    $con_password = $connection -> real_escape_string($_POST['con-password']);
    
    if(empty($name) || empty($email) || empty($password) || empty($con_password))  {
        $_SESSION['error_message'] = "Todos os campos têm de estar preenchidos!";
        header("Location: ../views/register.php");
    }
    elseif(preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>,;@\|\-=\-_+\-¬\`\]]/", $name)) {
        $_SESSION['error_message'] = "Apenas pode usar letras e números";
        header("Location: ../views/register.php");
    }
    elseif($password != $con_password) {
		$_SESSION['error_message'] = "A Palavra-Chave é difirente da sua confirmação!";
        header("Location: ../views/register.php");
	}
    // elseif(strlen($password) <= 5 ) {
	// 	$_SESSION['error_message'] = "Password tem de ter mais de 5 caracteres!";
	// 	header("Location: ../views/register.php");
	// }
    // elseif(!preg_match("#[0-9]+#", $password)) {
	// 	$_SESSION['error_message'] = "Password tem de ter pelo menos um número!";
	// 	header("Location: ../views/register.php");
	// }
	// elseif(!preg_match("#[a-z]+#", $password)) {
	// 	$_SESSION['error_message'] = "Password tem de ter pelo menos um caracter minúsculo e maiúsculo!";
	// 	header("Location: ../views/register.php");
	// }
    // elseif(!preg_match("#[A-Z]+#", $password)) {
	// 	$_SESSION['error_message'] = "Password tem de ter pelo menos um caracter minúsculo e maiúsculo!";
	// 	header("Location: ../views/register.php");
	// }
    elseif(verficationUsingUsername($name) >= 1) {
        $_SESSION['error_message'] = "Este nome de utilizador já existe!";
		header("Location: ../views/register.php");
    }
    elseif(verficationUsingEmail($email) >= 1) {
        $_SESSION['error_message'] = "Este email de utilizador já existe!";
		header("Location: ../views/register.php");
    }
    else {
        insertUser($name, $email, $password);
        header("Location: ../views/login.php");
        $_SESSION['success_message'] = "Utilizador criado com sucesso!";
    }

    $connection->close();
?>