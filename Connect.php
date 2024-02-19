<?php
$user = "root";
$password = "";
$host = "localhost";
$database = "asap";

$connection = new PDO("mysql:host=$host;dbname=$database", "$user", "$password");

$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>