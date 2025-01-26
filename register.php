<?php
session_start();
if(isset($_SESSION["useremail"])){
    header("location:./home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration Form</title>
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>
    <div class="container">
        <div class="text">
            <div class="passbox">
                <h1 class="h1">PASSBOX</h1>
                <form action="./backend/save_data.php" method="POST">
                    <input type="text" required name="fullname" placeholder="Full Name"><br>
                    <input type="email" required name="useremail" placeholder="User@gmail.com"><br>
                    <input type="phone" required name="mobile" placeholder="Mobile Number"><br>
                    <input type="password" required name="password" placeholder="Password"><br>
                    <input type="submit" value="Register" name="xyz" class="register">
                </form>
            </div>
            <span class="already-account">
                Already have account?<a href="login.php" class="login-btn"> Login</a></span>
        </div>
    </div>
    
</body>
</html>