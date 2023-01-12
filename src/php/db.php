<?php
        $host = "localhost";
        $username = "root";
        $password = "guuk12jona";
        $db = "php_todo";

        $conn = mysqli_connect($host, $username, $password, $db);

        if(!$conn){
            die("connection to db failed". mysqli_connect_error());
        }

?>