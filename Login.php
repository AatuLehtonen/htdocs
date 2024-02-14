<?php
// User's password from the registration form
$userPassword = $_POST['password'];

// Hash the password using the bcrypt algorithm (recommended)
$hashedPassword = password_hash($userPassword, PASSWORD_BCRYPT);

// Store $hashedPassword in the database

// Generate a random salt
$salt = bin2hex(random_bytes(16)); // 16 bytes for a reasonable level of security

// Combine the salt with the user's password
$saltedPassword = $salt . $userPassword;

// Hash the salted password
$hashedPassword = password_hash($saltedPassword, PASSWORD_BCRYPT);

// Store $salt and $hashedPassword in the database

// Retrieve the stored salt and hashed password from the database based on the username/email
// ...

// Combine the retrieved salt with the entered password
$saltedPasswordAttempt = $salt . $_POST['password'];

// Verify the password
if (password_verify($saltedPasswordAttempt, $storedHashedPassword)) {
    // Password is correct
    // Allow the user to log in
} else {
    // Password is incorrect
    // Deny access
}

?>