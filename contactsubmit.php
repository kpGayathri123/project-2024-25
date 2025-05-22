<?php
//contactsubmit.php
header('Content-Type: application/json');

// include 'dbconnect.php';
$host = 'localhost';
$db = 'nutrimetric';
$user = 'root';     
$pass = '';      

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);



$name = $_POST['name'] ?? '';

$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if (!$name || !$email || !$message) {
      echo json_encode(['msg' => 'Missing required fields.']);
    exit;
}

try {
    $stmt = $pdo->prepare("
        INSERT INTO contact (name, email, message)
        VALUES (:name, :email, :message)
    ");

    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':message' => $message
    ]);

    echo json_encode([
        'msg' => 'Data saved successfully!',
    ]);
} catch (PDOException $e) {
    echo json_encode(['msg' => 'SQL error: ' . $e->getMessage()]);
}
?>
