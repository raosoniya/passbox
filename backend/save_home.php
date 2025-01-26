<?php
session_start();
if(!isset($_SESSION["useremail"])){
    header("location:./../login.php");
    exit;
}

if(!isset($_POST["submit"])){
    header("location:./../login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

$username = $_POST["username"];
$sitename = $_POST["websitename"];
$password = $_POST["password"];
date_default_timezone_set("Asia/Kolkata");
$date = date("d-M-Y");
$time = date("h:i:s a");

include "./../database/db.php";

$q = "INSERT INTO add_password (username,sitename,password,date,time,user_id) VALUES ('$username','$sitename','$password','$date','$time','$user_id')";

if(mysqli_query($con,$q)){
    echo"<h1>Password Added Sucessfully.</h1>";
    header("refresh:3;url=./../home.php");
}else{
    echo"<h1>Something went wrong.<br>Please try again later.</h1>";
    header("refresh:3;url=./../home.php");
}

?>