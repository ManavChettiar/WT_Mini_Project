<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM users ORDER BY created_at DESC");
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calorie Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Calorie Calculator</h2>
        <form action="calculate.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" name="weight" step="0.1" required>

            <label for="height">Height (cm):</label>
            <input type="number" id="height" name="height" step="0.1" required>

            <label for="activity_level">Activity Level:</label>
            <select id="activity_level" name="activity_level" required>
                <option value="">Select Activity Level</option>
                <option value="sedentary">Sedentary</option>
                <option value="light">Lightly Active</option>
                <option value="moderate">Moderately Active</option>
                <option value="active">Very Active</option>
            </select>

            <label for="goal">Goal:</label>
            <select id="goal" name="goal" required>
                <option value="">Select Goal</option>
                <option value="lose">Lose Weight</option>
                <option value="maintain">Maintain Weight</option>
                <option value="gain">Gain Weight</option>
            </select>

            <label for="dietary_preference">Dietary Preference:</label>
            <input type="text" id="dietary_preference" name="dietary_preference">

            <input type="submit" value="Calculate">
        </form>

        <h3>Previous Entries</h3>
        <table>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Weight (kg)</th>
                <th>Height (cm)</th>
                <th>Activity Level</th>
                <th>Goal</th>
                <th>Dietary Preference</th>
                <th>BMR</th>
                <th>TDEE</th>
                <th>Action</th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= $user['age'] ?></td>
                <td><?= $user['gender'] ?></td>
                <td><?= $user['weight'] ?></td>
                <td><?= $user['height'] ?></td>
                <td><?= $user['activity_level'] ?></td>
                <td><?= $user['goal'] ?></td>
               <td><?= htmlspecialchars($user['dietary_preference']) ?></td>
                <td><?= round($user['bmr'], 2) ?></td>
                <td><?= round($user['tdee'], 2) ?></td>
                <td><a href="delete.php?id=<?= $user['id'] ?>">Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
 
