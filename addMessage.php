<?php
$message = $_POST ["add"];
require_once('Connect.php');
$userid = 2;
$query = "INSERT INTO viestit (Viesti, KId)
            VALUES ('".$message."', ".$userid.")";

echo $query;

$results = $connection->query($query);
if (!$results) {
    die('Error: ' . $connection->error);
}

mysqli_close($connection);
?>