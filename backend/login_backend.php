<?php
// 1. Session එක ආරම්භ කිරීම (සෑම විටම ගොනුවේ ඉහළින්ම තිබිය යුතුය)
session_start();

// 2. Database සම්බන්ධතාවය ලබා ගැනීම
require_once '../includes/kuppiya_db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    
    // 3. Input දත්ත ලබා ගැනීම සහ පිරිසිදු කිරීම (Security)
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = $_POST['password'];

    // 4. හිස් තැන් පරීක්ෂාව
    if (empty($email) || empty($password)) {
        echo "<script>alert('Please fill in all fields!'); window.history.back();</script>";
        exit();
    }

    // 5. Prepared Statement භාවිතා කර දත්ත ලබා ගැනීම (SQL Injection ආරක්ෂාව)
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // 6. පරිශීලකයෙකු සිටීදැයි බැලීම
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // 7. Hash කළ Password එක සත්‍යාපනය කිරීම
        if (password_verify($password, $user['password'])) {
            
            // 8. Session දත්ත ගබඩා කිරීම (Header එකේ පෙන්වීමට අවශ්‍ය දත්ත)
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // සාර්ථක නම් index.php වෙත යොමු කිරීම
            header("Location: ../pages/index.php"); 
            exit(); 
        } else {
            // වැරදි Password එකක් නම්
            echo "<script>alert('Invalid email or password!'); window.history.back();</script>";
            exit();
        }
    } else {
        // User කෙනෙක් හමු නොවූයේ නම්
        echo "<script>alert('No account found with this email!'); window.history.back();</script>";
        exit();
    }
    
    $stmt->close();
} else {
    // නීති විරෝධී ලෙස මෙම පිටුවට පැමිණියහොත් Home එකට යැවීම
    header("Location: ../pages/index.php");
    exit();
}
?>