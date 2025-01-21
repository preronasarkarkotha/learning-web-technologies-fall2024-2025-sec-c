<?php
session_start();
include_once '../model/list_model.php';

if (!isset($_SESSION['email']) || !isset($_SESSION['name'])) {
    header('Location: login_view.php');
    exit;
}

$reports = getAllReports();
?>
