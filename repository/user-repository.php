<?php
    function verficationUsingUsername($name) {
        global $connection;

        try {
            $query = "SELECT COUNT(userID) AS userCount FROM user WHERE userName = '$name'";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)) {
                $nome_count = $row['userCount'];
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
            $query = "SELECT COUNT(userID) AS emailCount FROM user WHERE `userEmail` = '$email'";
            $result = mysqli_query($connection, $query);
            while($row_pass = mysqli_fetch_assoc($result)) {
                $email_count = $row_pass['emailCount'];
            }

            return $email_count;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function insertUser($name, $email, $password) {
        global $connection;
        
        try {
            $insert = "INSERT INTO user (userName, userEmail, userPassword) VALUES ( '$name', '$email', SHA1('$password') )";
            $result = mysqli_query($connection, $insert);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectUser($name, $password) {
        global $connection;

        try {
            $select = "SELECT userID, userEmail, userImage, userRole, COUNT(userID) AS usersCount FROM user WHERE userName = '$name' AND userPassword = SHA1('$password')";
		    $result = mysqli_query($connection, $select);
            while($row = mysqli_fetch_assoc($result)) {
                $count = $row['usersCount'];
                $user_id = $row['userID'];
                $user_email = $row['userEmail'];
                $user_image = $row['userImage'];
                $user_rank = $row['userRole'];
            }

            if($count != 1) {
                $_SESSION['error_message'] = "Nome do utilizador ou palavra-passe inválidas!";
                header("Location: ../views/login.php");
                exit;
            }
            else {
                $_SESSION['user'] = array("id" => $user_id, "name" => $name, "email" => $user_email, "image" => $user_image, "rank" => $user_rank);

                header("Location: ../views/home-log.php");
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