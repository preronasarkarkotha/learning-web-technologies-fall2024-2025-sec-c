<?php
session_start();
include_once '../model/organizer_model.php';

if (!isset($_SESSION['email']) || !isset($_SESSION['name'])) {
    header('Location: login_view.php');
    exit;
}
$users = getAllUsers();  



?>
