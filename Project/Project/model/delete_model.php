<?php
function delete_event($event_no) {
    $conn = new mysqli('localhost', 'root', '', 'db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM events WHERE event_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_no);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
