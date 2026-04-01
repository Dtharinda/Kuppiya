<?php
// processes/auth.php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    
    if ($_POST['action'] === 'login') {
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        
        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Email and password are required.";
            header("Location: ../index.php");
            exit;
        }
        
        $stmt = $pdo->prepare("SELECT id, username, password_hash, role FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password_hash'])) {
            // Login successful
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            
            if ($user['role'] === 'admin') {
                header("Location: ../admin/index.php");
            } else {
                header("Location: ../dashboard.php");
            }
            exit;
        } else {
            $_SESSION['error'] = "Invalid email or password.";
            header("Location: ../index.php");
            exit;
        }
    } elseif ($_POST['action'] === 'register') {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($username) || empty($email) || empty($password)) {
            $_SESSION['error'] = "All fields are required for registration.";
            header("Location: ../index.php");
            exit;
        }

        // Check if email or username exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$email, $username]);
        if ($stmt->fetch()) {
            $_SESSION['error'] = "Email or Username already exists.";
            header("Location: ../index.php");
            exit;
        }

        // Insert new user
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash, role) VALUES (?, ?, ?, 'student')");
        if ($stmt->execute([$username, $email, $hash])) {
            $newUserId = $pdo->lastInsertId();
            $_SESSION['user_id'] = $newUserId;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'student';
            $_SESSION['success'] = "Registration successful! Welcome.";
            header("Location: ../dashboard.php");
            exit;
        } else {
            $_SESSION['error'] = "Something went wrong during registration.";
            header("Location: ../index.php");
            exit;
        }
    }
}
?>
