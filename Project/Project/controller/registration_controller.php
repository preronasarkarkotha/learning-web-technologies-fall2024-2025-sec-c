<?php
include_once '../model/registration_model.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $agree = isset($_POST['agree']) ? true : false;

    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo 'All fields are required.<br>';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format.<br>';
    }

    if ($password !== $confirm_password) {
        echo 'Passwords do not match.<br>';
    }

    if (!$agree) {
        echo 'You must agree to the privacy policy.<br>';
    }

    if (!empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && $password === $confirm_password && $agree) {
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        $result = insertUser($data);

        if ($result) {
            echo "Registration successful! <a href='../view/login_view.php'>Login here</a>";
        } else {
            echo "Registration failed. Please try again.";
        }
    }
}
?>
