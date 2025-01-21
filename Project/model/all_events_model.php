<?php
function fetch_all_events() {
    $conn = new mysqli('localhost', 'root', '', 'db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM events";
    $result = $conn->query($sql);
    $events = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
    }
    $conn->close();

    return $events;
}

?>
