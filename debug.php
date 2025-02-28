<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Testing error logging...";
include "non_existing_file.php"; // This should trigger an error
?>
