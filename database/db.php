<?php
$a="localhost";
$b="root";
$c="";
$d= "passbox";

$con = mysqli_connect("$a","$b","$c","$d");

if($con -> connect_errno){
    echo"<h1>Database Error! Unable to connect with database</h1>";
    exit();
}

?>