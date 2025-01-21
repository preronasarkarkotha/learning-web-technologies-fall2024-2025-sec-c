<?php
function create_event($event_no, $event_name, $event_description, $event_date, $event_location) {
   
    $conn = new mysqli('localhost', 'root', '', 'db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO events (event_no, event_name, event_description, event_date, event_location) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $event_no, $event_name, $event_description, $event_date, $event_location);

    if ($stmt->execute()) {
        $event_id = $stmt->insert_id;
    } else {
        $event_id = false;
    }
    $stmt->close();
    $conn->close();
    return $event_id;
}
?>
