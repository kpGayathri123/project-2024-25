<?php
header('Content-Type: application/json');
// include 'dbconnect.php';
$host = 'localhost';
$db = 'nutrimetric';
$user = 'root';     
$pass = '';      

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);




$name = $_POST['name'] ?? '';
$age = $_POST['age'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$height = $_POST['height'] ?? '';
$weight = $_POST['weight'] ?? '';

if (!$name || !$age || !$email || !$height || !$weight) {
      echo json_encode(['msg' => 'Missing required fields.']);
    exit;
}

$bmi = round($weight / ($height * $height), 2);


if ($bmi < 18.5) {
    $class = 'Underweight';
} elseif ($bmi < 24.9) {
    $class = 'Normal';
} elseif ($bmi < 29.9) {
    $class = 'Overweight';
} else {
    $class = 'Obese';
}

try {
    $stmt = $pdo->prepare("
        INSERT INTO bmi_results (name, age, email, phone, height, weight, bmi, class)
        VALUES (:name, :age, :email, :phone, :height, :weight, :bmi, :class)
        ON DUPLICATE KEY UPDATE
            name = VALUES(name),
            age = VALUES(age),
            phone = VALUES(phone),
            height = VALUES(height),
            weight = VALUES(weight),
            bmi = VALUES(bmi),
            class = VALUES(class)
    ");

    $stmt->execute([
        ':name' => $name,
        ':age' => $age,
        ':email' => $email,
        ':phone' => $phone,
        ':height' => $height,
        ':weight' => $weight,
        ':bmi' => $bmi,
        ':class' => $class
    ]);

    echo json_encode([
        'msg' => 'Data saved successfully!',
        'bmi' => $bmi,
        'class' => $class
    ]);
} catch (PDOException $e) {
    echo json_encode(['msg' => 'SQL error: ' . $e->getMessage()]);
}
?>
