<?php
function getAllReports() {
    $conn = new mysqli('localhost', 'root', '', 'db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM event_reports";
    $result = $conn->query($sql);
    $reports = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reports[] = $row;
        }
    }
    $conn->close();
    return $reports;
}
?>
