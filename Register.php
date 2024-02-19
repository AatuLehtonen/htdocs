<?php

require_once('Connect.php');

// Process registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required parameters are provided
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

    try {
        // Use prepared statements with PDO
        $stmt = $connection->prepare("INSERT INTO käyttäjät (Käyttäjänimi, Sähköposti, Puhelin, salt, Salasana) VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $phone);
        $stmt->bindParam(4, $salt);
        $stmt->bindParam(5, $hash);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . implode(" ", $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Close the statement
        $stmt = null;
    }
}

// Close the connection
$connection = null;

?>