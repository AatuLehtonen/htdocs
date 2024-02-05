<?php
$Id = $_POST["user"];
require_once('Connect.php');

$query = "SELECT Viesti, Aika, Käyttäjänimi
            FROM viestit, käyttäjät
            WHERE viestit.KId = käyttäjät.Id
            AND (viestit.VId = $Id OR viestit.KId = $Id)
            ORDER BY Aika ASC";

$results = $connection->query($query);
if (!$results) {
    die('Error: ' . $connection->error);
} else {
    foreach ($results as $row) {
        echo "Kirjoittaja: " . $row['Käyttäjänimi'];
        echo "<br>";
        echo "Viesti: " . $row['Viesti'];
        echo "<br>";
        echo "Aika: " . $row['Aika'];
        echo "<br><br>";
    }
}

mysqli_close($connection);
?>