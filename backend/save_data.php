<?php
if(!isset($_POST["xyz"])){
    header("location:./../register.php");
    exit;
}

$fullname = ucwords($_POST["fullname"]);
$useremail = $_POST["useremail"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];

include "./../database/db.php";

$a= "SELECT useremail from registration";
$sql = mysqli_query($con,$a);

while($row=mysqli_fetch_assoc($sql)){
    if($useremail == $row["useremail"]){
        echo "<h1>User already exist.</h1>";
        header("location:./../login.php");
        exit;
    }
}

$q = "INSERT INTO registration (fullname,useremail,mobile,password) VALUES ('$fullname','$useremail','$mobile','$password')";

if(mysqli_query($con,$q)){
    echo "<h1>Registration Successful.</h1>";
    header("refresh:3;url=./../login.php");
}else{
    echo("<h1>Registration Failed. Please try again later!</h1>");
    header("refresh:3;url=./../register.php");
}


?>