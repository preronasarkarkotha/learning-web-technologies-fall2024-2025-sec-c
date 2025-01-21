<?php
session_start();
include_once '../model/create_event_model.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_no = $_POST['event_no'];
    $event_name = $_POST['event_name'];
    $event_description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
    $event_location = $_POST['event_location'];

    
    $event_id = create_event($event_no, $event_name, $event_description, $event_date, $event_location);

   
    if ($event_id) {
        $_SESSION['event_message'] = "Event created successfully!";  
    } else {
        $_SESSION['event_message'] = "";  
    }

    header('Location: ../view/create_event_view.php');  
    exit;
}
?>
