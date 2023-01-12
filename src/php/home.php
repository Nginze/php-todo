<?php
    require('db.php');
    session_start();
    if($_POST){
        $todo_info = $_POST['todo_info'];
        $user_id = $_SESSION['user_id'];
        $sql = "Insert into todo_snippets(user_id, todo_info) values ('$user_id', '$todo_info')";
        $conn->query($sql);
        header("Location: http://localhost/php-todo-app/src/php/home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php todo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="overflow-y-hidden">
    
    <main class="w-screen h-screen flex items-center justify-center">
        <div class="w-full flex items-center justify-center flex flex-col">
            <h1 class="font-bold text-3xl mb-4">Create Todos 📚</h1>

        <div  class = "mb-7 w-1/2">
            <form method="POST" action='<?php $_SERVER['PHP_SELF']?>' class="flex flex-row items-center" >
                <input name="todo_info" class="px-3 py-5 h-16 mr-5 shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter a task to do later..."/>
                <input class="bg-blue-500 hover:bg-blue-700 h-16 text-white font-bold py-3 px-5 rounded focus:outline-none focus:shadow-outline cursor-pointer" type="submit" value="Add Todo + "/>            
            </form>
        </div>
        <div class='flex flex-col items-center w-1/3 h-96 overflow-y-auto overflow-x-hidden'>
            <p class="mb-5 w-full text-center">Your todos</p>
            <?php
                $user_id = $_SESSION['user_id'];
                $sql = "select * from todo_snippets where user_id ='$user_id' and isDone= false";
                $result = $conn->query($sql);
                if($result->num_rows > 0):
            ?>
                <?php
                    while($todo = $result->fetch_assoc()): 
                ?>
                <div class="w-full cursor-pointer mb-5 bg-slate-400 flex justify-between text-white px-3 py-5 h-16 mr-5 shadow appearance-none border rounded w-full text-gray-700 leading-tight">
                    <?php
                        echo $todo['todo_info'];
                    ?>
                    <div class="flex items-center">

                    <a href='<?php echo "complete.php?id={$todo['todo_id']}";?>' class="p-3 bg-green-600 rounded-full w-12 h-12 flex items-center justify-center"><i class="fa-solid fa-check text-2xl"></i></a>
                    <a href='<?php echo "delete.php?id={$todo['todo_id']}"?>' class="ml-5 p-3 bg-red-600 rounded-full w-12 h-12 flex items-center justify-center">
                        <i class="fa-solid fa-xmark text-2xl"></i>
                    </a>
                    </div>
                </div>
                <?php endwhile?>
            <?php
                endif 
            ?>
        </div> 
        </div>
    </main>
</body>
</html>
