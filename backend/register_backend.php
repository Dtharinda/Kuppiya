<?php
// 1. Session start කරන්න මුලින්ම
session_start();

// 2. Database connection
require_once '../includes/kuppiya_db.php';

// 3. Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    
    // 4. Get form data
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // 5. Track errors
    $errors = [];
    
    // 6. Validation
    if (empty($username)) {
        $errors[] = "Username is required!";
    }
    
    if (empty($email)) {
        $errors[] = "Email is required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format!";
    }
    
    if (empty($password)) {
        $errors[] = "Password is required!";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters!";
    }
    
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match!";
    }
    
    // 7. If there are errors, redirect with error message
    if (!empty($errors)) {
        $_SESSION['error'] = implode("<br>", $errors);
        header("Location: ../pages/index.php");
        exit();
    }
    
    // 8. Check if email exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if (!$check) {
        $_SESSION['error'] = "Database error: " . $conn->error;
        header("Location: ../pages/index.php");
        exit();
    }
    
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();
    
    if ($check->num_rows > 0) {
        $_SESSION['error'] = "Email already exists! Please use a different email.";
        header("Location: ../pages/index.php");
        exit();
    }
    
    // 9. Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // 10. Insert into database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if (!$stmt) {
        $_SESSION['error'] = "Database error: " . $conn->error;
        header("Location: ../pages/index.php");
        exit();
    }
    
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    
    if ($stmt->execute()) {
        // 11. Set session variables
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        
        // 12. Set success message
        $_SESSION['success'] = "Registration successful! Welcome to Kuppiya, $username!";
        
        // 13. Redirect to home page
        header("Location: ../pages/index.php");
        exit();
        
    } else {
        $_SESSION['error'] = "Registration failed: " . $conn->error;
        header("Location: ../pages/index.php");
        exit();
    }
    
} else {
    // If not a POST request, redirect to home
    header("Location: ../pages/index.php");
    exit();
}
?>