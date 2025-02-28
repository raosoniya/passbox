<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if(!isset($_SESSION["useremail"])){
    header("location:./login.php");
    exit;
}

$user_id = $_SESSION["user_id"]; 

include "./database/db.php";

$q = "SELECT * FROM add_password WHERE user_id = '$user_id'";
$sql = mysqli_query($con,$q);
$num = mysqli_num_rows($sql);

// $i=0;
// while($row = mysqli_fetch_assoc($sql)){
//     $sitename[$i]=$row["sitename"];
//     $password[$i]=$row["password"];
//     $date[$i]=$row["date"];
//     $time[$i]=$row["time"];
//     $i++;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/home.css">
    <title>Home Page</title>
</head>
<body>
    <h1 class="h1">Welcome to PASSBOX</h1>
    <h5 class="h5">Securely save and manage all your<br> passwords in one place with ease</h5>

    <div class="add-section">
        <form action="./backend/save_home.php" method="POST">
            <input type="text" required name="username" placeholder="Username..."><br>
            <input type="text" required name="websitename" placeholder="Website Name..."><br>
            <input type="password" required name="password" placeholder="Password"><br>
            <input type="submit" value="Add Password" name="submit" class="btn btn-success btn-save">
        </form>
    </div>
    <hr class="line">
    <h4 class="h4">View All Passwords</h4>
    <div class="save-pass">
    <?php
    if ($num != 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            echo <<<abc
                <div class="all-saved-pass">
                    <h4 class="show-username">{$row['username']}</h4>
                    <h4 class="show-sitename">{$row['sitename']}</h4>
                    <h4 class="show-pass">{$row['password']}</h4>
                    <button class="copy-btn" onclick="copyPassword(this)">📋</button>
                </div>
abc;
        }
    }else{
        echo "<h6>No Posts yet</h6>";
    }
    ?>
    <div class="cb"></div>
    </div>

    <a href="logout.php" class="alink">
        <button class="btn btn-danger btn1">LOG OUT<button>
    </a>
    <script src="./js/copy.js"></script>
</body>
</html>