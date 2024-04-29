<?php
    function verficationUsingUsername($name) {
        global $connection;

        try {
            $query = "SELECT COUNT(id_user) AS user_count FROM `user` WHERE `userName` = '$name'";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)) {
                $nome_count = $row['user_count'];
            }

            return $nome_count;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function verficationUsingEmail($email) {
        global $connection;

        try {
            $query = "SELECT COUNT(id_user) AS email_count FROM `user` WHERE `userEmail` = '$email'";
            $result = mysqli_query($connection, $query);
            while($row_pass = mysqli_fetch_assoc($result)) {
                $email_count = $row_pass['email_count'];
            }

            return $email_count;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function insertUser($nome, $email, $password) {
        global $conn;
        
        try {
            $insert = "INSERT INTO user (nome_user, email_user, pass_user) VALUES ( '$nome', '$email', SHA1('$password') )";
            $result = mysqli_query($conn, $insert);

            return;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectUser($nome, $password) {
        global $conn;

        try {
            $select = "SELECT id_user, email_user, imagem_user, cargo_user, COUNT(id_user) AS users_count FROM `user` WHERE `nome_user` = '$nome' AND `pass_user` = SHA1('$password')";
		    $result = mysqli_query($conn, $select);
            while($row = mysqli_fetch_assoc($result)) {
                $count = $row['users_count'];
                $user_id = $row['id_user'];
                $user_email = $row['email_user'];
                $user_image = $row['imagem_user'];
                $user_rank = $row['cargo_user'];
            }

            if($count != 1) {
                $_SESSION['error_message'] = "Nome do utilizador ou palavra-passe inválidas!";
                header("Location: ../../pages/login.php");
                exit;
            }
            else {
                $_SESSION['user'] = array("id" => $user_id, "name" => $nome, "email" => $user_email, "image" => $user_image, "rank" => $user_rank);

                header("Location: ../../pages/home-log.php");
            }

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function updateUser($nome, $email, $password) {
        global $conn;
        
        try {
            $update = "UPDATE user SET nome_user = '$nome', email_user = '$email' WHERE pass_user = SHA1('$password')";
            $result = mysqli_query($conn, $update);

            return;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }
?>