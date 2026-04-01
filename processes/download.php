<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $assignment_id = intval($_POST['assignment_id'] ?? 0);
    $password = trim($_POST['password'] ?? '');

    if ($assignment_id <= 0 || empty($password)) {
        $_SESSION['error'] = "Invalid download request.";
        header("Location: ../assignment.php?id=" . $assignment_id);
        exit;
    }

    // Verify Password and Assignment Exists
    $stmt = $pdo->prepare("SELECT * FROM assignments WHERE id = ?");
    $stmt->execute([$assignment_id]);
    $assignment = $stmt->fetch();

    if (!$assignment) {
        $_SESSION['error'] = "Assignment not found.";
        header("Location: ../store.php");
        exit;
    }

    if (empty($assignment['download_password'])) {
        $_SESSION['error'] = "This document has already been downloaded (password used).";
        header("Location: ../assignment.php?id=" . $assignment_id);
        exit;
    }

    if ($assignment['download_password'] !== $password) {
        $_SESSION['error'] = "Incorrect download password.";
        header("Location: ../assignment.php?id=" . $assignment_id);
        exit;
    }

    // Password matches! 
    $filePath = '../uploads/' . $assignment['file_path'];

    // Check if real file exists, if not, provide a dummy file for mock uploads
    if (!file_exists($filePath)) {
        // Since we had mock files like 'mock_file.zip' in the DB originally,
        // let's create a dummy text file if it's missing just so the download doesn't break.
        if (!is_dir('../uploads')) mkdir('../uploads', 0777, true);
        file_put_contents($filePath, "This is the content for " . $assignment['title']);
    }

    // Set the password to NULL in DB since it was just used
    $updateStmt = $pdo->prepare("UPDATE assignments SET download_password = NULL WHERE id = ?");
    $updateStmt->execute([$assignment_id]);

    // Force Download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($assignment['file_path']) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filePath));
    readfile($filePath);
    
    // Process exits here so the page doesn't continue loading HTML
    exit;
} else {
    header("Location: ../store.php");
    exit;
}
?>
