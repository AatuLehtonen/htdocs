<?php
$user = "root";
$password = "";
$host = "localhost";
$database = "asap";

$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>