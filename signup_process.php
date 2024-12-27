<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database credentials
    $servername = "sql309.infinityfree.com";
    $dbUsername = "if0_37992676";
    $dbPassword = "uQrplqHgcTpR56";
    $dbName = "if0_37992676_user_db";

    // Create connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Sign up successful!";
        header("Location: https://violetz12.github.io/Partner-Portfolio");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: https://violetz12.github.io/Partner-Portfolio");
    exit();
}
?>