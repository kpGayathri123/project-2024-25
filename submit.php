<?php
// submit.php
header("Content-Type: application/json");

$name = trim($_POST["name"]);
$age = intval($_POST["age"]);
$phone = trim($_POST["phone"] ?? '');
$email = trim($_POST["email"] ?? '');
$height = floatval($_POST["height"] ?? 0);
$weight = floatval($_POST["weight"] ?? 0);


if (empty($name) || empty($age) || empty($email) || $height <= 0 || $weight <= 0) {
    echo json_encode([
        'success' => false,
        'message' => 'Please fill in all required fields with valid values.'
    ]);
    exit;
}

$bmi = $weight / ($height * $height);
$bmiRounded = round($bmi, 2);

if ($bmi < 18.5) {
    $classification = "Underweight";
} elseif ($bmi < 25) {
    $classification = "Normal weight";
} elseif ($bmi < 30) {
    $classification = "Overweight";
} else {
    $classification = "Obese";
}

echo json_encode([
    'success' => true,
    'message' => "Hello, $name! Your BMI is $bmiRounded, which is considered $classification.",
    'bmi' => $bmiRounded,
    'classification' => $classification
]);
?>
