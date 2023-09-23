<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajax_practice_app";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// check for connection errors
if($mysqli->connect_errno) {
    echo "Failed to connect to  MYSQL: " . $mysqli->connect_error;
    exit();
}



$category_status = array("Active", "Inactive" );


?>