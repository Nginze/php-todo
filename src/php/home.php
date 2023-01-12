
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php todo</title>
</head>
<body>
    <?php
        require('db.php');
        session_start();
        $user_id = $_SESSION['user_id'];
        $sql = "select * from todo_snippets where user_id ='$user_id'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            
        }
    ?>
</body>
</html>
