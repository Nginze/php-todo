<?php

    session_start();

    require('db.php');

    $todo_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $sql = "Update todo_snippets set isDone=true where user_id = '$user_id' and todo_id ='$todo_id'";

    $conn->query($sql);

    header("Location: http://localhost/php-todo-app/src/php/home.php");

?>