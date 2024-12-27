<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "Zandy" && $password === "123456") 
    { 
        echo "Login successful!";
        header("Location: https://violetz12.github.io/Partner-Portfolio/login_sucess");
    } else {
        echo "Invalid username or password.";
        header("Location: https://violetz12.github.io/Partner-Portfolio/login_fail");
    }
} else {
    header("Location: https://violetz12.github.io/Partner-Portfolio");
    exit();
}
?>