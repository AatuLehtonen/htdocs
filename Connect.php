<?php
$user = "Teemu";
$password = "1234";
$host = "localhost";
$database = "asap";

$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>