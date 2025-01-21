<?php
function addUser($name, $email, $role) {
    $conn = new mysqli('localhost', 'root', '', 'db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO users (name, email, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $role);
    if ($stmt->execute()) {
        $user_id = $stmt->insert_id;
    } else {
        $user_id = false;
    }
    $stmt->close();
    $conn->close();
    return $user_id;
}
?>
