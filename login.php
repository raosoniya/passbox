<?php
session_start();
if(isset($_SESSION["useremail"])){
    header("location:./index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>
    <div class="container">
        <div class="text">
            <div class="passbox">
                <h1 class="h1">PASSBOX</h1>
                <form action="./backend/verify_data.php" method="POST">
                    <input type="email" required name="useremail" placeholder="User@gmail.com"><br>
                    <input type="password" required name="password" placeholder="Password"><br>
                    <input type="submit" value="Login" class="register">
                </form>
            </div>
            <span class="already-account">
                Don't have any account?<a href="register.php" class="login-btn"> Register</a></span>
        </div>
    </div>
    
</body>
</html>