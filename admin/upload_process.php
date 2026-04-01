<?php
require_once '../config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $price = floatval($_POST['price'] ?? 0);
    $download_password = trim($_POST['download_password'] ?? '');
    $author_id = $_SESSION['user_id'];

    if (empty($title) || empty($category) || empty($download_password)) {
        $_SESSION['error'] = "Title, category, and password are required.";
        header("Location: index.php");
        exit;
    }

    // Handle File Upload
    if (isset($_FILES['assignment_file']) && $_FILES['assignment_file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . '_' . basename($_FILES['assignment_file']['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['assignment_file']['tmp_name'], $targetFilePath)) {
            // Insert into DB
            $stmt = $pdo->prepare("INSERT INTO assignments (title, description, category, price, file_path, download_password, author_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
            if ($stmt->execute([$title, $description, $category, $price, $fileName, $download_password, $author_id])) {
                $_SESSION['success'] = "Assignment uploaded successfully!";
            } else {
                $_SESSION['error'] = "Database insertion failed.";
            }
        } else {
            $_SESSION['error'] = "File upload failed.";
        }
    } else {
        $_SESSION['error'] = "Please select a valid file.";
    }

    header("Location: index.php");
    exit;
}
?>
