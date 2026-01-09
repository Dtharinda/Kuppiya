<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    
    // Find user by email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            
            // Redirect to dashboard
            header('Location: dashboard.php');
            exit();
        } else {
            $_SESSION['error'] = 'Invalid password!';
            header('Location: index.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'User not found!';
        header('Location: index.php');
        exit();
    }
}

// Redirect if accessed directly
header('Location: index.php');
?>