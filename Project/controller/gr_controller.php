<?php
session_start();
include_once '../model/gr_model.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
    $event_location = $_POST['event_location'];
    $organizer_name = $_POST['organizer_name'];
    $participants = $_POST['participants'];
    $status = $_POST['status'];

    $result = generate_report($event_id, $event_name, $event_description, $event_date, $event_location, $organizer_name, $participants, $status);

    if ($result) {
        $_SESSION['user_message'] = "Report generated successfully!";
    } else {
        $_SESSION['user_message'] = "Error: Could not generate the report.";
    }

    header('Location: ../view/gr_view.php');
    exit;
}
