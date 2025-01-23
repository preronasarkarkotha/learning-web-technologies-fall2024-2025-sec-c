<?php
session_start();


$host = 'localhost';
$db = 'registration_db';
$user = 'root';
$password = '';


$mysqli = mysqli_connect($host, $user, $password, $db);


if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = '$user_id'"; 

$result = mysqli_query($mysqli, $query);

if (!$result) {
    die("Error: " . mysqli_error($mysqli));
}

$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("User not found.");
}

mysqli_free_result($result);
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>

<h1>Profile</h1>

<table>
    <tr>
        <th>Name:</th>
        <td><?php echo htmlspecialchars($user['name']); ?></td>
    </tr>
    <tr>
        <th>Email:</th>
        <td><?php echo htmlspecialchars($user['email']); ?></td>
    </tr>
    <tr>
        <th>Gender:</th>
        <td><?php echo htmlspecialchars($user['gender']); ?></td>
    </tr>
    <tr>
        <th>Phone:</th>
        <td><?php echo htmlspecialchars($user['phone']); ?></td>
    </tr>
    <tr>
        <th>Registration Date:</th>
        <td><?php echo htmlspecialchars($user['created_at']); ?></td>
    </tr>
</table>

<a href="logout.php">Logout</a>

</body>
</html>
