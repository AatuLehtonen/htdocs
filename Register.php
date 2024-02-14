<?php

require_once('Connect.php');

// Process registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Jos ei ole annettu kaikkia vaadittavia tietoja, niin lopetetaan koodin suoritus ja kerrotaan se käyttäjälle.
    if (!isset($_POST["username"]) || !isset($_POST["email"]) || !isset($_POST["phone"]) || !isset($_POST["password"])) {
        die('Error: Not enough parameters provided.');
    }


    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Generate a random salt
    $salt = bin2hex(random_bytes(16));

    // Combine the salt with the user's password
    $saltedPassword = $salt . $password;

    // Hash the salted password
    $hash = password_hash($saltedPassword, PASSWORD_BCRYPT);

    // Insert user information into the database
    $stmt = $connection->prepare("INSERT INTO käyttäjät (Käyttäjänimi, Sähköposti, Puhelin, salt, Salasana) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $email, $phone, $salt, $hash);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();

?>