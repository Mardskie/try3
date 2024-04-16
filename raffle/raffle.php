<?php
require_once "database.php";

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT id, username FROM users";
$result = $mysqli->query($sql);
$users = $result->fetch_all(MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["raffle"])) {
    $randomUserIndex = array_rand($users);
    $randomUser = $users[$randomUserIndex]["username"];
    echo "The winner is: $randomUser";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raffle</title>
</head>
<body>
    <h2>User List</h2>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user["username"] ?></li>
        <?php endforeach; ?>
    </ul>
    <form method="post">
        <button type="submit" name="raffle">Begin Raffle</button>
    </form>
</body>
</html>
