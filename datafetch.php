<?php

header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "nutrimetric");
if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

    if (!isset($_POST['email']) || empty($_POST['email'])) {
    echo json_encode(['error' => 'No email provided.']);
    exit;
}



$email = $_POST['email'];

$stmt = $conn->prepare("SELECT bmi, class FROM bmi_results WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
    echo json_encode([
        'bmi' => $row['bmi'],
        'class' => $row['class']
    ]);
    } else {
    echo json_encode(['error' => 'No data found for the given email. Calculate your BMI here ->']);
    }

$stmt->close();
$conn->close();
?>
