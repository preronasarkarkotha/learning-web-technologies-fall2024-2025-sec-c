<?php
include_once '../model/delete_model.php';
if (isset($_POST['event_no'])) {
    $event_no = $_POST['event_no'];
    delete_event($event_no);
    header('Location: ../view/all_events_view.php');
    exit;
} else {
    echo "Invalid event number.";
}
?>
