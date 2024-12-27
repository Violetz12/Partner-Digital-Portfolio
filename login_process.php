<?php
header("Access-Control-Allow-Origin: https://violetz12.github.io");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("HTTP/1.1 204 No Content");
    exit();
}

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

    // Prepare and execute SQL query
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            echo "Login successful!";
            header("Location: https://violetz12.github.io/Partner-Portfolio/login_success");
        } else {
            echo "Invalid username or password.";
            header("Location: https://violetz12.github.io/Partner-Portfolio/login_fail");
        }
    } else {
        echo "Invalid username or password.";
        header("Location: https://violetz12.github.io/Partner-Portfolio/login_fail");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: https://violetz12.github.io/Partner-Portfolio");
    exit();
}
?>