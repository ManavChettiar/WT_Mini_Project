<?php

require 'db.php';

$name = trim($_POST['name']);
$age = (int)$_POST['age'];
$gender = $_POST['gender'];
$weight = (float)$_POST['weight'];
$height = (float)$_POST['height'];
$activity_level = $_POST['activity_level'];
$goal = $_POST['goal'];
$dietary_preference = trim($_POST['dietary_preference']);

if ($gender === 'male') {
    $bmr = 10 * $weight + 6.25 * $height - 5 * $age + 5;
} else {
    $bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;
}

$activity_factors = [
    'sedentary' => 1.2,
    'light' => 1.375,
    'moderate' => 1.55,
    'active' => 1.725,
    'very_active' => 1.9,
];

$activity_factor = $activity_factors[$activity_level] ?? 1.2;

$tdee = $bmr * $activity_factor;

switch ($goal) {
    case 'lose':
        $tdee -= 500;
        break;
    case 'gain':
        $tdee += 500; 
        break;
}

$sql = "INSERT INTO users (name, age, gender, weight, height, activity_level, goal, dietary_preference, bmr, tdee)
        VALUES (:name, :age, :gender, :weight, :height, :activity_level, :goal, :dietary_preference, :bmr, :tdee)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':name' => $name,
    ':age' => $age,
    ':gender' => $gender,
    ':weight' => $weight,
    ':height' => $height,
    ':activity_level' => $activity_level,
    ':goal' => $goal,
    ':dietary_preference' => $dietary_preference,
    ':bmr' => $bmr,
    ':tdee' => $tdee,
]);

header('Location: index.php');
exit;
?>
