<?php

session_start();
include_once '../model/events_model.php';

if (!isset($_SESSION['email']) || !isset($_SESSION['name'])) {
    header('Location: login_view.php');
    exit;
}
$all_events = fetch_all_events();


?>
