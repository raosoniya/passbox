<?php
session_start();
if(!isset($_POST["useremail"]) || !isset($_POST["password"])){
    header("location:./../login.php");
    exit;
}

$useremail = $_POST["useremail"];
$password = $_POST["password"];

include "./../database/db.php";

$q = "SELECT * FROM registration WHERE useremail = '$useremail'";
$sql=mysqli_query($con, $q);

if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);

    if ($password == $row["password"]) {
        $_SESSION["useremail"] = $useremail;
        $_SESSION["user_id"] = $row["id"]; 
        header("location:./../index.php");
        exit;
    } 
    else {
        echo "Incorrect password.";
        header("refresh:3;url=./../login.php");
    }
} else {
    echo "User not found.";
    header("refresh:3;url=./../login.php");
}


// $pass=0;

// while($row=mysqli_fetch_assoc($sql)){
//     $userid=$row["id"];
//     if($useremail==$row["useremail"]){
//         $pass = 1;

//         if($password==$row["password"]){

//             session_start();
//             $_SESSION["useremail"] = $useremail;
//             header("location:./../index.php");
//             exit;
//         }
//     }
// }

// if($pass==0){
//     echo"User not found.";
//     header("refresh:3;url=./../login.php");
// }
// if($pass==1){
//     echo"Password Incorrect.";
//     header("refresh:3;url=./../login.php");
// }
?>