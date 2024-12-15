<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // CHANGE BASED ON YOUR WEBSITE
    if ($username === "Zandy" && $password === "123456") 
    { 
        
        echo "Login successful!";
        header("Location: login sucess.html");
    } else {
        
        echo "Invalid username or password.";
        header("Location: login fail.html");
    }
} else {
    
    header("Location: index.html");
    exit();
}
?>