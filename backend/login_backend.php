<?php
// 1. Session start කරන්න මුලින්ම
session_start();

// 2. Database connection
require_once '../includes/kuppiya_db.php';

// 3. Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    
    // 4. Get form data
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    // 5. Validation
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email and password are required!";
        header("Location: ../pages/index.php");
        exit();
    }
    
    // 6. Check user in database
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    if (!$stmt) {
        $_SESSION['error'] = "Database error!";
        header("Location: ../pages/index.php");
        exit();
    }
    
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // 7. Verify password
        if (password_verify($password, $user['password'])) {
            // 8. Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $email;
            
            // 9. Set success message
            $_SESSION['success'] = "Welcome back, " . $user['username'] . "!";
            
            // 10. Redirect to home page
            header("Location: ../pages/index.php");
            exit();
            
        } else {
            $_SESSION['error'] = "Invalid email or password!";
            header("Location: ../pages/index.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "No account found with this email!";
        header("Location: ../pages/index.php");
        exit();
    }
    
} else {
    // If not a POST request, redirect to home
    header("Location: ../pages/index.php");
    exit();
}
?>