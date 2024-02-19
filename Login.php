<?php
require_once('Connect.php');

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required parameters are provided
    if (!isset($_POST["username"]) || !isset($_POST["password"])) {
        die('Error: Not enough parameters provided.');
    }

    // User's username from the login form
    $username = $_POST['username'];
    // User's password from the login form
    $password = $_POST['password'];

    try {
        // Retrieve the stored salt and hashed password from the database based on the username/email
        $stmt = $connection->prepare("SELECT * FROM käyttäjät WHERE Käyttäjänimi = :username OR Sähköposti = :username LIMIT 1");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Fetch the result as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $user = $result['Käyttäjänimi'];
            $email = $result['Sähköposti'];
            $salt = $result['Salt'];
            $hashedPassword = $result['Salasana'];

            // Combine the retrieved salt with the entered password
            $saltedPassword = $salt . $password;

            // Verify the password using password_verify
            if (password_verify($saltedPassword, $hashedPassword)) {
                // Password is correct
                // Allow the user to log in

            } else {
                // Password is incorrect
                // Deny access
                echo $hashedSaltedPassword . "\n" . $hashedPassword;
                echo "Login failed!";
            }
        } else {
            // User not found
            echo "User not found!";
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