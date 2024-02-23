<?php
session_start();
require_once('../htdocs/Connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phoneNumber = $_POST['puh'];

    // Validate and sanitize the input data if needed
    $stmt = $connection->prepare("SELECT * FROM käyttäjät WHERE Käyttäjänimi = :username AND Puhelin = :phone LIMIT 1");
    $stmt->bindParam(':username', $name);
    $stmt->bindParam(':Puhelin', $phoneNumber);
    $stmt->execute();

    // Use prepared statement to insert the user into the database
    $stmt = $connection->prepare("INSERT INTO käyttäjät (Käyttäjänimi, Puhelin) VALUES (:user, :phone)");
    $stmt->bindParam(':user', $name);
    $stmt->bindParam(':phone', $phoneNumber);

    if ($stmt->execute()) {
        // User added successfully, you can redirect or perform other actions
        echo 'User added successfully';
        // header('Location: success_page.php');
        exit();
    } else {
        // Handle the error, you can redirect or display an error message
        echo 'An error occurred';
        //header('Location: error_page.php');
        exit();
    }
} else {
    // Redirect if accessed directly without submitting the form
    //header('Location: index.html');
    exit();
}
?>