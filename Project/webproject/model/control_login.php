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

$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $errors[] = "Email and password are required.";
    } else {
        
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($mysqli, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                header("Location: profile.php");
                exit;
            } else {
                $errors[] = "Invalid email or password.";
            }
        } else {
            $errors[] = "No user found with that email.";
        }
    }
}

mysqli_close($mysqli);
?>