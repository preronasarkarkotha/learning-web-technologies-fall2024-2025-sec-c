<?php
include_once '../model/login_model.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($_POST['mydata'], true);
    $email = trim($data['email']);
    $password = trim($data['password']);
    $rememberMe = isset($data['rememberMe']) ? $data['rememberMe'] : false;

    if (empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Both fields are required']);
        exit;
    }

    $user = checkUserCredentials($email, $password);

    if ($user) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];

        if ($rememberMe) {
            setcookie('email', $user['email'], time() + (30 * 24 * 60 * 60), "/");
            setcookie('name', $user['name'], time() + (30 * 24 * 60 * 60), "/");
        }

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid Email or Password']);
    }
}
?>
