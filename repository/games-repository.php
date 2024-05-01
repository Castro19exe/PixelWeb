<?php
    function selectAllGames() {
        global $connection;

        try {
            $query = "SELECT * FROM game WHERE gameStatus = 1";
            $result = mysqli_query($connection, $query);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }
?>