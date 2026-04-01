<?php
require_once '../config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $assignment_id = intval($_POST['assignment_id'] ?? 0);
    $new_password = trim($_POST['new_password'] ?? '');

    if ($assignment_id > 0 && !empty($new_password)) {
        $stmt = $pdo->prepare("UPDATE assignments SET download_password = ? WHERE id = ?");
        if ($stmt->execute([$new_password, $assignment_id])) {
            $_SESSION['success'] = "Password updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update password.";
        }
    } else {
        $_SESSION['error'] = "Invalid input.";
    }

    header("Location: index.php");
    exit;
}
?>
