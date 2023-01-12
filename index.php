<?php
    include('./src/php/db.php');
    session_start();
    if(isset($_SESSION['email']) || isset($_SESSION['user_id'])){
        header("Location: http://localhost/php-todo-app/src/php/home.php");
    }
    if(!isset($_SESSION['isAuth'])){
        $_SESSION['isAuth'] = false;
    }
    echo $_SESSION['email'] ?? 'not logged in';
    if(!empty($_POST)){
        
        $posted_email = $_POST['email'];
        $posted_password = $_POST['password'];

        $sql = "select * from todo_users where email='$posted_email' and password='$posted_password'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $authUser = $result->fetch_assoc();
            $_SESSION['isAuth'] = true;
            $_SESSION['user_id'] = $authUser['user_id'];
            $_SESSION['email'] = $authUser['email'];
        }else{
            echo 'no results returned';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Todo App</title>
</head>
<body class="">
   <main class="w-screen h-screen flex items-center justify-center">
    <div class="w-full flex items-center justify-center flex flex-col">
    <h1 class="font-bold text-3xl mb-4">Login to your Account 😁</h1>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/3">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
       Email 
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="email" placeholder="Enter Email Address">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" id="Password" type="Password" placeholder="Enter Password">
      <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
    </div>
    <div class="flex items-center justify-between">
      <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer"  type="submit"/>
      <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
        Create an Account?
      </a>
    </div>
  </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;php todo 😁.
  </p>
</div>

   </main>

</body>
</html>