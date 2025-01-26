<?php

include "./database/db.php";

$q = "SELECT id FROM registration WHERE email= $";
$sql = mysqli_query($conn, $q);


?>