<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validation
    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match!';
        header('Location: index.php');
        exit();
    }
    
    // Check if user exists
    $check_sql = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
    $check_result = mysqli_query($conn, $check_sql);
    
    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error'] = 'User already exists!';
        header('Location: index.php');
        exit();
    }
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert new user
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Registration successful! Please login.';
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['error'] = 'Registration failed!';
        header('Location: index.php');
        exit();
    }
}

// Redirect if accessed directly
header('Location: index.php');
?>