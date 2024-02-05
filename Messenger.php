<?php
session_start();
$_SESSION["LoggedIn"] = 2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>Document</title>

</head>
<body>
    <h1>Messages</h1>
    <p id = "messages">
    </p>

    <textarea id="message" rows="4" cols="50" placeholder="Kirjoita viesti..."></textarea>
    <button id="Send" type="button">Lähetä</button>

    <input type="hidden" id="Id" value="<?php echo($_SESSION["LoggedIn"]); ?>">

</body>
</html>