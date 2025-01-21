<?php
function generate_report($event_id, $event_name, $event_description, $event_date, $event_location, $organizer_name, $participants, $status) {
    $conn = new mysqli('localhost', 'root', '', 'db');
    if ($conn->connect_error) {
        return false;
    }

    $sql = "INSERT INTO event_reports (event_id, event_name, event_description, event_date, event_location, organizer_name, participants, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssis", $event_id, $event_name, $event_description, $event_date, $event_location, $organizer_name, $participants, $status);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return true;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}
?>
