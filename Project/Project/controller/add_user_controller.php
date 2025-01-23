<?php
session_start();
include_once '../model/add_user_model.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

 
    $user_id = addUser($name, $email, $role);

  
    if ($user_id) {
        $_SESSION['user_message'] = "Error: Could not add user.";  
    } else {
        $_SESSION['user_message'] = "User added successfully!";
    }

    header('Location: ../view/add_user_view.php');
    exit;
}
?>
